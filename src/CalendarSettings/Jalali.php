<?php

use OpenCafe\Datium as Datium;
use OpenCafe\Tools\Leap as Leap;

return array (

  'timezone' => 'Asia/Tehran',

  'language' =>  'fa',

  'events' => array(),

  'numbers' => array( '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'),

  'am_time' => 'AM',

  'pm_time' => 'PM',

  'end_of_days' => array( 'th', 'st', 'nd', 'rd' ),



/************************************************************
 *                        Convert to
 ************************************************************
 *
 * Convert algorith to convert Gregorian to Jalali calerndar
 *
 *\_________________________________________________________/
 */
  'convert_to' => function ($date_time) {

        $config = include 'Gregorian.php';

        $year = $date_time->format('Y');

        $month = $date_time->format('m');

        $day = $date_time->format('d');

        $temp_day = 0;

    for ($i = 1; $i < $month; $i++) {
        $temp_day += $config[ 'month_days_number' ][ $i ];
    }

         $temp_day += $day;

         $leap = new Leap($year);

    if ($leap->get() && $month > 2) {
        $temp_day++;
    }

    if ($temp_day <= 79) {
        if (( $year - 1 ) % 4 == 0) {
            $temp_day = $temp_day + 11;
        } else {
            $temp_day = $temp_day + 10;
        }

        $year = $year - 622;

        if ($temp_day % 30 == 0) {
            $month = ( $temp_day / 30 ) + 9;

            $day = 30;
        } else {
            $month = ( $temp_day / 30 ) + 10;

            $day = $temp_day % 30;
        }
    } else {
        $year = $year - 621;

        $temp_day = $temp_day - 79;

        if ($temp_day <= 186) {
            if ($temp_day % 31 == 0) {
                $month = ( $temp_day / 31 );

                $day = 31;
            } else {
                $month = ( $temp_day / 31 ) + 1;

                $day = ( $temp_day % 31 );
            }
        } else {
            $temp_day = $temp_day - 186;

            if ($temp_day % 30 == 0) {
                $month = ( $temp_day / 30 ) + 6;

                $day = 30;
            } else {
                $month = ( $temp_day / 30 ) + 7;

                $day = $temp_day % 30;
            }
        }
    }

         $date_time->setDate($year, $month, $day);

         return $date_time;

  },

  /************************************************************
   *                        Convert From
   ************************************************************
   *
   * Convert algorith to convert Jalali to Gregorian calerndar
   *
   *\_________________________________________________________/
   */
  'convert_from' => function ($date_time) {

    $config = include 'Jalali.php';

    $year = $date_time->format('Y');

    $month = $date_time->format('m');

    $day = $date_time->format('d');

    $days_of_year = 0;

    foreach ($config[ 'month_days_number' ] as $mon => $value) {
        if ($month > $mon) {
            $days_of_year += $value;
        }
    }

    $days_of_year += $day;

    $days_of_leap_years =  intval(( ( $year - 1 ) / 4 ));

    $days_of_shamsi_years = ( ( ( $year - 1 ) * 365 ) + $days_of_year + $days_of_leap_years );

    $days_of_gregorain_years = $days_of_shamsi_years + 226899;

    if ($month < 10) {
        $days_of_gregorain_years = $days_of_gregorain_years - intval(( ( $year + 621 ) / 4 ));
    } elseif (( ( 10 == $month ) && ( $day > 10 ) ) || ( $month > 10 )) {
        $days_of_gregorain_years = $days_of_gregorain_years - intval(( ( $year + 622 ) / 4 ));
    }

    $gregorian_month = ( $days_of_gregorain_years % 365 );

    $gregorian_year = intval($days_of_gregorain_years / 365) + 1;

    $config = include 'Gregorian.php';

    foreach ($config[ 'month_days_number' ] as $month => $value) {
        if ($gregorian_month < $value) {
            break;
        }

        $gregorian_month -= $value;
    }

      $gregorian_day = $gregorian_month;

      $gregorian_month = $month;

      if ( ( ( $gregorian_year % 4 ) == 0 ) && ( ( ( $gregorian_year % 100 ) != 0 ) || ( ( $gregorian_year % 400 ) == 0 ) ) ) {

        if ( $gregorian_month < 3 || ( $gregorian_month == 3 && $gregorian_day < 22 ) ) {

          $gregorian_day++;

        }

      }

      $date_time->setDate($gregorian_year, $gregorian_month, $gregorian_day);


     return $date_time;

  },

  /************************************************************
   *               Shorthand for jalali calendar
   ************************************************************
   *
   * Jalali calendar shorthand
   *
   *\_________________________________________________________/
   */
  'shorthand' => 'ja',

  /************************************************************
   *                        Month's name
   ************************************************************
   *
   * Jalali month name
   *
   *\_________________________________________________________/
   */
  'month' => array (

    'Farvardin',

    'Ordibehesht',

    'Khordad',

    'Tir',

    'Mordad',

    'Shahrivar',

    'Mehr',

    'Aban',

    'Azar',

    'Dey',

    'Bahman',

    'Esfand'

    ),

  /************************************************************
   *                        Days of Week
   ************************************************************
   *
   * Here is week days on jalali calendar, offset 0 is first
   * day of week and offset 6 is the last one.
   *
   *\_________________________________________________________/
   */


  'days_of_week' => array (

     'Yekshanbe',
     'Doshanbe',
     'Seshanbe',
     'Chaharshanbe',
     'Panjshanbe',
     'Jome',
     'Shanbe',

  ),

  'start_day_of_week' => 'Shanbe',

  'month_days_number' => array(      1 => 31,
                                     2 => 31,
                                     3 => 31,
                                     4 => 31,
                                     5 => 31,
                                     6 => 31,
                                     7 => 30,
                                     8 => 30,
                                     9 => 30,
                                     10 => 30,
                                     11 => 30,
                                     12 => 29 ),

  /************************************************************
  *                      Day of year
  ************************************************************
  *
  *  Return days of year on ghamari cleander
  *
  *\_________________________________________________________/
  */
  'day_of_year' => function ($date_time) {

    $result = null;

    $config = include 'Jalali.php';

    $month = $date_time->format('n');

    $day = $date_time->format('d');

    foreach ($config[ 'month_days_number' ] as $_month => $value) {
        if ($_month < $month) {
            $result += $value;
        }
    }

    $result += $day;

    return $result;

  },

  /************************************************************
   *                       Day of Week
   ************************************************************
   *
   *  Return day of week on shamsi cleander
   *  example : Yekshanbe = result is 2
   *\_________________________________________________________/
  */
  'day_of_week' => function ($date_time) {

        $days = array(
          1 => 'Shanbe',
          2 => 'Yekshanbe',
          3 => 'Doshanbe',
          4 => 'Seshanbe',
          5 => 'Chaharshanbe',
          6 => 'Panjshanbe',
          7 => 'Jome' );

        $configShamsi = include 'Jalali.php';

        $configGregorian = include 'Gregorian.php';

        $day = $date_time->format('l');

        $day = str_replace(
            $configGregorian[ 'days_of_week' ],
            $configShamsi[ 'days_of_week' ],
            $day
        );

        foreach ($days as $key => $value) {
            if ($day == $value) {
                return $key;
            }
        }

  },

  /************************************************************
   *                       Leap year
   ************************************************************
   *
   * Leap Year formula on jalali calendar
   *
   *\_________________________________________________________/
   */
  'leap_year' => function ($year) {

     $a = 0.025;

     $b = 266;

    if ($year > 0) {
        $leapDays0 = (($year + 38) % 2820)*0.24219 + $a;
        // 0.24219 ~ extra days of one year
        $leapDays1 = (($year + 39) % 2820)*0.24219 + $a;
        // 38 days is the difference of epoch to 2820-year cycle
    } elseif ($year < 0) {
        $leapDays0 = (($year + 39) % 2820)*0.24219 + $a;
        $leapDays1 = (($year + 40) % 2820)*0.24219 + $a;
    } else {
        return false;
    }

     $frac0 = intval(($leapDays0 - intval($leapDays0))*1000);
     $frac1 = intval(($leapDays1 - intval($leapDays1))*1000);

    if ($frac0 <= $b && $frac1 > $b) {
        return true;
    } else {
        return false;
    }

  },

  /************************************************************
   *                        Weekend
   ************************************************************
   *
   * Jalali weekend
   *
   *\_________________________________________________________/
   */
  'weekend' => array( 'friday' )

 );
