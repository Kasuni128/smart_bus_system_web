<?php
session_start();
require_once("db.php");
$sql = "SELECT * FROM bus_info INNER JOIN route_info ON route_info.route_id = bus_info.route_id INNER JOIN time_table ON time_table.time_id = bus_info.time_id";
$result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Smart Bus System Dashboard</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/font-awesome.min.css'><link rel="stylesheet" href="assest/dash.css">

</head>
<body>
<!-- partial:index.partial.html -->
<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
   <nav class="navbar navbar-default no-margin">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header fixed-brand">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" id="menu-toggle">
<span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
</button>
         <a class="navbar-brand" href="#"><i class="fa fa-bus fa-4"></i> Smart Bus System</a>
      </div>
      <!-- navbar-header-->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav">
            <li class="active">
               <button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2"> <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
               </button>
            </li>
         </ul>
      </div>
      <!-- bs-example-navbar-collapse-1 -->
   </nav>
   <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
         <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
            <li class="active">
               <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-info-circle fa-stack-1x "></i></span>Bus Informations</a>
            </li>
            <li>
               <a href="users/users.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-user fa-stack-1x "></i></span>Users Informations</a>
            </li>
            <li>
               <a href="traking.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-bus fa-stack-1x "></i></span>Bus Tracking Status</a>
            </li>
            <li>
               <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-youtube-play fa-stack-1x "></i></span>About</a>
            </li>
            <li>
               <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-comments fa-stack-1x "></i></span>Contact</a>
            </li>
            <li>
            <a href="../logout.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-sign-out fa-stack-1x "></i></span>Log Out</a>
            </li>
         </ul>
      </div>
      <!-- /#sidebar-wrapper -->
      <!-- Page Content -->
      <div id="page-content-wrapper">
      <div class="container-fluid">
<!-- <a class="btn btn-primary btn-nueva" href="#"><b>+</b> Add New</a> -->
<table class="table table-bordered grocery-crud-table table-hover">
  <thead>
  <tr>
            <th>Bus Name</th>
            <th>Bus Condtions</th>
            <th>Bus Contact No</th>
            <th>Route Complete Status</th>
            <th>Current Location</th>
            <th>Start Point</th>
            <th>End Point</th>
           
            
            <th>Action</th>
          </tr>
          </thead>
        <tbody>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
if($i%2==0)
$classname="evenRow";
else
$classname="oddRow";
?>
<tr class="<?php if(isset($classname)) echo $classname;?>">
            <td><?php echo $row['bus_name']; ?></td>
            <td><?php echo $row['bus_condtions']; ?></td>
            <td><?php echo $row['bus_contact_number']; ?></td>
            <td><?php echo $row['isCompleteRoute']; ?></td>
            <td><?php echo $row['bus_avb_seats']; ?></td>
            <td><?php echo $row['start_point']; ?></td>
            <td><?php echo $row['end_point']; ?></td>
          
<td>
<a class="text-primary" href="edit.php?tb_id=<?php echo $row["tb_id"]; ?>"><i class="fa fa-fw fa-edit"></i>Edit</a>
<a class="text-danger" href="delete.php?tb_id=<?php echo $row["tb_id"]; ?>"><i class="fa fa-fw fa-trash"></i>Delete</a>
</td>
</tr>
<?php
$i++;
}
?>
</tbody>
</table>
</form>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script><script  src="assest/dash.js"></script>

</body>
</html>