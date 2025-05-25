<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/homestyle.css" rel="stylesheet" type="text/css">
    <!-- Firebase Scripts -->
    <script type="module">
      // Import necessary Firebase modules
      import { initializeApp } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-app.js";
      import { getAuth, onAuthStateChanged, signOut } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-auth.js";
      import { getFirestore, doc, getDoc } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-firestore.js";
      
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
      const app = initializeApp(firebaseConfig);
      const auth = getAuth(app);
      const db = getFirestore(app);

      // Get elements from HTML
      const logoutBtn = document.getElementById('logout');
      const nameSpan = document.getElementById('firstName');
      const surnameSpan = document.getElementById('lastName');
      const provinceSpan = document.getElementById('province');
      const voteSpan = document.getElementById('vote');

      // On Auth State Changed (check if user is logged in)
      onAuthStateChanged(auth, async (user) => {
          if (user) {
              // Fetch user data from Firestore
              const userDocRef = doc(db, "users", user.uid);
              const userDoc = await getDoc(userDocRef);

              if (userDoc.exists()) {
                  const userData = userDoc.data();
                  // Display the user's profile information in the page
                  nameSpan.textContent = userData.firstName || 'N/A';
                  surnameSpan.textContent = userData.lastName || 'N/A';
                  provinceSpan.textContent = userData.province || 'N/A';
                  voteSpan.textContent = userData.vote || 'No vote cast';
              } else {
                  console.log("No user data found!");
              }
          } else {
              // If user is not logged in, redirect to login page
              window.location.href = 'login.php';
          }
      });

      // Handle Logout
      logoutBtn.addEventListener('click', async () => {
          await signOut(auth);
          window.location.href = 'index.html';  // Redirect to index.php after logout
      });
    </script>
</head>
<body>
    <h1>User Profile</h1>

    <!-- Profile Details -->
    <p><strong>First Name:</strong> <span id="firstName"></span></p>
    <p><strong>Last Name:</strong> <span id="lastName"></span></p>
    <p><strong>Province:</strong> <span id="province"></span></p>
    <p><strong>Vote:</strong> <span id="vote"></span></p>

    <!-- Logout Button -->
    <button id="logout">Logout</button>
</body>
</html>
