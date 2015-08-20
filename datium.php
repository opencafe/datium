<?php

include_once('leap.php');

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

  protected $_y;

  protected $_m;

  protected $_d;


  /**
   * Store config file statements
   */
  protected $config;

  protected $leap;

  protected $date_interval = array( 'D', 'M', 'Y', 'H', 'm', 'S' );

  protected $date_simple = array ( 'day', ' month', ' year', ' hour', ' minute', ' second' );

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

  public function per_date() {

  $_y = $this->date_time->format( 'Y' );

  $_m = $this->date_time->format( 'm' );

  $_d = $this->date_time->format( 'd' );

  $_day = 0;

  $p_month = array(   1 =>  'Farvardin',
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
                      12 => 'Esfand' );


  $g_month = array(   1 => 31,
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
                      12 => 30 );

   for ( $i = 1 ; $i < $_m ; $i++ ) {

   $_day += $g_month[$i];

   }

   $_day += $_d;

   $this->leap = new leap();

   if( $this->leap->isLeapYear( $_y ) && $_m > 2 ) $_day++;

   if ( $_day <= 79 ) {

    if( ( $_y - 1 ) % 4 == 0 ) $_day = $_day + 11;

    else
      $_day = $_day + 10;

    $_y = $_y - 622;

    if($_day % 30 == 0) {

      $_m = ( $_day / 30 ) + 9;

      $_d = 30;

    }
    else {

      $_m = ( $_day / 30 ) + 10;

      $_d = $_day % 30;

    }

   }

   else {

    $_y = $_y - 621;

    $_day = $_day - 79;

    if( $_day <= 186 ) {

      if( $_day % 31 == 0 ) {

        $_m = ( $_day / 31 );

        $_d = 31;
      }

    else {

      $_m = ( $_day / 31 ) + 1;

      $_d = ( $_day % 31 );
    }

    }

    else {

      $_day = $_day - 186;

      if( $_day % 30 == 0 ) {

      $_m = ( $_day / 30 ) + 6;

      $_d = $_day % 30;

      }

      else {

      $_m = ( $_day / 30 ) + 7;

      $_d = $_day % 30;

      }

    }

   }

   foreach ( $p_month as $key => $value ) {

     if ( $key == intval( $_m ) ) $_m = $value;

   }


   $this->date_time = $_m . ',' . $_d . ' ' . $_y . ' ' . $this->date_time->format( 'H:i:s' );

   return $this;

  }

  public function diff() {


  }

  public function add( $value ) {

    $value = str_replace( $this->date_simple, $this->date_interval, $value );

    $this->date_time->add( new DateInterval('P' . $value ) );

    return $this;

  }

  public function sub( $value ) {

    $value = str_replace( $this->date_simple, $this->date_interval, $value );

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
  public function get() {

    return $this->date_time;


  }

}
?>
