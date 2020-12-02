# Marketplaceful Starter Kit

## Quick Start

**1. Create a new site** cloning the repo and removing the origin repo.

```
git clone git@github.com:marketplaceful/marketplaceful-starter-kit.git marketplaceful
cd marketplaceful
rm -rf .git
composer install
cp .env.example .env && php artisan key:generate
```

**2. Create the database** – you must update the values of the DB_* entries in .env so they match your database and run the migrations.

```
php artisan migrate
```

**3. Make a new user** – you'll want it to be an `owner` so you have access to everything.

```
php artisan marketplaceful:make-user
```

**4. Recompile the CSS** (optional)

The [TailwindCSS](https://tailwindcss.com/) included in this kit is compiled with [PurgeCSS](https://purgecss.com/) to reduce filesize on any unused classes and selectors. If you want to modify anything, just recompile it.

```
npm i && npm run dev
```

To compile for production again:

```
npm run production
```

**5. Build!**

If you're using [Laravel Valet](https://laravel.com/docs/valet), your site should be available at `http://marketplaceful.test`. You can access the control panel at `http://marketplaceful.test/marketplaceful` and login with your new user. Build your site, and have fun!
