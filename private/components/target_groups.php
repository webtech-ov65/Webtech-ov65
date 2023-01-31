<header>
    <h2 class="left">Target groups</h2>
</header>

<form class="flex-y">
    <?php
    $groups = $groupManager->get_groups();
    
    if (count($groups) == 0)
    {
    ?>
        <p>No target groups have been created yet.</p>
    <?php
    }
    else
    {
        foreach ($groups as $group)
        {
        ?>
            <div>
                <input type="checkbox" checked disabled>
                <label><?= $group['name'] ?></label>
            </div>
        <?php
        }
    }
    ?>
</form>
