<?php

class Leap {


	public function __construct(){

	}


	public function isLeapYear( $value ){

		if($value / 100 != 0 && $value / 4 == 0){

			return true;
		}

		else
		{
			return false;
		}

	}

}

?>