<?php

namespace OpenCafe\Tools;

/**
 * Define Day of current date.
 */
class DayOf
{

    protected $date_time;

    protected $month;

    protected $day;

    protected $config;

    protected $result;

    protected $calendar_type;

    protected $geregorian_DayofWeek;

    public function __construct($date_time, $calendar_type = 'gregorian')
    {

        $this->config = include __DIR__.'/Config.php';

        $this->date_time = $date_time;

        $this->calendar_type = $calendar_type;

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

        $this->config = include __DIR__.'/CalendarSettings/' . ucfirst($this->calendar_type) . '.php';

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

        $this->config = include __DIR__.'/CalendarSettings/' . ucfirst($this->calendar_type) . '.php';

        return $this->config[ 'day_of_week' ]( $this->date_time );

    }

	/**
	 * Return last day of current month
	 *
	 * @since  Oct, 18 2016
	 * @return integer
	 */
	public function lastDayMonth() {

		$this->config = include __DIR__.'/CalendarSettings/' . ucfirst($this->calendar_type) . '.php';

		return $this->config[ 'month_days_number' ][ intval( $this->date_time->format( 'm' ) ) ];

	}
}
