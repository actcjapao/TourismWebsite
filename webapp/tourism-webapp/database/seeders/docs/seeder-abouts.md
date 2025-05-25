### How to run a specific seeder

```sh
php artisan db:seed --class=UserSeeder
```

### How to run all seeders

To run all seeders in Laravel 9, use the following command:

```php
php artisan db:seed
```

This command executes the `DatabaseSeeder` class located at:

```php
database/seeders/DatabaseSeeder.php
```

By default, `DatabaseSeeder` should call other seeders like this:

```php
public function run()
{
    $this->call([
        UserSeeder::class,
        ProductSeeder::class,
        // Add other seeders here
    ]);
}
```

So, to run all your seeders, make sure they're listed in the `DatabaseSeeder.php` file.

### Bonus: Run migration and seed together

If you want to run all migrations and then seed the database:

```php
php artisan migrate --seed
```