<?php
// Start the session only once 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$page_title = $page_title ?? "Velorea";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($page_title) ?></title>



<meta name="viewport" content="width=device-width, initial-scale=1.0">

<base href="https://rulancia.com/aau/wnm608/bashi.rula/">


 <!-- Adobe Fonts: The Seasons + Avenir LT Pro -->
 <link rel="stylesheet" href="https://use.typekit.net/gok2yjy.css">

   <link rel="stylesheet" href="lib/css/styleguide.css">
  <link rel="stylesheet" href="css/gridsystem.css">
  <link rel="stylesheet" href="css/storetheme.css"> 








