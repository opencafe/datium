<?php

namespace OpenCafe\Datium\Test;

use OpenCafe\Datium as Datium;

class SimpleDiffTest extends \PHPUnit_Framework_TestCase
{

    public function testSimpleDiff()
    {

        $this->assertEquals(
            'just now',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('1 second')->object()
            )->simple->get()
        );

        $this->assertEquals(
            'just now',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('1 second')->object()
            )->simple->get()
        );

        $this->assertEquals(
            '59 seconds ago',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('59 second')->object()
            )->simple->get()
        );

        $this->assertEquals(
            '59 seconds remaining',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('59 second')->object()
            )->simple->get()
        );

        $this->assertEquals(
            'one minute ago',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('1 minute')->object()
            )->simple->get()
        );

        $this->assertEquals(
            'one minute remaining',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('1 minute')->object()
            )->simple->get()
        );

        $this->assertEquals(
            'one minute ago',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('1 minute')->add('1 second')->object()
            )->simple->get()
        );

        $this->assertEquals(
            'one minute remaining',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('1 minute')->sub('1 second')->object()
            )->simple->get()
        );

        $this->assertEquals(
            '59 minutes ago',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('59 minute')->add('1 second')->object()
            )->simple->get()
        );

        $this->assertEquals(
            '59 minutes remaining',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('59 minute')->sub('1 second')->object()
            )->simple->get()
        );

        $this->assertEquals(
            '59 minutes ago',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('59 minute')->add('1 second')->object()
            )->simple->get()
        );

        $this->assertEquals(
            '59 minutes remaining',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('59 minute')->sub('1 second')->object()
            )->simple->get()
        );

        $this->assertEquals(
            'an hour ago',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('1 hour')->add('1 minute')->object()
            )->simple->get()
        );

        $this->assertEquals(
            'an hour remaining',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('1 hour')->sub('1 minute')->object()
            )->simple->get()
        );

        $this->assertEquals(
            '10 hours ago',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('10 hour')->object()
            )->simple->get()
        );

        $this->assertEquals(
            '10 hours remaining',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('10 hour')->object()
            )->simple->get()
        );

        $this->assertEquals(
            'one day ago',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('1 day')->object()
            )->simple->get()
        );

        $this->assertEquals(
            'one day remaining',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('1 day')->object()
            )->simple->get()
        );

        $this->assertEquals(
            '3 days ago',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('3 day')->object()
            )->simple->get()
        );

        $this->assertEquals(
            '3 days remaining',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('3 day')->object()
            )->simple->get()
        );

        $this->assertEquals(
            'a month ago',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('1 month')->object()
            )->simple->get()
        );

        $this->assertEquals(
            'a month remaining',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('1 month')->object()
            )->simple->get()
        );

        $this->assertEquals(
            '2 months ago',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('2 month')->add('1 day')->object()
            )->simple->get()
        );

        $this->assertEquals(
            '2 months remaining',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('2 month')->sub('1 day')->object()
            )->simple->get()
        );

        $this->assertEquals(
            'one year ago',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('1 month')->add('1 year')->object()
            )->simple->get()
        );

        $this->assertEquals(
            'one year remaining',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('1 month')->sub('1 year')->object()
            )->simple->get()
        );

        $this->assertEquals(
            '2 years ago',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->add('1 month')->add('2 year')->object()
            )->simple->get()
        );

        $this->assertEquals(
            '2 years remaining',
            Datium::diff(
              Datium::now()->object(),
              Datium::now()->sub('1 month')->sub('2 year')->object()
            )->simple->get()
        );

    }
}
