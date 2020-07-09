## Steps
1.) Install spatie\laravel-multitenancy
```bash
$ composer require spatie\laravel-multitenancy
```

2.) Install vendor publish helper port to lumen. This will be used to for publishing migration or config of laravel-multitenancy package
```bash
composer require laravelista/lumen-vendor-publish
```

3.) Edit `app\Console\Kernel.php` adding `Laravelista\LumenVendorPublish\VendorPublishCommand::class` to `protected $commands`

4.) Add laravel helper functions `helpers/laravel.php` and update composer.json autoload->files to include helper on autoload files.

5.) Copy spatie/laravel-multitenancy/src/config/multitenancy.php to project config. Note you have to create the config folder manually for lumen.

6.) Create config/database.php and add landlord and tenant connections. `tenant` connection db name should be blank as it will be dynamically populated by multitenancy package.

7.) Copy db migration of multitenancy package by running command below
```bash
$ php artisan vendor:pubish --provider Spatie\Multitenancy\MultitenancyServiceProvider --tag migration
```

8.) Start migration through
```bash
php artisan migration --path database/migrations/landlord/<datestamp>_create_landloard_tenants_table.php --database landlord
```

### Links

#### Spatie/laravel-multitenancy
Documentation: https://docs.spatie.be/laravel-multitenancy/v1/introduction/

Video Tutorial: https://youtu.be/1bucfsyAZtI


#### Lumen PHP Framework
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
