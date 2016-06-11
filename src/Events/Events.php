<?php namespace Datium;

use Datium\Tools\Convert;
use Datium\Tools\DayOf;
use DateTime;
use DateInterval;
use DatePeriod;

class Events
{

    private $local;

    private $events;

    private $date_time;

    private $convert;

    private $result;

    private $period;

    private $interval;

    private static $date_start;

    private static $date_end;

    public function __construct($date_time, $date_end = null)
    {

        if ($date_end !== null) {
            Events::$date_start = $date_time;

            Events::$date_end = $date_end;
        } else {
            Events::$date_start = $date_time;
        }

        $this->convert = new Convert;

        $this->date_time = new DateTime();

        return $this;

    }

    /************************************************************
    * Fetch Events array from own array file
    ************************************************************
    *
    * @since Oct 25, 2015
    *
    *\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/
    */
    private function fetch($path)
    {

        $this->events = include $path;

        $this->interval = DateInterval::createFromDateString('1 day');

        $this->period = new DatePeriod(Events::$date_start, $this->interval, Events::$date_end);

        foreach ($this->period as $dt) {
            if (isset($this->events[ 'events' ][ intval($dt->format('m')) ][ intval($dt->format('d')) ])) {
                $this->result[ $dt->format('Y-m-d') ][] = $this->events[ 'events' ][ intval($dt->format('m')) ][ intval($dt->format('d')) ];
            }
        }

    }

    /************************************************************
    * Return Array of Events
    ************************************************************
    *
    * @since Oct 18, 2015
    * @return array
    *
    *\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\
    */
    public function get()
    {

        if (! empty($this->result)) {
            foreach ($this->result as $key => $day) {
                if (! ( $key > Events::$date_start->format('Y-m-d') && $key < Events::$date_end->format('Y-m-d') )) {
                    unset($this->result[ $key ]);
                }
            }
        } else {
            $this->result = array();
        }

        return $this->result;

    }

    /************************************************************
    * Return local events - with day start and end as an array
    ************************************************************
    *
    * @since Oct 10, 2015
    * @param string $country_code
    *
    *\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\
    */
    public function local($country_code = "ir")
    {

        /*
         * Capitalize the first character of $country_code according the file
         * structure.
         */
        $country_code = strtolower($country_code = 'ir');

        $this->local = include 'Localization/' . $country_code . '.php';

        foreach ($this->local[ 'events' ] as $month => $events) {
            foreach ($events as $day => $event) {
                $this->date_time = new DateTime();

                $this->date_time->setDate(Events::$date_start->format('Y'), $month, $day);

                switch ($this->local[ 'default_calendar' ]) {
                    case 'jalali':
                        $this->date_time->setDate(1394, $month, $day);

                        $this->date_time = Datium::create($this->date_time)->from('jalali')->to('gregorian')->object(); //$this->convert->jalaliToGregorian( $this->date_time );

                        break;

                    case 'hijri':
                        $this->date_time = Datium::create($this->date_time)->from('hijri')->to('gregorian')->object(); // $this->convert->hijriToGregorian( $this->date_time );

                        break;
                }

                $this->result[ $this->date_time->format('Y-m-d') ][] =  $event;
            }
        }

        ksort($this->result);

        return $this;

    }

    public function weekend()
    {

        return 0;

    }

    public function relagious()
    {

        return 0;

    }

    public function international()
    {

        $this->fetch('Global/global.php');

        return $this;

    }
}
