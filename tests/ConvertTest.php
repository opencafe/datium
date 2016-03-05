<?php

use OpenCafe\Datium as Datium;

class ConvertTest extends PHPUnit_Framework_TestCase {

  public function testGregorianToJalali() {

    $date = Datium::create( 2016, 1, 25 )->to( 'jalali' )->get();

    $this->assertEquals( '1394-11-05 00:00:00', $date );

  }

  public function testGregorianToHijri() {

    $date = Datium::create( 2016, 1, 25 )->to( 'hijri' )->get();

    // $this->assertEquals( '1437-04-15 00:00:00', $date );

  }

  public function testJalaliToGregorian() {

    $date = Datium::create( 1394, 11, 5 )->from('jalali')->get();

    // $this->assertEquals( '2016-01-25 00:00:00', $date );

  }

  public function testHijriToGregorian() {

    $date = Datium::create( 1437, 4, 15 )->from('hijri')->get();

    // $this->assertEquals( '2016-01-25 00:00:00', $date );

  }

  public function testJalaliToHijri() {

    $date = Datium::create( 1394, 11, 5 )->from('jalali')->to('hijri')->get();

    // $this->assertEquals( '1437-04-15 00:00:00', $date );

  }

  public function testHijriToJalali() {

    $date = Datium::create( 1437, 04, 15 )->from('hijri')->to('jalali')->get();

    // $this->assertEquals( '1394-11-05 00:00:00', $date );

  }

}
