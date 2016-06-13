# Datium

[![Join the chat at https://gitter.im/opencafe/datium](https://badges.gitter.im/opencafe/datium.svg)](https://gitter.im/opencafe/datium?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Build Status](https://travis-ci.org/opencafe/datium.svg?branch=master)](https://travis-ci.org/opencafe/datium)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/opencafe/datium/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/opencafe/datium/?branch=master)
[![npm](https://img.shields.io/npm/l/express.svg?maxAge=2592000)]()
[![packagist](https://img.shields.io/badge/status-beta-orange.svg)]()

Awsome DateTime package ever written in PHP, with clean design pattern and generalization support in calendar and translation, which makes Datium powerful and simple.

* Simplicity in code and logic
* Expandable in every part
* Hijri and Jalali Calendars support

# Installation

## Via Composer

```
composer require opencafe/datium
```

## Manual
Just require ```Datium.php``` in your project and use Datium namespace as following example:

```js
require_once 'src/Datium.php';

use OpenCafe\Datium;

echo Datium::now()->get();
```

# Usage
Simply get what you want:

As datium output

```js
Datium::now()->get(); // ex: 2016-01-01 00:00:00

Datium::now()->timestamp(); ex: 1420057800
```
Or working with date as simple as you need:

```js
Datium::now()->add('1 day')->get(); // ex: 2016-01-02 00:00:00
```

## Get

Get Datium as DateTime PHP object:

```js
Datium::now()->object();
```

Or return it as simple date and time string:

```js
Datium::now()->get();
```

And even with custom PHP YMD [format](http://php.net/manual/en/function.date.php):

```js
Datium::now()->get( 'l jS F Y h:i:s A' );
```


## Create
You can also simply create new time:

```js
Datium::create( 2016, 1, 1, 12, 56, 13 )->get(); //ex: 2016-01-01 12:56:13
```

## Add Date
This method allow you add some year, month, day, hour, minute and second to current date.

```js
// If current date is 2016-01-01 00:00:00 then:

// Add 3 years
Datium::now()->add('3 year')->get();
// output => 2019-01-01 00:00:00

// Add one month
Datium::now()->add('1 month')->get()
// output => 2016-02-01 00:00:00

// Add 1 year, 3 month and 2 days
Datium::now()->add('1 year')
             ->add('3 month')
             ->add('2 day')
             ->add('1 hour')
             ->add('2 minute')
             ->add('3 second')
             ->get();
// output => 2017-04-03 01:02:03

```

## Sub Date
Sub some year, month, day, hour, minute and second from current date.

```js
// If current date is 2016-01-01 00:00:00 then:


// Sub 3 years
Datium::now()->sub('3 year')->get();
// output => 2013-01-01 00:00:00

// Sub one month
Datium::now()->sub('1 month')->get()
// output => 2015-12-01 00:00:00

// Sub 1 year, 3 month and 2 days
Datium::now()->sub('1 year')
             ->sub('3 month')
             ->sub('2 day')
             ->get();
// output => 2014-09-29 00:00:00
```

## Leap year
Define leap year of current year with generalization support.


```js
// If current date was 2016

// Is 2016 a leap year?
Datium::now()->leap()->get();
// output => FALSE

// Is 2017 a leap year?
Datium::now()->add('1 year')->leap()->get();
// output => TRUE

Datium::now()->to('hijri')->leap()->get();
```

## Get day of date
This method returns day of week or day of year with generalization support, you can add this feature to your custom calendars like other supported calendars in Datium.

## Day of Year
What the day is in current year:

```js
// If current date was 2015-09-03

Datium::now()->dayOf()->year();
// output => 246

// Day of year to Gregorian
Datium::now()->dayOf()->year();

// Day of year to Jalali
Datium::now()->to( 'jalali' )->dayOf()->year();

// Day of year to Hijri
Datium::now()->to( 'hijri' )->dayOf()->year();

```

## Day of Week
What day of week is current day:

```js

// If current date 'll be 2015-09-09 Thursday
Datium::now()->dayOf()->week();
// output => 5

// Day of week to Gregorian
Datium::now()->dayOf()->week();

// Day of week to Jalali
Datium::now()->to( 'jalali' )->dayOf()->week();

// Day of week to Hijri
Datium::now()->to( 'hijri' )->dayOf()->week();

```

## Generalization

### Calendar generalization
Datium supports calendar generalization, you can add customized calendars to Datium and used them as it's own default calendars.

```js
Datium::create( 2015, 11, 9 )->to( 'jalali' )->get()
//Convert Gregorian to Jalali calendar: 1394-08-19 00:00:00

Datium::create( 2015, 11, 9 )->to( 'hijri' )->get()
//Convert Gregorian to Hijri calendar: 1437-01-27 00:00:00

```

Convert all calendars which supported on Datium or event your customized calendars as simple as possible:

```js
Datium::create( 2015, 11, 9 )->from( 'jalali' )->to( 'gregorian' )->get();

Datium::create( 2015, 11, 9 )->from( 'jalali' )->to( 'hijri' )->get();
```

### Translation Generalization
Generalization in translation is another Datium generalization support.

```js
Datium::create( 2016, 6, 25, 12, 0, 0 )->to( 'jalali' )->lang( 'fa' )->get('l jS F Y h:i:s A');
// ex: شنبه ۵ تیر ۱۳۹۵ ۱۲:۰۰:۰۰ ب.ظ

Datium::create( 2016, 6, 25, 12, 0, 0 )->to( 'jalali' )->get('l jS F Y h:i:s A');
// ex: Shanbe 5th Tir 1395 12:00:00 PM


Datium::create(2016, 6, 25, 12, 0, 0)->to('hijri')->get('l jS F Y h:i:s A');
// ex: as-Sabt 19th Ramadan 1437 12:00:00 PM

Datium::create(2016, 6, 25, 12, 0, 0)->get('l jS F Y h:i:s A');
// ex: Saturday 25th June 2016 12:00:00 PM



```
