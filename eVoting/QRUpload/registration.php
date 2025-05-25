<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Voter Registration">
  <title>Voter's Registration</title>
  <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="../css/registerstyle.css" rel="stylesheet" type="text/css">
  <link href="../css/homestyle.css" rel="stylesheet" type="text/css"> <!-- Added link to homestyle.css -->

  <script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-app.js";
    import { getAuth, createUserWithEmailAndPassword, sendEmailVerification } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-auth.js";
    import { getFirestore, doc, setDoc, getDoc, updateDoc, runTransaction } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-firestore.js";

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
    const db = getFirestore(app);

    // Register User Function
    async function registerUser(event) {
      event.preventDefault();

      const userId = document.getElementById("userId").value.trim();
      const firstName = document.getElementById("firstName").value.trim();
      const lastName = document.getElementById("lastName").value.trim();
      const dateOfBirth = document.getElementById("dateOfBirth").value.trim();
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value;
      const selectedCandidate = document.getElementById("candidate").value;
      const selectedProvince = document.getElementById("province").value;

      if (!userId || !firstName || !lastName || !dateOfBirth || !email || !password || !selectedCandidate || !selectedProvince) {
        alert("Please fill out all fields.");
        return;
      }

      try {
        // Create user in Firebase Authentication
        const userCredential = await createUserWithEmailAndPassword(auth, email, password);
        const user = userCredential.user;

        // Send email verification
        await sendEmailVerification(user);
        alert("A verification email has been sent. Please verify your email before logging in.");

        // Save user data in Firestore
        await setDoc(doc(db, "users", user.uid), {
          userId: userId,
          firstName: firstName,
          lastName: lastName,
          dateOfBirth: dateOfBirth,
          email: email,
          province: selectedProvince,
          vote: selectedCandidate,
          emailVerified: false // Initially false, changes after verification
        });

        // Increment vote for the selected candidate using Firestore transaction
        await voteForCandidate(selectedCandidate);

        // Redirect to login page after registration
        window.location.href = "login.php"; // This redirects to the login page

      } catch (error) {
        console.error("Error during registration:", error.message);
        alert("Error: " + error.message);
      }
    }

    // Firestore Transaction to handle vote counting
    async function voteForCandidate(candidateId) {
      const candidateRef = doc(db, "candidates", candidateId);

      try {
        // Run Firestore transaction
        await runTransaction(db, async (transaction) => {
          const candidateDoc = await transaction.get(candidateRef);

          // Ensure the candidate exists
          if (!candidateDoc.exists()) {
            throw "Candidate does not exist!";
          }

          // Get the current vote count
          const currentVoteCount = candidateDoc.data().voteCount;

          // Increment the vote count
          transaction.update(candidateRef, {
            voteCount: currentVoteCount + 1,
          });
        });

        console.log("Vote successfully recorded!");
      } catch (error) {
        console.error("Error voting:", error);
      }
    }

    // Make the function globally accessible
    window.registerUser = registerUser;
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
            <li><a href="http://localhost/eVoting/index.html">Home</a></li>
	          <li><a href="http://localhost/eVoting/register.html">Register</a></li>
	          <li><a href="http://localhost/eVoting/login.php">Login</a></li>
	          <li><a href="http://localhost/eVoting/profile.php">Candidate Profiles</a></li>
	          <li><a href="http://localhost/eVoting/statistics.php">Statistics</a></li>
            <li><a href="http://localhost/eVoting/polls.html">Live Polls</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="container">
    <h1>Voter Registration</h1>
    <form onsubmit="registerUser(event)">
      <div class="form-group">
        <label for="userId">ID Number:</label>
        <input type="text" id="userId" class="form-control" placeholder="Enter your ID" required>
      </div>
      <div class="form-group">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" class="form-control" placeholder="Enter your first name" required>
      </div>
      <div class="form-group">
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" class="form-control" placeholder="Enter your last name" required>
      </div>
      <div class="form-group">
        <label for="dateOfBirth">Date of Birth:</label>
        <input type="date" id="dateOfBirth" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" id="email" class="form-control" placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" class="form-control" placeholder="Enter a secure password" required>
      </div>
      <div class="form-group">
        <label for="candidate">Select Candidate:</label>
        <select id="candidate" class="form-control" required>
          <option value="" disabled selected>Select a candidate</option>
          <option value="Mathew">Mathew</option>
          <option value="Mariam">Mariam</option>
          <option value="Menzi">Menzi</option>
        </select>
      </div>
      <div class="form-group">
        <label for="province">Select Province:</label>
        <select id="province" class="form-control" required>
          <option value="" disabled selected>Select your province</option>
          <option value="Gauteng">Gauteng</option>
          <option value="Western Cape">Western Cape</option>
          <option value="KwaZulu-Natal">KwaZulu-Natal</option>
          <option value="Eastern Cape">Eastern Cape</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>
</body>
</html>
