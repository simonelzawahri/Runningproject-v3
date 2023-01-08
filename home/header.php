
<?php
    if(isset($_GET['logout'])){
        // echo $_GET['logout'];
        if($_GET['logout'] === 'true') {
            $_SESSION = array();
            echo '
                <script> 
                    window.onload = function(){
                        var logoutbtn = document.querySelector("#logout");
                        logoutbtn.style.display = "none";
                        logoutbtn.style.width = "100px";
                    }
                </script>
            ';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A-Cat/Dog</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../home/index.css">
    <link rel="stylesheet" href="../browse/browse.css">
    <link rel="stylesheet" href="../adopt/adopt.css">
    <link rel="stylesheet" href="../donate/donate.css">


    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@800&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <div>
            <a href="../home/index.php">
                <img src="../references/catdog.jpg" alt="" class="logo">
            </a>
            <h5 class="title">A-Cat/Dog</h5>
            <h5 id="time"></h5>
        </div>
    </header>
    <hr> 

    <div class="nav">
        <a href="../home/index.php">
            <div>Home</div>
        </a>
        <!-- <a href="/browse/browse.php">
            <div>Browse</div>
        </a> -->
        <a href="../adopt/adopt.php">
            <div>Adopt A-Cat/Dog</div>
        </a>
        <a href="../donate/donate.php">
            <div>Donate A-Cat/Dog</div>
        </a>
        <a href="../catCare/catCare.php">
            <div>Cat Care</div>
        </a>
        <a href="../dogCare/dogCare.php">
            <div>Dog Care</div>
        </a>
        <a href="../contact/contact.php">
            <div>Contact Us</div>
        </a>
        <form method="POST" action="index.php?logout=true">
            <button id="logout" style="display: none;">Log out</button>
        </form>
    </div>






