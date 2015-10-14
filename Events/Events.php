<?php namespace Datium;

use Datium\Tools\Convert;
use Datium\Tools\DayOf;
use DateTime;

class Events {

	private $local;

	private $date_time;

	private $convert;

	private $days_of_year;

	public function __construct( $date_time ) {

		$this->date_time = $date_time;

		$this->convert = new Convert;

		return $this;

	}

	public function get() {

		return $this->day_of_year;

	}

	/**
	 * Start of the events from time
	 */
	public function start() {


	}

	/**
	 * End of the events to time
	 */
	public function end() {


	}

		/************************************************************
		 * Return local events - with day start and end as an array
		 ************************************************************
		 *
		 * @since Oct 10, 2015
		 *
		 *\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\
		 */
		public function local( $country_code = "iran" ) {

				/**
				 * Capitalize the first character of $country_code according the file
				 * structure.
				 */	
				$country_code = ucfirst( strtolower( $country_code ) );

				$this->local = include( 'Localization/' . $country_code . '.php' );

				foreach( $this->local[ 'events' ] as $month => $events ) {

					foreach( $events as $day => $event ){

						$date_time = new DateTime();

						$date_time->setDate( 2000, $month, $day );

						$date_time = $this->convert->shamsi( $date_time );

						$dayof = new DayOf( $date_time, 'ir' );

						array_push( $this->day_of_year[ $dayof->year() ], $event );

					}

				}

		return $this;

	}

	public function weekend() {

		return 0;

	}

	public function general() {

		return 0;

	}

	public function relagious() {

		return 0;

	}

}
?>
