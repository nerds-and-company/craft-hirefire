# Hirefire (for Craft 3)

Hirefire.io worker scheduler for Craft 3 queue jobs

## Installation

This tool can be installed [using Composer](https://getcomposer.org/doc/00-intro.md). Run the following command from the root of your project:

```
composer require nerds-and-company/craft-hirefire
```

This will add `nerds-and-company/craft-hirefire` as a requirement to your  project's `composer.json` file and install the source-code into the `vendor/nerds-and-company/craft-hirefire` directory.

Hirefire is now available as an installable plugin in Craft. You can install it in the cp or use `./craft install/plugin hirefire`

## Usage

See https://help.hirefire.io/guides/hirefire/job-queue-any-programming-language on how Hirefire works with job queues. This plugin will use the `HIREFIRE_TOKEN` environment variable for authentication, so Hirefire can query your site for pending jobs. When one or more pending jobs are found, Hirefire will start a worker untill all jobs are done.

## License

This project has been licensed under the MIT License (MIT). Please see [License File](LICENSE) for more information.

## Changelog

[CHANGELOG.md](CHANGELOG.md)
