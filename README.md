# Symfony Minimal Distribution

This is the minimal Symfony distribution, forked from [Benjamin Eberlei](https://github.com/beberie/symfony-minimal-distribution).
Please see his [blog post](http://whitewashing.de/2014/10/26/symfony_all_the_things_web.html "Symfony All The Things (Web)") explaining the reasoning for this approach.

This is a back-to-basics Symfony application for educational purposes to explain to those not familiar with Symfony how one is laid out; the extras provided by Symfony's [standard edition application](https://github.com/symfony/framework-standard-edition) may cause unnecessary confusion.

## Contents

It only contains the following bundles:

- FrameworkBundle
- MonologBundle
- TwigBundle
- WebDebugBundle in `dev`-environment

It only contains one configuration file at `app/config/config.yml` that is parameterized by environmental variables from the phpdotenv file `.env` that you need to create in the project root:

```bash
SYMFONY_ENV=dev
SYMFONY_DEBUG=1
SYMFONY__SECRET=abcdefg
SYMFONY__MONOLOG_ACTION_LEVEL=debug
```

## Changes

Changes made to the original minimal distribution by Benjamin include:

- Rename the bundle containing the application logic to `AppBundle`, as suggested by Symfony's [best practices](http://symfony.com/doc/current/best_practices/index.html).
- More diverse examples of Twig templates (as no-one has used Twig in previous frameworks).
