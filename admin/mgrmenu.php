<html>

<head>
  <title>Manager Login</title>
  <link rel="stylesheet" href="../assets/main.css">
  <link rel="stylesheet" href="../assets/bootstrap.css">
  <style>
    a:hover {
      color: #f1f1f1;
    }
    .container {
      background: transparent;
    }
    .tools {
      font-family: sans-serif;
      margin-top: 1%;
      font-size: 7vh;
      color: white;
      text-align: center;
      text-decoration: underline;
    }
  </style>
</head>

<body style="background-image:url(../images/mgrchange.jpg)">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#" class="logo">
      <?php session_start(); echo $_SESSION['mgrname']; ?>
    </a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item animation1">
          <a href="mgrmenu.php">Home</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="tools">Tools</div>
  <div class="container">
    <div class="container">
      <form method="post">
        <button type="button" name="change" onclick="window.location.href='changebookingstatus.php'">Change/View Booking
          Status</button>
        <button type="submit" name="logout" style="float:right">Log Out</button>
      </form>
    </div>
  </div>
  <?php
    if(isset($_POST['check']))
    {
      include 'dbconfig.php';
      $name=$_SESSION['user'];
      $sql = "Select * from book where name='$name'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($rows = mysqli_fetch_assoc($result)) 
        {
          echo "Username:".$rows["username"]."Name:".$rows["name"]."Date of Visit:".$rows["dov"]."Town:".$rows["town"]."<br>";
        }
      } 
      else 
      {
        echo "0 results";
      }
    }
    if(isset($_POST['logout']))
    {
      session_unset();
      session_destroy();
      header( "Refresh:1; url=../index.php"); 
    }
?>
</body>

</html>