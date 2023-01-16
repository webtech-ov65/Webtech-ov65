<?php
require_once('bootstrap.php');
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        
        <title><?= $app['name']; ?></title>
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
                                <!-- TODO: apply URL -->
                                <a href="#">Log in</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </header>

            <main class="container">
