<?php

return array(

  'timezone' => 'Asia/Tehran',


  'language' =>     'fa',


  'calendar' =>  array(

                   // iran
                      'ir',

                   // ghamari
                      'gh',

                   //gereogian
                      'gr'

                      ),


  'default_calendar' => 'ir',


  'weekend' =>        array( 'iran'  => array( 'friday' ),

                            'islamic' => array('friday', 'saturday')
                     ),


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
