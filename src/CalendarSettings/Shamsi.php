<?php

use Datium\Datium as Datium;

return array (

/************************************************************
 *                        Convert to
 ************************************************************
 *
 * Convert algorith to convert Gregorian to Jalali calerndar
 *
 *\_________________________________________________________/
 */
  'convert_to' => function( $date_time ) {

    return Datium::create( $date_time )->sub( '226898 day' )->object();

  },

  /************************************************************
   *                        Convert From
   ************************************************************
   *
   * Convert algorith to convert Jalali to Gregorian calerndar
   *
   *\_________________________________________________________/
   */
  'convert_from' => function( $date_time ) {

    return Datium::create( $date_time )->add( '226898 day' )->object();

  },

  /************************************************************
   *               Shorthand for jalali calendar
   ************************************************************
   *
   * Jalali calendar shorthand
   *
   *\_________________________________________________________/
   */
  'shorthand' => 'sh',

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
    'Shanbe'
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


  'day_of_year' => function( $date_time ) {

    $result = null;

    $config = include( 'Shamsi.php' );

    $month = $date_time->format('n');

    $day = $date_time->format('d');

    foreach( $config['month_days_number'] as $_month => $value ) {

      if ( $_month < $month ) $result += $value;

    }

    $result += $day;

    return $result + 1;

  },

  'day_of_week' => function( $date_time ) {

        $configShamsi = include(  'Shamsi.php' );

        $configGregorian = include( 'Gregorian.php' );

        $day = $date_time->format('l');

        $day = str_replace( $configGregorian['days_of_week'], $configShamsi['days_of_week'], $day );

        foreach ( $configShamsi['days_of_week'] as $key => $value ) {

          if( $value == $day ) {

            if( $key <= 5 ) {

              return $key += 1;

            }

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
  'leap_year' => '',

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
