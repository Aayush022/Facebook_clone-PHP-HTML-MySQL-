<?php
	session_start();
	// echo $_SESSION['data'];
	// unset($_SESSION['data']);
?>
<!doctype html>

<html>

	<head>
			<title>Facebook Timeline</title>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" type="text/css" href="./css/style.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
			<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>


	<body>
	<?php
		require_once(__DIR__."/php/conf.php");
		// require(__DIR__."/php/timeline/php");
		require_once(__DIR__."/php/timeline.php");
		// echo $row['feed'];
		// var_dump('I am here...');exit();
	?>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.html">Facebook</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Timeline</a></li>
					<li><a href="#">Profile</a></li>
					<li><a href="/php/logout.php">Logout</a></li>
				</ul>
			</div>
		</nav>
		<main class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-body">
							<h4><?php echo $_SESSION['data']; ?></h4>
							<p>Image</p>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-body">
							<h4>Friend Request</h4>
							<ul>

								<div class="row">
									<li>
										<a href="#">XYZ ABC</a>
									</li>
								</div>
								<div class="row">
									<a class="text-success" href="#">Accept</a>
									<a class="text-danger" href="#">Decline</a>
								</div>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6">
				<form action="/php/timeline.php" method="POST" >
						<div class="input-group">
							<input class="form-control" type="text" name="feed" placeholder="Make a post...">
							<span class="input-group-btn">
								<button class="btn btn-success" type="submit" name="post">Post</button>
							</span>
						</div>
					</form><hr>
					<div>
					<?php while( $row = $result->fetch_assoc()): ?>
						<div class="panel panel-default">

							<div class="panel-body">
								<p><?php echo $row['feed'];?></p>
							</div>
							<div class="panel-footer">
								<span><?php echo $row['time'];?></span>
								<span><?php echo $row['location'];?></span>
								<span class="pull-right"><a class="text-danger" href="/php/timeline.php?delete=<?php echo $row['id'];?>">Delete</a></span>
							</div>
						</div>
						<?php endwhile; ?>
					</div>

				</div>
				<div class="col-md-3">

					<div class="panel panel-default">
						<div class="panel-body">
							<h4>Suggestions</h4>
							<ul>
								<li>
									<a href="#">Sachin</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-body">
							<h4>Friends</h4>
							<ul>
								<li>
									<a href="#">Abhishek</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</main>
	</body>

</html>