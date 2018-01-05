<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<nav class="navbar navbar-default" style="background-color:#7f9c5c;">
  <div class="container">

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="font-size:25px;">
      <ul class="nav navbar-nav" >
        <!-- <li class="active"><a href="#"> <span class="sr-only">(current)</span></a></li> -->
        <li><a href="../Views/index.php" style="color:white;font-weight:bold">首頁</a></li>
        <li><a href="../Views/userinfo.php" style="color:white;font-weight:bold">使用者清單</a></li>
        <li><a href="../Views/SearchView.php" style="color:white;font-weight:bold">查看資料庫</a></li>
        <li><a href="../Views/SearchUI.php" style="color:white;font-weight:bold">查詢清單</a></li>
        <li><a href="../Views/search.php" style="color:white;font-weight:bold">我們的查詢</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href='loginForm.php' style="color:white;font-weight:bold">
          <?php 
          session_start();
          if (isset($_SESSION['uID']) && $_SESSION['uID'] == true) {
            echo "登出";
          } else {
            echo "登錄";
          }
          
          ?>
        </a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div>
</nav>
<body>
