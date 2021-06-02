<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A website to use at LAN parties.">
    <meta name="author" content="Lukas Fülling (lukas@k40s.net)">
    <link rel="icon" href="favicon.ico">

    <title>LanServer Home</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        #background {
            z-index: -10;
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
        }
    </style>
</head>

<body>

<video autoplay muted loop id="background">
    <source src="media/video.mp4" type="video/mp4">
    <source src="media/video.ogv" type="video/ogg">
    <source src="media/video.webm" type="video/webm">
</video>

<?php include 'parts/navbar.php';?>

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php include 'parts/step-1.php';?>
            <?php include 'parts/step-2.php';?>
            <?php include 'parts/step-3.php';?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php include 'parts/footer.php';?>

<!-- Bootstrap core JavaScript -->
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
