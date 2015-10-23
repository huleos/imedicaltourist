<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="/assets/img/favicon.png"/>

    <!-- SEO -->
    <title><?= $title ?></title>
    <meta name="description" content="<?= $description ?>" />

    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">

  </head>
  <body>
  <!-- HEADER -->
  <header>
    <div class="navbar">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img src="/assets/img/logo.svg" alt="">
        </a>
        <button class="navbar-toggler pull-right" type="button">
          MENU <span>&#9776;</span>
        </button>
      </div>
    </div>

    <nav id="main-nav">
      <ul>
        <li><a href="/">Home</a></li>
        <li>
          <a href="/how-it-works">How it Works?</a>
          <ul class="down">
            <li><a href="/how-it-works/how-do-i-get-it">How do i get it?</a></li>
            <li><a href="/how-it-works/money-savings">Money Savings</a></li>
          </ul>
        </li>
        <li>
          <a href="/plans-and-benefits">Plans & Benefits</a>
          <ul class="down">
            <li><a href="/plans-and-benefits/terms-and-conditions">Terms & Conditions</a></li>
            <li><a href="/plans-and-benefits/member-guide">Member Guide</a></li>
          </ul>
        </li>
        <li><a href="/participant-businesses">Participant Businesses</a></li>
        <li><a href="/travel-tips">Travel Tips</a></li>
      </ul>
      <a href="#" class="close-menu"></a>
    </nav>
  </header>
  <!-- /HEADER -->