<?php
  include 'header.php';
  if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
    header("Location: ../Views/loginForm.php");
    exit(0);
  }
  require("../Modules/Function.php");
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
    <div class="row ">
      <div class="col-md-4">
        <div class="sidebar-navbar-fixed affix" style="margin-left: 1.5%">
          <div class="well" style="background-color:#b8d199;font-weight:bold" >
            <link rel = "stylesheet" type = "text/css" href = "hk.css">
            <form action="search.php" method="post" style="font-size: 25px">
            <!-- <input type="hidden" name ="act" value ="searchEcology"> -->
            <table class="table" >
              <tr><th style="text-align:center", colspan="4">查詢</th></tr>
              
              <tr>
              <td style="text-align:center">關鍵字</td>
              <td style="text-align:left"><input type="text" name="keyword" placeholder="ex.請輸入關鍵字"/></td>
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
              <td style="text-align:left"><input type="text" name="family" placeholder="ex.科別"/></td>
              </tr>
              <tr>
              <td style="text-align:center">屬</td>
              <td style="text-align:left"><input type="text" name="genus" placeholder="ex.屬"/></td>
              </tr>
              <tr><th style="text-align:center", colspan="4"><input class="btn-lg" type="submit" value="確認" /></tr>
            
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <?php
        
        $keyword = $_REQUEST['keyword'];
        $label = $_REQUEST['label'];
        $family = $_REQUEST['family'];
        $genus = $_REQUEST['genus'];
        $results=searchEcology($keyword,$label,$family,$genus);
        while($rs=mysqli_fetch_array($results)) {
          echo "<div class='card card-inline'>
                  <img class='card-img-top' src='http://placehold.it/300x300'>
                  <div class='card-footer text-center' type='button' style='font-size:25px;font-weight:bold;background-color:#b8d199'>"
                    ,$rs['organismname'],"
                  </div>
                </div>";
          
        }
        ?>
      </div>
    </div>
    

  <!-- </ div> -->
</body>
