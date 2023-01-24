<?php
require_once('../private/header.php');

// Pakt de huidige maand en jaar
if (isset($_GET['month']) && isset($_GET['year'])) {
    $month = $_GET['month'];
    $year = $_GET['year'];
} else {
    $month = date('m');
    $year = date('Y');
}

# Pakt huidige datum
$currentday = date('d');
$currentmonth = date('m');
$currentyear = date('Y');

$num_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

$days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
$hours = get_hours_range();

$first_day_of_month = date('N', mktime(0, 0, 0, $month, 1, $year))-1;

// TODO: replace placeholder target groups with database
$target_groups = ['Business Development', 'Customer Support', 'Research & Development', 'Sales & Marketing'];
?>

<div class="flex-x">
    <div class="flex-y width-20">
        <header>
            <h2>Target groups</h2>
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
            
            <a class="button" href="log-in.php">Filter by Target Group</a>
        </form>
    </div>
    
    <div class="flex-y width-80">
        <div class="calendar-header">
            <header>
                <h1><?= date('F Y', mktime(0, 0, 0, $month, 1, $year)); ?></h1>
            </header>
            <div class="button-container">
                <a href="?month=<?= ($month == 1) ? 12 : $month - 1; ?>&year=<?= ($month == 1) ? $year - 1 : $year; ?>" class="prev-button">&lt;</a>
                <a href="?month=<?= ($month == 12) ? 1 : $month + 1; ?>&year=<?= ($month == 12) ? $year + 1 : $year; ?>" class="next-button">&gt;</a>
            </div>
        </div>
        <table class="calendar">
            <thead>
                <tr>
                    <?php
                    for ($i = 0; $i < 7; $i++) {
                        echo '<th>' . $days[$i] . '</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                for ($i = 0; $i < $first_day_of_month; $i++) {
                    echo '<td></td>';
                }

                for ($day = 1; $day <= $num_days; $day++) {

                    if ($year == $currentyear && $month == $currentmonth && $day == $currentday) {
                        echo '<td>' . "<strong>{$day}</strong>" . '</td>';
                    }
                    else {
                        echo '<td>' . $day . '</td>';
                    }

                    if (($day + $first_day_of_month) % 7 == 0) {
                        echo '</tr><tr>';
                    }
                }
                for ($i = 0; $i < 7 - (($day + $first_day_of_month - 1) % 7); $i++) {
                    echo '<td></td>';
                }
                ?>
                </tr>
            </tbody>
        </table>
        
        <div class="scroller">
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
                    <?php
                    foreach ($hours as $hour)
                    {
                    ?>
                        <tr>
                            <th><?= $hour; ?></th>
                            
                            <?php
                            for ($i = 1; $i <= 7; $i++)
                            {
                            ?>
                                <td><!-- TODO: fill with calendar items --></td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

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
