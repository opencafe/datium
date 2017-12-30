<?php

namespace OpenCafe\Datium\Test;

use OpenCafe\Datium as Datium;

class SimpleDiffFaLangTest extends \PHPUnit_Framework_TestCase
{

    public function testSimpleDiff()
    {

        $this->assertEquals(
            'همین حالا',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('1 second')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            'همین حالا',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('1 second')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            '۵۹ ثانیه پیش',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('59 second')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            '۵۹ ثانیه باقی مانده',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('59 second')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            'یک دقیقه پیش',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('1 minute')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            'یک دقیقه باقی مانده',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('1 minute')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            'یک دقیقه پیش',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('1 minute')->add('1 second')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            'یک دقیقه باقی مانده',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('1 minute')->sub('1 second')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            '۵۹ دقیقه پیش',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('59 minute')->add('1 second')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            '۵۹ دقیقه باقی مانده',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('59 minute')->sub('1 second')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            '۵۹ دقیقه پیش',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('59 minute')->add('1 second')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            '۵۹ دقیقه باقی مانده',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('59 minute')->sub('1 second')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            'یک ساعت پیش',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('1 hour')->add('1 minute')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            'یک ساعت باقی مانده',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('1 hour')->sub('1 minute')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            '۱۰ ساعت پیش',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('10 hour')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            '۱۰ ساعت باقی مانده',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('10 hour')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            'یک روز پیش',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('1 day')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            'یک روز باقی مانده',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('1 day')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            '۳ روز پیش',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('3 day')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            '۳ روز باقی مانده',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('3 day')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            'یک ماه پیش',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('1 month')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            'یک ماه باقی مانده',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('1 month')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            '۲ ماه پیش',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('2 month')->add('1 day')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            '۲ ماه باقی مانده',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('2 month')->sub('1 day')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            'یک سال پیش',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('1 month')->add('1 year')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            'یک سال باقی مانده',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('1 month')->sub('1 year')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            '۲ سال پیش',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('1 month')->add('2 year')->object()
            )->simple->lang('fa')->get()
        );

        $this->assertEquals(
            '۲ سال باقی مانده',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('1 month')->sub('2 year')->object()
            )->simple->lang('fa')->get()
        );
    }
}
