<div align="center">
<img src="https://i.imgur.com/9ePNdJ4.png" alt="Atom CMS"/>
</div>

## What is Atom CMS?
Atom CMS is a Habbo retro CMS, aiming to provide an easy and solid experience for you and your users. It offers an easy development experience and includes a theming system, making it a breeze to create your own [themes](https://github.com/qirolab/laravel-themer).

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

If you are new to Laravel, then theres luckily tons of resources online to help you learn it. One of the best options is those two video courses. 
- https://laracasts.com/series/laravel-8-from-scratch
- https://laracasts.com/series/whats-new-in-laravel-9

## Why was Atom CMS made?
Atom CMS was made to bring the retro community a variation to the CMS options out there. With its built in theme system, it becomes a brezee to brew up a new layout in no time, leaving room to either customise your hotel further, or simply contribute to the community by bringing new and exciting theme.

Laravel was chosen as its backend, due to it being robust and battle tested "in the real world" on top up that it has a huge community to back it, with tons of free (& paid) learning resources and its solid documentation that other CMS' normally lack. Combine those things together and you'll be able to build anything you want even as a beginner, you dont need to be a PHP expert or a frontend master to work with Atom CMS!

## Setup guide
To install Atom CMS you'll need to do the following:
- PHP 8.1 or above [PHP Downloads](https://www.php.net/downloads.php)
- Composer v2 [Composer Download](https://getcomposer.org/download/)
- NPM (LTS) [Node Download](https://nodejs.org/en/download/)
- An Arcturus Morningstar database [Database repository](https://git.krews.org/morningstar/arcturus-morningstar-base-database)

After all of the above has been installed you've to do the following:
- Open CMD and navigate into the path you want the CMS to be located at, and run the commands listed below

#### Windows
```
[Https] git clone https://github.com/ObjectRetros/atomcms.git
[SSH - Recommended] git clone git@github.com:ObjectRetros/atomcms.git
cd atomcms
copy .env.example .env
composer install 
npm install && npm run dev [theme-name] (eg. npm run dev:atom)
php artisan key:generate
php artisan migrate --seed
```

For IIS - You must link your site to the public folder of the CMS

#### Linux
```
[Https] git clone https://github.com/ObjectRetros/atomcms.git
[SSH - Recommended] git clone git@github.com:ObjectRetros/atomcms.git
cd atomcms
cp .env.example .env
composer install
npm install && npm run dev [theme-name] (eg. npm run dev:atom)
php artisan key:generate
php artisan migrate --seed
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
