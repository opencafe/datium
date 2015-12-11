<?php namespace Datium\Tools;

/*
 * translate datetime object to local language
 * @since Nov 6, 2015
 */
class Translate {

  protected $date_time;

  protected $calendar;

  protected $translate;

  protected $format;

  protected $config;

  protected $gregorian_DayofWeek;

  protected $english_number = array( '0', '1', '2', '3', '4', '5', '6', '7', '8', '9' );

  public function __construct( $date_time, $calendar, $format, $gregorian_DayofWeek ){

    $this->translate = include( 'lang/fa/general.php' );

    $this->config = include( 'config.php' );

    $this->date_time = $date_time;

    $this->calendar = $calendar;

    $this->format = $format;

    $this->gregorian_DayofWeek = $gregorian_DayofWeek;

    return $this;

  }

  protected function format( $calendar, $format ) {

    $this->date_time = $this->date_time->format( $format );

    if( in_array( $calendar, $this->config['calendar'] ) ) {

    switch( $calendar ){

      case 'ir':

        $this->date_time = $this->translateToPersian();

      break;

      case 'gh':

        $this->date_time = $this->translateToArabic();

      break;

      case 'gr':

        $this->date_time = $this->translateToEnglish();

      break;

    }

  }

    return $this->date_time;

  }

  protected function translateToPersian() {

    $this->date_time = str_replace( $this->config['month']['english'], $this->config['month']['persian'], $this->date_time );

    $this->date_time = str_replace( $this->config['week_days_name']['english'], $this->config['week_days_name']['persian'][$this->gregorian_DayofWeek], $this->date_time );

    $this->date_time = str_replace( $this->english_number , $this->translate['number'], $this->date_time );

    $this->date_time = str_replace( $this->config['month']['persian'], $this->translate['month'], $this->date_time );

    $this->date_time = str_replace( $this->config['week_days_name']['persian'], $this->translate['week_days_name'], $this->date_time );

    $this->date_time = str_replace( 'th', 'ام', $this->date_time );

    $this->date_time = str_replace( 'AM', 'قبل از ظهر', $this->date_time );

    $this->date_time = str_replace( 'am', 'ق.ظ', $this->date_time );

    $this->date_time = str_replace( 'PM', 'بعد از ظهر', $this->date_time );

    $this->date_time = str_replace( 'pm', 'ب.ظ', $this->date_time );

    return $this->date_time;

  }

  protected function translateToArabic() {

    $this->date_time = str_replace( $this->config['month']['english'], $this->config['month']['islamic'], $this->date_time );

    $this->date_time = str_replace( $this->config['week_days_name']['english'], $this->config['week_days_name']['islamic'][$this->gregorian_DayofWeek], $this->date_time );

    return $this->date_time;
  }

  protected function translateToEnglish() {

        $this->date_time = $this->date_time;

        return $this->date_time;
  }

  public function get()
  {
    return $this->format( $this->calendar, $this->format );
  }




}
