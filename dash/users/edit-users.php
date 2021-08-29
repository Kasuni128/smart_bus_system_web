<?php include_once('config.php');
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('users','*',' AND uid="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($name==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
		exit;
	}elseif($email==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);
		exit;
	}elseif($uname==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
	}elseif($contact==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
	}elseif($state==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
	}elseif($utype==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
	}
	$data	=	array(
		'name'=>$name,
		'email'=>$email,
		'uname'=>$uname,
		'contact'=>$contact,
		'state'=>$state,
		'utype'=>$utype,
					);
	$update	=	$db->update('users',$data,array('uid'=>$editId));
	if($update){
		header('location: users.php?msg=rus');
		exit;
	}else{
		header('location: users.php?msg=rnu');
		exit;
	}
}
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
		<?php


if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
			
}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		}
		?>
					<form method="post">
					<h2>Edit Users</h2>

					<div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="name">Name</label>
		  <input type="text" name="name" id="name" class="form-control" value="<?php echo $row[0]['name']; ?>">
        </div>
      </div>
      <!--  col-md-6   -->

      <div class="col-md-6">
        <div class="form-group">
          <label for="email">User Email</label>
		  <input type="email" name="email" id="email" class="form-control" value="<?php echo $row[0]['email']; ?>">
        </div>
      </div>
      <!--  col-md-6   -->
    </div>


    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="uname">User Name</label>
		  <input type="text" name="uname" id="uname" class="form-control"  value="<?php echo $row[0]['uname']; ?>">
        </div>


      </div>
      <!--  col-md-6   -->
      <div class="col-md-6">
        <div class="form-group">
          <label for="contact">Contact Number</label>
		  <input type="text" name="contact" id="contact" class="form-control" value="<?php echo $row[0]['contact']; ?>">
		</div>


      </div>
      <!--  col-md-6   -->
    </div>
	<div class="row">
	<div class="col-md-6">
	<div class="form-group">
	<label>State (active or inactive)<span class="text-danger">*</span></label>
	<input type="text" name="state" id="state" class="form-control" value="<?php echo $row[0]['state']; ?>" placeholder="Enter user state" required>
</div>
	</div>
      <!--  col-md-6   -->
	  <div class="col-md-6">
		<div class="form-group">
                <label>Type <span class="text-danger">*</span></label>
				<input type="text" name="utype" id="utype" class="form-control" value="<?php echo $row[0]['utype']; ?>" placeholder="Enter user  Typer" required>
				<label>Select- admin, time_keeper, driver, user</span></label>
            </div>	
      </div>
      <!--  col-md-6   -->
    </div>
    <!--  row   -->
      <!--  col-md-6   -->
    </div>
    <!--  row   -->

    <div class="text-center"> 
	<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update User</button>
						</div>    
					</div>
  </form>
</div>
<!-- partial -->
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
</body>
</html>