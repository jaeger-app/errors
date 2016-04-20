# Jaeger Errors Object

[![Build Status](https://travis-ci.org/jaeger-app/errors.svg?branch=master)](https://travis-ci.org/jaeger-app/errors)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jaeger-app/errors/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jaeger-app/errors/?branch=master)
[![Author](http://img.shields.io/badge/author-@mithra62-blue.svg?style=flat-square)](https://twitter.com/mithra62)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/jaeger-app/bootstrap/master/LICENSE) 

A base error collection to allow for individual inspections and system validations.

## Installation

Add `jaeger-app/errors` as a requirement to your `composer.json`:

```bash
$ composer require jaeger-app/errors
```

## Simple Example

```php
use JaegerApp\Errors

$errors = new Errors;
$errors->setError('error_key_1', 'error_lang_key');
$errors->setError('error_key_2', 'another_error_lang_key');

$system_errors = $errors->getErrors();
```