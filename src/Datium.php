<?php
/**
 * Main Datium class
 *
 * @category Core
 * @package  OpenCafe\Datium
 * @author   Mehdi Hosseini <mehdi.hosseini.dev@gmail.com>
 * @license  License https://opensource.org/licenses/MIT
 * @link     https://github.com/opencafe/datium
 * @since    Aug 17, 2015
 */

namespace OpenCafe;

use DateTime;
use DateInterval;
use OpenCafe\Tools\Convert;
use OpenCafe\Tools\Leap;
use OpenCafe\Tools\DayOf;
use OpenCafe\Tools\Lang;
use OpenCafe\Tools\SimpleDiff;

/**
 * Main Datium class
 *
 * @category Core
 * @package  OpenCafe\Datium
 * @author   Mehdi Hosseini <mehdi.hosseini.dev@gmail.com>
 * @license  icense https://opensource.org/licenses/MIT
 * @link     https://github.com/opencafe/datium
 * @since    Aug 17, 2015
 */
class Datium
{

    /**
     * Store DateTime object
     */
    protected $date_time;

    protected static $static_date_time;

    /**
     * Store config file statements
     *
     * @param array
     */
    protected $config;

    protected $date_interval_expression;

    protected static $date_start;

    protected static $date_end;

    protected $translate_from;

    protected $translate_to;

    protected $toConfig;

    protected $fromConfig;

    /**
     * Return store day number
     *
     * @param integer
     */
    protected $day_of;

    protected $leap;

    protected $events;

    protected $translate;

    protected $gregorian_DayofWeek;

    protected $convert_calendar;

    protected $calendar_type;

    protected static $array_date;

    protected static $call_type;

    protected $translate_from_file;

    protected $translate_to_file;

    protected $language;

    protected static $timestamp;

    /**
     * SimpleDiff
     *
     * @param integer
     */
    protected $simpleDiff;

    /**
     * Datium class constructure
     */
    public function __construct()
    {

        $this->language = 'en';

        $this->translate_from = 'gregorian';

        $this->translate_to = 'gregorian';
        $this->setConfig();

        $this->calendar_type = $this->config['default_calendar'];

        $this->calendar_type = 'gregorian';

        switch (Datium::$call_type) {


            case 'create-timestamp':

                $this->date_time = new DateTime();

                $this->date_time->setTimestamp(self::$timestamp);

                break;

            case 'now':

                $this->date_time = new DateTime('now');

                break;

            case 'make':

                $this->date_time = new DateTime('now');

                $this->date_time->setDate(
                    self::$array_date['year'],
                    self::$array_date['month'],
                    self::$array_date['day']
                );

                $this->date_time->setTime(
                    self::$array_date['hour'],
                    self::$array_date['minute'],
                    self::$array_date['second']
                );

                break;

            case 'set':

                $this->date_time = Datium::$static_date_time;

        }

        $this->gregorian_DayofWeek = $this->date_time->format('w');

        $this->convert_calendar = new Convert();
    }

    /**
     * Return all datetime parts as an object
     *
     * @return object
     */
    public function all()
    {

        return ( object )array(

            'second' => $this->date_time->format('s'),

            'minute' => $this->date_time->format('m'),

            'hour' => $this->date_time->format('H'),

            'day' => $this->date_time->format('d'),

            'month' => $this->date_time->format('m'),

            'year' => $this->date_time->format('Y')

        );

    }

    /**
     * Get current datetime
     *
     * @since  Aug 17 2015
     * @return object
     */
    public static function now()
    {

        self::$call_type = 'now';

        return new Datium();

    }

    /**
     * Set config
     *
     * @since June 28 2016
     *
     * @param array $config
     *
     * @return $this
     */
    public function setConfig($config = [])
    {
        $defaults     = include(__DIR__.'/Config.php');
        $this->config = array_merge($defaults, $config);
        date_default_timezone_set($this->config['timezone']);

        return $this;
    }

