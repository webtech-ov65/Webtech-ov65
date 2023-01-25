<?php
$page = [
    'title' => 'Event',
    'main_class' => 'container flex-y center'
];

// TODO: Grab info from database
$target_groups = ['Business Development', 'Customer Support', 'Research & Development', 'Sales & Marketing', 'Strategy & Performance'];
$commenters = ['Alice', 'Bob', 'Caroline'];
$date = '2023-01-17';
$time = '14:00';
$day = date('l', strtotime($date));

require_once('../private/components/header.php');
?>
<div class="card width-80">
    <header>
        <h1><?= $page['title']; ?></h1>
    </header>

    <p style="text-align:center"><?php echo "$date $day $time" ?></p>
    <div style="text-align:center">
        <?php
        foreach ($target_groups as $target_group)
        {
        ?>
            <!-- TODO: specify link to group agenda -->
            <a style="display:inline; margin:0 10px" href="index.php"><?= $target_group; ?></a>
        <?php
        }
        ?>
    </div>
    <br>
    <p style="text-align:center">The summary for the event goes here<br><br>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <form>
        <textarea class="flex-y" rows="10" cols="30"> Add a comment...</textarea>
        <input class="button" type="submit">
    </form>

    <?php
    foreach ($commenters as $commenter)
    {
    ?>
        <section class="card width-80">
            <header>
                <h2 style="text-align:left"><?= $commenter; ?></h2>
            </header>
            
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            
            <?php if($commenter == 'Bob') : ?>
                <div style="text-align:right">
                    <a class="button" style="display:inline">Edit</a>
                    <a class="button" style="display:inline">Delete</a>
                </div>
            <?php endif; ?>
        </section>

    <?php
    }
    ?>
    
</div>
<?php
require_once('../private/components/footer.php');
