<?php
  include 'header.php';
  if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
    header("Location: ../Views/loginForm.php");
    exit(0);
  }
  require("../Modules/Function.php");
  error_reporting(0);
  // $_SESSION["last_label"] = $label = $_REQUEST['label'];
  // $_SESSION["last_key"] = $keyword = $_REQUEST['keyword'];
  // $_SESSION["last_family"] = $family = $_REQUEST['family'];
  // $_SESSION["last_genus"] = $genus = $_REQUEST['genus'];
?>

<head>
  <meta charset="UTF-8" />
  <title>查詢</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css">
  <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <style>
    .card-inline {
          display:inline-block!important;
          padding: 5px;
        }
  </style>
</head>
<body >
  <!-- <div class="container col-md-12"> -->
  <div class="col-md-8">
    <?php

    $_SESSION["last_label"] = $label = $_REQUEST['label'];
    $_SESSION["last_key"] = $keyword = $_REQUEST['keyword'];
    $_SESSION["last_family"] = $family = $_REQUEST['family'];
    $_SESSION["last_genus"] = $genus = $_REQUEST['genus'];
    // print($_SESSION["last_key"]);
    $results=searchEcology($keyword,$label,$family,$genus);
    while($rs=mysqli_fetch_array($results)) {
      echo "<div class='card card-inline'>
              <img class='card-img-top' src='http://placehold.it/300x300'>
              <div class='card-footer text-center' type='button' style='background-color:#b8d199'>
              <a href='searchDetail.php?&id=".$rs['id']."' class='btn btn-lg' style='color:black;font-weight:bold';>"
              // <a href='../Control/Control.php?act=deleteEcology&id=".$row['id']."'>delete</a>
                ,$rs['organismname'],"
                </a>
              </div>
            </div>";
    }
    ?>
  </div>
      <div class="col-md-3" >
        <div class="sidebar-navbar-fixed pull-right affix ">
          <div class="well" style="background-color:#b8d199;font-weight:bold" >
            <link rel = "stylesheet" type = "text/css" href = "hk.css">
            <form action="search.php" method="post" style="font-size: 25px">
            <!-- <input type="hidden" name ="act" value ="searchEcology"> -->
            <table class="table" >
              <tr><th style="text-align:center", colspan="4">查詢</th></tr>
              <?php
              // $getFamily="SELECT DISTINCT family from library";
              // $getFamilyResult=mysql_query($getFamily);
              echo '
              <tr>
              <td style="text-align:center">關鍵字</td>
              <td style="text-align:left"><input type="text" name="keyword" /></td>
              </tr>
              <tr>
              <td style="text-align:center">物種</td>
              <td style="text-align:left">
              <select name="label">
              <option value="frog" selected >青蛙</option>
              <option value="lepidoptera" >蝴蝶</option>
              </select>
              </td>
              </tr>
              <tr>
              <td style="text-align:center">科別</td>
              <td style="text-align:left"><input type="text" name="family" ></td>
              </tr>
              <tr>
              <td style="text-align:center">屬</td>
              <td style="text-align:left"><input type="text" name="genus" /></td>
              </tr>
              ';
              ?>
              <tr><th style="text-align:center", colspan="4">
                <input class="btn-lg" type="submit" value="確認" />
              </tr>
            </table>
          </form>
          </div>
        </div>
      </div>

    </div>
    <div>
    </div>


  <!-- </ div> -->
</body>