    /**
     * Create new date time
     *
     * @param integer $year   Year number
     * @param integer $month  month number
     * @param integer $day    day number
     * @param integer $hour   hour number
     * @param integer $minute minute number
     * @param integer $second second number
     *
     * @return object
     */
    public static function create(
        $year = 2000,
        $month = 1,
        $day = 1,
        $hour = 0,
        $minute = 0,
        $second = 0
    ) {

        /**
         * When we want to set a Datetime object to Datium
         */
        if (func_num_args() === 1) {
            self::$static_date_time = func_get_arg(0);

            self::$call_type = 'set';
        } else {
            self::$array_date = array(
                'year'   => $year,
                'month'  => $month,
                'day'    => $day,
                'hour'   => $hour,
                'minute' => $minute,
                'second' => $second
            );

            self::$call_type = 'make';
        }

        return new Datium();

    }

    /**
     * Accept Timestamp as Datium initializion
     *
     * @param  timestamp $timestamp Input timestamp value
     *
     * @return object
     */
    public static function createTimestamp($timestamp)
    {

        if ($timestamp != null && is_int($timestamp)) {

            self::$call_type = 'create-timestamp';

            self::$timestamp = $timestamp;

            return new Datium();

        } else {

            throw new \Exception("Error timestamp is not entered in true format", 1);

        }


    }

    /**
     * Select The range between two date object
     *
     * @param object $date_start Start of the DateTime
     * @param object $date_end   End of the DateTime
     *
     * @return object
     */
    public static function between($date_start, $date_end)
    {

        self::$date_start = $date_start;

        self::$date_end = $date_end;

        self::$call_type = 'between';

        return new Datium();

    }

    /**
     * Convert from current calendar, what type is current calendar?
     *
     * @param object $calendar Assigned calendar to start from
     *
     * @return $object
     */
    public function from($calendar)
    {

        $this->convert = new Convert($this->date_time);

        $this->date_time = $this->convert->from($calendar);


        /**
         * We need this part for DayOf class
         */
        $this->calendar_type = $calendar;

        $this->translate_to = $calendar;

        return $this;

    }

    /**
     * Convert date to current Date
     *
     * @param object $calendar Assigned calendar to when calendar should start.
     *
     * @return object
     */
    public function to($calendar)
    {

        $this->convert = new Convert($this->date_time);

        $this->date_time = $this->convert->to($calendar);

        /**
         * We need this part for DayOf class
         */
        $this->calendar_type = $calendar;

        $this->translate_to = $calendar;

        return $this;

    }

    /**
     * Difference between two time
     *
     * @param DateTime $start Start of the date
     * @param DateTime $end   End of the date
     *
     * @return object
     */
    public static function diff($start, $end)
    {

        $difference = date_diff($start, $end);

        $difference->second = $difference->s;

        $difference->minute = $difference->i;

        $difference->hour = $difference->h;

        $difference->day = $difference->d;

        $difference->month = $difference->m;

        $difference->year = $difference->y;

        $difference->simple = ( new SimpleDiff( $start, $end, $difference ) );

        return $difference;

    }

    /**
     * Add new date value to current date
     *
     * @param string $value How much date should be added to current date
     *
     * @return object
     */
    public function add($value)
    {

        $this->date_interval_expression = str_replace(
            $this->config['date_simple'],
            $this->config['date_interval'],
            $value
        );

        $unit = 'P';

        if (strpos($this->date_interval_expression, 'T')) {
            $this->date_interval_expression = str_replace(
                'T',
                '',
                $this->date_interval_expression
            );

            $unit = 'PT';
        }

        $this->date_interval_expression = str_replace(
            ' ',
            '',
            $unit.$this->date_interval_expression
        );

        $this->date_time->add(
            new DateInterval($this->date_interval_expression)
        );

        return $this;

    }

