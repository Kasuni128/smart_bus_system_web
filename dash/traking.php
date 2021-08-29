<?php
session_start();
require_once("db.php");
$sql = "SELECT * FROM bus_info INNER JOIN route_info ON route_info.route_id = bus_info.route_id INNER JOIN time_table ON time_table.time_id = bus_info.time_id 
WHERE bus_info.isCompleteRoute = 'Complete'";
$result = mysqli_query($conn,$sql);

$link = mysqli_connect("localhost", "root", "", "smart_bus_system");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$handle = curl_init();
 
$url = "https://android-b3271-default-rtdb.firebaseio.com/Current%20Location.json";
 
// Set the url
curl_setopt($handle, CURLOPT_URL, $url);
// Set the result output to be a string.
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
 
$output = curl_exec($handle);
 
curl_close($handle);
$json = json_decode($output, true);
$latitude = $json['latitude'];
$longitude = $json['longitude'];
if ($latitude == "6.9087946" && $longitude == "80.0789246")
{
   $Current_Location = "Hanwella";
}
else if ($latitude == "6.8577869" && $longitude == "80.1749133")
{
   $Current_Location = "Labugama";
}
else if ($latitude == "6.8714563" && $longitude == "80.1433532")
{
   $Current_Location = "Iridapola";
}
else if ($latitude == "6.8845" && $longitude == "80.1398732371")
{
   $Current_Location = "Welikanna";
}
else if ($latitude == "6.8925463" && $longitude == "80.1304786")
{
   $Current_Location = "Kahahena";
}
else if ($latitude == "6.9119846" && $longitude == "80.1073472")
{
   $Current_Location = "Niripola";
}
else if ($latitude == "6.9150307" && $longitude == "80.1005022")
{
   $Current_Location = "Kaluaggala";
}
else if ($latitude == "6.9024306" && $longitude == "80.067716180.120651")
{
   $Current_Location = "Neluwattuduwa";
}



// $temp = preg_replace("/[^a-zA-Z 0-9]+/", "", $output );
if ($Current_Location == "Hanwella") 
{
    $msg = "bus came to hanwella and db updated";
   $sql1 = "UPDATE bus_info INNER JOIN route_info ON bus_info.route_id=route_info.route_id INNER JOIN time_table ON time_table.time_id=bus_info.time_id SET bus_info.isCompleteRoute='Complete', bus_info.bus_avb_seats='$Current_Location' 
   WHERE route_info.end_point='$Current_Location' AND time_table.end_time BETWEEN CURRENT_TIME() AND ADDTIME(CURRENT_TIME(), '2:00:00') ";
    if(mysqli_query($link, $sql1)){
} else {
    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link);
}
}
else if($Current_Location == "Labugama")
{
    $msg = "bus come to labugama and db updated";
   $sql1 = "UPDATE bus_info INNER JOIN route_info ON bus_info.route_id=route_info.route_id INNER JOIN time_table ON time_table.time_id=bus_info.time_id SET bus_info.bus_avb_seats='$Current_Location' 
   WHERE CURRENT_TIME() BETWEEN time_table.start_time AND time_table.end_time ";
    if(mysqli_query($link, $sql1)){
} else {
    echo "ERROR: Could not able to execute $sq1. " . mysqli_error($link);
}
}
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
      <h1 class="text-center" style="margin-bottom: 3%;">Bus Tracking Status</h1>
      <table class="table table-bordered grocery-crud-table table-hover">
  <thead>
  <tr>
            <th>Bus Name</th>
            <th>Bus Condtions</th>
            <th>Bus Contact No</th>
            <th>Route Complete Status</th>
            <th>Start Point</th>
            <th>End Point</th>
            <th>Start Time</th>
            <th>End Time</th>
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
            <td><?php echo $row['isCompleteRoute']; ?> - <?php echo($Current_Location);?></td>
            <td><?php echo $row['start_point']; ?></td>
            <td><?php echo $row['end_point']; ?></td>
            <td><?php echo $row['start_time']; ?></td>
            <td><?php echo $row['end_time']; ?></td>
</tr>
<?php
$i++;
}
?>
</tbody>
</table>
</div>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script><script  src="assest/dash.js"></script>

</body>
</html>