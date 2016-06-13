<?php

use OpenCafe\Datium as Datium;

class ConvertTest extends PHPUnit_Framework_TestCase
{

    public function testGregorianToJalali()
    {

        $date = Datium::create(2016, 1, 25)->to('jalali')->get();

        $this->assertEquals('1394-11-05 00:00:00', $date);

    }

    public function testGregorianToHijri()
    {

        $date = Datium::create(2016, 6, 13)->to('hijri')->get();

        $this->assertEquals( '1437-09-07 00:00:00', $date );

    }

    public function testJalaliToGregorian()
    {

        $date = Datium::create(1395, 3, 24)->from('jalali')->get();

        $this->assertEquals( '2016-06-13 00:00:00', $date );

    }

    public function testHijriToGregorian()
    {

        $date = Datium::create(1437, 9, 7)->from('hijri')->get();

        $this->assertEquals( '2016-06-13 00:00:00', $date );

    }

    public function testJalaliToHijri()
    {

        $date = Datium::create(1395, 3, 24)->from('jalali')->to('hijri')->get();

        $this->assertEquals( '1437-09-07 00:00:00', $date );

    }

    public function testHijriToJalali()
    {

        $date = Datium::create(1437, 9, 7)->from('hijri')->to('jalali')->get();

        $this->assertEquals( '1395-03-24 00:00:00', $date );

    }
}
