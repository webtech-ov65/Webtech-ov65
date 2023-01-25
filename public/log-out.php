<?php
$page = [
    'title' => 'Log out'
];

require_once('../private/components/header.php');

echo '<p>Logging you out...</p>';
$userManager->log_out();
header('Location: index.php');

require_once('../private/components/footer.php');
