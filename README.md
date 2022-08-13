# XML Symfony Bundle

**Created as part of [inspishop][link-inspishop] e-commerce platform by [inspirum][link-inspirum] team.**

[![Latest Stable Version][ico-packagist-stable]][link-packagist-stable]
[![Build Status][ico-workflow]][link-workflow]
[![PHPStan][ico-phpstan]][link-phpstan]
[![Total Downloads][ico-packagist-download]][link-packagist-download]
[![Software License][ico-license]][link-licence]

Symfony integration for [`inspirum/xml`][link-xml].


## Installation

Run composer require command:
```
composer require inspirum/xml-symfony
```

Enable bundle by adding it to the list of registered bundles in the `config/bundles.php` file of your project:

```php
<?php

return [
    // ...
    Inspirum\XML\Integration\Symfony\XMLBundle::class => ['all' => true],
];
```

## Contributing

Please see [CONTRIBUTING][link-contributing] and [CODE_OF_CONDUCT][link-code-of-conduct] for details.


## Security

If you discover any security related issues, please email tomas.novotny@inspirum.cz instead of using the issue tracker.


## Credits

- [Tomáš Novotný](https://github.com/tomas-novotny)
- [All Contributors][link-contributors]


## License

The MIT License (MIT). Please see [License File][link-licence] for more information.


[ico-license]:              https://img.shields.io/github/license/inspirum/xml-php-symfony.svg?style=flat-square&colorB=blue
[ico-workflow]:             https://img.shields.io/github/workflow/status/inspirum/xml-php-symfony/Test/master?style=flat-square
[ico-packagist-stable]:     https://img.shields.io/packagist/v/inspirum/xml-symfony.svg?style=flat-square&colorB=blue
[ico-packagist-download]:   https://img.shields.io/packagist/dt/inspirum/xml-symfony.svg?style=flat-square&colorB=blue
[ico-phpstan]:              https://img.shields.io/badge/style-level%209-brightgreen.svg?style=flat-square&label=phpstan

[link-xml]:                 https://github.com/inspirum/xml-php
[link-author]:              https://github.com/inspirum
[link-contributors]:        https://github.com/inspirum/xml-php-symfony/contributors
[link-licence]:             ./LICENSE.md
[link-changelog]:           ./CHANGELOG.md
[link-contributing]:        ./docs/CONTRIBUTING.md
[link-code-of-conduct]:     ./docs/CODE_OF_CONDUCT.md
[link-workflow]:            https://github.com/inspirum/xml-php-symfony/actions
[link-inspishop]:           https://www.inspishop.cz/
[link-inspirum]:            https://www.inspirum.cz/
[link-packagist-stable]:    https://packagist.org/packages/inspirum/xml-symfony
[link-packagist-download]:  https://packagist.org/packages/inspirum/xml-symfony
[link-phpstan]:             https://github.com/phpstan/phpstan
