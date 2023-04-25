<?php
session_start();

if(isset($_GET['page'])){
  if($_GET['page'] == 'logout'){
    header('location: php/logout.php');
    die();
  }else{
    $page = $_GET['page'];
  }
}else{
  $page = "login";
}
?>

<!DOCTYPE html>
<html lang="en">
<body class="bg-info">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="CSS/style.css"> 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
  <?php include 'includes/navbar.inc.php'; ?>
  <?php include 'includes/'.$page.'.inc.php';?>
  </body>
</body>
</html>