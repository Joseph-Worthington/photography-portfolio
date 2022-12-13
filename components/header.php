<?php 
    // include './functions/db_connection.php';
    include './functions.php';

    error_reporting(E_ALL);
    ini_set('display_errors', 1);


    $conn = OpenCon(); 

    session_start();

    // if($conn){
    //     echo "Connected to database";
    // }else{
    //     echo "connection Failed";
    // }

    // include 'functions.php';
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/style.css" type="text/css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/47bccfec2b.js" crossorigin="anonymous"></script>
    <title>Photography Portfolio</title>

    
    
</head>
<header>
    <div class="container">
        <div class="top-bar">
            <div class="user-info">
            <?php if (isset($_SESSION['id']) && isset($_SESSION['user_name'])):?>
                    <span>Hello <?= $_SESSION['user_name'] ?></span>
                    <form method="POST" action="logout.php">
                    <input type="hidden" name="logout" value="">
                    <button class="outline black" type="submit">Logout</button>
                  </form>
                
            <?php endif; ?>
            </div>
            <nav>
                <ul class="main-nav">
                    <li>
                        <a href="./" id="home-button" class="">Home</a>
                    </li>
                    <li>
                        <a href="./portfolio" class="">Portfolio</a>
                    </li>
                    <li>
                        <a href="./about" class="">About Me</a>
                    </li>
                    <li>
                        <a href="./contact" class="">Contact</a>
                    </li>
                    <li>
                        <a href="./blog" class="">Blog</a>
                    </li>
                </ul>

                <div class="mobile-menu">
                    <div class="burger-menu">
                        <span class="menu-bar top"></span>
                        <span class="menu-bar middle"></span>
                        <span class="menu-bar bottom"></span>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<body>
    <main>
        