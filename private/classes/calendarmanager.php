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
    
    public function get_week_number()
    {
        return intval(date('W'));
    }
}
