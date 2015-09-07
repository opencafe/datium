<?php namespace Datium\Tools;

class DayOf {

  protected $date_time;

  public function __construct( $date_time ) {

    $this->date_time = $date_time;

    return $this;

  }

  public function year() {

      return date( 'z', strtotime( $this->date_time->format('Y-m-d H:i:s') ) ) + 1;

  }

  public function week() {



  }

}
?>
