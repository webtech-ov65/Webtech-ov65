<?php
require_once('../private/components/header.php');

// TODO: replace placeholder target groups with database
$target_groups = ['Business Development', 'Customer Support', 'Research & Development', 'Sales & Marketing'];
?>

<div class="flex-x">
    <div class="flex-y gap-2 width-30">
        <section class="flex-y">
            <?php
            require_once('../private/components/calendar_month.php');
            ?>
        </section>
        
        <section class="flex-y">
            <header>
                <h2 class="left">Target groups</h2>
            </header>
            
            <form class="flex-y">
                <?php
                foreach ($target_groups as $target_group)
                {
                ?>
                    <div>
                        <input type="checkbox" checked disabled>
                        <label><?= $target_group; ?></label>
                    </div>
                <?php
                }
                ?>
            </form>
        </section>

        <section class="flex-y">
            <header>
                <h2 class="left">User requests</h2>
            </header>
            
            <!-- TODO: Display list of user requests -->

        </section>

        <section class="flex-y">
            <header>
                <h2 class="left">Users</h2>
            </header>

            <!-- TODO: Display list of users -->

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