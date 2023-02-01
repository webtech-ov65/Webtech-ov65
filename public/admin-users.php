<?php
require_once('../private/components/header.php');

if (!$userManager->is_admin())
{
    // Mask page's existence
    require_once('../private/components/error_404.php');
}
?>
<header>
    <a href="admin.php">&larr; Admin Section</a>
    <h1>Users</h1>
</header>

<div class="flex-y center">
    <div class="width-50">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                foreach ($userManager->get_users() as $user)
                {
                ?>
                    <tr>
                        <td><?= $user['name']; ?></td>
                        
                        <td>
                            <a href="mailto:<?= $user['email']; ?>"><?= $user['email']; ?></a>
                        </td>
                        
                        <td class="bold">
                            <?php
                            if ($user['is_accepted'] == 1) // Accepted
                            {
                                echo '<span class="green">Accepted</span>';
                            }
                            else if ($user['is_accepted'] == 0) // Pending
                            {
                                echo '<span class="yellow">Pending</span>';
                            }
                            else if ($user['is_accepted'] == -1) // Rejected/deleted
                            {
                                echo '<span class="red">Rejected/Deleted</span>';
                            }
                            ?>
                        </td>
                        
                        <td>
                            <?php
                            // Prevent actions on yourself
                            if ($user['id'] != $userManager->get_logged_in_user_id())
                            {
                                if ($user['is_accepted'] == 1) // Accepted
                                {
                                    require('../private/components/button_block.php');
                                    require('../private/components/button_delete.php');
                                }
                                else if ($user['is_accepted'] == 0) // Pending
                                {
                                    require('../private/components/button_accept.php');
                                    require('../private/components/button_reject.php');
                                }
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
require_once('../private/components/footer.php');
