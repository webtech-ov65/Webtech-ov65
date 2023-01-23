<?php
$page = [
    'title' => 'Sign up',
    'main_class' => 'container flex-y center'
];

require_once('../private/header.php');

$name = '';
$email = '';
$password = '';
$confirm_password = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // Keep track of errors
    $errors = [];
    
    // Process input
    $name = clean_input($_POST['name']);
    $email = clean_input($_POST['email']);
    $password = clean_input($_POST['password']);
    $confirm_password = clean_input($_POST['confirm_password']);
    
    // Validate name
    if (empty($name))
    {
        array_push($errors, 'Please enter a name.');
    }
    else if (strlen($name) > 63)
    {
        array_push($errors, 'Your name can\'t be longer than 63 characters.');
    }
    
    // Validate email
    if (empty($email))
    {
        array_push($errors, 'Please enter an email.');
    }
    else if (strlen($email) > 255)
    {
        array_push($errors, 'Your email can\'t be longer than 255 characters.');
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        array_push($errors, 'Invalid email format.');
    }
    
    // Validate password and confirm password
    if (empty($password))
    {
        array_push($errors, 'Please enter a password.');
    }
    else if ($password != $confirm_password)
    {
        array_push($errors, 'The password and confirmation password are not identical.');
    }
    
    // Check if no errors occurred during validation
    if (count($errors) == 0)
    {
        UserManager::create($name, $email, $password);
        UserManager::log_in($email, $password);
        
        header('Location: index.php');
    }
}
?>
<div class="card width-50">
    <header>
        <h1><?= $page['title']; ?></h1>
    </header>
    
    <form method="post">
        <div class="flex-y">
            <label>Name</label>
            <input name="name" type="text" value="<?= $name; ?>">
        </div>
        
        <div class="flex-y">
            <label>Email</label>
            <input name="email" type="text" value="<?= $email; ?>">
        </div>
        
        <div class="flex-x">
            <div class="flex-y width-50">
                <label>Password</label>
                <input name="password" type="password" value="<?= $password; ?>">
            </div>
            
            <div class="flex-y width-50">
                <label>Confirm password</label>
                <input name="confirm_password" type="password" value="<?= $confirm_password; ?>">
            </div>
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

<p>Already have an account? <a href="log-in.php">Log in</a></p>
<?php
require_once('../private/footer.php');
