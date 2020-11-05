<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <style>
    .button {
      background-color: Crimson;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <?php require_once('SQL/conn.php');
  if(!isset($_SESSION['role'])) {
    header('location: index.php');
  }
  if ($_SESSION['role'] == 1) {
    header('location: admin.php');
  } else {
    echo '<h2>You are member</h2>
    <form action="myI.php" method="POST">
      <button class="button" name="myI">My Infomation</button>
    </form>';
  }
  ?>

</body>

</html>