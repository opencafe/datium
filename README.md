# Datium

[![Build Status](https://travis-ci.org/opencafe/datium.svg?branch=master)](https://travis-ci.org/opencafe/datium)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/opencafe/datium/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/opencafe/datium/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/opencafe/datium/v/stable)](https://packagist.org/packages/opencafe/datium)
[![Total Downloads](https://poser.pugx.org/opencafe/datium/downloads)](https://packagist.org/packages/opencafe/datium)
[![Join the chat at https://gitter.im/opencafe/datium](https://badges.gitter.im/opencafe/datium.svg)](https://gitter.im/opencafe/datium?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![npm](https://img.shields.io/npm/l/express.svg?maxAge=2592000)]()

Awesome DateTime package ever written in PHP, with clean design pattern and generalization support in calendar and translation, which makes Datium powerful and simple.

* Simplicity in code and logic
* Expandable in every part
* Hijri, Jalali, Julian and Kurdish Calendars support

# Support
* ^PHP:5.4
* PHP:7

# Installation

## Via Composer

```js
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

Datium::now()->timestamp(); // ex: 1420057800

Datium::now()->get('timestamp'); // ex: 1420057800
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

Timestamp format:

```js
Datium::create(2016,10,16)->get('timestamp');
// Result : 1476563400
```

Easy usage:

```js
Datium::now()->all();

// Result
object(stdClass)#5 (6) {
  ["second"]=>
  string(2) "03"
  ["minute"]=>
  string(2) "10"
  ["hour"]=>
  string(2) "15"
  ["day"]=>
  string(2) "12"
  ["month"]=>
  string(2) "10"
  ["year"]=>
  string(4) "2016"
}

Datium::now()->all()->year;    // 2016
Datium::now()->all()->month;   // 10
Datium::now()->all()->day;     // 12
Datium::now()->all()->hour;    // 15
Datium::now()->all()->minute;  // 10
Datium::now()->all()->second;  // 03
```


## Create
You can also simply create new time:

```js
// Create with YMD
Datium::create( 2016, 1, 1, 12, 56, 13 )->get(); //ouput: 2016-01-01 12:56:13

// Create with YMD without time
Datium::create( 2016, 1, 1 )->get(); // output: 2016-01-01 12:56:13

// Create with timestamp
Datium::createTimestamp( 1420057800 )->get() // output => 2015-01-01 00:00:00
```

## Add Date
This method allow you add some year, month, week, day, hour, minute and second to current date.

```js
// If current date is 2016-01-01 00:00:00 then:

// Add 3 years
Datium::now()->add('3 year')->get();
// output => 2019-01-01 00:00:00

// Add 1 week
Datium::create(2016, 1, 1)->add('1 week')->get();
// output => 2016-01-08 00:00:00

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

// Sub 1 week
Datium::create(2016, 1, 8)->sub('1 week')->get();
// output => 2016-01-01 00:00:00

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

## Date Difference
This method will return the difference between two specific date with php date interval type.

```js
// current generated date difference with next 5000 days
$diff = Datium::diff(
    Datium::now()->object(),
    Datium::now()->add('5000 day')->object()
);

echo $diff->days;
// output => 5000
echo $diff->year . ' year, ' .  $diff->month . ' month, ' . $diff->day . ' day ';
// ouput => 13 year, 8 month, 7 day

```

### Human readable time difference
Datium also supports human readable date and time difference.

```js
// current generated date difference with next 5000 days
$diff = Datium::diff(
    Datium::now()->object(),
    Datium::now()->add('5000 day')->object()
)->simple->get();

// result => 13 years ago

// current generated date difference with next 5000 days
$diff = Datium::diff(
    Datium::now()->object(),
    Datium::now()->sub('5000 day')->object()
)->simple->get();

// result => 13 years remaining

// current generated date difference with next 5000 days
$diff = Datium::diff(
    Datium::now()->object(),
    Datium::now()->add('5000 day')->object()
)->simple->lang('fa')->get();

// result => ۱۳ سال پیش

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

// Day of year to kurdish
Datium::now()->to( 'kurdish' )->dayOf()->year();

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

// Day of week to Kurdish
Datium::now()->to( 'kurdish' )->dayOf()->week();

```

## Last Day of Month
How many days is current month
```js

// Last Day of Current Month to Gregorian
Datium::now()->dayOf()->lastDayMonth();

// Last Day of Current Month to Jalali
Datium::now()->to( 'jalali' )->dayOf()->lastDayMonth();

// Last Day of Current Month to Hijri
Datium::now()->to( 'hijri' )->dayOf()->lastDayMonth();

// Last Day of Current Month to Kurdish
Datium::now()->to( 'kurdish' )->dayOf()->lastDayMonth();

```

## Generalization

### Calendar generalization
Datium supports calendar generalization, you can add customized calendars to Datium and used them as it's own default calendars.

```js
Datium::create( 2015, 11, 9 )->to( 'jalali' )->get()
//Convert Gregorian to Jalali calendar: 1394-08-18 00:00:00

Datium::create( 2015, 11, 9 )->to( 'hijri' )->get()
//Convert Gregorian to Hijri calendar: 1437-01-26 00:00:00

Datium::create( 2015, 11, 9 )->to( 'kurdish' )->get()
//Convert Gregorian to Kurdish calendar: 2715-08-18 00:00:00

```

Convert all calendars which supported on Datium or event your customized calendars as simple as possible:

```js
Datium::create( 1395, 7, 25 )->from( 'jalali' )->get(); // Gregorian is default value for destination calendar.
// result: 2016-10-16 00:00:00

Datium::create( 1395, 7, 25 )->from( 'jalali' )->to( 'hijri' )->get();
// result: 1438-01-14 00:00:00
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

Datium::create(2016, 6, 25, 12, 0, 0)->to('kurdish')->get('l jS F Y h:i:s A');
// ex: Şeme 5th Puşper 2716 12:00:00 PM

Datium::create(2016, 6, 25, 12, 0, 0)->get('l jS F Y h:i:s A');
// ex: Saturday 25th June 2016 12:00:00 PM
```

### Change Configuration

You can change any configuration after initialize Datium object.

```js
$datium = Datium::create(
                $date->format('Y'),
                $date->format('m'),
                $date->format('d'),
                $date->format('h'),
                $date->format('i'),
                $date->format('s')
            );
$datium->setConfig(['timezone'=>'Europe/Istanbul']);
```

#### Default configuration

```
[
  'timezone' => 'Asia/Tehran',
  'language' =>     'en',
  'default_calendar' => 'gregorian',
  'date_interval' => [ 'D', 'M', 'Y', 'HT', 'MT', 'ST' ],
  'date_simple' => [ 'day', ' month', ' year', ' hour', ' minute', ' second' ],
]
```
