<?php
  $meta = new MetaTag($conn);
  $pageTitle = get('page','home');
  $meta->name = $pageTitle;
  $seo = $meta->find();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?= $seo->page ?></title>
  <!-- META -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="<?= $seo->description ?>">
  <meta name="keywords" content="<?= $seo->keywords ?>">
  <meta name="author" content="Stefan Bogdanović">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="rights" content="Copyright by Stefan Bogdanović@ 2018">
  <link rel="shortcut icon" href="favicon-v3.jpg" type="image/ico" sizes="16x16">
  <!-- LINK -->
  <link rel="stylesheet" href="<?= ($requiresPrefix === 4) || ($requiresPrefix === 5) ? $URL . '/' : '' ?>node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= ($requiresPrefix === 4) || ($requiresPrefix === 5) ? $URL . '/' : '' ?>public/css/colors.min.css">
  <link rel="stylesheet" href="<?= ($requiresPrefix === 4) || ($requiresPrefix === 5) ? $URL . '/' : '' ?>public/css/custom.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>
<body class="bg-primary">