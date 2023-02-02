<?php
final class CalendarManager
{
    private $db;
    
    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function get_days_range()
    {
        return ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
    }

    public function get_hours_range($start = 0, $end = 86400, $step = 3600, $format = 'H:i')
    {
        $times = [];
        
        foreach (range($start, $end, $step) as $timestamp)
        {
            $hour_mins = gmdate('H:i', $timestamp);
            
            if (!empty($format))
                $times[$hour_mins] = gmdate($format, $timestamp);
            else
                $times[$hour_mins] = $hour_mins;
        }
        
        return $times;
    }
    
    public function get_week_number($year = null, $month = null, $day = null)
    {
        if (isset($year) && isset($month) && isset($day))
        {
            $year = min(max((int)$year, 1950), 2100);
            $month = min(max((int)$month, 1), 12);
            $day = min(max((int)$day, 1), 31);
            
            $date = new DateTime($year . '-' . $month . '-' . $day);
            return intval($date->format('W'));
        }
        else
        {
            return intval(date('W'));
        }
    }
}
