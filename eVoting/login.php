<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Login">
  <title>Login</title>
  <!-- Add Bootstrap and custom CSS links -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/homestyle.css" rel="stylesheet" type="text/css">

  <script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-app.js";
    import { getAuth, signInWithEmailAndPassword, sendPasswordResetEmail } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-auth.js";

    // Firebase Configuration
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
    const app = initializeApp(firebaseConfig);
    const auth = getAuth(app);

    // Login User Function
    async function loginUser(event) {
      event.preventDefault();

      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value;

      if (!email || !password) {
        alert("Please enter both email and password.");
        return;
      }

      try {
        const userCredential = await signInWithEmailAndPassword(auth, email, password);
        const user = userCredential.user;

        // Redirect to user profile page after successful login
        window.location.href = "user.php"; // Redirect to user profile page
      } catch (error) {
        console.error("Error during login:", error.message);
        alert("Error: " + error.message);
      }
    }

    // Forgot Password Function
    async function forgotPassword() {
      const email = document.getElementById("email").value.trim();
      if (!email) {
        alert("Please enter your email address.");
        return;
      }

      try {
        await sendPasswordResetEmail(auth, email);
        alert("Password reset email sent! Please check your inbox.");
      } catch (error) {
        console.error("Error sending password reset email:", error.message);
        alert("Error: " + error.message);
      }
    }

    // Make functions globally accessible
    window.loginUser = loginUser;
    window.forgotPassword = forgotPassword;
  </script>
</head>
<body>
  <!-- Navigation Panel -->
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

  <!-- Login Form -->
  <div class="container" id="wrap">
    <h1>Login</h1>
    <form onsubmit="loginUser(event)">
      <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" id="email" class="form-control" placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" class="form-control" placeholder="Enter your password" required>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <!-- Forgot Password and Not yet Registered Links -->
    <div class="container">
      <br>
      <span class="psw"><a href="javascript:void(0);" onclick="forgotPassword()">Forgot Password?</a></span><br>
      <span class="psw"><a href="register.html">Not yet registered?</a></span>
    </div>
  </div>
</body>
</html>
