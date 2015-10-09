<?php namespace Datium;

use Datium\Tools\Convert;
use Datium\Tools\DayOf;

class Events {

	private $local;

	private $date_time;

	private $convert;

	private $days_of_year;

	public function __construct( $date_time ) {

		var_dump( $this->days_of_year );exit;

		$this->date_time = $date_time;

		$this->convert = new Convert;

		return $this;

	}

	public function get() {

		return 0;

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

	public function local( $country_code = "iran" ) {

		/**
		 * Capitalize the first character of $country_code according the file
		 * structure.
		 */
		$country_code = ucfirst( strtolower( $country_code ) );

		$this->local = include( 'Localization/' . $country_code . '.php' );

		switch ( $this->local[ 'default_calendar' ] ) {

			case 'shamsi':
				$this->date_time = $this->convert->shamsi( $this->date_time );

				foreach( $this->local[ 'events' ] as $event ) {

					$date_time = new DateTime();

					// $this->day_of_year[ $set , 'ir' ) ] = 

				}

				break;

			case 'gregorian':
				break;

			case 'ghamari':
				$this->date_time = $this->convert->ghamari( $this->date_time );
				break;

				foreach

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
