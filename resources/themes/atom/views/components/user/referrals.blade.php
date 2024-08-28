@props(['referrals'])

<x-card.base title="{{ sprintf(__('User Referrals (%s/%s)'), $referrals->count(), $settings->get('referrals_needed')) }}" subtitle="{{ __('Referral new users and be rewarded by in-game goods') }}" icon="friends" icon-color="#b17f85">
    <div class="flex flex-col gap-3">
        <p class="text-sm dark:text-white">{{ __('Here at :hotel we have added a referral system, allowing you to obtain a bonus for every :needed users that registers through your referral link will allow you to claim a reward of :amount diamonds!', ['hotel' => $settings->get('hotel_name'), 'needed' => $settings->get('referrals_needed'), 'amount' => $settings->get('referral_reward_amount')]) }}</p>
        <p class="text-xs text-gray-400 dark:text-white">{{ __('Boosting referrals by making own accounts will lead to removal of all progress, currency, inventory and a potential ban') }}</p>

        <div class="flex items-center gap-3">
            <x-form.input id="referral" value="{{ sprintf('%s/register?referral_code=%s', config('app.url'), auth()->user()->referral_code) }}" class="flex-1" readonly />
            <div class="w-36">
                <x-button variant="secondary" onclick="copyReferralLink()">{{ __('Copy code') }}</x-button>
            </div>
        </div>
    </div>
</x-card.base>

<script>
    function copyReferralLink() {
        const referralLink = document.getElementById('referral').value
        navigator.clipboard.writeText(referralLink)
        
        Swal.fire({
            icon: 'success',
            text: '{{ __('Your referral code has been copied to your clipbord!') }}',
        })
    }
</script>