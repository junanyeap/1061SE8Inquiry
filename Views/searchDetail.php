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
  $time=$rs['createtime'];
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
      #showImg {
          border-radius: 5px;
          cursor: pointer;
          transition: 0.3s;
      }

      #showImg:hover {opacity: 0.7;}

      /* The Modal (background) */
      .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
      }

      /* Modal Content (image) */
      .modal-content {
          margin: auto;
          display: block;
          width: 80%;
          max-width: 700px;
      }

      /* Caption of Modal Image */
      #caption {
          margin: auto;
          display: block;
          width: 80%;
          max-width: 700px;
          text-align: center;
          color: #ccc;
          padding: 10px 0;
          height: 150px;
      }

      /* Add Animation */
      .modal-content, #caption {    
          -webkit-animation-name: zoom;
          -webkit-animation-duration: 0.6s;
          animation-name: zoom;
          animation-duration: 0.6s;
      }

      @-webkit-keyframes zoom {
          from {-webkit-transform:scale(0)} 
          to {-webkit-transform:scale(1)}
      }

      @keyframes zoom {
          from {transform:scale(0)} 
          to {transform:scale(1)}
      }

      /* The Close Button */
      .close {
          position: absolute;
          top: 15px;
          right: 35px;
          color: #f1f1f1;
          font-size: 40px;
          font-weight: bold;
          transition: 0.3s;
      }

      .close:hover,
      .close:focus {
          color: #bbb;
          text-decoration: none;
          cursor: pointer;
      }

      /* 100% Image Width on Smaller Screens */
      @media only screen and (max-width: 700px){
          .modal-content {
              width: 100%;
          }
      }
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
            <td class="col-md-2"><b>創建時間：</b></td><td><b><?php echo $time;?></b></td>
          </tr>
        </table>
      </div>
    </div>
    <row>
      <div class="col-md-3" style="height:150px;overflow:hidden">
        <img src="../Views/frog3.jpg" style="width:100%" id="showimg"/>
      </div>
    </row>
    <div id="myModal" class="modal">
      <span class="close">&times;</span>
      <img class="modal-content" id="img01">
      <div id="caption"></div>
    </div>
  </div>
  <script>
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('showimg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
        modal.style.display = "none";
    }
  </script>
</body>

