<?php

return array(

  'timezone' => 'Asia/Tehran',

                /**
                 *
                 * Here is some other area

                 'Asia/Kabul',

                 'Europe/london',

                */

  'events' =>     array( 'iran' => array( 'national' => array( 1 => array( 1 => 'nowruz',
                                                                           2 => 'nowruz',
                                                                           3 => 'nowruz',
                                                                           4 => 'nowruz',
                                                                           12 => 'Islamic Republic of Iran national day',
                                                                           13 => '13 bedar'
                                                                              ),

                                                               3 => array( 14 => 'Khomeini\'s death',
                                                                                  15 => 'killing 15 Khordad',
                                                                                  ),

                                                               11 => array( 22 => 'Victory of Islamic revoloution',
                                                                                  ),

                                                               12 => array( 29 => 'national day of oil industry',
                                                                                   ),
                                                               ),

                                        //'religious' => array( 1 => )

                                        ),



                  //'islamic' => array( =>  )

                                          ),

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


  'calendar' =>  array(

                   // iran
                      'ir',

                   // ghamari
                      'gh'

                      ),


  'default_calendar' => 'ir',


                     /**
                      *

                      afghanistan

                      'af',

                      gregorian

                      'gr',

                      */

  'weekend' =>        array( 'iran'  => array( 'friday' ),

                            'islamic' => array('friday', 'saturday')
                     ),



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
                                       ),

                    'islamic' => array( 1 => 'Muharram',
                                        2 => 'Safar',
                                        3 => 'Rabi I',
                                        4 => 'Rabi II',
                                        5 => 'Jumada I',
                                        6 => 'Jumada II',
                                        7 => 'Rajab',
                                        8 => 'Shaban',
                                        9 => 'Ramadan',
                                        10 => 'Shawwal',
                                        11 => 'Dhu al_Qadah',
                                        12 => 'Dhu al_Hijjah'
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
                                          'Friday'
                                      ),

                             'islamic' => array(

                                          1 => 'al-Ithnayn',
                                          2 => 'ath-Thulatha\'',
                                          3 =>  'al-Arbi\'a',
                                          4 =>  'al-Khamees',
                                          5 =>  'al-Jumu\'ah',
                                          6 =>  'as-Sabt',
                                          7 =>  'al-Aḥad',

                                          )

                      ),
  'shamsi_month_days' => array(      1 => 31,
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
