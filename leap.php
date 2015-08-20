  <?php

class Leap {


	protected $year;


	public function __construct( $year ){

			$this->$year = $year;

	}


	public function now(){

		if( $this->year / 100 != 0 && $this->year / 4 == 0 ) {

			return true;

		} else {

			return false;

		}

	}

	public function next() {


	}

	public function last() {


	}

}

?>
