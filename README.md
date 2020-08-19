<<<<<<< HEAD
Symfony Standard Edition
========================

**WARNING**: This distribution does not support Symfony 4. See the
[Installing & Setting up the Symfony Framework][15] page to find a replacement
that fits you best.

Welcome to the Symfony Standard Edition - a fully-functional Symfony
application that you can use as the skeleton for your new applications.

For details on how to download and get started with Symfony, see the
[Installation][1] chapter of the Symfony Documentation.

What's inside?
--------------

The Symfony Standard Edition is configured with the following defaults:

  * An AppBundle you can use to start coding;

  * Twig as the only configured template engine;

  * Doctrine ORM/DBAL;

  * Swiftmailer;

  * Annotations enabled for everything.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev env) - Adds code generation
    capabilities

  * [**WebServerBundle**][14] (in dev env) - Adds commands for running applications
    using the PHP built-in web server

  * **DebugBundle** (in dev/test env) - Adds Debug and VarDumper component
    integration

All libraries and bundles included in the Symfony Standard Edition are
released under the MIT or BSD license.

Enjoy!

[1]:  https://symfony.com/doc/3.4/setup.html
[6]:  https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/index.html
[7]:  https://symfony.com/doc/3.4/doctrine.html
[8]:  https://symfony.com/doc/3.4/templating.html
[9]:  https://symfony.com/doc/3.4/security.html
[10]: https://symfony.com/doc/3.4/email.html
[11]: https://symfony.com/doc/3.4/logging.html
[13]: https://symfony.com/doc/current/bundles/SensioGeneratorBundle/index.html
[14]: https://symfony.com/doc/current/setup/built_in_web_server.html
[15]: https://symfony.com/doc/current/setup.html
=======
# postcodes

You will need to add the parameters.yaml file

then create the database symfony

and add the following

CREATE TABLE `postcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postcode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lon` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

Install the vendor directory

download the zip file and run as follows

bin/console app:import-postcodes /var/www/html/postcodes/2020-05.zip

If I had more time I would have liked to fix the issues which would be caused running the same file more than once
and have it download by it's self rather than having to pass in the location. Also with the database I may with more
time to think about it split the postcodes into separate tables as this may speed up searching later on if all records
are entered. I ran into memory problems trying to import the whole database which is why I fixed it at 25.

where /var/www/html/postcodes/2020-05.zip is the location of the zip file.

Routes for json output are

/postcode/{lat}/{lon}

/postcode/{postcode} Can be full or partial

Run tests I have used codeception for unit testing I would have done some functional and acceptance testing but I have ran out of time.

vendor/bin/codecept run


>>>>>>> c5a1240aed06b3c0ccdc58f33149a4d68a949434
