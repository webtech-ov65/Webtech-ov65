<?php
// Pakt de huidige maand en jaar
if (isset($_GET['year']) && isset($_GET['month'])) {
    $year = min(max(clean_input($_GET['year']), 1950), 2100);
    $month = min(max(clean_input($_GET['month']), 1), 12);
} else {
    $year = date('Y');
    $month = date('n');
}

$num_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
$days = $calendarManager->get_days_range();
$first_day_of_month = date('N', mktime(0, 0, 0, $month, 1, $year))-1;
$selected_day = isset($_GET['day']) ? clean_input($_GET['day']) : date('d');
?>
<div class="calendar-header flex-x center">
    <header>
        <h2><?= date('F Y', mktime(0, 0, 0, $month, 1, $year)); ?></h2>
    </header>
    
    <div class="right">
        <a href="?year=<?= ($month == 1) ? $year - 1 : $year; ?>&month=<?= ($month == 1) ? 12 : $month - 1; ?>&day=1" class="prev-button">&lt;</a>
        <a href="?year=<?= ($month == 12) ? $year + 1 : $year; ?>&month=<?= ($month == 12) ? 1 : $month + 1; ?>&day=1" class="next-button">&gt;</a>
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
            $css_class = $day == $selected_day ? 'selected' : '';
            echo '<td><a class="' .  $css_class . '" href="?year=' . $year . '&month=' . $month . '&day=' . $day . '">' . $day . '</td>';

            if (($day + $first_day_of_month) % 7 == 0) {
                echo '</tr><tr>';
            }
        }
        for ($i = 0; $i < 7 - (($day + $first_day_of_month - 1) % 7); $i++) {
            if((7 - (($day + $first_day_of_month - 1) % 7)) != 7) {
                echo '<td></td>';
                }
        }
        ?>
        </tr>
    </tbody>
</table>
