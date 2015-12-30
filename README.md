# Datium
[![Build Status](https://travis-ci.org/opencafe/datium.svg?branch=master)](https://travis-ci.org/opencafe/datium)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/opencafe/datium/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/opencafe/datium/?branch=master)

Hey!! we are still working on this project, this is not finalizing version of datium...


..................................................................................................................................


Under Development


..................................................................................................................................


# Simple get date
Return the Date and Time

As datium output

```js
Datium::now()->get(); // output => 1390-00-00 00:00:00
```

As php DateTime class object

```js
Datium::now()->object();
```

## Add Date
This method allow you add some year, month, day, hour, minute and second to current date.

```js
// If current date is 1390-01-01 00:00:00 then:

// Add 3 years
Datium::now()->add('3 year')->get();
// output => 1393-01-01 00:00:00

// Add one month
Datium::now()->add('1 month')->get()
// output => 1390-02-01 00:00:00

// Add 1 year, 3 month and 2 days
Datium::now()->add('1 year')
             ->add('3 month')
             ->add('2 day')
             ->get();
// output => 1391-04-03 00:00:00

```

## Sub Date
Sub some year, month, day, hour, minute and second from current date.

```js
// If current date is 1390-01-01 00:00:00 then:


// Sub 3 years
Datium::now()->sub('3 year')->get();
// output => 1387-01-01 00:00:00

// Sub one month
Datium::now()->sub('1 month')->get()
// output => 1389-12-01 00:00:00

// Sub 1 year, 3 month and 2 days
Datium::now()->sub('1 year')
             ->sub('3 month')
             ->sub('2 day')
             ->get();
// output => 1388-09-29 00:00:00
```

## Leap year
Define leap year


```js
// If current date is 1394

// Is 1394 a leap year?
Datium::now()->leap()->get();
// output => FALSE

// Is 1395 a leap year?
Datium::now()->add('1 year')->leap()->get();
// output => TRUE
```

## Get day of date


## Day of Year
What the day is current date in current year

```js
// If current date 'll be 2015-09-03

Datium::now()->dayOf()->year();
// output => 246

// Day of year to Gregorian
Datium::now()->dayOf()->year();

// Day of year to Shamsi
Datium::now()->to( 'shamsi' )->dayOf()->year();

// Day of year to Ghamari
Datium::now()->to( 'ghamari' )->dayOf()->year();

```

## Day of Week
What day of week is current day.

```js

// If current date 'll be 2015-09-09 Thursday
Datium::now()->dayOf()->week();
// output => 5

// Day of week to Gregorian
Datium::now()->dayOf()->week();

// Day of week to Shamsi
Datium::now()->to( 'shamsi' )->dayOf()->week();

// Day of week to Ghamari
Datium::now()->to( 'ghamari' )->dayOf()->week();

```

## Generalization
Datium supports language generalization, you can add customized calendars to Datium and used them as it's own default calendars.

```js
Datium::create( 2015, 11, 9 )->to( 'shamsi' )->get()
//Convert Gregorian to Jalali calendar: 1394-08-19 00:00:00

Datium::create( 2015, 11, 9 )->to( 'ghamari' )->get()
//Convert Gregorian to Hijri calendar: 1437-01-27 00:00:00

```


## Events
There are multiple types of events on Datium, International events, events by region divisions, religious events or customized events declared by user.

### International event
Returned international events, data provided by united nations.

```

```


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/opencafe/datium/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

