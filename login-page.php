
<!doctype html>

<html>

<head>
    <title>Facebook Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
		<link rel="stylesheet" href="./css/login-style.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>

<body>
	<?php
			require_once(__DIR__."/php/conf.php");
	// var_dump('I am here...');exit();
	?>
    <div id="main-container">
        <span id="logo">facebook</span>
        <div id="form">
					<form action="/php/login.php" method="post">
            <table class="tables">
              <tr>
                <td>
                  <input id="email" type="email" name="email" class="data email" placeholder="Email or phone number" />
                </td>
              </tr>
              <tr>
                <td>
									<span id="error-a" class="error"></span>
								</td>
              </tr>
              <tr>
                <td>
                  <input id="password" type="password" name="password" class="data password" placeholder="Password" />
                </td>
              </tr>
              <tr>
                <td>
									<span id="error-b" class="error"></span>
								</td>
              </tr>
            </table>
						<div>
            	<button type="submit" id="log-in" name="submit">Log In</button>
        		</div>
					<span><?php echo $error; ?></span>
          </form>
        </div>
      <div class="log-in">
        <a href="#">Sign Up for Facebook</a>
      </div>
      <div class="log-in">
        <a href="#">Need Help?</a>
      </div>
    </div>
    <!-- <script src="js/login.js"></script> -->
</body>

</html>