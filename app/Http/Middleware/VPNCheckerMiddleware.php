<?php

namespace App\Http\Middleware;

use App\Models\WebsiteIpBlacklist;
use App\Models\WebsiteIpWhitelist;
use App\Services\IpLookupService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VPNCheckerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Skip check if vpn checker is disabled
        if (!(int)setting('vpn_block_enabled') || setting('ipdata_api_key') === 'ADD-API-KEY-HERE') {
            return $next($request);
        }


        // Skip check if the rank is allowed to bypass the checker
        if (hasPermission('bypass_vpn')) {
            return $next($request);
        }

        // Fetch all whitelisted IP addresses
        $ipWhitelist = WebsiteIpWhitelist::select('ip_address')
            ->get()
            ->pluck('ip_address')
            ->toArray();

        // Skip check if the IP is in the whitelist table
        if (in_array($request->ip(), $ipWhitelist)) {
            return $next($request);
        }

        // Fetch all blacklisted IP addresses
        $ipBlacklist = WebsiteIpBlacklist::select('ip_address')
            ->get()
            ->pluck('ip_address')
            ->toArray();

        // Restrict user if IP is blacklisted
        if (in_array($request->ip(), $ipBlacklist)) {
            return to_route('me.show')->withErrors([
                'message' => __('Your IP have been restricted - If you think this is a mistake, you can contact us on our Discord.'),
            ]);
        }

        // Instantiate the necessary things to look up the visitor IP
        $ipService = new IpLookupService(setting('ipdata_api_key'));
        $data = $ipService->ipLookup($request->ip());

        if (array_key_exists('status', $data) && ($data['status'] === 400 || $data['status'] === 401)) {
            return $next($request);
        }

        // Fetch all whitelisted ASNs
        $asnWhitelist =  WebsiteIpWhitelist::select('asn')
            ->where('whitelist_asn', '=', '1')
            ->get()
            ->pluck('asn')
            ->toArray();

        // Skip check if the ASN is in the whitelist table & if "whitelist_asn" is true
        if ((array_key_exists('asn', $data) && array_key_exists('asn', $data['asn'])) && in_array($data['asn']['asn'], $asnWhitelist)) {
            return $next($request);
        }

        // Fetch all blacklisted ASNs
        $asnBlacklist =  WebsiteIpBlacklist::select('asn')
            ->where('blacklist_asn', '=', '1')
            ->get()
            ->pluck('asn')
            ->toArray();

        // Restrict the user if their ASN is within the blacklist table
        if ((array_key_exists('asn', $data) && array_key_exists('asn', $data['asn']) && in_array($data['asn']['asn'], $asnBlacklist))) {
            return to_route('me.show')->withErrors([
                'message' => __('Your IP have been restricted - If you think this is a mistake, you can contact us on our Discord.'),
            ]);
        }

        // Remove the following keys from the check
        if (array_key_exists('blocklists', $data['threat'])) {
            unset($data['threat']['blocklists']);
        }

        if (array_key_exists('is_icloud_relay', $data['threat'])) {
            unset($data['threat']['is_icloud_relay']);
        }

        if (array_key_exists('is_datacenter', $data['threat'])) {
            unset($data['threat']['is_datacenter']);
        }

        // If any of the below keys are true, restrict the user
        /*
            "is_tor"
            "is_proxy"
            "is_anonymous"
            "is_known_attacker"
            "is_known_abuser"
            "is_threat"
            "is_bogon"
         * */

        // If any of the above is true for the users IP, restrict and block their ip within the database
        if (array_key_exists('threat', $data) && in_array(true, array_values($data['threat']))) {
            // Add the ip & asn to the blacklist table
            WebsiteIpBlacklist::create([
                'ip_address' => $request->ip(),
                'asn' => array_key_exists('asn', $data['asn']) ? $data['asn']['asn'] : null,
            ]);

            return to_route('me.show')->withErrors([
                'message' => __('Your IP have been restricted - If you think this is a mistake, you can contact us on our Discord.'),
            ]);
        }

        return $next($request);
    }
}
