<?php
require_once('bootstrap.php');
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        
        <title><?= ($page['title'] != null ? $page['title'] . ' - ' : '') . $app['name']; ?></title>
        <link rel="stylesheet" href="style.css">
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
                            
                            <li>
                                <a href="log-in.php">Log in</a>
                            </li>
                            
                            <li>
                                <a href="sign-up.php">Sign up</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </header>

            <main class="<?= $page['main_class'] != null ? $page['main_class'] : 'container'; ?>">
