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
require_once('functions.php');
