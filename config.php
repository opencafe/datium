<?php

return array(

  'timezone' => 'Asia/Tehran',

                /**
                 *
                 * Here is some other area

                 'Asia/Kabul',

                 'Europe/london',

                */

  'evets' =>     array( 'Iran' => array( 1 => 'nowruz',
                                         2 => 'nowruz',
                                         3 => 'nowruz',
                                         4 => 'nowruz',
                                         12 => 'Islamic Republic of Iran national day',
                                         13 => '13 bedar') ),

                  /**
                   * Array is between 1 and 365 day of year

                   'Afghanistan',

                   'Tajikestan',

                   'General',

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

  'weekend' =>        array( 'Iran'  => array( 'friday' ) ),

                       /**
                        *

                        'General'  => array( 'saturday', 'sunday' ),

                        'Manualy' => array(),

                        */

  'day' =>   array( 'persian' => array( 'Shanbe', 'Yekshanbe', 'Doshanbe', 'Seshanbe', 'Chaharshanbe', 'Panjshanbe', 'Jome' ),

                    'english' => array( 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wensday', 'Friday' )  ),


  'month' => array( 'persian' => array(   1 =>  'Farvardin',
                                          2 =>  'Ordibehesht',
                                          3 =>  'Khordad',
                                          4 =>  'Tir',
                                          5 =>  'Mordad' ,
                                          6 =>  'Shahrivar',
                                          7 =>  'Mehr',
                                          8 =>  'Aban',
                                          9 =>  'Azar',
                                          10 => 'Dey',
                                          11 => 'Bahman',
                                          12 => 'Esfand' ),

                    'English' => array('') ),

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
