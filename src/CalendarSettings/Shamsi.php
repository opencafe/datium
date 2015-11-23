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

    'Shanbe',

    'Yek-Shanbe',

    'Do-Shanbe',

    'Se-Shanbe',

    'Chahar-Shanbe',

    'Panj-Shanbe',

    'Jome'

  ),

  /************************************************************
   *                       Leap year
   ************************************************************
   *
   * Leap Year formula on jalali calendar
   *
   *\_________________________________________________________/
   */
  'leap_year_formula' => '',

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
