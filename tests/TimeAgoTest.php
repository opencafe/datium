<?php

use OpenCafe\Datium as Datium;

class TimeAgoTest extends PHPUnit_Framework_TestCase
{

    public function testTimeAgo()
    {

      $this->assertEquals(
         'just now',
         Datium::now()->sub('1 second')->ago()
      );

      $this->assertEquals(
         'just now',
         Datium::now()->sub('59 second')->ago()
      );

      $this->assertEquals(
        'just now',
        Datium::now()->sub('1 minute')->ago()
      );

      $this->assertEquals(
        'one minute ago',
        Datium::now()->sub('1 minute')->sub('1 second')->ago()
      );

      $this->assertEquals(
        '59 minutes ago',
        Datium::now()->sub('59 minute')->sub('1 second')->ago()
      );

      $this->assertEquals(
        '59 minutes ago',
        Datium::now()->sub('59 minute')->sub('1 second')->ago()
      );

      $this->assertEquals(
        'an hour ago',
        Datium::now()->sub('1 hour')->sub('1 minute')->ago()
      );

      $this->assertEquals(
        '10 hours ago',
        Datium::now()->sub('10 hour')->ago()
      );

      $this->assertEquals(
        'yesterday',
        Datium::now()->sub('1 day')->sub('1 hour')->ago()
      );

      $this->assertEquals(
        '3 days ago',
        Datium::now()->sub('3 day')->ago()
      );

      $this->assertEquals(
        'a month ago',
        Datium::now()->sub('1 month')->sub('1 day')->ago()
      );

      $this->assertEquals(
        '2 months ago',
        Datium::now()->sub('2 month')->sub('1 day')->ago()
      );

      $this->assertEquals(
        'one year ago',
        Datium::now()->sub('1 month')->sub('1 year')->ago()
      );

      $this->assertEquals(
        '2 years ago',
        Datium::now()->sub('1 month')->sub('2 year')->ago()
      );

    }
}
