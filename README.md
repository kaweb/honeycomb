# Honeycomb
A library for interacting with the Inventory Hive API built using PHP

Please consult the [API documentation](https://www.inventoryhive.co.uk/api/documentation) for endpoint parameters.

# Examples

Create a connection to the Inventory Hive API with your login details:

```php
use Kaweb\Honeycomb\Application as Honeycomb;

$honeycomb = new Honeycomb([
	'username' => '',
	'password' => '',
	'client_id' => '',
	'client_secret' => '',
	'version' => '1',
]);
```

Access all user data
```php
$honeycomb->users()->getAll();
```

Access a specific user's data
```php
$honeycomb->users()->get(123);
```

Update a specific user's data
```php
$honeycomb->users()->patch(123);
```

Delete a specific user
```php
$honeycomb->users()->delete(123);
```

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
