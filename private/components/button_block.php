<?php
$is_blocked = $userManager->is_blocked($user['id']);
?>
<form class="inline-block" action="admin-<?= $is_blocked ? 'un' : ''; ?>block.php" method="post">
    <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
    <button class="small-button block-button"><?= $is_blocked ? 'Unb' : 'B'; ?>lock</button>
</form>
