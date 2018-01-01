<?php
  include 'header.php';
  if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
    header("Location: ../Views/loginForm.php");
    exit(0);
  }
?>

<head>
  <meta charset="UTF-8" />
  <title>查詢</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <style>
    .card-inline {
          display:inline-block!important;
          padding: 2px;
        }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="sidebar-navbar-fixed affix" >
          <div class="well">
            <link rel = "stylesheet" type = "text/css" href = "hk.css">
            <form action="SearchResult.php" method="post">
            <!-- <input type="hidden" name ="act" value ="searchEcology"> -->
            <table class="table">
              <tr><th style="text-align:center", colspan="4">Search UI</th></tr>
              
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
              <tr><th style="text-align:center", colspan="4"><input type="submit" value="Ok" /></tr>
            
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card mb-3 card-inline">
          <img class="card-img-top" src="http://placehold.it/200x200">
            <div class="card-footer text-muted" type="button" onclick="window.location='login.html'">
                名稱
            </div>
        </div>
        <div class="card mb-3 card-inline">
          <img class="card-img-top" src="http://placehold.it/200x200">
            <div class="card-footer text-muted" type="button" onclick="window.location='login.html'">
                名稱
            </div>
        </div>
        <div class="card mb-3 card-inline">
          <img class="card-img-top" src="http://placehold.it/200x200">
            <div class="card-footer text-muted" type="button" onclick="window.location='login.html'">
                名稱
            </div>
        </div>
        <div class="card mb-3 card-inline">
          <img class="card-img-top" src="http://placehold.it/200x200">
            <div class="card-footer text-muted" type="button" onclick="window.location='login.html'">
                名稱
            </div>
        </div>
      </div>
    </div>
    

  </div>
</body>

<?php
  include 'footer.php';
?>
