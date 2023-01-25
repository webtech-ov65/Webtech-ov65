<?php
function clean_input($input)
{
    $input = trim($input);
    $input = htmlspecialchars($input);
    
    return $input;
}

// Function guid() was created by the phunction PHP framework (https://sourceforge.net/projects/phunction/)
function guid()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
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
