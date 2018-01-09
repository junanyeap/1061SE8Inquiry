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
    $(document).ready( function() {
       $('#label').change( function() {
          location.href = $(this).val();
       });
    });
  </style>
  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js'></script>
</head>
<body >
  <!-- <div class="container col-md-12"> -->
    <div class="row">
      <div class="col-md-8">
        <?php

        $_SESSION["last_label"] = $label = $_REQUEST['label'];
        $_SESSION["last_key"] = $keyword = $_REQUEST['keyword'];
        $_SESSION["last_family"] = $family = $_REQUEST['family'];
        $_SESSION["last_genus"] = $genus = $_REQUEST['genus'];
        // print($_SESSION["last_key"]);
        $results=searchEcology($keyword,$label,$family,$genus);
        while($rs=mysqli_fetch_array($results)) {
          echo "<div class='card card-inline col-md-3'>
                  <div style='overflow:hidden;height:70%'>
                  <img class='card-img-top' src='../Views/frog.jpg' style='width:100%'>
                  </div>
                  <div class='card-footer text-center' type='button' style='background-color:#b8d199'>
                  <a href='searchDetail.php?&id=".$rs['id']."' class='btn btn-lg' style='color:black;font-weight:bold;font-size:120%';>"
                  // <a href='../Control/Control.php?act=deleteEcology&id=".$row['id']."'>delete</a>
                    ,$rs['organismname'],"
                    </a>
                  </div>
                </div>";
        }
        ?>
      </div>
      <div class="col-md-4" >
        <div class="sidebar-navbar-fixed pull-right affix ">
          <div class="well col-md-12" style="background-color:#b8d199;font-weight:bold" >
            <link rel = "stylesheet" type = "text/css" href = "hk.css">
            <form action="search.php" method="post" style="font-size: 25px">
            <!-- <input type="hidden" name ="act" value ="searchEcology"> -->
              <table class="table" >
                <tr><th style="text-align:center", colspan="4">查詢</th></tr>
                <?php
                $label=$_REQUEST['label'];
                // $getFamily="SELECT DISTINCT family from library";
                // $getFamilyResult=mysql_query($getFamily);
                echo '
                <tr>
                <td class="col-md-3"style="text-align:center">物種</td>
                <td style="text-align:left">
                <a class="btn btn-md btn-success" href="../Views/search.php" style="background-color:#7f9c5c;color:white;text-decoration: none;font-size:80%;font-weight:bold">全部</a>
                <a class="btn btn-md btn-success" href="../Views/search.php?label=frog" style="background-color:#7f9c5c;color:white;text-decoration: none;font-size:80%;font-weight:bold">青蛙</a>
                <a class="btn btn-md btn-success" href="../Views/search.php?label=lepidoptera" style="background-color:#7f9c5c;color:white;text-decoration: none;font-size:80%;font-weight:bold">蝴蝶</a>
                <input type="hidden" name="label" value="',$label,'"></input>
                </td>
                </tr>
                <tr>
                <td class="col-md-4" style="text-align:center">關鍵字</td>
                <td style="text-align:left"><input type="text" name="keyword" style="width:80%"/></td>
                </tr><tr>
                <td class="col-md-4" style="text-align:center">颜色</td>
                <td style="text-align:left"><input type="text" name="keyword" style="width:80%"/></td>
                </tr>
                <tr>';
                
                $sql = "SELECT DISTINCT family,label FROM library where label='$label'";
                $result = mysqli_query($conn,$sql);

                echo '<td class="col-md-3" style="text-align:center">科別</td>
                <td style="text-align:left">
                <select name="family" style="width:60%">';
                echo '<option></option>';
                while ($row = mysqli_fetch_array($result)) {
                  echo '<option value="',$row["family"],'">',$row["family"],'</option>';
                }
                echo '
                </select>
                </td></tr>
                <tr>';
                $sql = "SELECT DISTINCT genus,label FROM library where label='$label'";
                $result = mysqli_query($conn,$sql);
                echo '<td class="col-md-3" style="text-align:center">屬性</td>
                <td style="text-align:left">
                <select name="genus" style="width:60%">';
                echo '<option></option>';
                while ($row = mysqli_fetch_array($result)) {
                  echo '<option value="',$row["genus"],'">',$row["genus"],'</option>';
                }
                ?>
                <tr><th style="text-align:center", colspan="4"> 
                  <input class="btn-lg" type="submit" value="送出"></input>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
<script>
//<![CDATA[
(function () {
$("body").append("<img id='goTopButton' style='display: none; z-index: 5; cursor: pointer;' title='回到頂端' height='50' width='50'/>");
var img = "http://i01.pic.sogou.com/8db77379d8f47267",
locatioin = 9/10, // 按鈕出現在螢幕的高度
right = 10, // 距離右邊 px 值
opacity = 0.3, // 透明度
speed = 500, // 捲動速度
$button = $("#goTopButton"),
$body = $(document),
$win = $(window);
$button.attr("src", img);
$button.on({
mouseover: function() {$button.css("opacity", 1);},
mouseout: function() {$button.css("opacity", opacity);},
click: function() {$("html, body").animate({scrollTop: 0}, speed);}
});
window.goTopMove = function () {
var scrollH = $body.scrollTop(),
winH = $win.height(),
css = {"top": winH * locatioin + "px", "position": "fixed", "right": right, "opacity": opacity};
if(scrollH > 20) {
$button.css(css);
$button.fadeIn("slow");
} else {
$button.fadeOut("slow");
}
};
$win.on({
scroll: function() {goTopMove();},
resize: function() {goTopMove();}
});
} )();
//]]>
</script>
</body>
