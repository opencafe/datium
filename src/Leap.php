<?php namespace Datium\Tools;

/**
 * @since Aug, 21 2015
 */
class Leap {

  /**
   * @param integer store year value
   */
	protected $year;

  /**
   * @param string store type of year value
   */
  protected $type;

  /**
   * @param boolean store result of leap functions
   */
  protected $result;


  /**
   * @param $year integer
   * @since Aug, 21 2015
   */
	public function __construct( $year, $type = 'gregorian' ) {

			$this->year = $year;

      $this->type = $type;

      return $this;

	}

  /**
   * check the gregorian year is leap or not
   * @since Oct, 24 2015
   * @return boolean
   */
  public function gregorinLeapYear() {

  return ( ( ( $this->year % 4 ) == 0 ) && ( ( ( $this->year % 100 ) != 0 ) || ( ( $this->year % 400 ) == 0 ) ) );

  }

  /**
   * check the jalali year is leap or not
   * @since Oct, 24 2015
   * @return boolean
   */
  public function jalaliLeapYear() {

		$jalali_years = 0;

    while ( $jalali_years < ( $this->year - 128 ) ) {

      $jalali_years += 128;

    }

    //check for leap year after 5 years
    $this->result = $this->year - 1;

    $this->result -= $jalali_years;

    if ( $this->result >= 33 ) {

    $this->result = $this->result % 33;

   }

    if ( ( $this->result == 28 ) || ( $this->result == 27 ) ) {

      return $this->result;

    }

    //check for leap year after 4 years
    $this->result = $this->year;

    $this->result -= $jalali_years;

    if ( $this->result >= 33 ) {

    $this->result = $this->result % 33;

   }

    if ( ( ( $this->result % 4 ) == 0 ) && ( $this->result != 28 ) ) {

      return $this->result;

    }
  }

  /**
   * check the hijri year is leap or not
   * @since Oct, 24 2015
   * @return boolean
   */
  public function hijriLeapYear() {

    $this->result = $this->year % 30;

    if ( ( 2 == $this->result ) || ( 5 == $this->result ) || ( 7 == $this->result ) || ( 10 == $this->result ) || ( 13 == $this->result ) || ( 16 == $this->result ) || ( 18 == $this->result ) || ( 21 == $this->result ) || ( 24 == $this->year ) || ( 26 == $this->result ) || ( 29 == $this->result ) ) {

      return $this->result;

    }

  }

  /**
   * return the year is leap or not
   * @since Aug, 21 2015
   * @return boolean
   */
  public function get() {

    switch ( $this->type ) {

      case 'gregorian':

      $this->result = $this->gregorinLeapYear();

        break;

      case 'jalali':

       $this->result = $this->jalaliLeapYear();

       break;

      case 'hijri':

        $this->result = $this->hijriLeapYear();

        break;
    }

    return $this->result;

  }

}
