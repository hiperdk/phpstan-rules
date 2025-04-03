# hiperdk/phpstan-rules

[![CI](https://github.com/hiperdk/phpstan-rules/actions/workflows/ci.yml/badge.svg)](https://github.com/hiperdk/phpstan-rules/actions/workflows/ci.yml)
[![Release](https://github.com/hiperdk/phpstan-rules/actions/workflows/release.yml/badge.svg)](https://github.com/hiperdk/phpstan-rules/actions/workflows/release.yml)
[![Release](https://img.shields.io/github/v/release/hiperdk/phpstan-rules.svg)](https://github.com/hiperdk/phpstan-rules/releases/latest)
[![Packagist Version](https://img.shields.io/packagist/v/hiperdk/phpstan-rules)](https://packagist.org/packages/hiperdk/phpstan-rules)
[![License](https://img.shields.io/github/license/hiperdk/phpstan-rules)](LICENSE)

## Rules list
###  You should not have a untyped const
 ❌
 ```php
public const x = 'y';
```

✅
```php
public const string x = 'y';
```

## Installation

We assume that [PHPStan](https://phpstan.org/) is already installed in your project.

To use this extension, require it in [Composer](https://getcomposer.org/):

```bash
composer require --dev hiperdk/phpstan-rules
```

If you also install [phpstan/extension-installer](https://github.com/phpstan/extension-installer) then you're all set!

<details>
  <summary>Manual installation</summary>

If you don't want to use `phpstan/extension-installer`, include phpstan-strict-rules.neon in your project's PHPStan config:

```yml
includes:
    - vendor/hiperdk/phpstan-rules/extension.neon
```
</details>

## Development setup

### Requirements
- Docker
- Docker compose
- Make

### Getting started
```
# Clone the repository
$ git clone git@github.com:hiperdk/phpstan-rules.git
$ cd phpstan-rules
$ make
# You now have a shell with PHP and can run the following commands:
$ composer phpunit
$ composer phpstan
```

## Releasing new version
```bash
# Replace 1.0.0 with the version you want to release
$ git tag -m "1.0.0" 1.0.0
$ git push origin 1.0.0
# GitHub Actions will automatically create a new release on GitHub and Packagist
```
