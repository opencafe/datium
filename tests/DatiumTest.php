<?php

namespace OpenCafe\Datium\Test;

use OpenCafe\Datium;
use DateTime;

class DatiumTest extends \PHPUnit_Framework_TestCase
{

    public function testCreateDateTime()
    {

        date_default_timezone_set('Asia/Tehran');

        $current_date_time = new DateTime();

        $current_date_time->setDate(2015, 1, 1);

        $current_date_time->setTime(0, 0, 0);

        $this->assertEquals(
            $current_date_time->format('Y-m-d H:i:s'),
            Datium::create(2015, 1, 1)->get()
        );

        $this->assertEquals(
            '1420057800',
            Datium::create(2015, 1, 1)->timestamp()
        );

        $this->assertEquals(
            '1420057800',
            Datium::create(2015, 1, 1)->get('timestamp')
        );

        $this->assertEquals(
            '2015-01-01 00:00:00',
            Datium::createTimestamp( 1420057800 )->get()
        );


    }

    public function testAddDateTime()
    {

        $this->assertEquals(
            '2016-01-01 00:00:00',
            Datium::create(2016, 1, 1, 0, 0, 0)->get()
        );

        $this->assertEquals(
            '2016-01-01 01:00:00',
            Datium::create(2016, 1, 1, 0, 0, 0)->add('1 hour')->get()
        );

        $this->assertEquals(
            '2016-01-02 01:00:00',
            Datium::create(2016, 1, 1, 0, 0, 0)->add('25 hour')->get()
        );

        $this->assertEquals(
            '2016-01-01 00:01:00',
            Datium::create(2016, 1, 1, 0, 0, 0)->add('1 minute')->get()
        );

        $this->assertEquals(
            '2016-01-01 01:01:00',
            Datium::create(2016, 1, 1, 0, 0, 0)->add('61 minute')->get()
        );

        $this->assertEquals(
            '2016-01-01 00:00:01',
            Datium::create(2016, 1, 1, 0, 0, 0)->add('1 second')->get()
        );

        $this->assertEquals(
            '2016-01-01 00:01:01',
            Datium::create(2016, 1, 1, 0, 0, 0)->add('61 second')->get()
        );

        $this->assertEquals(
            '2016-01-02 00:00:00',
            Datium::create(2016, 1, 1, 0, 0, 0)->add('1 day')->get()
        );

        $this->assertEquals(
            '2016-01-11 00:00:00',
            Datium::create(2016, 1, 1, 0, 0, 0)->add('10 day')->get()
        );

        $this->assertEquals(
            '2016-01-08 00:00:00',
            Datium::create(2016, 1, 1, 0, 0, 0)->add('1 week')->get()
        );

        $this->assertEquals(
            '2016-01-29 00:00:00',
            Datium::create(2016, 1, 1, 0, 0, 0)->add('4 week')->get()
        );

        $this->assertEquals(
            '2016-02-01 00:00:00',
            Datium::create(2016, 1, 1, 0, 0, 0)->add('1 month')->get()
        );

        $this->assertEquals(
            '2016-11-01 00:00:00',
            Datium::create(2016, 1, 1, 0, 0, 0)->add('10 month')->get()
        );

        $this->assertEquals(
            '2017-01-01 00:00:00',
            Datium::create(2016, 1, 1, 0, 0, 0)->add('1 year')->get()
        );

        $this->assertEquals(
            '2116-01-01 00:00:00',
            Datium::create(2016, 1, 1, 0, 0, 0)->add('100 year')->get()
        );

    }

