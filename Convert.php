<?php

class Convert {

  protected $year;

  protected $month;

  protected $day;

  protected $date_time;

  protected $config;

  protected $leap;

  protected $persian_month;

  protected $temp_day;

  protected $date;

  public function __construct() {

    $this->config = include('Config.php');

    $this->persian_month = $this->config['month']['persian'];

  }

  public function toShamsi( $date_time ) {

    $this->date_time = $date_time;

    $this->year = $this->date_time->format( 'Y' );

    $this->month = $this->date_time->format( 'm' );

    $this->day = $this->date_time->format( 'd' );

    $this->temp_day = 0;

     for ( $index = 1 ; $index < $this->month ; $index++ ) {

       $this->temp_day += $this->config['gregorian_month_days'][$index];

     }

     $this->temp_day += $this->day;

     $this->leap = new leap( $this->year );

     if( $this->leap->get() && $this->month > 2 ) $this->temp_day++;

     if ( $this->temp_day <= 79 ) {

      if( ( $this->year - 1 ) % 4 == 0 )
        $this->temp_day = $this->temp_day + 11;
      else
        $this->temp_day = $this->temp_day + 10;

      $this->year = $this->year - 622;

      if($this->temp_day % 30 == 0) {

        $this->month = ( $this->temp_day / 30 ) + 9;

        $this->day = 30;

      }
      else {

        $this->month = ( $this->temp_day / 30 ) + 10;

        $this->day = $this->temp_day % 30;

      }

     }

     else {

      $this->year = $this->year - 621;

      $this->temp_day = $this->temp_day - 79;

      if( $this->temp_day <= 186 ) {

        if( $this->temp_day % 31 == 0 ) {

          $this->month = ( $this->temp_day / 31 );

          $this->day = 31;
        }

      else {

        $this->month = ( $this->temp_day / 31 ) + 1;

        $this->day = ( $this->temp_day % 31 );
      }

      }

      else {

        $this->temp_day = $this->temp_day - 186;

        if( $this->temp_day % 30 == 0 ) {

        $this->month = ( $this->temp_day / 30 ) + 6;

        $this->day = $this->temp_day % 30;

        }

        else {

        $this->month = ( $this->temp_day / 30 ) + 7;

        $this->day = $this->temp_day % 30;

        }

      }

     }

    //  foreach ( $this->persian_month as $key => $value ) {
     //
    //    if ( $key == intval( $this->month ) ) $this->month = $value;
     //
    //  }

     $this->date_time->setDate( $this->year, $this->month, $this->day );

     return $this->date_time;

  }

  public function toJalali() { }


}
?>
