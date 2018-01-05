<?php
include 'header.php';
if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
  header("Location: ../Views/loginForm.php");
  exit(0);
}
require("../Modules/loginModel.php");
require("../Modules/Function.php");
$id = (int)$_REQUEST['id'];
echo $id;
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
echo $Organ;
echo "<br />";
echo $Label;
echo $Family;
echo $Genus;
echo $Food;
echo $Season;
echo $Status;
echo $Habitat;
echo $Note;
echo $id;
?>
