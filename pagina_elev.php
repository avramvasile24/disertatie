	<?php
 	error_reporting(0);

    include 'connection.php';
    include 'crearecont.php';
    $title = "Creare cont";
	session_start();
		error_reporting(0);
    $bine=$_SESSION['idUnitate'];
	echo $bine;

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
    <script>
        function validatePassword() {
            var password = document.getElementById("pass").value;
            var confirmPassword = document.getElementById("pass1").value;

            if (password != confirmPassword) {
                document.getElementById("pass1").setCustomValidity("Confirmarea parolei trebuie să fie identică cu parola introdusă anterior.");
            } else {
                document.getElementById("pass1").setCustomValidity("");
            }
        }
    </script>
	<body class="bg-primary">
	    <main>
	        <div class="container">
	            <div class="row justify-content-center">
	                <div class="col-lg-5">
	                    <div class="card shadow-lg border-0 rounded-lg mt-5">
	                        <div class="card-header">
	                            <h3 class="text-center titlu-sign-in-up font-weight-light my-4"><?php echo $title ?></h3>
	                        </div>
							    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#user').on('input', function() {
                var username = $(this).val();

                // Trimite cererea AJAX către server pentru a verifica numele de utilizator
                $.ajax({
                    url: 'verifica_utilizator.php',
                    type: 'POST',
                    data: { username: username },
                    success: function(response) {
                        if (response === 'disponibil') {
                            $('#username_status').text('Numele de utilizator este disponibil.');
                        } else {
                            $('#username_status').text('Numele de utilizator este deja folosit, incercati altu!.');
                        }
                    }
                });
            });
        });
    </script>
	    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#email').on('input', function() {
                var email = $(this).val();

                // Trimite cererea AJAX către server pentru a verifica adresa de email
                $.ajax({
                    url: 'verifica_email.php',
                    type: 'POST',
                    data: { email: email },
                    success: function(response) {
                        if (response === 'disponibil') {
                            $('#email_status').text('Adresa de email nu este asociata!.');
                        } else {
                            $('#email_status').text('Adresa de email este asociata, incearca alta.');
                        }
                    }
                });
            });
        });
    </script>
	                        <div class="card-body">
	                            <div id="frm">
	                                <div class="page-header">
	                                </div>
	                                <form name="contact_form" id="contact_form" method="post" action="">

	                                    <title>Creeaza cont nou</title>
	                                    <main>
	                                        <div id="frm">
	                                            <form action="crearecont.php" method="POST">
	                                                <p>
	                                                    <center><label>Cod_activare:</label></center>
	                                                    <center><input type="text" id="cod" name="cod" value="<?php echo $_SESSION['cod']; ?>" readonly /></center>
	                                                </p>
													 <p>
	                                                    <center><label>Unitate:</label></center>
	                                                    <center><input type="text" id="unitate" name="unitate" value="<?php echo $_SESSION['nume']; ?>" readonly /></center>
	                                                </p>
	                                                <p>
	                                                    <center><label>Username:</label></center>
	                                                    <center><input type="text" id="user" name="user" /></center>
														        <span id="username_status"></span>
	                                                </p>
	                                                <p>
	                                                    <center><label>Parola:</label>
	                                                        <center>
	                                                            <center><input type="password" id="pass" name="pass"  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}" title="Parola trebuie să conțină cel puțin 8 caractere, un număr, o literă mică, o literă mare și un semn."/></center>
	                                                </p>
	                                                <p>
	                                                    <center><label>Repetare parola:</label>
	                                                        <center>
	                                                            <center><input type="password" id="pass1" name="pass1" required oninput="validatePassword()"/></center>
	                                                </p>
	                                                <p>
	                                                    <center><label>Nume si prenume:</label></center>
	                                                    <center><input type="name" id="nume" name="nume" /></center>
	                                                </p>
	                                                <p>
	                                                    <center><label>Email:</label></center>
	                                                    <center><input type="email" id="email" name="email" onblur="validateEmail(this);" /></center></center></center></center>
														<span id="email_status"></span>

	                                                </p>
													<p>
	                                                    <center><label>Clasa:</label></center>
	                                                    <center><select name="clasa" id="clasa">   
														<?php
    $conectare = mysqli_connect('localhost', 'root', '', 'disertatie');

    if (!$conectare) {
      die(mysqli_connect_error());
    }
	error_reporting(0);
    $sql = "SELECT * FROM cys WHERE idUnitate ='$bine'";
    $result = mysqli_query($conectare, $sql);
	while ($row = mysqli_fetch_assoc($result)) {?>
    <option><?php echo $row['cys']; ?></option> <?php } ?></select></center>
	                                                </p>
	                                                <p>
	                                                    <center><input type="submit" class="buton-sign-in-up" id="btn" name="submit" value="CREARE CONT" /></center>
	                                                </p>
	                                                <span><?php echo $error; ?></span>
	                                            </form>
	                                        </div>
	                            </div>
	                            <div class="card-footer text-center">
	                                <div class="small"><a href="index.php">Autentificare</a><br>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </main>
	    </div>
	    </div>
	    </form>
	    </div>
	    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	    <script src="js/scripts.js"></script>
	</body>

	</html>


	</div>
	<?php include 'footer.php'; ?>
	<?php include 'footer.php'; ?>