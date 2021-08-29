<?php include_once('config.php');
if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($name==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=name');
		exit;
	}elseif($email==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=email');
		exit;
	}elseif($uname==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=uname');
		exit;
	}elseif($password==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=password');
		exit;
	}elseif($contact==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=contact');
		exit;
	}elseif($utype==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=utype');
		exit;
	}else{
		
		$userCount	=	$db->getQueryCount('users','uid');
		if($userCount[0]['total']<20){
			$data	=	array(
							'name'=>$name,
							'email'=>$email,
							'uname'=>$uname,
							'password'=>$password,
							'contact'=>$contact,
							'state'=>$state,
							'utype'=>$utype,
						);
			$insert	=	$db->insert('users',$data);
			if($insert){
				header('location:users.php?msg=ras');
				exit;
			}else{
				header('location:users.php?msg=rna');
				exit;
			}
		}else{
			header('location:'.$_SERVER['PHP_SELF'].'?msg=dsd');
			exit;
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Add Details</title>
  <script src="https://bootstrapcreative.com/wp-bc/wp-content/themes/wp-bootstrap/codepen/bootstrapcreative.js?v=8"></script><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
  <form method="POST">
    <h2>Add Users</h2>
		<?php

		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="name"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> name is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="email"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="uname"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User User Name is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="password"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User Password is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="contact"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="utype"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User Type is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="dsd"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Please delete a user and then try again <strong>We set limit for security reasons!</strong></div>';

		}

		?>

<div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="name">Name</label>
		  <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" >
        </div>
      </div>
      <!--  col-md-6   -->

      <div class="col-md-6">
        <div class="form-group">
          <label for="email">User Email</label>
		  <input type="email" name="email" id="email" class="form-control" placeholder="Enter user email" >
        </div>
      </div>
      <!--  col-md-6   -->
    </div>


    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="uname">User Name</label>
		  <input type="text" name="uname" id="uname" class="form-control" placeholder="Enter User Name" >
        </div>


      </div>
      <!--  col-md-6   -->

      <div class="col-md-6">

        <div class="form-group">
          <label for="password">Password</label>
		  <input type="text" name="password" id="password" class="form-control" placeholder="Enter password" >
        </div>
      </div>
      <!--  col-md-6   -->
    </div>
	<div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="uname">Contact Number</label>
		  <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter Number" >        </div>


      </div>
      <!--  col-md-6   -->

      <div class="col-md-6">

        <div class="form-group">
		<label>state<span class="text-danger">*</span></label>
                <select class="form-control" id="state" name="state">
                <option value = "active">Active</option>
                  <option value = "inactive">Inactive</option>
                </select>
        </div>

		<div class="form-group">

                <label>Type <span class="text-danger">*</span></label>

                <select class="form-control" id="utype" name="utype">
                  <option value = "user">User</option>
                  <option value = "driver">Driver</option>
                  <option value = "time_keeper">Time Keeper</option>
                  <option value = "admin">Admin</option>
                </select>

            </div>	
      </div>
      <!--  col-md-6   -->
    </div>
    <!--  row   -->
      <!--  col-md-6   -->
    </div>
    <!--  row   -->

    <div class="text-center"> 
	<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add User</button>
    </div>
  </form>
</div>
<!-- partial -->
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
</body>
</html>