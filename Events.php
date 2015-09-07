<?php

class Events {

	protected $config;

	protected $convert;

	protected $date_time;

	protected $month;

	protected $day;

	protected $day_name;

	protected $result;

	protected $convert_calendar;

	public function __construct( $date_time ) {

		$this->config = include( 'config.php' );

	    $this->convert_calendar = new Convert();

		$this->date_time = $date_time;

		return $this;

	}

	public function is_persian_holiday() {

		$this->date_time = $this->convert_calendar->toShamsi( $this->date_time );

		$this->day_name = $this->date_time->format('l');

		$this->day_name = str_replace( $this->config['week_days_name']['english'], $this->config['week_days_name']['persian'], $this->day_name );

		//$this->day_name = 'Jome';

		$this->month = $this->date_time->format('m'); //1;

		$this->day = $this->date_time->format('d'); //13;

		if( $this->day_name == 'Jome' ) $this->result .= 'Yes It\'s, ' . $this->day_name . ', ';

		foreach ( $this->config['events']['iran']['national'] as $m => $value ) {

			if( in_array( $this->month, [$m] ) ) {
			
			foreach ( $this->config['events']['iran']['national'][$m] as $d => $value ) {

				if( in_array( $this->day, [$d] ) ) {

					if( is_null( $this->result ) ) $this->result .= 'Yes It\'s, ' . $value . ', ';

					else {

						$this->result .= $value . ', ';

					}

				}
			
			}

		}

			elseif ( is_null($this->result) ) {
				
				$this->result = 'It\'s not';
			 
			 } 

				

		}

			return $this->result;
		}

	public function next_persian_holiday() {

	}

	public function last_pesrian_holiday() {

	}

  

}

?>
