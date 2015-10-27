<?php

use Datium\Datium as Datium;

return array (

  'convert_to' => function( $date_time ) {

    return Datium::create( $date_time )->sub( '226898 day' )->object();

  },

  'convert_from' => function( $date_time ) {

    return Datium::create( $date_time )->add( '226898 day' )->object();

  },

  'shorthand' => 'sh',

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


  'days_of_week' => array (

          ),

  'leap_year_formula' => '',

  'weekend' => array( 'friday' )

 );
 ?>
