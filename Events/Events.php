<?php namespace Datium;

use Datium\Tools\Convert;
use Datium\Events\Location\Iran;

class Events {

	protected $config;

	protected $convert;

	protected $date_time;

	protected $year;

	protected $month;

	protected $day_of_week;

	protected $day;

	protected $day_name;

	protected $result;

	protected $convert_calendar;

	public function __construct( $date_time ) {

		$this->config = include( 'config.php' );

	    $this->convert_calendar = new Convert();

		$this->date_time = $date_time;

		$this->day_of_week = $this->date_time->format( 'l' );
		
		return $this;

	}

	public function iran() {

		return new Iran( $this->date_time );

	}



}

?>
