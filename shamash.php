<?php namespace opencafe\shamash;


class Sham {

  protected static $holiday = array ();


  public static function get( $type = 'timestamp' ) {

    echo 'hello, shamash!';
    exit;

      switch( $type ) {

        case 'timestamp' :

          break;
        case 'timeago' :

          break;
        case 'format' :

          break;

        default :
          self::get();

      }

  }

  public static function toJalali() {


  }

  public static function toGregorian() {


  }

  public static function addDay() {


  }

  public static function addWeek() {

  }

  public static function addMonth() {

  }

  public static function addYear() {

  }

  public static function subDay() {

  }

  public static function subWeek() {

  }

  public static function subMonth() {

  }

  public static function subYear() {

  }

  public static function nextHoliday() {

  }

  public static function lastHoliday() {

  }

  public static function set( $date ) {

  }


}
?>
