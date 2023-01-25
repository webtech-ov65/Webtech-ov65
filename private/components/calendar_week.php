<?php
$days = get_days_range();
$hours = get_hours_range();
?>
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
