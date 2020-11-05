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
  if (!isset($_SESSION['role'])) {
    header('location: index.php');
  }
  if ($_SESSION['role'] == 1) {
    echo '<h2>You are admin</h2>
    <form action="view.php" method="POST">
      <button class="button" name="view">View All User</button>
    </form>
  
    <form action="myI.php" method="POST">
      <button class="button" name="myI">My Infomation</button>
    </form>
    <button class="button" name="logout">My Infomation</button>';
  } else {
    header('location: member.php');
  }

  ?>

</body>

</html>