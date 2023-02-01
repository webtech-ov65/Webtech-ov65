<?php
require_once('../private/components/header.php');

if (!$userManager->is_admin())
{
    // Mask page's existence
    require_once('../private/components/error_404.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $adminManager->unblock_user(clean_input($_POST['user_id']));
}

echo '<p>Unblocking this user...</p>';
header('Location: admin.php');

require_once('../private/components/footer.php');
