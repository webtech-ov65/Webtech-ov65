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
    </div>
    
    <div class="flex-y width-70">
        <?php
        require_once('../private/components/calendar_week.php');
        ?>
    </div>
</div>

<?php
require_once('../private/components/footer.php');
