<?php namespace Datium\Tools;

/**
 * Define Day of current date.
 */
class DayOf {

  protected $date_time;

  protected $month;

  protected $day;

  protected $config;

  protected $result;

  protected $geregorian_DayofWeek;

  public function __construct( $date_time ) {

    $this->config = include( 'Config.php' );

    $this->date_time = $date_time;

    $this->geregorian_DayofWeek = $this->date_time->format('w');

    return $this;

  }

  /**
   * Which day of year is current day.
   * @since Aug, 03 2015
   * @return integer
   */
  public function year( $type ) {

    switch ( $type ) {
      
      case 'ir':

      $this->result = $this->persian_year_of_day();

        break;

      case 'gh':

      $this->result = $this->islamic_year_of_day();

       break;

      case 'gr':
      
      $this->result = date( 'z', strtotime( $this->date_time->format('Y-m-d H:i:s') ) ) + 1;

       break;
    }

    return $this->result;


  }

    /**
   * @since Sept, 14 2015
   * @return integer
   */
  protected function persian_year_of_day() {

    $this->month = $this->date_time->format('n');

    $this->day = $this->date_time->format('d');

    foreach( $this->config['shamsi_month_days'] as $month => $value ) {

      if ( $month < $this->month ) $this->result += $value;

    }

    $this->result += $this->day;

    return $this->result;

    }


     /**
   * @since Sept, 14 2015
   * @return integer
   */
  protected function islamic_year_of_day() {

    $this->month = $this->date_time->format('n');

    $this->day = $this->date_time->format('d');

    foreach( $this->config['islamic_month_days'] as $month => $value ) {

      if ( $month < $this->month ) $this->result += $value;

    }

    $this->result += $this->day;

    return $this->result;

  }

  /**
   * Which day of week is current day.
   * @since Aug, 09 2015
   * @return integer
   */
  public function week( $type ) {

    switch ( $type ) {
      
      case 'ir':

      $this->result = $this->persian_year_of_day();

        break;

      case 'gh':

      $this->result = $this->islamic_year_of_day();

       break;

      case 'gr':
      
      $this->result = date( 'w', strtotime( $this->date_time->format('Y-m-d H:i:s') ) ) + 1;

       break;
    }

    return $this->result;

  }

  /**
   * @since Sept, 14 2015
   * @return integer
   */
  protected function persian_week_of_day() {

    $this->day = $this->date_time->format('l');

    $this->day = str_replace( $this->config['week_days_name']['english'], $this->config['week_days_name']['persian'], $this->day);

    foreach ( $this->config['week_days_name']['persian'] as $key => $value ) {
      
      if( $value == $this->day ) return $key += 1;

    }
    
  }

    /**
   * @since Sept, 14 2015
   * @return integer
   */
  protected function islamic_week_of_day() {

    $this->day = $this->date_time->format('l');

    $this->day = str_replace( $this->config['week_days_name']['english'], $this->config['week_days_name']['islamic'][$this->geregorian_DayofWeek], $this->day);

    foreach ( $this->config['week_days_name']['islamic'] as $key => $value ) {
      
      if( $value == $this->day ) return $key += 1;
      
    }
    

  }


}
?>
