<?php namespace Datium\Tools;

/**
 * Define Day of current date.
 */
class DayOf {

  protected $date_time;

  public function __construct( $date_time ) {

    $this->date_time = $date_time;

    return $this;

  }

  /**
   * Which day of year is current day.
   * @since Aug, 03 2015
   * @return integer
   */
  public function year() {

      return date( 'z', strtotime( $this->date_time->format('Y-m-d H:i:s') ) ) + 1;

  }

  /**
   * Which day of week is current day.
   * @since Aug, 09 2015
   * @return integer
   */
  public function week() {

    return date( 'w', strtotime( $this->date_time->format('Y-m-d H:i:s') ) ) + 1;

  }

}
?>
