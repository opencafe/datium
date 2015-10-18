<?php namespace Datium;

use Datium\Tools\Convert;
use Datium\Tools\DayOf;
use DateTime;

class Events {

	private $local;

	private $date_time;

	private $convert;

	private $days_of_year;

	private $year;

	private $year_in_persian;

	private $year_in_ghamari;

	public function __construct( $date_time ) {

		$this->convert = new Convert;

		$this->date_time = $date_time;

		$this->year = $date_time->format( 'Y' );

		$this->year_in_persian = $this->convert->gregorianToShamsi( $date_time )->format( 'Y' );

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

						$date_time->setDate( $this->year_in_persian, $month, $day );

						switch ( $this->local[ 'default_calendar' ] ) {

							case 'shamsi':

								$date_time = $this->convert->shamsiToGregorian( $date_time );

							break;

							case 'gregorian':

							break;

							case 'ghamari':

								$date_time = $this->convert->ghamariToGregorian( $date_time );

							break;

						}

						$dayof = new DayOf( $date_time, 'gr' );

						$day_of_shamsi = new DayOf( $date_time, 'ir' );

						$day_of_ghamari = new DayOf( $date_time, 'gh' );

						$this->day_of_year[ $dayof->year() ][ 'PersianDay' ][] = $day_of_shamsi->year();

						$this->day_of_year[ $dayof->year() ][ 'GhamariDay' ][] = $day_of_shamsi->year();

						$this->day_of_year[ $dayof->year() ][ 'Event' ][] =  $event;

						$this->day_of_year[ $dayof->year() ][ 'Date' ][] =  $date_time;

					}

				}

				ksort( $this->day_of_year );

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
