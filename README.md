# Interface to access Analytics API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/immera/analytics.svg?style=flat-square)](https://packagist.org/packages/immera/analytics)
[![Total Downloads](https://img.shields.io/packagist/dt/immera/analytics.svg?style=flat-square)](https://packagist.org/packages/immera/analytics)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require immera/analytics
```

After installing please setup your API key in the `.env` file

```env
ANALYTICS_SERIAL_KEY=
```

## Usage

#### Store data
```php
Analytics::store([
    'action' => 'test',
    'project' => 'analytics',
    'price' => rand(0, 10000) / 100,
    'quantity' => rand(0, 8),
])
```

#### Fetch data
```php
$result = Analytics::query()
    ->match(['action' => 'test'])
    ->project(['action' => 1, 'project' => 1])
    ->limit(1)
    ->fetchJson();
```

#### Count actions by hour
```php
$result = Analytics::query()
    ->match([
        'action' => 'test',
        'created_at.year' => 2022,
    ])
    ->group([
        '_id' => [
            'year' => '$created_at.year',
            'month' => '$created_at.month',
            'day' => '$created_at.day',
            'hour' => '$created_at.hour',
        ],
        'count' => [
            '$sum' => 1,
        ],
    ])
    ->sort([
        '_id.year' => -1,
        '_id.month' => -1,
        '_id.day' => -1,
        '_id.hour' => -1,
    ])
    ->limit(100)
    ->fetchJson();
```

#### Get Total price and average quantity by month, order desc
```php
$result = Analytics::query()
    ->match([
        'action' => 'test',
    ])
    ->group([
        '_id' => [
            'year' => '$created_at.year',
            'month' => '$created_at.month',
        ],
        'totalPrice' => [
            '$sum' => '$price',
        ],
        'averageQuantity' => [
            '$avg' => '$quantity',
        ],
    ])
    ->sort([
        '_id.year' => -1,
        '_id.month' => -1,
    ])
    ->limit(100)
    ->fetchJson();
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email antonioalmeida@immera.io instead of using the issue tracker.

## Credits

-   [Immera](https://github.com/immera)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
