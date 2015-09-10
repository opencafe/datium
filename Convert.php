<?php namespace Datium\Tools;

class Convert {

  protected $year;

  protected $month;

  protected $day;

  public $date_time;

  protected $config;

  protected $leap;

  protected $persian_month;

  protected $temp_day;

  protected $date;

  public function __construct() {

    $this->config = include( 'Config.php' );

    $this->persian_month = $this->config['month']['persian'];

  }

  public function shamsi( $date_time ) {

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

  public function ghamari( $date_time ) {

    $this->date_time = $date_time;

    $this->date_time = $this->shamsi( $this->date_time );

    $this->year = $this->date_time->format('Y');

    $this->month = $this->date_time->format('n');

    $this->day = $this->date_time->format('d');

    $this->temp_day = 0 ;

    for ( $index = 1 ; $index < $this->month ; $index++ ) {

        $this->temp_day += $this->config['shamsi_month_days'][$index];

      }

     $this->temp_day += $this->day;

     $this->leap = new leap( $this->year );

    if( $this->leap->get() && $this->month > 11 ) $this->temp_day++;

    $_year = ( ( ( ( ( $this->year - 1 ) * 365.2422 ) + $this->temp_day ) - 119) / 354.3670 ) + 1;

    $_year = explode( '.', $_year );

    $this->year = $_year[0];

    $_month = $_year[1];

     $var_temp = '0.0';

      for ( $i = strlen( $_month ); $i > 2; $i-- ) {

        $var_temp .= '0';

     }

     $var_temp .= '1';

    $_month = $_month * $var_temp ;

    $_month = ( $_month * 12 ) + 1;

    $_month = explode( '.', $_month );

    $this->month = $_month[0];

    $_day = $_month[1];

    $var_temp = '0.0';

    for ( $i = strlen( $_day );  $i > 2;  $i-- ) {

       $var_temp .= '0' ;

    }

    $var_temp .= '1';

    $_day = $_day * $var_temp;

    $_day = ( $_day * 29.530 ) + 1;

    $_day = explode( '.', $_day );

    $this->day = $_day[0];

   $this->date_time->setDate( $this->year, $this->month, $this->day );


   return $this->date_time;

   }


}
?>
