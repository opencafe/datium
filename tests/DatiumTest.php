<?php

use OpenCafe\Datium as Datium;

class DatiumTest extends PHPUnit_Framework_TestCase
{

    public function testCreateDateTime()
    {

        date_default_timezone_set('Asia/Tehran');

        $current_date_time = new DateTime();

        $current_date_time->setDate(2015, 1, 1);

        $current_date_time->setTime(0, 0, 0);

        $this->assertEquals($current_date_time->format('Y-m-d H:i:s'), Datium::create(2015, 1, 1)->get());

    }

    public function testDateDifference()
    {

        $diff = Datium::diff(Datium::now()->object(), Datium::now()->add('5 day')->object());

        $this->assertEquals(5, $diff->days);

        $diff = Datium::diff(Datium::now()->object(), Datium::now()->add('100 day')->object());

        $this->assertEquals(100, $diff->days);

        $diff = Datium::diff(Datium::now()->object(), Datium::now()->add('5000 day')->object());

        $this->assertEquals(5000, $diff->days);

    }

    public function testJalaliCalendar()
    {

        $jalali =  Datium::create(2016, 6, 25, 12, 0, 0)->to('jalali')->get('l jS F Y h:i:s A');

        $this->assertEquals('Shanbe 5th Tir 1395 12:00:00 PM', $jalali);

        $jalali =  Datium::create(2016, 6, 25, 12, 0, 0)->to('jalali')->lang('fa')->get('l jS F Y h:i:s A');

        $this->assertEquals('شنبه ۵ تیر ۱۳۹۵ ۱۲:۰۰:۰۰ ب.ظ', $jalali);

    }

    public function testHijriCalendar()
    {

        $hijri =  Datium::create(2016, 6, 25, 12, 0, 0)->to('hijri')->get('l jS F Y h:i:s A');

        $this->assertEquals('as-Sabt 19th Ramadan 1437 12:00:00 PM', $hijri);

    }

    public function testGregorianCalendar()
    {

        $gregorian =  Datium::create(2016, 6, 25, 12, 0, 0)->get('l jS F Y h:i:s A');

        $this->assertEquals('Saturday 25th June 2016 12:00:00 PM', $gregorian);

    }
}
