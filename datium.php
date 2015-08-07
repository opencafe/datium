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

  protected $date_interval = array( 'D', 'M', 'Y', 'H', 'm', 'S' );

  protected $date_simple = array ( ' day', ' month', ' year', ' hour', ' minute', ' second' );

  public function __construct() {

    $this->config = include('config.php');

    date_default_timezone_set( $this->config['timezone'] );

    $this->date_time = new DateTime('now');

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

    $value = str_replace( $this->date_simple, $this->date_interval, $value );

    $this->date_time->add( new DateInterval('P' . $value ) );

    return $this;

  }

  public function sub( $value ) {

  }

  /**
   * Get output
   * @since Aug 17 2015
   */
  public function get() {

    return $this->date_time;

  }

}
?>
