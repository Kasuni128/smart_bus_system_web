<?php 
   include_once('config.php');
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
<?php
	$condition	=	'';
	if(isset($_REQUEST['name']) and $_REQUEST['name']!=""){
		$condition	.=	' AND name LIKE "%'.$_REQUEST['name'].'%" ';
	}
	if(isset($_REQUEST['uname']) and $_REQUEST['uname']!=""){
		$condition	.=	' AND uname LIKE "%'.$_REQUEST['uname'].'%" ';
	}
	if(isset($_REQUEST['email']) and $_REQUEST['email']!=""){
		$condition	.=	' AND email LIKE "%'.$_REQUEST['email'].'%" ';
	}
	if(isset($_REQUEST['contact']) and $_REQUEST['contact']!=""){
		$condition	.=	' AND contact LIKE "%'.$_REQUEST['contact'].'%" ';
	}
	if(isset($_REQUEST['state']) and $_REQUEST['state']!=""){
		$condition	.=	' AND state LIKE "%'.$_REQUEST['state'].'%" ';
	}
	if(isset($_REQUEST['utype']) and $_REQUEST['utype']!=""){
		$condition	.=	' AND utype LIKE "%'.$_REQUEST['utype'].'%" ';
	}
	
	$userData	=	$db->getAllRecords('users','*',$condition,'ORDER BY uid DESC');
	?>

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
            <li>
               <a href="../dash.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-info-circle fa-stack-1x "></i></span>Bus Informations</a>
            </li>
            <li class="active">
               <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-user fa-stack-1x "></i></span>Users Informations</a>
            </li>
			<li>
               <a href="../traking.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-bus fa-stack-1x "></i></span>Bus Tracking Status</a>
            </li>
            <li>
               <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-youtube-play fa-stack-1x "></i></span>About</a>
            </li>
            <li>
               <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-comments fa-stack-1x "></i></span>Contact</a>
            </li>
            <li>
            <a href="../../logout.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-sign-out fa-stack-1x "></i></span>Log Out</a>
            </li>
         </ul>
      </div>
      <!-- /#sidebar-wrapper -->
      <!-- Page Content -->
      <div id="page-content-wrapper">
      <?php
				if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rds"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record deleted successfully!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rus"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record updated successfully!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rnu"){
					echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You did not change any thing!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong <strong>Please try again!</strong></div>';
				}
				?>

<div class="col-sm-12">
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find User</h5>
					<form method="get">
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" id="name" class="form-control" value="<?php echo isset($_REQUEST['name'])?$_REQUEST['name']:''?>" placeholder="Enter Name">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>User Email</label>
									<input type="email" name="email" id="email" class="form-control" value="<?php echo isset($_REQUEST['email'])?$_REQUEST['email']:''?>" placeholder="Enter user email">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>User Name</label>
									<input type="text" name="uname" id="uname" class="form-control" value="<?php echo isset($_REQUEST['uname'])?$_REQUEST['uname']:''?>" placeholder="Enter username">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>User Contact</label>
									<input type="text" name="contact" id="contact" class="form-control" value="<?php echo isset($_REQUEST['contact'])?$_REQUEST['contact']:''?>" placeholder="Enter user phone">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>User State</label>
									<input type="text" name="state" id="state" class="form-control" value="<?php echo isset($_REQUEST['state'])?$_REQUEST['state']:''?>" placeholder="Enter State">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>User Type</label>
									<input type="text" name="utype" id="uype" class="form-control" value="<?php echo isset($_REQUEST['utype'])?$_REQUEST['utype']:''?>" placeholder="Enter User">
								</div>
							</div>

							<div class="col-sm-2">
								<div class="form-group">
									<label>&nbsp;</label>
									<div>
										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
										<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-eraser"></i> Clear</a>

									</div>
								</div>
							</div>
						</div>
					</form>
				</div>

      <div class="container-fluid">
<a class="btn btn-primary btn-nueva" href="add-users.php"><b>+</b> Add New</a>
<table class="table table-bordered grocery-crud-table table-hover">
  <thead>
  <tr>
                  <th class="text-center">Sr#</th>
						<th class="text-center">Name</th>
						<th class="text-center">User Email</th>
						<th class="text-center">User Name</th>
						<th class="text-center">User Phone</th>
						<th class="text-center">State</th>
						<th class="text-center">User Type</th>
						<th class="text-center">Action</th>
          </tr>
          </thead>
          <tbody>
					<?php 
					if(count($userData)>0){
						$s	=	'';
						foreach($userData as $val){
							$s++;
					?>
					<tr>
						<td><?php echo $s;?></td>
						<td><?php echo $val['name'];?></td>
						<td><?php echo $val['email'];?></td>
						<td><?php echo $val['uname'];?></td>
						<td><?php echo $val['contact'];?></td>
						<td><?php echo $val['state'];?></td>
						<td><?php echo $val['utype'];?></td>
						<td align="center">
							<a href="edit-users.php?editId=<?php echo $val['uid'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
							<a href="delete.php?delId=<?php echo $val['uid'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
						</td>

					</tr>
					<?php 
						}
					}else{
					?>
					<tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
					<?php } ?>
				</tbody>
</table>


</div>
      </div>
      <!-- /#page-content-wrapper -->
   </div>
   <!-- /#wrapper -->
   <!-- jQuery -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script><script  src="assest/dash.js"></script>

</body>
</html>