    public function testSubDateTime()
    {

        $this->assertEquals(
            '2016-01-01 00:00:00',
            Datium::create(2016, 1, 1, 1, 0, 0)->sub('1 hour')->get()
        );

        $this->assertEquals(
            '2016-01-01 00:00:00',
            Datium::create(2016, 1, 2, 1, 0, 0)->sub('25 hour')->get()
        );

        $this->assertEquals(
            '2016-01-01 00:00:00',
            Datium::create(2016, 1, 1, 0, 1, 0)->sub('1 minute')->get()
        );

        $this->assertEquals(
            '2016-01-01 00:00:00',
            Datium::create(2016, 1, 1, 1, 1, 0)->sub('61 minute')->get()
        );

        $this->assertEquals(
            '2016-01-01 00:00:00',
            Datium::create(2016, 1, 1, 0, 0, 1)->sub('1 second')->get()
        );

        $this->assertEquals(
            '2016-01-01 00:00:00',
            Datium::create(2016, 1, 1, 0, 1, 1)->sub('61 second')->get()
        );

        $this->assertEquals(
            '2016-01-01 00:00:00',
            Datium::create(2016, 1, 1, 0, 0, 0)->get()
        );

        $this->assertEquals(
            '2016-01-01 00:00:00',
            Datium::create(2016, 1, 2, 0, 0, 0)->sub('1 day')->get()
        );

        $this->assertEquals(
            '2016-01-01 00:00:00',
            Datium::create(2016, 1, 11, 0, 0, 0)->sub('10 day')->get()
        );

        $this->assertEquals(
            '2016-01-01 00:00:00',
            Datium::create(2016, 1, 8, 0, 0, 0)->sub('1 week')->get()
        );

        $this->assertEquals(
            '2016-01-01 00:00:00',
            Datium::create(2016, 1, 15, 0, 0, 0)->sub('2 week')->get()
        );

        $this->assertEquals(
            '2016-01-01 00:00:00',
            Datium::create(2016, 2, 1, 0, 0, 0)->sub('1 month')->get()
        );

        $this->assertEquals(
            '2016-01-01 00:00:00',
            Datium::create(2016, 11, 1, 0, 0, 0)->sub('10 month')->get()
        );

        $this->assertEquals(
            '2016-01-01 00:00:00',
            Datium::create(2017, 1, 1, 0, 0, 0)->sub('1 year')->get()
        );

        $this->assertEquals(
            '2016-01-01 00:00:00',
            Datium::create(2116, 1, 1, 0, 0, 0)->sub('100 year')->get()
        );

    }

    public function testDateDifference()
    {

        $diff = Datium::diff(
            Datium::now()->object(),
            Datium::now()->add('5 day')->object()
        );

        $this->assertEquals(5, $diff->days);

        $diff = Datium::diff(
            Datium::now()->object(),
            Datium::now()->add('100 day')->object()
        );

        $this->assertEquals(100, $diff->days);

        $diff = Datium::diff(
            Datium::now()->object(),
            Datium::now()->add('5000 day')->object()
        );

        $this->assertEquals(5000, $diff->days);

        $diff = Datium::diff(
            Datium::now()->object(),
            Datium::now()->add('1 week')->object()
        );

        $this->assertEquals(7, $diff->days);

    }

    public function testJalaliCalendar()
    {

        $jalali =  Datium::create(2016, 6, 25, 12, 0, 0)
                           ->to('jalali')
                           ->get('l jS F Y h:i:s A');

        $this->assertEquals('Shanbe 5th Tir 1395 12:00:00 PM', $jalali);

        $jalali =  Datium::create(2016, 6, 25, 12, 0, 0)
                           ->to('jalali')
                           ->lang('fa')
                           ->get('l jS F Y h:i:s A');

        $this->assertEquals('شنبه ۵ تیر ۱۳۹۵ ۱۲:۰۰:۰۰ ب.ظ', $jalali);

    }

    public function testHijriCalendar()
    {

        $hijri =  Datium::create(2016, 6, 25, 12, 0, 0)
                          ->to('hijri')
                          ->get('l jS F Y h:i:s A');

        $this->assertEquals('as-Sabt 19th Ramadan 1437 12:00:00 PM', $hijri);

        $hijri =  Datium::create(2016, 6, 25, 12, 0, 0)
                          ->to('hijri')
                          ->get('l jS F Y h:i:s A');

        $this->assertEquals('as-Sabt 19th Ramadan 1437 12:00:00 PM', $hijri);

    }

    public function testGregorianCalendar()
    {

        $gregorian =  Datium::create(2016, 6, 25, 12, 0, 0)
                              ->get('l jS F Y h:i:s A');

        $this->assertEquals('Saturday 25th June 2016 12:00:00 PM', $gregorian);

    }

    public function testJalaliSubDateTime()
    {
        $jalali = Datium::create(2017, 9, 1, 12, 0, 0)->sub('1 day')->to('jalali')
                        ->get('l jS F Y h:i:s');

        $this->assertEquals("Panjshanbe 9th Shahrivar 1396 12:00:00", $jalali);
    }

    public function testJalaliAddDateTime()
    {
        $jalali = Datium::create(2017, 9, 1, 12, 0, 0)->add('1 day')->to('jalali')
                        ->get('l jS F Y h:i:s');

        $this->assertEquals("Shanbe 11th Shahrivar 1396 12:00:00", $jalali);
    }

    public function testKurdishCalendar()
    {

        $kurdish =  Datium::create(2016, 6, 25, 12, 0, 0)
                              ->to('kurdish')
                              ->get('l jS F Y h:i:s A');

        $this->assertEquals('Şeme 5th Puşper 2716 12:00:00 PM', $kurdish);

    }
}
