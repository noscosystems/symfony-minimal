# Symfony Minimal Distribution

This is the minimal Symfony distribution, forked from [Benjamin Eberlei](https://github.com/beberlie/symfony-minimal-distribution).
Please see his [blog post](http://whitewashing.de/2014/10/26/symfony_all_the_things_web.html "Symfony All The Things (Web)") explaining the reasoning for this approach.

This is a back-to-basics Symfony application for educational purposes to explain (to those not familiar with Symfony) how one is laid out; the extras provided by Symfony's [standard edition application](https://github.com/symfony/framework-standard-edition) may cause unnecessary confusion. It is recommended that you get comfortable with this before moving onto the standard edition.

## Contents

It only contains the following bundles (other than the application bundle):

- FrameworkBundle
- MonologBundle
- TwigBundle
- WebDebugBundle in `dev`-environment

It only contains one configuration file at `app/config/config.yml` that is parameterized by environmental variables from the phpdotenv file `.env` that you need to create in the project root:

```bash
SYMFONY_ENV=dev
SYMFONY_DEBUG=1
SYMFONY__SECRET=abcdefg
SYMFONY__MONOLOG__ACTION_LEVEL=debug
```

> This approach uses Symfony's [external configuration parameter support](http://symfony.com/doc/current/cookbook/configuration/external_parameters.html)
> which basically means that Symfony will grab any environment variable prefixed with `SYMFONY__` and set it as a parameter in the service container; after
> removing the prefix, lowercasing the variable name, and replacing double underscores with dots. For example, the environmental variable
> `SYMFONY__MONOLOG__ACCESS_LEVEL` becomes `monolog.access_level`.

## Directory Structure

The directory structure of a Symfony application is different to projects you've previously worked on.

- `app/` contains application-specific configuration (system config, routing), resources (views, assets), and volatile files (cache, logs).
- `src/` contains PHP source-code. Think controllers.
- `public/` is the webroot directory, it's just `public_html/` shortened. This is called `web/` in most Symfony installations.
- `vendor/` is where Composer installs third-party code. This directory should never be committed to version control (Git).

## Setup

- Clone the repository with Git.
- Install dependencies via Composer (see the **Changes** section below for using Composer properly).
- Setup the environmental variables file described above in the root directory of the project.
- It works! Install assets (CSS, images) with the console application to make the error pages look nice, you'll see them a lot.

```bash
$ git clone git@github.com:noscosystems/symfony-minimal.git
    Cloning into 'symfony-minimal'...
    Receiving objects: 100% (93/93), 13.74 KiB | 0 bytes/s, done.
    Resolving deltas: 100% (31/31), done.
    Checking connectivity... done.

$ cd symfony-minimal

$ composer install
    Loading composer repositories with package information
    Installing dependencies (including require-dev)
    Writing lock file
    Generating autoload files

$ nano .env

$ php app/console assets:install ./public
    Installing assets as hard copies
    Installing assets for Symfony\Bundle\FrameworkBundle into public/bundles/framework
```

## Changes

Changes made to the original minimal distribution by Benjamin include:

- Rename the bundle containing the application logic to `AppBundle`, as suggested by Symfony's [best practices](http://symfony.com/doc/current/best_practices/index.html).
- More diverse examples of Twig templates (as no-one has used Twig in previous frameworks).
- Unlike previous projects, the `composer.lock` file is committed to the repository, EngineYard wrote a
  [blog post explaining why](https://blog.engineyard.com/2014/composer-its-all-about-the-lock-file "Composer: It’s All About the Lock File").
  So from now on run `composer install` all the time instead of `composer update`.
