<?php

include "../lib/php/functions.php";
 
$users = file_get_json("../data/users.json");



function showUserPage($user) {
   $classes = is_array($user->classes) ? implode(', ', $user->classes) : $user->classes;

   echo <<<HTML
<nav class="nav nav-crumbs">
   <ul>
      <li><a href="admin/users.php">Back</a></li>
   </ul>
</nav>

<div>
   <h2>Edit User</h2>
   <form>
      <div class="form-control">
         <label class="form-label">Name</label>
         <input type="text" class="form-input" value="{$user->name}">
      </div>

      <div class="form-control">
         <label class="form-label">Type</label>
         <input type="text" class="form-input" value="{$user->type}">
      </div>

      <div class="form-control">
         <label class="form-label">Email</label>
         <input type="email" class="form-input" value="{$user->email}">
      </div>

      <div class="form-control">
         <label class="form-label">Classes</label>
         <input type="text" class="form-input" value="{$classes}">
      </div>

      <div class="form-control">
         <button type="submit" class="form-button">Submit</button>
      </div>
   </form>
</div>
HTML;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>User Admin Page</title>

   <?php include "../parts/meta.php"; ?>
</head>
<body>

<header class="navbar">
   <div class="container display-flex">
      <div class="flex-none">
         <h1>User Admin</h1>
      </div>
      <div class="flex-stretch"></div>
      <nav class="nav nav-flex flex-none">
         <ul>
            <li><a href="admin/users.php">User List</a></li>

         </ul>
      </nav>
   </div>
</header>

<div class="container">
   <div class="card soft">
   <?php
   if(isset($_GET['id'])) {
      showUserPage($users[$_GET['id']]);
   } else {
   ?>
      <h2>User List</h2>
      <nav class="nav">
         <ul>
         <?php
         for($i=0; $i<count($users); $i++){
            echo "<li>
               <a href='admin/users.php?id=$i'>{$users[$i]->name}</a>
            </li>";
         }
         ?>
         </ul>
      </nav>
   <?php } ?>
   </div>
</div>

</body>
</html>
