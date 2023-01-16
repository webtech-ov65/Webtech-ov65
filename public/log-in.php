<?php
$page = [
    'title' => 'Log in',
    'main_class' => 'container flex-y center'
];

require_once('../private/header.php');
?>
<div class="card width-30">
    <header>
        <h1><?= $page['title']; ?></h1>
    </header>
    
    <form method="post">
        <div class="flex-y">
            <label>Email</label>
            <input type="text">
        </div>
        
        <div class="flex-y">
            <label>Password</label>
            <input type="password">
        </div>
        
        <button><?= $page['title']; ?></button>
    </form>
</div>
<?php
require_once('../private/footer.php');
