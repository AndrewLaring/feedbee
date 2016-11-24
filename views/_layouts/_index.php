<?php use laring\core\Session; ?>

<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BEE JEE</title>
    <link href="<?= URL ?>images/main/ninja.png" rel="shortcut icon" type="image/png"/>
    <link rel="stylesheet" href="<?= URL ?>css/bootstrap/bootstrap.min.css">
<!--    <link rel="stylesheet" href="--><?//= URL ?><!--css/style.css">-->
    <link rel="stylesheet" href="<?= URL ?>css/trevis.css">
    <!--    <link rel="stylesheet" href="--><? //= URL ?><!--css/new_style.css">-->
    <script type="text/javascript" src="<?= URL ?>js/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="<?= URL ?>js/bootstrap/bootstrap.min.js"></script>
</head>
<body>
<?php Session::init(); ?>
<?php $this->render('header', 1); ?>
<?php $this->render('_partial/_main_menu', 1); ?>
<div class="content container-fluid content-container">