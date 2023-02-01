<?php
require_once('../private/components/header.php');

if (!$userManager->is_admin())
{
    // Mask page's existence
    require_once('../private/components/error_404.php');
}
?>
<div class="flex-x">
    <div class="flex-y gap-2 width-30">
        <section class="flex-y">
            <?php
            require_once('../private/components/calendar_month.php');
            ?>
        </section>
        
        <section class="flex-y">
            <?php
            require_once('../private/components/target_groups.php');
            ?>
        </section>

        <!-- Additional features -->
        <section class="flex-y">
            <header>
                <h2 class="left">User requests</h2>
            </header>
            
            <?php
            $pending_users = $userManager->get_pending_users(5);
            
            if (count($pending_users) == 0)
            {
            ?>
                <p>There are no pending users.</p>
            <?php
            }
            else
            {
                foreach ($pending_users as $user)
                {
                ?>
                    <div class="flex-x center">
                        <p><?= $user['name']; ?> &lt;<?= $user['email']; ?>&gt;</p>

                        <?php
                        // Prevent actions on yourself
                        if ($user['id'] != $userManager->get_logged_in_user_id())
                        {
                        ?>
                            <div class="right">
                                <?php
                                require('../private/components/button_accept.php');
                                require('../private/components/button_reject.php');
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
            }
            ?>
        </section>

        <section class="flex-y">
            <header>
                <h2 class="left">Users</h2>
            </header>

            <?php
            foreach ($userManager->get_accepted_users(5) as $user)
            {
            ?>
                <div class="flex-x">
                    <p><?= $user['name']; ?> &lt;<?= $user['email']; ?>&gt;</p>

                    <?php
                    // Prevent actions on yourself
                    if ($user['id'] != $userManager->get_logged_in_user_id())
                    {
                    ?>
                        <div class="right">
                            <?php
                            require('../private/components/button_block.php');
                            require('../private/components/button_delete.php');
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>
            
            <a href="admin-users.php">View all users in detail</a>
        </section>
    </div>
    
    <div class="flex-y width-70">
        <?php
        require_once('../private/components/calendar_week.php');
        ?>
    </div>
</div>
<?php
require_once('../private/components/footer.php');
