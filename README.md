# FormHandler version 4 beta

[![GitHub license](https://img.shields.io/badge/license-GPLv2-blue.svg)](https://raw.githubusercontent.com/FormHandler/FormHandler/master/LICENSE)
[![Build Status](https://travis-ci.org/FormHandler/FormHandler.svg?branch=master)](https://travis-ci.org/FormHandler/FormHandler)

FormHandler is a PHP written "module" which allows you to create dynamic forms in an easy way.
So easy that you can build a fully working form, including field validations, within 10 lines!

## Installation

Install the latest version with

```bash
$ composer require formhandler/formhandler
```

When the vendor directory is outside the root directory of your web application use a symlink on the FHTML directory to make it publicly available.

For example: map vendor/formhandler/formhandler/src/FHTML to /FHTML/ of your website root. Then add to your application

```php
<?php

\FormHandler\Configuration::set('fhtml_dir', '/FHTML/');
```

## Basic Usage

```php
<?php

//include the class (only needed when not using Composer)
include './path/to/formhandler/src/Loader.php';

//when using composer include the autoloader of composer
require __DIR__ . '/vendor/autoload.php';

use \FormHandler\FormHandler;
use \FormHandler\Field as Field;
use \FormHandler\Button as Button;

//create a new FormHandler object
$form = new FormHandler();

//some fields.. (see manual for examples)
Field\Text::set($form, 'Name', 'name', FH_STRING)
    ->setMaxlength(40);

Field\Number::set($form, 'Age', 'age', FH_INTEGER)
    ->setMin(1)
    ->setMax(110)
    ->setStep(1);

//button for submitting
Button\Submit::set($form, 'Send');

//set the 'commit-after-form' function
$form->onCorrect(function($data)
{
    return "Hello " . $data['name'] . ", you are " . $data['age'] . " years old!";
});
```

### Documentation

An extended version for FormHandler version 4 is currently not available due to continues development. 

### License

FormHandler is licensed under the GNU Lesser General Public License Version 2.1 - see the `LICENSE` file for details
