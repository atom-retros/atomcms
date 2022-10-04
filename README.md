<div align="center">
<img src="https://i.imgur.com/9ePNdJ4.png" alt="Atom CMS"/>
</div>

<div align="center">
    <a href="https://discord.gg/rX3aShUHdg" target="_blank">
        Join the official Atom CMS Discord server
    </a>
</div>

## What is Atom CMS?
Atom CMS is a Habbo retro CMS, aiming to provide an easy and solid experience for you and your users. It offers an easy development experience and it even comes with its own theming system, making it a breeze to create your own [themes](https://github.com/qirolab/laravel-themer).

**What technologies is Atom CMS built with?**
- PHP (Laravel 9.x)
  [Laravel docs](https://laravel.com/docs/9.x).
- Vite [Vite docs](https://vitejs.dev/).
    
  *Depending on the theme used*
  - TailwindCSS
  [Tailwind docs](https://tailwindcss.com/docs/installation).
  - Bootstrap
  [Bootstrap docs](https://getbootstrap.com/docs/5.0/getting-started/introduction/).
  - Vanilla CMS or something else

Laravel was chosen as its backend, due to it being very robust and battle tested within "in the real world" on top up that it has a huge community to back it, with tons of free (& paid) learning resources and its solid documentation that other CMS' (& frameworks) normally lack. Combine those things together and you'll be able to build anything you want even as a beginner, you dont need to be a PHP expert or a frontend master to work with Atom CMS!

If you are new to Laravel and want to build your own features, then I highly recommend the following free bootcamp and two (free) series. 
[https://bootcamp.laravel.com/](https://bootcamp.laravel.com/) - **very recommended**

- https://laracasts.com/series/laravel-8-from-scratch
- https://laracasts.com/series/whats-new-in-laravel-9

Laracasts is an official learning platform for Laravel, so do not worry if you take the time to watch the courses, you'll be taught some of the best practises by some of the best teachers.

## Why was Atom CMS made?
Atom CMS was made to bring the retro community a modern and robust CMS, using **industry approved** technologies which is not only easy to understand but also "easy" to work with. Another reason to why Atom CMS was made was also to bring a variation to the CMS options available to the retro community. With Atoms built in theme system, it becomes a breeze to brew up a new layout in no time, leaving room to either customise your hotel further, or simply contribute to the community by bringing new and exciting themes.

## Coming from another cms?
Are you coming from another CMS, but want to switch to Atom, then fear no more. Atom CMS has a built in option to rename colliding table names and drop matching foreign keys.

*It's however recommended to do a proper cleanup yourself by removing old and unused tables yourself, rather than letting the CMS handle it. As otherwise it can lead to unexpected errors or behaviour.*

For example if you're changing from eg. Cosmic CMS and you know beforehand that your database contains similar table names, you can have Atom automatically **attempt** to solve colliding table names, by changing the following: ``RENAME_COLLIDING_TABLES=false`` to ``RENAME_COLLIDING_TABLES=true`` inside of the ``.env`` file - Please follow the setup guide below, if you don't have a .env file yet.

## Setup guide
The following requirements is needed to setup Atom CMS:
- PHP 8.1 or above [PHP Downloads](https://www.php.net/downloads.php)
- MySQL 8.x or MariaDB 10.x or newer
- Composer v2 [Composer Download](https://getcomposer.org/download/)
- NPM (LTS) [Node Download](https://nodejs.org/en/download/)
- An Arcturus Morningstar database [Database repository](https://git.krews.org/morningstar/arcturus-morningstar-base-database)

Once all of the above has been installed & setup, you can continue doing the following:
Open CMD (Command Prompt) and navigate into the path you want the CMS to be located at, and run the following commands:

#### Windows Setup
```
[Https] git clone https://github.com/ObjectRetros/atomcms.git
[SSH - Recommended] git clone git@github.com:ObjectRetros/atomcms.git
cd atomcms
copy .env.example .env (Don't forget to edit the database credentials inside the .env)
composer install 
npm install && npm run build:atom (For development run: npm run dev:[theme-name] (eg. npm run dev:atom))
php artisan key:generate
php artisan migrate --seed

* You must link your site to the public folder of Atom CMS
```

#### Required permissions
Please make sure the atomhk folder is granted "Full control" for both the IUSR & the IIS_IUSRS.

Here's a GIF of me doing it on a different folder: [https://gyazo.com/7d5f38525a762c1b26bbd7552ca93478](https://gyazo.com/7d5f38525a762c1b26bbd7552ca93478) the principle is the same, you just do it on the "atomhk" folder.

#### Required extensions
Please verify the following extensions are enabled inside your php.ini file. If they have a ";" in front of them it means that they're commented out and not enabled. Simply remove the ";" to enable them.
```
extension=curl
extension=fileinfo
extension=gd
extension=mbstring
extension=openssl
extension=pdo_mysql
extension=sockets
```

#### cURL error
If you're receiving a cURL 60 error due to eg. setting up findretros, then make sure you download the latest cacert.pem from [https://curl.se/docs/caextract.html](https://curl.se/docs/caextract.html). Once downloaded place it in eg. "C:/" folder and then open your php.ini file, search for ``curl.cainfo`` uncomment (Remove the ";" infront of the line) it and put the absolute path + file name to your certificate (Eg. "C:/cacert-2022-07-19.pem"). Save the file and your problem should now be solved.

#### Windows Tutorial
Have you always wanted to setup your own hotel from scratch, but are unsure how? Then  you can follow my **three** parts series on DevBest which will take you through any step necessary to get everything up and running.

- Part 1: [https://devbest.com/threads/how-to-set-up-a-retro-in-2022-iis-nitro-html5-part-1.92532/](https://devbest.com/threads/how-to-set-up-a-retro-in-2022-iis-nitro-html5-part-1.92532/)
- Part 2: [https://devbest.com/threads/how-to-set-up-a-retro-in-2022-iis-nitro-html5-part-2.92533/](https://devbest.com/threads/how-to-set-up-a-retro-in-2022-iis-nitro-html5-part-2.92533/)
- Part 3: [https://devbest.com/threads/how-to-set-up-a-retro-in-2022-iis-nitro-html5-part-3.92543/](https://devbest.com/threads/how-to-set-up-a-retro-in-2022-iis-nitro-html5-part-3.92543/)

#### Linux Setup
```
[Https] git clone https://github.com/ObjectRetros/atomcms.git
[SSH - Recommended] git clone git@github.com:ObjectRetros/atomcms.git
cd atomcms
cp .env.example .env (Don't forget to edit the database credentials inside the .env)
composer install
npm install && npm run build:atom (For development run: npm run dev:[theme-name] (eg. npm run dev:atom))
php artisan key:generate
php artisan migrate --seed
```

**Grant necessary permissions to used folders. Within your atomcms directory, enter the 4 commands below:**
```
sudo chown -R $USER:www-data storage
sudo chown -R $USER:www-data bootstrap/cache
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

For NGINX, you can copy the config from here: [Deploy a site on nginx](https://laravel.com/docs/9.x/deployment#nginx)

**If you are using Atom CMS in production, dont forget to change the following variables:**
```
APP_ENV=local to APP_ENV=production
APP_DEBUG=true to APP_DEBUG=false
```

## Using HTTPS
In case you're using HTTPs through Cloudflares "Always redirect to HTTPs" feature, then we recommend to set `FORCE_HTTPS=` to `true` to make sure everything is properly using HTTPs. This is necessary for the article reactions & online counter within the client, to work properly when you're letting cloudflare handle the HTTPs redirects.

## Setup Google Recaptcha
Atom CMS comes with built-in support for Google recaptcha. However there's a few steps we have to apply, before it being enabled on your hotel.

First of all inside the ``webite_settings`` table you'll find an entry with a key named ``google_recaptcha_enabled`` set this to ``1`` if you with Google recaptcha to be enabled and ``0`` if you want it disabled.

Next up in your ``.env`` file you'll find ``GOOGLE_RECAPTCHA_SITE_KEY=`` and ``GOOGLE_RECAPTCHA_SECRET_KEY=`` this is where your site and secret key that Google provides, has to be placed, for your recaptcha to work properly.

If you don't have any recaptcha keys yet, head to [https://www.google.com/recaptcha/admin/](https://www.google.com/recaptcha/admin/) and fill out the necessary fields to receive them.

*You must select ``reCaptcha v2`` and the "I'm not a robot" Checkbox, when selecting your recaptcha settings within google.*

## Setup VPN blockage
In Atom CMS you can restrict users from entering your hotel, by enabling & setting up VPN blockage.

To enable VPN blockage, you must go through a few steps. The first step is to go to [dashboard.ipdata.co](dashboard.ipdata.co) and either login or sign up.

Secondly click the ">_ API Settings" or visit the following URL [https://dashboard.ipdata.co/api.html](https://dashboard.ipdata.co/api.html) - You'll then be greeted with your personal API key at the top. Copy the API key and head to your database. Open the ``website_settings`` table and find the ``vpn_block_enabled`` entry and set it to ``1`` next up find the ``ipdata_api_key`` and replace the ``ADD-API-KEY-HERE`` with your personal API key.

Once all the steps above has been completed, your hotel will then make use of API provided by "ipdata" to block threats & VPNs.

Atom makes it possible for you to manually whitelist & blacklist IPs & ASNs too, simply go to the ``website_ip_whitelist`` table to whitelist IPs or ASNs and go to ``website_ip_blacklist`` to blacklist IPs and ASNs.

You can also allow users above a specified rank to bypass all IP & ASN checks - simply head to the ``website_permissions`` table and adjust the value of the ``min_rank_to_bypass_vpn_check`` to the minimum rank required for bypassing all checks.

By default, Atom will only apply the IP & ASN check when users are trying to visit your client, if you with to apply it to other places, simply copy the ``vpn.checker`` middleware and apply it to other routes within the ``web.php`` file.

*Any whitelisted IP or ASN will overrule any blacklisted IP or ANS.*

## Setup Nitro client
With Atom CMS it's **fairly** easy to setup your Nitro client. all you have to do is head into your `.env` file and locate `NITRO_CLIENT_PATH=` assign the path to where your nitro's `index.html` is located - eg. `NITRO_CLIENT_PATH=/client/html/nitro-client` and then save the file.

Once you've assigned your nitro client path, open your nitro's `index.html` file and remove the `/` infront of the `renderer-config.json` and `ui-config.json`

Another alternative to removing the `/` is to simply not remove them and place the the `renderer-config.json` and `ui-config.json` directly within the `public` folder. It's recommended to do the first option however, as it allows for a better file structure.

## Setup Flash client
With Atom CMS you have the option to enable the good old flash client.

By default, the flash client is disabled so there's a few steps you must take in order to enable it and get it up and running.

To enable the flash client, head to your .env file and find and change the `FLASH_CLIENT_ENABLED=false` to `FLASH_CLIENT_ENABLED=true`. Next up you'll see a few settings, related to the flash client just below the `FLASH_CLIENT_ENABLED` you must adjust those, to match your folder structure, so everything links correctly. Sadly I can't provide you with a guide on how to link those correctly, as every hotel uses a different folder structure.

Once all the settings within the `.env` has been adjusted correctly, you and your users should be able to use the flash client.

*To use the flash client, you must either provide your users with your own desktop application, or they must use a browser supporting flash, as no regular browser supports flash after the end of 2021.*

### Create translations
Atom CMS makes it super easy to create and implement translations and new languages.

To add a new language is fairly straight forward. All you have to do is to copy the ``en.json`` inside the ``lang`` folder and name is your language country code eg. "se.json" for Swedish.

Once you've your file prepared, you translate the "values" inside the JSON file. For example:

``"Home": "Home",`` becomes ``"Home": "Hem",``

To add your language to the language selector, all you have to do is to add it inside the ``website_languages`` database table. It will then automatically be appended to the select options.

If you just want to add missing translations or update existing ones for a specific language, then all you have to do is to open the `.json` file that matches your language and update existing values or add new ones.

## Change theme
To change the CMS theme, simply head to website_settings and change the value of the "theme" to the name you gave your new theme upon initialising it.

## Create a theme
It's super easy to create a new theme, all you have to do is to enter the command below, in your terminal.
```
php artisan make:theme
```

Once the command has been executed, you'll be prompted with easy to follow scaffolding steps.

**It's recommended to not replacing the existing controllers during the theme scaffolding process, unless you are confident thats what you want**

![image](https://user-images.githubusercontent.com/87041394/182718267-f409f5f6-d69c-4226-b6d6-9b7f8d0b2aac.png)


*All credits for the theme system goes to [qirolab](https://github.com/qirolab/laravel-themer)*

## Credits
- **Kasja** - Helping with design, ideas & GFX
- **Nicollas** - Dark mode & pt-br translations
- **Oliver** - Profile page & Finnish translations
- **Kani** - Rcon System & Findretros API
- **Beny** - Findretros API fixes & CF Fixes
- **Danbo** - Minor bugfixes
- **Damue** - German translations
- **Live** - French translations
- **Talion** - Turkish translations
- **Rille & CentralCee** - Swedish translations
- **Yannick** - Netherland translations
- **Raizer** - Circinus
