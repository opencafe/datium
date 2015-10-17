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

                                        'religious' => array( 1 => array( 9 => 'day of tasoa',
                                                                          10 => 'day of ashura'
                                                                           ),

                                                              2 => array( 20 => 'day of arbaeen',
                                                                          28 => 'prophet of islam death',
                                                                          30 => 'killing imam reza'
                                                                           ),

                                                              3 => array( 17 => 'day of born prophet islam'
                                                                            ),

                                                              6 => array( 3 => 'prophet of islam dauther\'s fatemeh death'
                                                                            ),

                                                              7 => array( 13 => 'day of born imam ali',
                                                                          27 => 'selection day of prophet islam' 
                                                                          ),

                                                              8 => array( 15 => 'day of born imam mehdi' 
                                                                            ),

                                                              9 => array( 21 => 'killing imam ali'
                                                                           ),

                                                              10 => array( 1 => 'eid fetr',
                                                                           2 => 'eid fetr'
                                                                           ),

                                                              12 => array( 10 => 'eid ghorban',
                                                                           18 => 'eid ghadir'
                                                                           )
                                                             ),


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
                      'gh',

                   //gereogian
                      'gr'   

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
                                          'Yekshanbe',
                                          'Doshanbe',
                                          'Seshanbe',
                                          'Chaharshanbe',
                                          'Panjshanbe',
                                          'Jome',
                                          'Shanbe'

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

                                               'al-Aḥad',
                                               'al-Ithnayn',
                                               'ath-Thulatha\'',
                                               'al-Arbi\'a',
                                               'al-Khamees',
                                               'al-Jumu\'ah',
                                               'as-Sabt',  

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

  'islamic_month_days' => array(     1 => 30,
                                     2 => 29,
                                     3 => 30,
                                     4 => 30,
                                     5 => 29,
                                     6 => 29,
                                     7 => 30,
                                     8 => 29,
                                     9 => 30,
                                     10 => 29,
                                     11 => 30,
                                     12 => 30 ),


    'date_interval' => array( 'D', 'M', 'Y', 'H', 'm', 'S' ),


    'date_simple' => array( 'day', ' month', ' year', ' hour', ' minute', ' second' ),

 );

?>
