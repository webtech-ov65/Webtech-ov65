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

$str = file_get_contents('https://en.wikipedia.org/w/api.php?action=query&format=json&prop=extracts&titles=Digital%20calendar&formatversion=2&exchars=137&exintro=1&explaintext=1');

$json = json_decode($str, true); 

$extract = $json['query']['pages'][0]['extract'];

echo $extract

?> 

<?php
require_once('../private/components/footer.php');
