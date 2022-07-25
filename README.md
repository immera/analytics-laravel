# Interface to access Analytics API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/immera/analytics.svg?style=flat-square)](https://packagist.org/packages/immera/analytics)
[![Total Downloads](https://img.shields.io/packagist/dt/immera/analytics.svg?style=flat-square)](https://packagist.org/packages/immera/analytics)
![GitHub Actions](https://github.com/immera/analytics/actions/workflows/main.yml/badge.svg)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require immera/analytics
```

## Usage

```php
// Store data
Analytics::store([
    'action' => 'test',
    'project' => 'boilerplate',
])
```

```php
// Fetch data
$result = Analytics::query()
    ->match(['action' => 'test'])
    ->project(['action' => 1, 'project' => 1])
    ->limit(1)
    ->fetchJson();

dd($result);
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
