<?php
	session_start();
	if(!$_SESSION['data']){
		session_destroy();
		header("location: ../login-page.php");
	}
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {

    session_unset();
    session_destroy();
	}
	$_SESSION['LAST_ACTIVITY'] = time();
	// var_dump($_SESSION);
	// exit();
	require_once("conf.php");

	$dbhost = 'localhost:3306';
	$dbuser = 'root';
	// $dbpass = 'lCcrEmsvI2+B';
	$dbpass = '12345';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'test_dbn');

	$uname = $_SESSION['user'];
	if(! $conn ) {
		die(mysqli_error($conn));
	}
	// print_r($uname);
	$newsql = "SELECT * FROM facebook_db WHERE user = '$uname' ORDER BY id DESC";
	$result = mysqli_query( $conn, $newsql);

	if(isset($_GET['delete'])){
		$id = $_GET['delete'];

		$nwsql = "DELETE FROM facebook_db WHERE id='$id'";
		// print_r($id);
		// exit();
		$cont = mysqli_query($con, $nwsql);
		$_SESSION['message'] ='Record deleted successfully';
		$_SESSION['type'] ='danger';
		header("location: ../index.php");
 }
 if(isset($_POST['post'])){

	$feed = $_POST['feed'];

	$inisql = "INSERT INTO facebook_db (feed, time, location, user)
							VALUES ('$feed', CURRENT_TIME,'Gurgaon,IN','$uname');"
		 ;
	$retvalnew = mysqli_query( $con, $inisql);
	if ( $retvalnew ) {
		 // echo "New record created successfully";
		 $_SESSION['message'] ='New record created successfully';
		 $_SESSION['type'] ='success';
	} else {
		 echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	// var_dump($_SESSION);
	// exit();
	// $_SESSION['entry_tab_show'] =  1;
	header("location: ../index.php");

}
?>