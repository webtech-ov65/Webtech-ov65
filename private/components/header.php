<?php
require_once('../private/bootstrap.php');
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        
        <title><?= (isset($page) && isset($page['title']) ? $page['title'] . ' - ' : '') . $app['name']; ?></title>
        
        <!-- Stylesheets -->
        <link rel="stylesheet" href="assets/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    </head>
    
    <body>
        <div class="content">
            <header class="navbar">
                <div class="container">
                    <a href="index.php">
                        <div class="brand"></div>
                    </a>
                    
                    <nav class="right">
                        <ul>
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            
                            <?php
                            if (!$userManager->is_logged_in())
                            {
                            ?>
                                <li>
                                    <a href="log-in.php">Log in</a>
                                </li>
                                
                                <li>
                                    <a href="sign-up.php">Sign up</a>
                                </li>
                            <?php
                            }
                            else
                            {
                            ?>
                                <li>
                                    <a href="log-out.php">Log out</a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </header>

            <main class="<?= isset($page) && isset($page['main_class']) ? $page['main_class'] : 'container'; ?>">
