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
            <p style='display: inline'>
                - Bot

                <button class="small-button accept-button">
                    Accept
                </button>

                <button class="small-button decline-button">
                    Decline
                </button>

            </p>    
 
        </section>

        <section class="flex-y">
            <header>
                <h2 class="left">Users</h2>
            </header>

            <!-- TODO: Display list of users -->


            <!-- Example placeholder -->
            <p style='display: inline'>
                - Admin

                <button class="small-button block-button">
                    Block
                </button>

                <button class="small-button delete-button">
                    Delete
                </button>

            </p> 

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