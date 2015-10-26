<?php namespace Datium;

use DateTime;
use DateInterval;
use Datium\Tools\Convert;
use Datium\Tools\Leap;
use Datium\Tools\DayOf;

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

  protected $date_interval_expression;

  protected static $date_start;

  protected static $date_end;

  /**
   * return store day number
   * @param integer
   */
  protected $day_of;

  protected $leap;

  protected $events;

  protected $geregorian_DayofWeek;

  protected $convert_calendar;

  protected $calendar_type;

  protected static $array_date;

  protected static $call_type;

  public function __construct() {

    $this->config = include('Config.php');

    $this->calendar_type = $this->config[ 'default_calendar' ];

    date_default_timezone_set( $this->config['timezone'] );

    switch( Datium::$call_type ) {

      case 'now':

        $this->date_time = new DateTime( 'now' );

        $this->geregorian_DayofWeek = $this->date_time->format('w');

        break;

      case 'make':

        $this->date_time = new DateTime( 'now' );

        $this->date_time->setDate( self::$array_date['year'], self::$array_date['month'], self::$array_date['day'] );

        $this->date_time->setTime( self::$array_date['hour'], self::$array_date['minute'], self::$array_date['second'] );

        $this->geregorian_DayofWeek = $this->date_time->format('w');

        break;

    }

    $this->convert_calendar = new Convert();

  }

  /**
   * Get current datetime
   * @since Aug 17 2015
   * @return object
   */
  public static function now() {

    self::$call_type = 'now';

    return new Datium();

  }

  /**
   * Create new date time
   * @param $year integer
   * @param $month integer
   * @param $day integer
   * @param $hour integer
   * @param $minute integer
   * @param $second integer
   * @return object
   */
  public static function create( $year = 2000, $month = 1, $day = 1, $hour = 0, $minute = 0, $second = 0 ) {

      self::$array_date = array( 'year' => $year, 'month' => $month, 'day' => $day, 'hour' => $hour, 'minute' => $minute, 'second' => $second );

      self::$call_type = 'make';

      return new Datium();

  }

  public static function between( $date_start, $date_end ) {

    self::$date_start = $date_start;

    self::$date_end = $date_end;

    self::$call_type = 'between';

    return new Datium();

  }

  public static function createShamsi() {

  }

  public static function createGhamari() {


  }

  public static function createGregorian() {

    self::$array_date = array( 'year' => $year, 'month' => $month, 'day' => $day, 'hour' => $hour, 'minute' => $minute, 'second' => $second );

    return new Datium( 'make' );

  }

  public static function createTimestamp() {


  }


  /**
   * Difference between two time
   * @param $start datetime
   * @param $end datetime
   */
  public static function diff( $start, $end ) {

    return date_diff( $start, $end );

  }

  /**
   * Add new date value to current date
   * @param $value string
   * @return object
   */
  public function add( $value ) {

    $this->date_interval_expression = str_replace( $this->config['date_simple'], $this->config['date_interval'], $value );

    $this->date_interval_expression = str_replace( ' ', '', 'P' . $this->date_interval_expression );

    $this->date_time->add( new DateInterval( $this->date_interval_expression ) );

    return $this;

  }

  /**
   * Sub date from current date
   * @param $value
   * @param return obejct
   */
  public function sub( $value ) {

    $this->date_interval_expression = str_replace( $this->config['date_simple'], $this->config['date_interval'], $value );

    $this->date_interval_expression = str_replace( ' ', '', 'P' . $this->date_interval_expression );

    $this->date_time->sub( new DateInterval( $this->date_interval_expression ) );

    return $this;

  }

  /**
   * Check if current year is leap or not
   * @return boolean
   */
  public function leap( $type = 'gr') {

    $this->leap = new Leap( $this->date_time->format( 'Y' ), $type );

    return $this->leap;

  }

  /**
   * @since Aug, 22 2015
   */
  public function dayOf() {

    $this->day_of = new DayOf( $this->date_time, $this->calendar_type );

    return $this->day_of;

  }

  /**
   * @since Sept, 7 2015
   */
  public function events() {

    if ( Datium::$call_type == 'between' ) {

      $this->events = new Events( Datium::$date_start, Datium::$date_end );

    } else {

      $this->events = new Events( $this->date_time );

    }

    return $this->events;


  }

  /**
   * @since Aug, 22 2015
   */
  protected function format( $calendar, $format ) {

    $this->date_time = $this->date_time->format( $format );

    if( in_array( $calendar, $this->config['calendar'] ) ) {

    switch( $calendar ){

      case 'ir':

          $this->date_time = str_replace( $this->config['month']['english'], $this->config['month']['persian'], $this->date_time );

          $this->date_time = str_replace( $this->config['week_days_name']['english'], $this->config['week_days_name']['persian'][$this->geregorian_DayofWeek], $this->date_time );

          break;

      case 'gh':

          $this->date_time = str_replace( $this->config['month']['english'], $this->config['month']['islamic'], $this->date_time );

          $this->date_time = str_replace( $this->config['week_days_name']['english'], $this->config['week_days_name']['islamic'][$this->geregorian_DayofWeek], $this->date_time );

          break;

      case 'gr':

          $this->date_time = $this->date_time;

        break;

    }

  }

    return $this->date_time;

  }

  public function toShamsi( $type = 'gr' ) {

    switch ( $type ) {

      case 'gr':

      $this->date_time = $this->convert_calendar->gregorianToShamsi( $this->date_time );

        break;

      case 'gh':

            $this->date_time = $this->convert_calendar->ghamariToShamsi( $this->date_time );

        break;
    }

    $this->calendar_type = 'ir';

    return $this;

  }

  public function toGhamari( $type = 'gr') {

switch ( $type  ) {

  case 'ir':

        $this->date_time = $this->convert_calendar->shamsiToGhamari( $this->date_time );

    break;

  case 'gr':

    $this->date_time = $this->convert_calendar->gregorianToGhamari( $this->date_time );

    break;

}

   $this->calendar_type = 'gh';

    return $this;

  }

  public function toGregorian( $type = 'gr' ) {

    switch ( $type ) {

      case 'ir':

        $this->date_time = $this->convert_calendar->shamsiToGregorian( $this->date_time );

        break;

      case 'gh':

        $this->date_time = $this->convert_calendar->ghamariToGregorian( $this->date_time );

      case 'gr':

        $this->date_time = $this->date_time;

        break;

    }

    $this->calendar_type = 'gr';

    return $this;

  }

  /************************************************************
   * Return Datetime as a original object
   ************************************************************
   *
   * @since Oct 22, 2015
   * @return object
   *
   *\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\
   */
  public function object(){

    return $this->date_time;

  }

  /**
   * Get output
   * @since Aug 17 2015
   * @param $calendar string
   * @param $format string
   */
  public function get( $format = 'Y-m-d H:i:s' ) {

    if( in_array( $this->calendar_type, $this->config[ 'calendar' ] ) ){

      return  $this->format( $this->calendar_type, $format );

    }

}

}

?>
