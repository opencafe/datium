<?php namespace Datium\Events\Location;

use Datium\Events;
use Datium\Face\iEvents;

/**
 * This Class validate or determine Iranian offical events
 */
class Iran extends Events implements iEvents {

    public function validate() {

      $this->result = array();

      $this->date_time = $this->convert_calendar->shamsi( $this->date_time );

  		$this->day_name = $this->date_time->format('l');

  		$this->day_name = str_replace( $this->config['week_days_name']['english'], $this->config['week_days_name']['persian'], $this->day_name );

  		//$this->day_name = 'Jome';

  		$this->month = $this->date_time->format('m'); //1;

  		$this->day = $this->date_time->format('d'); //13;

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

  			return $this->result;

    }

    public function next() {


    }

    public function last() {


    }

}
