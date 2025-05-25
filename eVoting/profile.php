<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Candidate List</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/homestyle.css" rel="stylesheet" type="text/css">
    <style>
        .candidate-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid" id="wrap">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">The Election</a>
                </div>
                <div class="collapse navbar-collapse" id="defaultNavbar1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="register.html">Register</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="profile.php">Candidates</a></li>
                        <li><a href="polls.html">Live Poll</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1 class="my-4 text-center">Candidates List</h1>
        <div class="row">
            <!-- Candidate Cards -->
            <div class="col-md-4">
                <div class="candidate-card">
                    <img src="images/Matthew.png" alt="Picture of Mathew">
                    <h3>Mathew</h3>
                    <p class="candidate-party">Party: The Socials</p>
                    <p class="candidate-description">Focus: Advocating socialism for equitable wealth distribution and social justice.</p>
                    <button class="btn btn-primary btn-block" onclick="redirectToLogin()">Vote Now</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="candidate-card">
                    <img src="images/Mariam.png" alt="Picture of Mariam">
                    <h3>Mariam</h3>
                    <p class="candidate-party">Party: The Communal</p>
                    <p class="candidate-description">Focus: Promoting communism to ensure equal ownership and eliminate class distinctions.</p>
                    <button class="btn btn-primary btn-block" onclick="redirectToLogin()">Vote Now</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="candidate-card">
                    <img src="images/Menzi.png" alt="Picture of Menzi">
                    <h3>Menzi</h3>
                    <p class="candidate-party">Party: The Capital</p>
                    <p class="candidate-description">Focus: Championing capitalism for free markets and individual economic freedom.</p>
                    <button class="btn btn-primary btn-block" onclick="redirectToLogin()">Vote Now</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Firebase Configuration -->
    <script>
    // Firebase configuration
    const firebaseConfig = {
        apiKey: "AIzaSyCkY0uoM-vN-kZvLaI3QMiefePvWpRUeKs",
        authDomain: "evoting-86a8c.firebaseapp.com",
        databaseURL: "https://evoting-86a8c-default-rtdb.europe-west1.firebasedatabase.app",
        projectId: "evoting-86a8c",
        storageBucket: "evoting-86a8c.appspot.com",
        messagingSenderId: "310835818129",
        appId: "1:310835818129:web:14ab11036d25a4dc1ad930"
    };

    // Initialize Firebase
    const app = firebase.initializeApp(firebaseConfig);

    // Redirect function for "Vote Now" button
    function redirectToLogin() {
        window.location.href = "login.php";
    }
    </script>

    <script src="js/bootstrap.js"></script>
</body>
</html>