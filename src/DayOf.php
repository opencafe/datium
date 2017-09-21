<?php

namespace OpenCafe\Tools;

/**
 * Define Day of current date.
 */
class DayOf
{
	/**
     * @var object
     */
    protected $date_time;

	/**
     * @var array
     */
    protected $config;

	/**
	 * @var string
	 */
	protected $calendar_type;

    /**
     * @var int
     */
    protected $day_of_week;

	/**
   	 * Constructor of DayOf class
     */
    public function __construct($date_time, $calendar_type = 'gregorian', $day_of_week = null)
    {

		$this->config = include __DIR__.'/CalendarSettings/' . ucfirst($calendar_type) . '.php';

		$this->calendar_type = $calendar_type;

        $this->date_time = $date_time;

        $this->day_of_week = $day_of_week;

        return $this;

    }

    /**
   * Which day of year is current day.
   *
   * @since  Aug, 03 2015
   * @return integer
   */
    public function year()
    {

        return $this->config[ 'day_of_year' ]( $this->date_time );

    }


    /**
   * Which day of week is current day.
   *
   * @since  Aug, 09 2015
   * @return integer
   */
    public function week()
    {
        return $this->config[ 'day_of_week' ]( $this->date_time, $this->day_of_week );

    }

	/**
	 * Return last day of current month
	 *
	 * @since  Oct, 18 2016
	 * @return integer
	 */
	public function lastDayMonth() {

		$days = 0;

		switch ( $this->calendar_type ) {

			case 'gregorian':

				$days = ( intval( $this->date_time->format( 'm' ) ) == 2 &&
				      	$this->config[ 'leap_year' ]( $this->date_time->format( 'Y' )) ) ?
						$this->config[ 'month_days_number' ][ intval( $this->date_time->format( 'm' ) ) ] + 1 :
						$this->config[ 'month_days_number' ][ intval( $this->date_time->format( 'm' ) ) ];

				break;

			case 'jalali':

				$days = ( intval( $this->date_time->format( 'm' ) ) == 12 &&
				  		$this->config[ 'leap_year' ]( $this->date_time->format( 'Y' )) ) ?
				 	 	$this->config[ 'month_days_number' ][ intval( $this->date_time->format( 'm' ) ) ] + 1 :
					 	$this->config[ 'month_days_number' ][ intval( $this->date_time->format( 'm' ) ) ];

			  	break;

		  default:

			$days = $this->config[ 'month_days_number' ][ intval( $this->date_time->format( 'm' ) ) ];

			break;

		}

		return $days;

	}
}
