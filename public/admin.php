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
            foreach ($userManager->get_pending_users() as $user)
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
                            <form class="inline-block" action="admin-accept.php" method="post">
                                <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                                <button class="small-button accept-button">Accept</button>
                            </form>

                            <form class="inline-block" action="admin-reject-delete.php" method="post">
                                <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                                <button class="small-button decline-button">Reject</button>
                            </form>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>
        </section>

        <section class="flex-y">
            <header>
                <h2 class="left">Users</h2>
            </header>

            <?php
            foreach ($userManager->get_accepted_users() as $user)
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
                            $is_blocked = $userManager->is_blocked($user['id']);
                            ?>
                            <form class="inline-block" action="admin-<?= $is_blocked ? 'un' : ''; ?>block.php" method="post">
                                <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                                <button class="small-button block-button"><?= $is_blocked ? 'Unb' : 'B'; ?>lock</button>
                            </form>

                            <form class="inline-block" action="admin-reject-delete.php" method="post">
                                <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                                <button class="small-button delete-button">Delete</button>
                            </form>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>
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