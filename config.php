<?php

return array(

  'timezone' => 'Asia/Tehran',

                /**
                 *
                 * Here is some other area

                 'Asia/Kabul',

                 'Europe/london',

                */

  'evets' =>     array( 'iran' => array( 1 => 'nowruz',
                                         2 => 'nowruz',
                                         3 => 'nowruz',
                                         4 => 'nowruz',
                                         12 => 'Islamic Republic of Iran national day',
                                         13 => '13 bedar') ),

                  /**
                   * Array is between 1 and 365 day of year

                   'afghanistan',

                   'tajikestan',

                   'general',

                   */

                    // Persian in Iran (farsi)

  'language' =>     'fa',

                    /**
                     *

                    Persian in Afghanistan (dari)

                    'af',

                    English

                    'en',

                    */

                   // iran
  'calendar' =>      'ir',

                     /**
                      *

                      afghanistan

                      'af',

                      jalali

                      'ja',

                      gregorian

                      'gr',

                      */

  'weekend' =>        array( 'iran'  => array( 'friday' ) ),

                       /**
                        *

                        'General'  => array( 'saturday', 'sunday' ),

                        'Manualy' => array(),

                        */

  'month' => array( 'persian' => array(  'Farvardin',
                                         'Ordibehesht',
                                         'Khordad',
                                         'Tir',
                                         'Mordad' ,
                                         'Shahrivar',
                                         'Mehr',
                                         'Aban',
                                         'Azar',
                                         'Dey',
                                         'Bahman',
                                         'Esfand' ),

                    'english' => array( 'January',
                                        'February',
                                        'March',
                                        'April',
                                        'May',
                                        'June',
                                        'July',
                                        'August',
                                        'September',
                                        'October',
                                        'November',
                                        'December'
                                       ) ),

  'week_days_name' => array( 'persian' => array(
                                          'Shanbe',
                                          'Yekshanbe',
                                          'Doshanbe',
                                          'Seshanbe',
                                          'Chaharshanbe',
                                          'Panjshanbe',
                                          'Jome'
                                          ),

                        'english' => array(
                                          'Saturday',
                                          'Sunday',
                                          'Monday',
                                          'Tuesday',
                                          'Wednesday',
                                          'Thursday',
                                          'Friday',
                        ),
                      ),

  'gregorian_month_days' => array(   1 => 31,
                                     2 => 28,
                                     3 => 31,
                                     4 => 30,
                                     5 => 31,
                                     6 => 30,
                                     7 => 31,
                                     8 => 31,
                                     9 => 30,
                                     10 => 31,
                                     11 => 30,
                                     12 => 30 ),

    'date_interval' => array( 'D', 'M', 'Y', 'H', 'm', 'S' ),


    'date_simple' => array( 'day', ' month', ' year', ' hour', ' minute', ' second' ),

 );

?>
