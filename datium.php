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
   */
  protected $config;

  protected $leap;

  protected $convert_calendar;

  public function __construct() {

    $this->config = include('Config.php');

    date_default_timezone_set( $this->config['timezone'] );

    $this->date_time = new DateTime('now');

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

    return new Leap();

  }

  /**
   * Get output
   * @since Aug 17 2015
   */
  public function get( $type ) {

    switch( $type ){

      // returns iran calendar
      case 'ir':

            $this->date_time = $this->convert_calendar->toShamsi( $this->date_time );

            break;

      // returns afghanistan calendar
      case 'af':

            break;

      // returns jalali calendar
      case 'ja':

            break;

      // returns geregorian calendar
      case 'gr':

            break;

      // returns all date object type
      case 'all':

            break;

      // returns default configuration, by default iran calendar.
      case 'default':

            return $this->get( $this->config['calendar'] );

            break;

    }

    return $this->date_time;


  }

}
?>
