<?php

namespace OpenCafe\Datium\Test;

use OpenCafe\Datium;

class ConvertTest extends \PHPUnit_Framework_TestCase
{

    public function testGregorianToJalali()
    {

        $date = Datium::create(2016, 1, 25)->to('jalali')->get();

        $this->assertEquals('1394-11-05 00:00:00', $date);

    }

    public function testGregorianToHijri()
    {

        $date = Datium::create(2016, 6, 13)->to('hijri')->get();

        $this->assertEquals('1437-09-07 00:00:00', $date);

    }

    public function testJalaliToGregorian()
    {

        $date = Datium::create(1395, 3, 24)->from('jalali')->get();

        $this->assertEquals('2016-06-13 00:00:00', $date);

        $date = Datium::create(1394, 11, 05)->from('jalali')->get();

        $this->assertEquals('2016-01-25 00:00:00', $date);

        $date = Datium::create(1396, 9, 11)->from('jalali')->get();

        $this->assertEquals('2017-12-02 00:00:00', $date);

    }

    public function testHijriToGregorian()
    {

        $date = Datium::create(1437, 9, 7)->from('hijri')->get();

        $this->assertEquals('2016-06-13 00:00:00', $date);

        $date = Datium::create(1439, 03, 12)->from('hijri')->get();

        $this->assertEquals('2017-12-02 00:00:00', $date);

    }

    public function testJalaliToHijri()
    {

        $date = Datium::create(1395, 3, 24)->from('jalali')->to('hijri')->get();

        $this->assertEquals('1437-09-07 00:00:00', $date);

    }

    public function testHijriToJalali()
    {

        $date = Datium::create(1437, 9, 7)->from('hijri')->to('jalali')->get();

        $this->assertEquals('1395-03-24 00:00:00', $date);

    }

    public function testGregorianToJulian()
    {

        $date = Datium::create(2016, 1, 25)->to('julian')->get();

        $this->assertEquals('2016-01-12 00:00:00', $date);

    }

    public function testJulianToGregorian()
    {

        $date = Datium::create(2016, 1, 12)->from('julian')->get();

        $this->assertEquals('2016-01-25 00:00:00', $date);

    }

    public function testJulianToHijri()
    {

        $date = Datium::create(2016, 1, 12)->from('julian')->to('hijri')->get();

        $this->assertEquals('1437-04-14 00:00:00', $date);

    }

    public function testJulianToJalali()
    {

        $date = Datium::create(2016, 01, 12)->from('julian')->to('jalali')->get();

        $this->assertEquals('1394-11-05 00:00:00', $date);

    }

    public function testHijriToJulian()
    {

        $date = Datium::create(1437, 04, 14)->from('hijri')->to('julian')->get();

        $this->assertEquals('2016-01-12 00:00:00', $date);

    }

    public function testJalaliToJulian()
    {

        $date = Datium::create(1394, 11, 05)->from('jalali')->to('julian')->get();

        $this->assertEquals('2016-01-12 00:00:00', $date);

    }

    public function testGregorianToKurdish()
    {

        $date = Datium::create(2016, 1, 25)->to('kurdish')->get();

        $this->assertEquals('2715-11-05 00:00:00', $date);

    }

    public function testKurdishToGregorian()
    {

        $date = Datium::create(2715, 11, 05)->from('Kurdish')->get();

        $this->assertEquals('2016-01-25 00:00:00', $date);

    }

    public function testKurdishToHijri()
    {

        $date = Datium::create(2715, 11, 05)->from('Kurdish')->to('hijri')->get();

        $this->assertEquals('1437-04-14 00:00:00', $date);

    }

    public function testKurdishToJalali()
    {

        $date = Datium::create(2715, 11, 05)->from('Kurdish')->to('jalali')->get();

        $this->assertEquals('1394-11-05 00:00:00', $date);

    }

    public function testHijriToKurdish()
    {

        $date = Datium::create(1437, 04, 14)->from('hijri')->to('Kurdish')->get();

        $this->assertEquals('2715-11-05 00:00:00', $date);

    }

    public function testJalaliToKurdish()
    {

        $date = Datium::create(1394, 11, 05)->from('jalali')->to('Kurdish')->get();

        $this->assertEquals('2715-11-05 00:00:00', $date);

    }
}
