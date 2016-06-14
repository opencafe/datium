<?php

namespace OpenCafe\Tools;

use OpenCafe\Tools\Lang;

class TimeAgo {

  private $language;

  public function __construct( $timestamp, $lang ) {

    $this->language = $lang;

    $time_ago = strtotime($timestamp->format('Y-m-d H:i:s'));

    $cur_time   = time();

    $time_elapsed   = $cur_time - strtotime($timestamp->format('Y-m-d H:i:s'));

    $this->second    = $time_elapsed ;

    $this->minute    = round($time_elapsed / 60 );

    $this->quarter = round($time_elapsed / 900 );

    $this->half = round($time_elapsed / 1800 );

    $this->hour     = round($time_elapsed / 3600);

    $this->day     = round($time_elapsed / 86400 );

    $this->week     = round($time_elapsed / 604800);

    $this->month     = round($time_elapsed / 2600640 );

    $this->year     = round($time_elapsed / 31207680 );

  }

  public function get() {

    // Seconds
    if($this->second <= 60) {
        return Lang::get($this->language, "just-now" );
    }
    //Minutes
    else if($this->minute <=60){
        if($this->minute==1){
            return Lang::get($this->language, 'one-minute') . " " .
              Lang::get($this->language, 'ago');
        }
        else{
            return "$this->minute " . Lang::get($this->language, 'minutes')
              . " " .
              Lang::get($this->language, 'ago');
        }
    }
    //Hours
    else if($this->hour <=24){
        if($this->hour==1){
          return Lang::get($this->language, 'an-hour') . " " .
            Lang::get($this->language, 'ago');
        }else{
          return "$this->hour " . Lang::get($this->language, 'hours')
            . " " .
            Lang::get($this->language, 'ago');
        }
    }
    //Days
    else if($this->day <= 7){
        if($this->day==1){
          return Lang::get($this->language, 'yesterday');
        }else{
          return "$this->day " . Lang::get($this->language, 'days')
            . " " .
            Lang::get($this->language, 'ago');
        }
    }
    //Weeks
    else if($this->week <= 4.3){
        if($this->week==1){
          return Lang::get($this->language, 'a-week') . " " .
            Lang::get($this->language, 'ago');
        }else{
          return "$this->week " . Lang::get($this->language, 'weeks')
            . " " .
            Lang::get($this->language, 'ago');
        }
    }
    //Months
    else if($this->month <=12){
        if($this->month==1){
          return Lang::get($this->language, 'a-month') . " " .
            Lang::get($this->language, 'ago');
        }else{
          return "$this->month " . Lang::get($this->language, 'months')
            . " " .
            Lang::get($this->language, 'ago');
        }
    }
    //Years
    else{
        if($this->year==1){
          return Lang::get($this->language, 'one-year') . " " .
            Lang::get($this->language, 'ago');
        }else{
          return "$this->year " . Lang::get($this->language, 'years')
            . " " .
            Lang::get($this->language, 'ago');
        }
    }

  }

}
