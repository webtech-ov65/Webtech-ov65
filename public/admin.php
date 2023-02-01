<?php
require_once('../private/components/header.php');
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
            
            <!-- TODO: Display list of user requests -->


            <!-- Example placeholder -->
            <div style='display: flex'>
                <p>
                    - Bot
                </p>

                <div style='display: inline-block; margin-left: auto'>
                    <button class="small-button accept-button">
                        Accept
                    </button>

                    <button class="small-button decline-button">
                        Decline
                    </button>
                </div>
            </div>
 
        </section>

        <section class="flex-y">
            <header>
                <h2 class="left">Users</h2>
            </header>

            <!-- TODO: Display list of users -->



            <!-- Example placeholder -->
            <div style='display: flex'>
                <p>
                    - Admin
                </p>

                <div style='display: inline-block; margin-left: auto'>
                    <button class="small-button block-button">
                        Block
                    </button>

                    <button class="small-button delete-button">
                        Delete
                    </button>
                </div>
            </div>

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