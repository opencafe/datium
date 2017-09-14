<?php

namespace OpenCafe\Datium\Test;

use OpenCafe\Datium as Datium;

class DayOfTest extends \PHPUnit_Framework_TestCase
{

    public function testDayOfYear()
    {

        $this->assertEquals(1, Datium::create(2015, 1, 1)->dayOf()->year());

        // 1436-03-10 - 68th day
        $this->assertEquals(68, Datium::create(2015, 1, 1)->to('hijri')->dayOf()->year());

        // 1393-10-11 - 287th day
        $this->assertEquals(287, Datium::create(2015, 1, 1)->to('jalali')->dayOf()->year());

        // 2014-12-19 - 353th day
        $this->assertEquals(353, Datium::create(2015, 1, 1)->to('julian')->dayOf()->year());

        // 2714-10-11 - 287th day
        $this->assertEquals(287, Datium::create(2015, 1, 1)->to('kurdish')->dayOf()->year());

    }

    public function testDayOfWeek()
    {

        //First january of 2015 is Thursday
        $this->assertEquals(4, Datium::create(2015, 1, 1)->dayOf()->week());

        $this->assertEquals(5, Datium::create(2015, 1, 1)->to('hijri')->dayOf()->week());

        $this->assertEquals(6, Datium::create(2015, 1, 1)->to('jalali')->dayOf()->week());

        $this->assertEquals(6, Datium::create(2015, 1, 1)->to('kurdish')->dayOf()->week());

    }

	public function testLastDayOfMonth()
	{
	    // leap year
        $this->assertEquals(29, Datium::create(2016, 2, 1)->dayOf()->lastDayMonth());

        $this->assertEquals(31, Datium::create(2015, 1, 1)->dayOf()->lastDayMonth());

        $this->assertEquals(30, Datium::create(2015, 1, 1)->to('hijri')->dayOf()->lastDayMonth());

        $this->assertEquals(30, Datium::create(2015, 1, 1)->to('jalali')->dayOf()->lastDayMonth());

        $this->assertEquals(30, Datium::create(2015, 1, 1)->to('kurdish')->dayOf()->lastDayMonth());

	}
}
