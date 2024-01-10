<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $task_title = $_POST['tasktitle'];
  $task_description = $_POST['taskdescription'];
  $start_date = $_POST['startdate'];
  $end_date = $_POST['enddate'];

  $sql = "UPDATE `task` SET `tasktitle`='$task_title',`taskdescription`='$task_description',`startdate`='$start_date',`enddate`='$end_date' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Task Updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Task Management System</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    Task Management System
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Task Information</h3>
      <p class="text-muted">Click update for changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `task` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="mb-3">
          <label class="form-label">Task Title</label>
          <input type="text" class="form-control" name="tasktitle" value="<?php echo $row['tasktitle'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Task Description</label>
          <input type="text" class="form-control" name="taskdescription" value="<?php echo $row['taskdescription'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Start Date</label>
          <input type="date" class="form-control" name="startdate" value="<?php echo $row['startdate'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">End Date</label>
          <input type="date" class="form-control" name="endtdate" value="<?php echo $row['enddate'] ?>">
        </div>
        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>