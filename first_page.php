<html>
<head>
	    <meta charset="utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	    <meta name="description" content="" />
	    <meta name="author" content="" />
	    <title>LOGIN FAILED</title>
	    <link href="css/styles.css" rel="stylesheet" />
	</head>
  <script>
    var countdown = 5; // Numărătoarea inversă în secunde
    var countdownDisplay = document.getElementById("countdown");

    function redirectWithCountdown() {
      countdownDisplay.innerHTML = countdown;

      var redirectInterval = setInterval(function() {
        countdown--;
        countdownDisplay.innerHTML = countdown;

        if (countdown === 0) {
          clearInterval(redirectInterval);
          window.location.href = "index.php";
        }
      }, 1000);
    }
  </script>
	<body class="bg-primary">
	    <main>
	        <div class="container">
	            <div class="row justify-content-center">
	                <div class="col-lg-5">
	                    <div class="card shadow-lg border-0 rounded-lg mt-5">
	                        <div class="card-header">
	                            <h3 class="text-center titlu-sign-in-up font-weight-light my-4">AUTENTIFICARE ESUATA!<br><h5 class="text-center titlu-sign-in-up font-weight-light my-4">Vei fi redirecționat în <span id="countdown">5</span> secunde...</h5>
</h3>
	                        </div>
							  <script>
    redirectWithCountdown();
  </script>
</head>
</html>