<?php
include 'header.php';
if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
  header("Location: ../Views/loginForm.php");
  exit(0);
}
require("../Modules/loginModel.php");
require("../Modules/Function.php");
$id = (int)$_REQUEST['id'];
$result=getListID($id);
if ($rs=mysqli_fetch_assoc($result)) {
  $Organ=$rs['organismname'];
  $Label=$rs['label'];
  $Family=$rs['family'];
  $Genus=$rs['genus'];
  $Food=$rs['food'];
  $Season=$rs['season'];
  $Status=$rs['status'];
  $Habitat=$rs['habitat'];
  $Note=$rs['note'];
  $edit_id = $rs['id'];
} else {
  echo "Your id is wrong!!";
  exit(0);
}
?>
<head>
  <meta charset="UTF-8" />
  <title><?php echo $Organ;?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css">
  <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <style>
      b {font-size:25px;};
    </style>
</head>
<body>
  <div class="container" >
    <div class="jumbotron" style="background-color:#b8d199">
      <h1 class=" col-md-3" style="display:inline;font-weight:bold"><?php echo $Organ?></h1>
      <div class="text-center">
        <br>
        <b class="col-md-2" style="display:inline">物種：<?php if($Label=="frog"){echo "青蛙";}else{echo"蝴蝶";}?></b>
        <b class="col-md-3" style="display:inline">科別：<?php echo $Family;?></b>
        <b class="col-md-3" style="display:inline">物種：<?php echo $Genus;?></b>
      </div>
      <div style="margin-top:10%">
        <table class="table">
          <tr>
            <td class="col-md-2"><b>食物：</b></td><td><b><?php echo $Food;?></b></td>
          </tr><tr>
            <td class="col-md-2"><b>季節：</b></td><td><b><?php echo $Season;?></b></td>
          </tr><tr>
            <td class="col-md-2"><b>介紹：</b></td><td><b><?php echo $Status;?></b></td>
          </tr><tr>
            <td class="col-md-2"><b>生活習性：</b></td><td><b><?php echo $Habitat;?></b></td>
          </tr><tr>
            <td class="col-md-2"><b>注意：</b></td><td><b><?php echo $Note;?></b></td>
          </tr><tr>
        </table>
      </div>
    </div>
  </div>
</body>