    /**
     * Sub date from current date
     *
     * @param string $value How much date should increase from current date
     *
     * @return obejct
     */
    public function sub($value)
    {

        $this->date_interval_expression = str_replace(
            $this->config['date_simple'],
            $this->config['date_interval'],
            $value
        );

        $unit = 'P';

        if (strpos($this->date_interval_expression, 'T')) {
            $this->date_interval_expression = str_replace(
                'T',
                '',
                $this->date_interval_expression
            );

            $unit = 'PT';
        }

        $this->date_interval_expression = str_replace(
            ' ',
            '',
            $unit.$this->date_interval_expression
        );

        $this->date_time->sub(
            new DateInterval($this->date_interval_expression)
        );

        $this->gregorian_DayofWeek = $this->date_time->format('w');
        
        return $this;

    }

    /**
     * Check if current year is leap or not
     *
     * @param string $type Name of the calendar to caculate leap year
     *
     * @return boolean
     */
    public function leap()
    {

        $this->leap = new Leap($this->date_time->format('Y'), $this->calendar_type);

        return $this->leap;

    }

    /**
     * Caculate day of year or week
     *
     * @since Aug, 22 2015
     *
     * @return integer
     */
    public function dayOf()
    {

        $this->day_of = new DayOf($this->date_time, $this->calendar_type);

        return $this->day_of;

    }

    // public function events()
    // {
    //
    //     if (Datium::$call_type == 'between' ) {
    //
    //         $this->events = new Events(Datium::$date_start, Datium::$date_end);
    //
    //     } else {
    //
    //         $this->events = new Events($this->date_time);
    //
    //     }
    //
    //     return $this->events;
    //
    // }

    /**
     * Return Datetime as a original object
     *
     * @since Oct 22, 2015
     *
     * @return object
     */
    public function object()
    {

        return $this->date_time;

    }

    /**
     * Translate current date string to selected language
     *
     * @param string $language language short name fa, en, ar ...
     *
     * @return object
     */
    public function lang($language = 'fa')
    {

        $this->language = $language;

        $this->result = new Lang();

        $this->result->setConfig($this->language);

        $this->toConfig = $this->result->getConfig();

        return $this;

    }

    /**
     * Return object as timestamp
     *
     * @return timestamp
     */
    public function timestamp()
    {

        return strtotime($this->date_time->format('Y-m-d H:i:s'));

    }

    /**
     * Return fainal result
     *
     * @param string $format Date format
     *
     * @since Aug 17 2015
     *
     * @return string
     */
    public function get($format = 'Y-m-d H:i:s')
    {

        if ($format === 'timestamp') {

          return $this->timestamp();

        }

        if (is_null($this->fromConfig)) {
            $this->fromConfig = include __DIR__.'/CalendarSettings/'.
                                        ucfirst($this->translate_from).'.php';
        }


        if (is_null($this->toConfig)) {
            $this->toConfig = include __DIR__.'/CalendarSettings/'.
                                      ucfirst($this->translate_to).'.php';
        }

        $string_date = $this->date_time->format($format);

        if ($this->translate_to != 'gregorian') {
            $string_date = str_replace(
                $this->fromConfig['month'],
                $this->toConfig['month'],
                $string_date
            );

            $string_date = str_replace(
                $this->fromConfig['days_of_week'],
                $this->toConfig['days_of_week'][$this->gregorian_DayofWeek],
                $string_date
            );

            $string_date = str_replace(
                $this->fromConfig['numbers'],
                $this->toConfig['numbers'],
                $string_date
            );

            $string_date = str_replace(
                $this->fromConfig['am_time'],
                $this->toConfig['am_time'],
                $string_date
            );

            $string_date = str_replace(
                $this->fromConfig['pm_time'],
                $this->toConfig['pm_time'],
                $string_date
            );

            $string_date = str_replace(
                $this->fromConfig['end_of_days'],
                $this->toConfig['end_of_days'],
                $string_date
            );
        }

        return $string_date;

    }
}
