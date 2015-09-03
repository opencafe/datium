# Datium


Hey!! we are still working on this project, this is not finalizing version of datium...


..................................................................................................................................


Under Development


..................................................................................................................................


# Simple get date
Get current date time:

```js
Datium::now()->get(); // output => 1390-00-00 00:00:00
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

## Get day of year
What the day is current date in current year

```js
// If current date is 2015-09-03

Datium::now()->dayOf()->year();
// 246

```
