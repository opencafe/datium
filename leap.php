  <?php

class Leap {


	protected $year;


	public function __construct( $year ){

			$this->year = $year;

      return $this;

	}

  public function get( $year ) {

    if( $year / 100 != 0 && $this->year / 4 == 0 ) {

			return true;

		} else {

			return false;

		}

  }


	public function now(){

		return $this->get( $this->year );

	}

	public function next() {

    return $this->get( $this->year + 1 );

	}

	public function last() {

    return $this->get( $this->year - 1 );

	}

}

?>
