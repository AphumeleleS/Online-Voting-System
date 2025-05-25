
E-Voting System
Project Overview
The E-Voting System is a web-based platform for conducting elections, allowing voters to securely cast their votes online. The system supports real-time vote tracking, provincial distribution, and authentication mechanisms for both voters and administrators.

This project follows Object-Oriented Programming (OOP) principles and uses the Model-View-Controller (MVC) architectural pattern to ensure scalability, modularity, and maintainability.

Features
User Authentication
Secure login/logout process for voters.
Password recovery functionality.
Voting Mechanism
Real-time updates on voting progress through live polls.
Cast votes for specific candidates in provinces.
Province-wise vote tracking.
Statistics and Results
Displays previous winners with detailed statistics.
Provincial vote distribution and real-time polling.

Election Management
Administrators can manage elections, add candidates, and view statistics.


Technologies Used

Frontend
HTML5, CSS3, Bootstrap (for responsive UI design)
JavaScript (ES6+)

Backend
Firebase (Authentication, Database)
PHP (Dynamic Content and API handling)

Database
Firebase Realtime Database (NoSQL)

Development Tools
Drawio (for Class Diagram)


How to Run
Prerequisites

Install a local server environment (e.g., XAMPP, WAMP).
Ensure a working internet connection for Firebase integration.

Setup

Clone or download the project files into your server's root directory.
Configure Firebase:
Replace the placeholder in the firebaseConfig object in auth.js with your Firebase credentials.
Start your server and navigate to http://localhost/index.html.

Using the Application

Admin Login:
Login using pre-configured admin credentials.
Add candidates, view real-time polling, and manage election statistics.

Voter Login:
Register as a voter and log in to cast a vote.
View live polling data and candidate information.

Class Diagram
The system adheres to OOP principles:

Encapsulation: Sensitive data (like passwords) is private and accessed through secure methods.
Inheritance: Admin and Voter inherit common properties from the User class.
Polymorphism: Methods like getDetails() are overridden for customized output.
Real-Time Polling: LivePoll interacts dynamically with Vote and Election classes.

Key Classes
User: Abstract class for shared attributes (e.g., name, email).
Admin: Manages elections and candidates.
Voter: Casts votes and interacts with the live poll.
Election: Tracks candidates, votes, and live polling.
Province: Represents regional voting details.
LivePoll: Provides real-time updates on vote counts.
AuthService: Handles login and password management.

Sample Data
Provinces and Votes
Province	Candidate	Votes
Gauteng	Mathew	5,600
Western Cape	Menzi	4,200
KwaZulu-Natal	Mariam	3,800

Previous Winners
Year	Winner	Party	Total Votes
2023	Mathew	The Socials	50,000
2022	Mariam	Unity Party	48,500

Future Improvements

Add encryption for sensitive data storage.
Enhance the live poll for a more dynamic experience.
Implement support for mobile voting.

License
Feel free to modify and distribute.
