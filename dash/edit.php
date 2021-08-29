<?php
session_start();
require_once("db.php");
if(count($_POST)>0) {
	$sql = "UPDATE bus_info INNER JOIN route_info ON route_info.route_id = bus_info.route_id INNER JOIN time_table ON time_table.time_id = bus_info.time_id
	set bus_no='" . $_POST["bus_no"] . "', isCompleteRoute='" . $_POST["isCompleteRoute"] . "', start_time='" . $_POST["start_time"] . "', end_time='" . $_POST["end_time"] . "'
	WHERE tb_id='" . $_POST["tb_id"] . "'";
	mysqli_query($conn,$sql);
  header('location:dash.php');
  exit;
}
$select_query = "SELECT * FROM bus_info INNER JOIN route_info ON route_info.route_id = bus_info.route_id INNER JOIN time_table ON time_table.time_id = bus_info.time_id WHERE tb_id='" . $_GET["tb_id"] . "'";
$result = mysqli_query($conn,$select_query);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Edit Details</title>
  <script src="https://bootstrapcreative.com/wp-bc/wp-content/themes/wp-bootstrap/codepen/bootstrapcreative.js?v=8"></script><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
<form name="frmUser" method="post" action="">
<h2>Edit Details</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="bus_no">Bus Number</label>
		  <input type="hidden" name="tb_id" class="txtField" value="<?php echo $row['tb_id']; ?>">
          <input name="bus_no" type="text" class="form-control" value="<?php echo $row['bus_no']; ?>">
        </div>
      </div>


      <div class="col-md-6">
        <div class="form-group">
          <label for="state">Bus Status  (Complete Or Not-Complete)</label>
          <input name="isCompleteRoute" type="text" class="form-control" value="<?php echo $row['isCompleteRoute']; ?>">
        </div>
      </div>

    </div>


    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="start_time">Start Point</label>
          <input name="start_time"  type="text" class="form-control" value="<?php echo $row['start_point']; ?>">
        </div>


      </div>


      <div class="col-md-6">

        <div class="form-group">
          <label for="end_time">End Point</label>
          <input name="end_time" type="text" class="form-control" value="<?php echo $row['end_point']; ?>">
        </div>
      </div>
    </div>
    </div>


    <div class="text-center"> 
	<button name="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
<!-- partial -->
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
</body>
</html>