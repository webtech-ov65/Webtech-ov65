<?php
function clean_input($input)
{
    $input = trim($input);
    $input = htmlspecialchars($input);
    
    return $input;
}

function get_days_range()
{
    return ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
}

function get_hours_range($start = 0, $end = 86400, $step = 3600, $format = 'H:i')
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
