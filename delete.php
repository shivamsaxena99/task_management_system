<?php
include "db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM `task` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: index.php?msg= Task Deleted Successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
