<?php

/**
 *
 * @since Aug 17, 2015
 *
 *\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/
 */
class Datium {

  /**
   * Store DateTime object
   */
  protected $date_time;

  /**
   * Store config file statements
   * @param array
   */
  protected $config;

  /**
   * return store day number
   * @param integer
   */
  protected $day_of;

  protected $leap;

  protected $geregorian_DayofWeek;

  protected $convert_calendar;

  public function __construct() {

    $this->config = include('Config.php');

    date_default_timezone_set( $this->config['timezone'] );

    $this->date_time = new DateTime('now');

    $this->geregorian_DayofWeek = $this->date_time->format('N');

    $this->convert_calendar = new Convert();

  }

  /**
   * Get current datetime
   * @since Aug 17 2015
   */
  public static function now() {

    return new Datium();

  }


  public function diff() {


  }

  public function add( $value ) {

    $value = str_replace( $this->config['date_simple'], $this->config['date_interval'], $value );

    $this->date_time->add( new DateInterval('P' . $value ) );

    return $this;

  }

  /**
   *
   */
  public function sub( $value ) {

    $value = str_replace( $this->config['date_simple'], $this->config['date_interval'], $value );

    $this->date_time->sub( new DateInterval('P' . $value ) );

    return $this;

  }

  /**
   * Check if current year is leap or not
   * @return boolean
   */
  public function leap() {

    $this->leap = new Leap( $this->date_time->format('Y') );

    return $this->leap;

  }

  /**
   * @since Aug, 22 2015
   */
  public function dayOf() {

    $this->day_of = new DayOf( $this->date_time );

    return $this->day_of;

  }

  /**
   * @since Aug, 22 2015
   */
  public function format( $calendar, $format ) {

    $this->date_time = $this->date_time->format( $format );

    if( in_array( $calendar, $this->config['calendar'] ) ) {

    switch( $calendar ){

      case 'ir':

          $this->date_time = str_replace( $this->config['month']['english'], $this->config['month']['persian'], $this->date_time );

          $this->date_time = str_replace( $this->config['week_days_name']['english'], $this->config['week_days_name']['persian'], $this->date_time );

          break;

      case 'af':

          break;

      case 'gh':

          $this->date_time = str_replace( $this->config['month']['english'], $this->config['month']['islamic'], $this->date_time );

          $this->date_time = str_replace( $this->config['week_days_name']['english'], $this->config['week_days_name']['islamic'][$this->geregorian_DayofWeek], $this->date_time );


          break;

      case 'gr':

          break;

    }

  }

    return $this->date_time;

  }

  /**
   * Get output
   * @since Aug 17 2015
   */
  public function get( $calendar = 'ir', $format = 'Y-m-d H:i:s' ) {

    if( in_array( $calendar, $this->config['calendar'] ) ){

    switch( $calendar ){

      // returns iran calendar
      case 'ir':

            $this->date_time = $this->convert_calendar->toShamsi( $this->date_time );

            break;

      // returns afghanistan calendar
      case 'af':

            break;

      // returns islamic calendar
      case 'gh':

            $this->date_time = $this->convert_calendar->toGhamari( $this->date_time );

            $this->islamic_dayofweek = $this->date_time->format('N');

            break;

      // returns geregorian calendar
      case 'gr':

            break;

      // returns all date object type
      case 'all':

            return $this->date_time;

            break;

      // returns default configuration, by default iran calendar.
      case 'default':

            return $this->get( $this->config['calendar'] );

            break;

    }
  }

    return  $this->format( $calendar, $format );

  }

}
?>
