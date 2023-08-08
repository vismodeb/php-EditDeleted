<?php

  include "config.php";
  $ID="";
  $Name="";
  $Email="";
  $Roll="";
  $Mobile="";

  $error="";
  $success="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['ID'])){
      header("location:php-2/index.php");
      exit;
    }
    $ID = $_GET['ID'];
    $sql = "select * from students where ID=$ID";
    $result = $pdo->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location: php-2/index.php");
      exit;
    }
    $Name=$row["Name"];
    $Email=$row["Email"];
    $Roll=$row["Roll"];
    $Mobile=$row["Mobile"];

  }
  else{
    $ID = $_POST["ID"];
    $Name=$_POST["Name"];
    $Email=$_POST["Email"];
    $Roll=$_POST["Roll"];
    $Mobile=$_POST["Mobile"];

    $sql = "update students set name='$Name', Email='$Email', Roll='$Roll', Mobile='$Mobile' where ID='$ID'";
    $result = $pdo->query($sql);
    
  }
  
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">VISMO_DEV</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
          <a class="nav-link" href="insert.php">Insert Data</a>
          <a class="nav-link active" href="#">Update</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="edit_area mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <div class="inset_form">

                <div class="card-header bg-warning">
                  <h1 class="text-white text-center"> Update Member </h1>
                </div>

                <form method="post">

                  <input type="hidden" name="ID" value="<?php echo $ID; ?>" class="form-control"> <br>

                  <div class="mb-3">
                    <label> NAME </label>
                    <input type="text" name="Name" value="<?php echo $Name; ?>" class="form-control">
                  </div>

                  <div class="mb-3">
                    <label> EMAIL </label>
                    <input type="text" name="Email" value="<?php echo $Email; ?>" class="form-control">
                  </div>

                  <div class="mb-3">
                    <label> ROLL </label>
                    <input type="text" name="Roll" value="<?php echo $Roll; ?>" class="form-control">
                  </div>

                  <div class="mb-3">
                    <label> PHONE: </label>
                    <input type="text" name="Mobile" value="<?php echo $Mobile; ?>" class="form-control">
                  </div>

                  <div class="mb-3">
                    <tr>
                      <td>
                        <button class="btn btn-success" type="submit" name="submit"> Submit </button>
                        <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a>
                      </td>
                    </tr>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>