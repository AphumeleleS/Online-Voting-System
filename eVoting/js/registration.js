<script type="module">
  // Import the Firebase SDKs
  import { initializeApp } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-app.js";
  import { getAuth, createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-auth.js";
  import { getDatabase, ref, set } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-database.js";

  // Your Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyCkY0uoM-vN-kZvLaI3QMiefePvWpRUeKs",
    authDomain: "evoting-86a8c.firebaseapp.com",
    databaseURL: "https://evoting-86a8c-default-rtdb.europe-west1.firebasedatabase.app",
    projectId: "evoting-86a8c",
    storageBucket: "evoting-86a8c.firebasestorage.app",
    messagingSenderId: "310835818129",
    appId: "1:310835818129:web:14ab11036d25a4dc1ad930"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const auth = getAuth(app);
  const database = getDatabase(app);

  // Handle Registration
  document.querySelector("#registrationForm").addEventListener("submit", async (e) => {
    e.preventDefault();

    // Get form values
    const userId = document.getElementById("user_id").value;
    const name = document.getElementById("name").value;
    const surname = document.getElementById("surname").value;
    const dob = document.getElementById("dob").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    try {
      // Register user with email and password
      const userCredential = await createUserWithEmailAndPassword(auth, email, password);
      const user = userCredential.user;

      // Save additional data to the Realtime Database
      await set(ref(database, `users/${user.uid}`), {
        userId: userId,
        name: name,
        surname: surname,
        dob: dob,
        email: email,
        createdAt: new Date().toISOString(),
      });

      alert("Registration successful!");
      window.location.href = "welcome.html"; // Redirect to welcome page
    } 
    
    catch (error) {
      console.error("Error registering user:", error.message);
      alert(`Error: ${error.message}`);
    }
  }
  );
</script>
