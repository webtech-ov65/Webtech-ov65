<?php
if (isset($_GET['year']) && isset($_GET['month']) && isset($_GET['day']))
{
    $week_number = $calendarManager->get_week_number(clean_input($_GET['year']), clean_input($_GET['month']), clean_input($_GET['day']));
}
else
{    
    $week_number = $calendarManager->get_week_number();
}

$days = $calendarManager->get_days_range();
$hours = $calendarManager->get_hours_range();
?>
<header>
    <h2>Week <?= $week_number; ?></h2>
</header>

<table class="calendar calendar-week">
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
                    <td onclick="createBoxAndShowPopup(event, this)"></td>
                <?php
                }
                ?>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
