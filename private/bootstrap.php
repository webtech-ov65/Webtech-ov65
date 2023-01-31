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

// Database
$db = new mysqli('localhost', 'root', '', 'openagenda');

if ($db->connect_errno)
{
    echo 'Failed to connect to MySQL: ' . $db->connect_error;
    exit;
}

// Functions
require_once('functions.php');

// Classes
require_once('classes/calendarmanager.php');
require_once('classes/groupmanager.php');
require_once('classes/usermanager.php');

$calendarManager = new CalendarManager($db);
$groupManager = new GroupManager($db);
$userManager = new UserManager($db);
