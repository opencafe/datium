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

  /**
   * Get output
   * @since Aug 17 2015
   */
  public function get() {

    return $this->date_time;

  }

}
?>
