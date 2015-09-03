  <?php

/**
 * @since Aug, 21 2015
 */
class Leap {

  /**
   * @param integer store year value
   */
	protected $year;


  /**
   * @param $year integer
   * @since Aug, 21 2015
   */
	public function __construct( $year ) {

			$this->year = $year;

      return $this;

	}

  /**
   * Check the year is leap or not
   * @since Aug, 21 2015
   * @return boolean
   */
  public function get() {

    return ( ( ( $this->year % 4 ) == 0 ) && ( ( ( $this->year % 100 ) != 0 ) || ( ( $this->year % 400 ) == 0 ) ) );

  }

}

?>
