# Honeycomb
A library for interacting with the Inventory Hive API built using PHP

Please consult the [API documentation](https://www.inventoryhive.co.uk/api/documentation) for endpoint parameters.


# Installation

## composer
Execute the following command to get the latest version of the package:
```
composer require kaweb/honeycomb
```

# Examples

Create a connection to the Inventory Hive API with your login details:

```php
use Kaweb\Honeycomb\Application as Honeycomb;

$honeycomb = new Honeycomb([
	'username' => '',
	'password' => '',
	'client_id' => '',
	'client_secret' => '',
]);
```

Each object supports `create`,  `retrieve`,  `update` and `delete` RESTful actions

Access all user data
```php
$honeycomb->users()->retrieve();
```

Access a specific user's data
```php
$honeycomb->users()->retrieve(123);
```

Update a specific user's data
```php
$honeycomb->users()->update(123 [
	'first_name' => 'Busy',
	'last_name' => 'Bee'
]);
```

Delete a specific user
```php
$honeycomb->users()->delete(123);
```

Some objects have custom actions as defined in the [API Documentation](https://www.inventoryhive.co.uk/api/documentation)

Register a new company

```php
$honeycomb->companies()->register([
	"email" =>            "example@inventoryhive.co.uk",
    "first_name" =>       "Buzzy",
    "last_name" =>        "Bee",
    "phone" =>            "123456789",
    "description" =>      "Landlord",
    "company_name" =>     "Inventory Hive",
]);
```
