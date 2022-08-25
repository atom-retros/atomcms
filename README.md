<div align="center">
<img src="https://i.imgur.com/9ePNdJ4.png" alt="Atom CMS"/>
</div>

## What is Atom CMS?
Atom CMS is a Habbo retro CMS, aiming to provide an easy and solid experience for you and your users. It offers an easy development experience and includes a theming system, making it a breeze to create your own [themes](https://github.com/qirolab/laravel-themer).

**Official Discord server**
[https://discord.gg/rX3aShUHdg](https://discord.gg/rX3aShUHdg)

**What technologies is being used?**
- Laravel 9.x (Latest as of August 2022)
  [Laravel docs](https://laravel.com/docs/9.x).
- Vite [Vite docs](https://vitejs.dev/).
    
  *Depending on the theme used*
  - TailwindCSS
  [Tailwind docs](https://tailwindcss.com/docs/installation).
  - Bootstrap
  [Bootstrap docs](https://getbootstrap.com/docs/5.0/getting-started/introduction/).
  - Vanilla CMS or something else

If you are new to Laravel, then there's luckily tons of resources online to help you learn it. One of the best options is those two video courses. 
- https://laracasts.com/series/laravel-8-from-scratch
- https://laracasts.com/series/whats-new-in-laravel-9

## Why was Atom CMS made?
Atom CMS was made to bring the retro community a variation to the CMS options out there. With its built in theme system, it becomes a breeze to brew up a new layout in no time, leaving room to either customise your hotel further, or simply contribute to the community by bringing new and exciting themes.

Laravel was chosen as its backend, due to it being robust and battle tested "in the real world" on top up that it has a huge community to back it, with tons of free (& paid) learning resources and its solid documentation that other CMS' normally lack. Combine those things together and you'll be able to build anything you want even as a beginner, you dont need to be a PHP expert or a frontend master to work with Atom CMS!

## Coming from another cms?
Atom CMS has a built in option to rename colliding table names and drop matching foreign keys.

For example if you're changing from Cosmic CMS and you know beforehand that your database contains similar table names, all you have to do is changing the ``RENAME_COLLIDING_TABLES=false`` to ``RENAME_COLLIDING_TABLES=true`` inside of the ``.env`` file.

## Setup guide
To install Atom CMS you'll need to do the following:
- PHP 8.1 or above [PHP Downloads](https://www.php.net/downloads.php)
- Composer v2 [Composer Download](https://getcomposer.org/download/)
- NPM (LTS) [Node Download](https://nodejs.org/en/download/)
- An Arcturus Morningstar database [Database repository](https://git.krews.org/morningstar/arcturus-morningstar-base-database)

After all of the above has been installed you've to do the following:
Open CMD and navigate into the path you want the CMS to be located at, and run the commands listed below

#### Windows
```
[Https] git clone https://github.com/ObjectRetros/atomcms.git
[SSH - Recommended] git clone git@github.com:ObjectRetros/atomcms.git
cd atomcms
copy .env.example .env (Don't forget to edit the database credentials inside the .env)
composer install 
npm install && npm run build:atom (For development run: npm run dev:[theme-name] (eg. npm run dev:atom))
php artisan key:generate
php artisan migrate --seed

If you are using the CMS in production, dont forget to set the following variables:
APP_ENV=local to APP_ENV=production
APP_DEBUG=true to APP_DEBUG=false

*You must link your site to the public folder of the CMS*
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
If you're receiving a cURL 60 error due to eg. setting up findretros, then make sure you download the latest cacert.pem from [https://curl.se/docs/caextract.html](https://curl.se/docs/caextract.html). Once downloaded place it in eg. "C:/" then open your php.ini file, find ``curl.cainfo`` uncomment it and put the absolute path + file name to your certificate (Eg. "C:/cacert-2022-07-19.pem"). Save the file and your problem should now be solved

#### Linux
```
[Https] git clone https://github.com/ObjectRetros/atomcms.git
[SSH - Recommended] git clone git@github.com:ObjectRetros/atomcms.git
cd atomcms
cp .env.example .env (Don't forget to edit the database credentials inside the .env)
composer install
npm install && npm run build:atom (For development run: npm run dev:[theme-name] (eg. npm run dev:atom))
php artisan key:generate
php artisan migrate --seed


If you are using the CMS in production, dont forget to set the following variables:
APP_ENV=local to APP_ENV=production
APP_DEBUG=true to APP_DEBUG=false

Grant necessary permissions to used folders. Within your atomcms directory, enter the 4 commands below.
sudo chown -R $USER:www-data storage
sudo chown -R $USER:www-data bootstrap/cache
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

For NGINX you can copy the config from here: [Deploy a site on nginx](https://laravel.com/docs/9.x/deployment#nginx)

## Change theme
To change the CMS theme, simply head to website_settings and change the value of the "theme" to the name you gave your new theme upon initialising it.

## Create a theme
It's super easy to create a new theme, all you have to do is to enter the command below, in your terminal.
```
php artisan make:theme
```

Once the command has been executed, you'll be promted with easy to follow scaffolding steps.

**It's recommended to not replacing the existing controllers during the theme scaffolding process, unless you are confident thats what you want**

![image](https://user-images.githubusercontent.com/87041394/182718267-f409f5f6-d69c-4226-b6d6-9b7f8d0b2aac.png)


*All credits for the theme system goes to [qirolab](https://github.com/qirolab/laravel-themer)*

### Link nitro
To link your nitro client to the CMS is super easy. All you have to do is to edit the ``nitro_path`` in the ``habbo.php`` file which can be found inside the ``config`` folder.

Eg. Let's say your index.html is located in the public/client folder then your nitro_path must be /client as the CMS will automatically look inside the public folder for it.

### Add a new language for translations
To add a new language is fairly straight forward. All you have to do is to copy the ``en.json`` inside the ``lang`` folder and name is your language country code eg. "se.json" for Swedish.

Once you've your file prepared, you translate the "values" inside the JSON file. For example:

``"Home": "Home",`` becomes ``"Home": "Hem",``

To add your language to the language selector, all you have to do is to add it inside the ``website_languages`` database table. It will then automatically be appended to the select options.

## Credits
- **Kasja** - Helping with design, ideas & GFX
- **Oliver** - Doing the profile page
- **Kani** - Rcon System & Findretros API
- **Beny** - Findretros API fixes & CF Fixes
- **Damue** - German translations
- **Live** - French translations
- **Talion** - Turkish translations
- **CentralCee** - Swedish translations
- **Raizer** - Circinus
