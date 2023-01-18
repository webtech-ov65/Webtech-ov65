<?php
// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Sessions
session_start();

// Configuration
$app = [
    'calendar_constant' => CAL_GREGORIAN,
    'name' => 'Open Agenda'
];

// Classes
require_once('classes/usermanager.php');

// Functions
function clean_input($input)
{
    $input = trim($input);
    $input = htmlspecialchars($input);
    
    return $input;
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
 