<?php namespace Datium;

use Datium\Tools\Convert;
use Datium\Tools\DayOf;
use DateTime;

class Events {

	private $local;

	private $events;

	private $date_time;

	private $convert;

	private $days_of_year;

	private $year;

	private $year_in_persian;

	private $year_in_ghamari;

	private static $date_start;

	private static $date_end;

	public function __construct( $date_time, $date_end = NULL ) {

		if( $date_end !== NULL ) {

			Events::$date_start = $date_time;

			Events::$date_end = $date_end;

		}

		$this->convert = new Convert;

		$this->date_time = $date_time;

		$this->year = $date_time->format( 'Y' );

		$this->year_in_persian = $this->convert->gregorianToShamsi( $date_time )->format( 'Y' );

		return $this;

	}

	/************************************************************
	 * Return Array of Events
	 ************************************************************
	 *
	 * @since Oct 18, 2015
	 * @return array
	 *
	 *\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\
	 */
	public function get() {

		foreach( $this->day_of_year as $key => $day ) {

			$temp = new DayOf( self::$date_start, 'gr' );

			$temp2 = new DayOf( self::$date_end, 'gr' );

			/**
			 * @todo current return is false
			 */
			if ( ! ( $key > $temp->year() && $key < $temp2->year() ) ) {

				unset( $this->day_of_year[ $key ] );

			}

		}

		return $this->day_of_year;

	}


		/************************************************************
		 * Return local events - with day start and end as an array
		 ************************************************************
		 *
		 * @since Oct 10, 2015
		 * @param string $country_code
		 *
		 *\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\
		 */
		public function local( $country_code = "ir" ) {

				/*
				 * Capitalize the first character of $country_code according the file
				 * structure.
				 */
				$country_code = ucfirst( strtolower( $country_code ) );

				$this->local = include( 'Localization/' . $country_code . '.php' );

				foreach( $this->local[ 'events' ] as $month => $events ) {

					foreach( $events as $day => $event ){

						$date_time = new DateTime();

						$date_time->setDate( 2015, $month, $day );

						switch ( $this->local[ 'default_calendar' ] ) {

							case 'shamsi':

							$date_time->setDate( 1394, $month, $day );

							$date_time = $this->convert->shamsiToGregorian( $date_time );

							break;

							case 'ghamari':

								$date_time = $this->convert->ghamariToGregorian( $date_time );

							break;

						}

						$dayof = new DayOf( $date_time, 'gr' );

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

	public function international() {

		$this->events = include( 'Global/global.php' );

		foreach( $this->events[ 'events' ] as $month => $events ) {

			foreach( $events as $day => $event ){

				$date_time = new DateTime();

				$date_time->setDate( 2015, $month, $day );

				$dayof = new DayOf( $date_time, 'gr' );

				$this->day_of_year[ $dayof->year() ][ 'Event' ][] =  $event;

				$this->day_of_year[ $dayof->year() ][ 'Date' ][] =  $date_time;

			}

		}

		ksort( $this->day_of_year );

		return $this;


	}

}
?>
