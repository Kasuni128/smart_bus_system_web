<?php  
session_start();
include "../db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['utype'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$uname = test_input($_POST['uname']);
	$password = test_input($_POST['password']);
	$utype = test_input($_POST['utype']);

	if (empty($uname)) {
		header("Location: ../index.php?error=User Name is Required");
	}else if (empty($password)) {
		header("Location: ../index.php?error=Password is Required");
	}else {

        
        $sql = "SELECT * FROM users WHERE uname='$uname' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
        	// the user name must be unique
        	$row = mysqli_fetch_assoc($result);
        	if ($row['password'] === $password && $row['utype'] == $utype) {
        		$_SESSION['name'] = $row['name'];
        		$_SESSION['uid'] = $row['uid'];
        		$_SESSION['utype'] = $row['utype'];
        		$_SESSION['uname'] = $row['uname'];

        		header("Location: ../dash/dash.php");

        	}else {
        		header("Location: ../index.php?error=Incorect User name or password");
        	}
        }else {
        	header("Location: ../index.php?error=Incorect User name or password");
        }

	}
	
}else {
	header("Location: ../index.php");
}