<?php

  require_once('config.php');

  if(isset($_POST['st_sub'])){
    $name = $_POST['st_name'];
    $email = $_POST['st_email'];
    $roll = $_POST['st_roll'];
    $mobile = $_POST['st_mobile'];

    if(empty($name)){
      $error = 'Name is Required !';
    }
    else if(empty($email)){
      $error = 'Email is Required !';
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $error = "Invalid email format";
    }
    else if(empty($roll)){
      $error = 'Roll is Required !';
    }
    else if(!is_numeric($roll)){
      $error = 'Roll Must be Number !';
    }
    else if(empty($mobile)){
      $error = 'Mobile Number is Required !';
    }
    else if(!is_numeric($mobile)){
      $error = 'Mobile Number Must be Number !';
    }
    else if(strlen($mobile) != 11){
      $error = 'Mobile Number Must be 11 Digit !';
    }
    else{
      $statement = $pdo->prepare('INSERT INTO students(name,email,roll,mobile) VALUES(?,?,?,?)');
      $result = $statement->execute(array($name,$email,$roll,$mobile));
      if($result == true){
        $success = 'Student Data insert success';
      }
      else{
        $error = 'Student Data insert Faile';
      }
    }

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
            <a class="nav-link active" href="insert.php">Insert Data</a>
          </div>
        </div>
      </div>
    </nav>

    <div class="form_area mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="card">
              <div class="card-body">
                <div class="inset_form">
                  <h2 class="text-center">Inset a new student data</h2>

                  <?php if(isset($error)) : ?>
                    <div class="alert alert-danger">
                      <?php echo $error; ?>
                    </div>
                  <?php endif; ?>

                  <?php if(isset($success)) : ?>
                    <div class="alert alert-success">
                      <?php echo $success; ?>
                    </div>
                  <?php endif; ?>

                  <form action="" method="POST">

                    <div class="mb-3">
                      <label for="name">Student Name</label>
                      <input type="text" class="form-control" id="name" name="st_name">
                    </div>

                    <div class="mb-3">
                      <label for="email">Student Email</label>
                      <input type="text" class="form-control" id="email" name="st_email">
                    </div>

                    <div class="mb-3">
                      <label for="roll">Student Roll</label>
                      <input type="text" class="form-control" id="roll" name="st_roll">
                    </div>

                    <div class="mb-3">
                      <label for="mobile">Student Number</label>
                      <input type="text" class="form-control" id="mobile" name="st_mobile">
                    </div>

                    <div class="mb-3">
                      <input type="submit" name="st_sub" value="inset data" class="btn btn-success">
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