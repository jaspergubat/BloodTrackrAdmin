<?php
$title = "BloodTrackr - Dashboard Sidebar";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title><?php echo $title; ?></title>
  <style>
    body {
      display: flex;
      font-family: Arial, sans-serif;
    }
    
    .content-container {
      flex: 1;
      padding: 20px;
    }
    .content {
      display: none;
    }
    .container {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
      margin: 0 auto;
    }
    h2 {
      margin-bottom: 20px;
      text-align: center;
    }
    .form-group {
      margin-bottom: 15px;
    }
    label {
      display: block;
      margin-bottom: 5px;
    }
    input[type="text"],
    input[type="tel"],
    textarea {
      width: 100%;
      padding: 10px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    textarea {
      resize: vertical;
      height: 60px;
    }
    button {
      width: 100%;
      padding: 10px;
      background: #007BFF;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    button:hover {
      background: #0056b3;
    }
  </style>
</head>

<body>
  <nav class="sidebar close">
    <header>
      <div class="image-text">
        <span class="image">
          <img src="assets/images/logo.png" alt="Logo">
        </span>
        <div class="text logo-text">
          <span class="name">BloodTrackr</span>
        </div>
      </div>
      <img src="assets/images/right.png" alt="Toggle Icon" class="toggle">
    </header>

    <div class="menu-bar">
      <div class="menu">
        <ul class="menu-links">
          <li class="nav-link">
            <a href="#" onclick="showPage('dashboard')">
              <span class="text nav-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="#" onclick="showPage('bloodBanks')">
              <span class="text nav-text">Blood Banks</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="#" onclick="showPage('addBloodBank')">
              <span class="text nav-text">Add Blood Bank</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="#" onclick="showPage('users')">
              <span class="text nav-text">Users</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="#" onclick="showPage('reviews')">
              <span class="text nav-text">Reviews</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="bottom-content">
        <ul>
          <li class="">
            <a href="#">
              <span class="text nav-text">Logout</span>
            </a>
          </li>
          <li class="mode">
            <div class="sun-moon"></div>
            <span class="mode-text text">Dark mode</span>
            <div class="toggle-switch">
              <span class="switch"></span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="home">
    <div class="content-container">
      <div id="dashboard" class="content">
        <h1>Dashboard</h1>
        <p>Welcome to the dashboard.</p>
      </div>
      <div id="bloodBanks" class="content">
        <h1>Blood Banks</h1>
        <p>Here are the blood banks.</p>
      </div>
      <div id="addBloodBank" class="content">
        <div class="container">
          <h2>Add Blood Bank</h2>
          <form action="add_blood_bank.php" method="POST">
            <div class="form-group">
              <label for="bloodBankName">Blood Bank Name</label>
              <input type="text" id="bloodBankName" name="bloodBankName" required>
            </div>
            <div class="form-group">
              <label for="location">Location</label>
              <textarea id="location" name="location" required></textarea>
            </div>
            <div class="form-group">
              <label for="contactNumber">Contact Number</label>
              <input type="tel" id="contactNumber" name="contactNumber" required>
            </div>
            <div class="form-group">
              <label for="bloodAvailable">Blood Available</label>
              <input type="text" id="bloodAvailable" name="bloodAvailable" placeholder="e.g., A+, B-, O+" required>
            </div>
            <button type="submit">Add Blood Bank</button>
          </form>

          <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $bloodBankName = htmlspecialchars($_POST['bloodBankName']);
            $location = htmlspecialchars($_POST['location']);
            $contactNumber = htmlspecialchars($_POST['contactNumber']);
            $bloodAvailable = htmlspecialchars($_POST['bloodAvailable']);

            // Here, you can add your code to save the data to a database or process it as needed
            // For demonstration, we'll just display the submitted data
            echo "<h3>Submitted Data:</h3>";
            echo "Blood Bank Name: " . $bloodBankName . "<br>";
            echo "Location: " . $location . "<br>";
            echo "Contact Number: " . $contactNumber . "<br>";
            echo "Blood Available: " . $bloodAvailable . "<br>";
          }
          ?>
        </div>
      </div>
      <div id="users" class="content">
        <h1>Users</h1>
        <p>Manage users here.</p>
      </div>
      <div id="reviews" class="content">
        <h1>Reviews</h1>
        <p>Here are the reviews.</p>
      </div>
    </div>
  </section>

  <script>
    const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");

    toggle.addEventListener("click", () => {
      sidebar.classList.toggle("close");
    });

    modeSwitch.addEventListener("click", () => {
      body.classList.toggle("dark");
      modeText.innerText = body.classList.contains("dark") ? "Light mode" : "Dark mode";
    });

    function showPage(pageId) {
      const contents = document.querySelectorAll('.content');
      contents.forEach(content => {
        content.style.display = 'none';
      });
      document.getElementById(pageId).style.display = 'block';
    }

    // Show the dashboard by default on page load
    document.addEventListener('DOMContentLoaded', () => {
      showPage('dashboard');
    });
  </script>
</body>

</html>
