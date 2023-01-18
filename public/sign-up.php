<?php
$page = [
    'title' => 'Sign up',
    'main_class' => 'container flex-y center'
];

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // Keep track of errors
    $errors = [];
    
    // Process input
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    
    // Validate first name
    if (empty($first_name))
    {
        array_push($errors, 'Please enter a first name.');
    }
    
    // Validate last name
    if (empty($last_name))
    {
        array_push($errors, 'Please enter a last name.');
    }
    
    // Validate email
    if (empty($email))
    {
        array_push($errors, 'Please enter an email.');
    }
    
    // Validate password and confirm password
    if (empty($password))
    {
        array_push($errors, 'Please enter a password.');
    }
    
    // Check if no errors occurred during validation
    if (count($errors) == 0)
    {
        // TODO: add user to database and log them in
        header('Location: index.php');
    }
}

require_once('../private/header.php');
?>
<div class="card width-50">
    <header>
        <h1><?= $page['title']; ?></h1>
    </header>
    
    <form method="post">
        <div class="flex-x">
            <div class="flex-y width-50">
                <label>First name</label>
                <input name="first_name" type="text">
            </div>
            
            <div class="flex-y width-50">
                <label>Last name</label>
                <input name="last_name" type="text">
            </div>
        </div>
        
        <div class="flex-y">
            <label>Email</label>
            <input name="email" type="text">
        </div>
        
        <div class="flex-x">
            <div class="flex-y width-50">
                <label>Password</label>
                <input name="password" type="password">
            </div>
            
            <div class="flex-y width-50">
                <label>Confirm password</label>
                <input name="confirm_password" type="password">
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
