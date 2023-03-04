<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Restaurace,  Restaurační web">
    <meta name="keywords" content="HTML, CSS, PHP, JavaScript">
    <meta name="author" content="JointSeeker">
    
    <title>Restaurace u Karla IV.</title>
    <!-- styly -->
    <link rel="shortcut icon" href="img/logo_icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <script src="https://kit.fontawesome.com/2b48a5b33b.js" crossorigin="anonymous"></script>
    <!-- Captcha -->
    <script src="https://www.google.com/recaptcha/api.js?render=6LfSfY4jAAAAAPiVq0qtsQr3b-lmd04LR23XRkCP"></script>
    <?php
    if(isset($_POST) && isset($_POST['submit'])){
        $captcha = new Captcha();
        $captcha->url();
    }

    ?>

</head>
