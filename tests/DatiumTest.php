<?php

use Datium\Datium;

class DatiumTest extends PHPUnit_Framework_TestCase {

  public function testCreateDateTime() {

    date_default_timezone_set( 'Asia/Tehran' );

    $current_date_time = new DateTime();

    $current_date_time->setDate( 2015, 1, 1 );

    $current_date_time->setTime( 0, 0, 0 );

    $this->assertEquals( $current_date_time->format('Y-m-d H:i:s'),  Datium::create( 2015, 1, 1 )->get() );

  }

  public function testDateDifference() {

    $diff = Datium::diff( Datium::now()->object(), Datium::now()->add('5 day')->object() );

    $this->assertEquals( 5, $diff->days );

  }


}
?>
