<?php

namespace OpenCafe\Datium\Test;

use OpenCafe\Datium as Datium;

class LeapTest extends \PHPUnit_Framework_TestCase
{

    public function testAssertLeapYear()
    {

        // 2012 is a leap year
        $this->assertEquals(true, Datium::create(2012, 1, 1, 0, 0, 0)->leap()->get());

        // 2013 is not leap year
        $this->assertEquals(false, Datium::create(2013, 1, 1, 0, 0, 0)->leap()->get());

        // 2014 is not leap year
        $this->assertEquals(false, Datium::create(2014, 1, 1, 0, 0, 0)->leap()->get());

        // 2015 is not leap year
        $this->assertEquals(false, Datium::create(2015, 1, 1, 0, 0, 0)->leap()->get());

        // 2015 is a leap year
        $this->assertEquals(true, Datium::create(2016, 1, 1, 0, 0, 0)->leap()->get());

        // 1395 is a leap year
        $this->assertEquals(true, Datium::create(2016, 6, 13, 0, 0, 0)->to('jalali')->leap()->get());
        //
        // // 1396 is not a leap year
        $this->assertEquals(false, Datium::create(2017, 3, 21, 0, 0, 0)->to('jalali')->leap()->get());
        //
        // // 1397 is not a leap year
        $this->assertEquals(false, Datium::create(2018, 3, 21, 0, 0, 0)->to('jalali')->leap()->get());
        //
        // // 1398 is not a leap year
        $this->assertEquals(false, Datium::create(2019, 3, 21, 0, 0, 0)->to('jalali')->leap()->get());
        //
        // // 1399 is a leap year
        $this->assertEquals(true, Datium::create(2020, 3, 20, 0, 0, 0)->to('jalali')->leap()->get());

    }
}
