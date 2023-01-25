<?php
$page = [
    'title' => 'Log in',
    'main_class' => 'container flex-y center'
];

require_once('../private/components/header.php');

$email = '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // Keep track of errors
    $errors = [];
    
    // Clean input
    $email = clean_input($_POST['email']);
    $password = clean_input($_POST['password']);
    
    // Validate email
    if (empty($email))
    {
        array_push($errors, 'Please enter an email.');
    }
    
    // Validate password
    if (empty($password))
    {
        array_push($errors, 'Please enter a password.');
    }
    
    // TODO: validate email and password combination
    
    // Check if no errors occurred during validation
    if (count($errors) == 0)
    {
        UserManager::log_in($email, $password);
        header('Location: index.php');
    }
}
?>
<div class="card width-30">
    <header>
        <h1><?= $page['title']; ?></h1>
    </header>
    
    <form method="post">
        <div class="flex-y">
            <label>Email</label>
            <input name="email" type="text" value="<?= $email; ?>">
        </div>
        
        <div class="flex-y">
            <label>Password</label>
            <input name="password" type="password" value="<?= $password; ?>">
        </div>
        
        <button><?= $page['title']; ?></button>
        
        <?php
        if (isset($errors))
        {
            echo '<ul class="red">';
            
            foreach ($errors as $error)
            {
                echo '<li>' . $error . '</li>';
            }
            
            echo '</ul>';
        }
        ?>
    </form>
</div>

<p>New to <?= $app['name']; ?>? <a href="sign-up.php">Sign up</a></p>
<?php
require_once('../private/components/footer.php');
