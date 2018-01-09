<?php
  include 'header.php';
  if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
    header("Location: ../Views/loginForm.php");
    exit(0);
  }
  // require("../Modules/loginModel.php");
  require("../Modules/Function.php");
?>
<div class="row">
  <div class="col-md-8" style="font-size:15px">
    <?php
    $keyword = $_REQUEST['keyword'];
    $label = $_REQUEST['label'];
    $family = $_REQUEST['family'];
    $genus = $_REQUEST['genus'];
    echo '<table class="table"><tr>';
    $results=searchEcology($keyword,$label,$family,$genus);
    $count = 0;
    foreach ($results as $key => $section) {
      if($count == 0) {
        foreach ($section as $name => $val) {
          echo "<td>$name</td>";
          $count ++;
        }
        echo "</tr><tr>";
        foreach ($section as $name => $val) {
          echo "<td>$val</td>";
        }
      } else if ($count > 0) {
        echo "</tr><tr>";
        foreach ($section as $name => $val) {
          echo "<td>$val</td>";
        }
      }
      echo "</tr>";
    }
    echo '</table>'
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
<?php
  include 'footer.php'
?>
