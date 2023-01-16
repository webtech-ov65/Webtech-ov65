<?php
require_once('../private/header.php');
$days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
?>
<header>
    <h1><?= date('F, Y'); ?></h1>
</header>

<table>
    <thead>
        <tr>
            <th></th>
            
            <?php
            foreach ($days as $day)
            {
            ?>
                <th><?= $day; ?></th>
            <?php
            }
            ?>
        </tr>
    </thead>
    
    <tbody>
        <tr>
            <th>TODO: hours?</th>
            
            <?php
            // TODO: apply actual days in month
            for ($i = 1; $i <= 7; $i++)
            {
            ?>
                <td>TODO</td>
            <?php
            }
            ?>
        </tr>
    </tbody>
</table>


<div class="flex-x">
    <section class="card width-50">
        <header>
            <h2>h2 example</h2>
        </header>
        
        <p>Not sure what to put in these cards yet, perhaps some introductory explanation.</p>
        <p>This card...</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </section>
    
    <section class="card width-50">
        <header>
            <h2>h2 example</h2>
        </header>
        
        <p>...and this card both use flexbox.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </section>
</div>
<?php
require_once('../private/footer.php');
