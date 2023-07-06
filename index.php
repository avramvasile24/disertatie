	<?php

    include 'connection.php';
	error_reporting(0);


    if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "") {

        redirect("dashboard.php");
    }
    include 'header.php';
    $mode = "";
    $title = "Autentificare";
    $mode = $_POST['mode'];

    if ($mode == "loginare") {
        $username = trim($_POST['username']);
        $pass = trim($_POST['user_password']);

        if ($username == "" || $pass == "") {
        } else {
            $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$pass' ";
            $results = mysqli_query($db, $sql);
            if (!$results)
                die('Invalid querry:' . mysqli_error($db));
            else {

				$sql = "UPDATE users SET online = 'ON' WHERE username = ''$username";


                $sql2 = mysqli_query($db, "SELECT users.Id, users.nume, users.username,users.functie,users.idUnitate,users.clasa, user_types.redirect, dash_text.content_text,dash_text.titlu FROM users LEFT JOIN dash_text  ON users.type=dash_text.user_type_id LEFT JOIN user_types ON users.type= user_types.Id WHERE users.username = '$username' AND users.password = '$pass'");
                $myrow1 = mysqli_fetch_array($sql2, MYSQLI_ASSOC);

                $rows = mysqli_num_rows($sql2);

                if ($rows > 0) {



                    $_SESSION["user_id"] = $myrow1["Id"];
                    $_SESSION["name"] = $myrow1["nume"];
                    $_SESSION["username"] = $myrow1["username"];
                    $_SESSION["titlu"] = $myrow1["titlu"];
                    $_SESSION["continut"] = $myrow1["content_text"];
				    $_SESSION['functie']=$myrow1["functie"];
                    $_SESSION['idUnitate']=$myrow1['idUnitate'];
					$_SESSION['clasa']=$myrow1['clasa'];


                    redirect($myrow1["redirect"]);
                    exit;
                }
            }
        }
        redirect("first_page.html");
    }


    ?>
	<!DOCTYPE html>
	<html>
	<title>Autentificare</title>
	<?php

    include 'connection.php';
    	error_reporting(0);
    if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "") {

        redirect("dashboard.php");
    }
    include 'header.php';
    $mode = "";
    $title = "Autentificare";
    $mode = $_POST['mode'];
    session_start();
    if ($mode == "loginare") {
        $username = trim($_POST['username']);
        $pass = trim($_POST['user_password']);

        if ($username == "" || $pass == "") {
        } else {
            $sql = "SELECT * FROM users WHERE username = '$username' AND pass = '$pass' ";
            $results = mysqli_query($db, $sql);
            $_SESSION['use'] = $username;
            if (!$results)
                die('Invalid querry:' . mysqli_error($db));
            else {



                $sql2 = mysqli_query($db, "SELECT users.Id, users.nume, users.username, users.idUnitate,users.functie, user_types.redirect, dash_text.content_text,dash_text.titlu FROM users LEFT JOIN dash_text  ON users.type=dash_text.user_type_id LEFT JOIN user_types ON users.type= user_types.Id WHERE users.username = '$username' AND users.pass = '$pass'");
                $myrow1 = mysqli_fetch_array($sql2, MYSQLI_ASSOC);

                $rows = mysqli_num_rows($sql2);

                if ($rows and count($rows) > 0) {



                    $_SESSION["user_id"] = $myrow1["Id"];
                    $_SESSION["name"] = $myrow1["nume"];
                    $_SESSION["username"] = $myrow1["username"];
                    $_SESSION["titlu"] = $myrow1["titlu"];
                    $_SESSION["continut"] = $myrow1["content_text"];
					$_SESSION['functie']=$myrow1["functie"];
                    $_SESSION['idUnitate']=$myrow1['idUnitate'];


                    redirect($myrow1["redirect"]);
                    exit;
                }
            }
        }
        redirect("first_page.html");
    }


    ?>

	<head>
	    <meta charset="utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	    <meta name="description" content="" />
	    <meta name="author" content="" />
	    <title><?php echo $title ?></title>
	    <link href="css/styles.css" rel="stylesheet" />
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	</head>

	<body style="background-color: rgb(0, 255, 0);">
	    <main>
	        <div class="container">
	            <div class="row justify-content-center">
	                <div class="col-lg-5">
	                    <div class="card shadow-lg border-0 rounded-lg mt-5">
	                        <div class="card-header">
	                            <h3 class="text-center titlu-sign-in-up font-weight-light my-4"><?php echo $title ?></h3>
	                        </div>
							<script>
    function togglePasswordVisibility() {
      var passwordInput = document.getElementById("user_password");
      var eyeIcon = document.getElementById("eye-icon");
      
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.className = "fa fa-eye-slash";
      } else {
        passwordInput.type = "password";
        eyeIcon.className = "fa fa-eye";
      }
    }
    function rememberUser() {
      var usernameInput = document.getElementById("username");
      var rememberCheckbox = document.getElementById("remember");

      if (rememberCheckbox.checked) {
        var username = usernameInput.value;
        localStorage.setItem("rememberedUsername", username);
      } else {
        localStorage.removeItem("rememberedUsername");
      }
    }

    window.onload = function() {
      var rememberedUsername = localStorage.getItem("rememberedUsername");
      if (rememberedUsername) {
        var usernameInput = document.getElementById("username");
        var rememberCheckbox = document.getElementById("remember");
        usernameInput.value = rememberedUsername;
        rememberCheckbox.checked = true;
      }
    };
  </script>
  <style>
    .fa {
      cursor: pointer;
    }
  </style>
  
	                        <div class="card-body">
	                            <div id="frm">
	                                <div class="page-header">
	                                </div>
	                                <form name="contact_form" id="contact_form" method="post" action="">

	                                    <div id="frm">
	                                        <p class="hide"><input type="text" name="mode" value="loginare"></p>
	                                        <center><label>Username:</label></center>
	                                        <center><input type="text" id="username" name="username" /></center>
	                                        </p>
	                                        <p>
	                                            <center><label>Parola:</label></center>
	                                            <center><input type="password" id="user_password" name="user_password" />    <i class="fa fa-eye" id="eye-icon" onclick="togglePasswordVisibility()"></i>
</center>
	                                        </p>
	                                        <div class="large-8 medium-8 small-8 columns">
	                                            <center>
	                                                <input class="buton-sign-in-up" type="submit" name="submit" value="AUTENTIFICARE">
	                                        </div>
	                                    </div>
	                                    <div class="form-group">
       <input type="checkbox" id="remember" onclick="rememberUser()">
      <center>Reține utilizatorul</center>
    </label>                               </div>
	                                    </center>
	                                   <center> <div class="titlu-tabel"><a class="buton-sign-in-up" href="password.html">Parola uitata?</a></center>
	                                </form>
	                                <br>
	                                <div class="card-footer text-center">
	                                    <div class="titlu-tabel"><a href="registru_connect_cod.php">Creeaza cont</a><br>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	    </main>
	    </div>
	    </form>
		  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

	    </div>
	    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	    <script src="js/scripts.js"></script>
	</body>

	</html>


	</div>
	<?php include 'footer.php'; ?>
	<?php include 'footer.php'; ?>