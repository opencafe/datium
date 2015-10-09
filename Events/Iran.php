<?php namespace Datium\Events\Location;

use Datium\Events;
use Datium\Face\iEvents;

/**
 * This Class validate or determine Iranian offical events
 */
class Iran extends Events implements iEvents {

    protected $date_weekend = "";

    protected $date_national = "";

    protected $date_religious = "";

    protected $date_time_events;

    public function __construct( $date_time ){

      $this->date_time = $date_time; //new variable DateTime return it in line 3 next() function.

      return $this;

    }


    public function validate() {

      $this->result = array();

      $this->date_time = $this->convert_calendar->shamsi( $this->date_time );

  		$this->day_name = $this->date_time->format('l');

  		$this->day_name = str_replace( $this->config['week_days_name']['english'], $this->config['week_days_name']['persian'], $this->day_name );

  		$this->month = $this->date_time->format('m');

  		$this->day = $this->date_time->format('d');

  		if( $this->day_name == 'Jome' ) array_push( $this->result, $this->day_name );

  		foreach ( $this->config['events']['iran']['national'] as $m => $value ) {

  			if( in_array( $this->month, [$m] ) ) {

  			foreach ( $this->config['events']['iran']['national'][$m] as $d => $value ) {

  				if( in_array( $this->day, [$d] ) ) {

  					if( is_null( $this->result ) ) array_push( $this->result, $this->day_name );

  					else {

              array_push( $this->result, $value );

  					}

  				}

  			}

  		}

  			elseif ( is_null($this->result) ) {

  				$this->result = FALSE;

  			 }

  		}

     $this->date_time = $this->convert_calendar->ghamari( $this->date_time );

      $this->month = $this->date_time->format('m');

      $this->day = $this->date_time->format('d');

      foreach ( $this->config['events']['iran']['religious'] as $month => $value ) {

        if( in_array( $this->month, [$month] ) ) {

        foreach ( $this->config['events']['iran']['religious'][$month] as $day => $value ) {

          if( in_array( $this->day, [$day] ) ) {

            if( is_null( $this->result ) ) array_push( $this->result, $this->day_name );

            else {

              array_push( $this->result, $value );

            }

          }

        }

      }

        elseif ( is_null($this->result) ) {

          $this->result = FALSE;

         }

      }

  			return $this->result;
    }

    public function next() {

      $date_time = $this->convert_calendar->ghamari( $this->date_time );

      $this->date_religious = $this->next_religious( $date_time );

      return $this->date_time; //here

      $date_time = $this->convert_calendar->shamsi( $this->date_time );

      $this->date_weekend = $this->next_weekend( $date_time );

      $this->date_national = $this->next_national( $date_time );

      $weekend = $this->date_weekend->format("Ymd");

      $national = $this->date_national->format("Ymd");

      if( $weekend > $national ){

        $result = 'national';
      }

      if( $weekend < $national ){

        $result = 'weekend';
      }

      switch ( $result ) {


        case 'weekend':

          $this->result = $this->date_weekend->format("Y-m-d");

          break;

        case 'national':

          $this->result = $this->date_national->format("Y-m-d");

          break;

        default:

          break;
      }

      return $this->result;

        }

   public function last() {

  }

  protected function next_weekend( $w_date ) {

      $this->day_of_week = str_replace( $this->config['week_days_name']['english'], $this->config['week_days_name']['persian'], $this->day_of_week );

      $this->day = $w_date->format('d');

      $this->month = $w_date->format('m');

      $this->year = $w_date->format('Y');

      $days = 0;

      $weekend = 0;

      $national = array();

      $religious = array();

        foreach ( $this->config['week_days_name']['persian'] as $key => $value ) {

          if( $value == $this->day_of_week ) {

            $days = $key;

            while ( $days < 6 ) {

              $days += 1;

              $weekend += 1;

            }

          }

        }

        $this->day += $weekend;

        if( $this->day > 31 && $this->month < 7 ) {

        $this->day -= $weekend;

          for ( $i = $this->day; $i < 31; $i++ ) {

            $weekend--;

          }

          $this->day = $weekend;

          $this->month += 1;


        }

        if( $this->day > 30 && $this->month < 12 ) {

        $this->day -= $weekend;

          for ( $i = $this->day; $i < 30; $i++ ) {

            $weekend--;

          }

          $this->day = $weekend;

          $this->month += 1;


        }

        if( 12 == $this->month && $this->day > 29 ) {

          $this->day -= $weekend;

          for ( $i = $this->day; $i < 29 ; $i++ ) {

            $weekend--;

          }

          $this->day = $weekend;

          $this->month = 1;

          $this->year += 1;

        }

        $this->date_weekend = date_create( "$this->year/$this->month/$this->day" );

        return $this->date_weekend;

  }

  protected function next_national( $n_date ){

      $this->day = $n_date->format('d');

      $this->month = $n_date->format('m');

      $this->year = $n_date->format('Y');

      $national = array();

        $date_weekend = $date_national = $date_religious = "";

        foreach ( $this->config['events']['iran']['national'] as $month => $value ) {

          if( $this->month <= $month ){

            if( 12 == $month && 29 <= $this->day ){

              $this->year += 1;

              $month = 1;

               }

            foreach ( $this->config['events']['iran']['national'][$month] as $day => $value) {

              $national[ $month ][ $day ] = $day;

            }

        }

      }

      foreach ( $national as $m => $value ) break;

        $this->month = $m;

        $this->day = array_pop( $national[$m] );

        $this->date_national = date_create( "$this->year/$this->month/$this->day" );

        return $this->date_national;

  }

  protected function next_religious( $r_date ){

      $this->day = $r_date->format('d');

      $this->month = $r_date->format('m');

      $this->year = $r_date->format('Y');

      $religious = array();

        foreach ( $this->config['events']['iran']['religious'] as $month => $value ) {

          if( $this->month <= $month ){

              if( ( 12 == $this->month ) && ( $this->day > 18 ) ) {

                $month = 1 ;

                $this->year++;

              }

            foreach ( $this->config['events']['iran']['religious'][$month] as $day => $value) {

              $religious[ $month ][ $day ] = $day;

            }

        }

      }

      //foreach ( $religious as $m => $value ) break;

      //$this->day = $value ;

      //return $this->day;

      //return $this->month . '/' . $this->day;

  }

}
