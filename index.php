

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
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            <a class="nav-link" href="insert.php">Insert Data</a>
          </div>
        </div>
      </div>
    </nav>

    <div class="data_area mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-3">
            <h2 class='text-center border-bottom mb-3'>All Student Data</h2>

            <?php if(isset($_GET['delete'] ) == 'success'): ?>
              <div class="alert alert-success">Data Delete Successfully !</div>
            <?php endif; ?>

            <div class="table-responcive">
              <table class="table table-striped">
                <thead class='bg-primary text-white'>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roll</th>
                    <th>Mobile</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                  include "config.php";
                  $sql = "select * from students";
                  $result = $pdo->query($sql);
                  if(!$result){
                    die("Invalid query!");
                  }
                  while($row=$result->fetch_assoc()){
                    echo "
                      <tr>
                        <th>$row[ID]</th>
                        <td>$row[Name]</td>
                        <td>$row[Email]</td>
                        <td>$row[Roll]</td>
                        <td>$row[Mobile]</td>
                        <td>
                          <a class='btn btn-warning' href='edit.php?ID=$row[ID]'>Edit</a>
                          <a class='btn btn-danger' href='delete.php?ID=$row[ID]'>Delete</a>
                        </td>
                      </tr>
                    ";
                  }
                ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>