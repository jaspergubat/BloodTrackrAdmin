<?php
$title = "BloodTrackr - Dashboard Sidebar";
// Sample data for blood banks (in a real application, this would be fetched from a database)
$bloodBanks = [
  ['name' => 'Blood Bank A', 'location' => 'City A'],
  ['name' => 'Blood Bank B', 'location' => 'City B'],
  ['name' => 'Blood Bank C', 'location' => 'City C']
];

// Check if a blood bank has been removed
if (isset($_POST['remove'])) {
  $index = $_POST['remove'];
  unset($bloodBanks[$index]);
  $bloodBanks = array_values($bloodBanks); // Re-index the array
}
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
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
    }
    th {
      background-color: #f2f2f2;
    }
    .profile-pic {
      width: 50px;
      height: 50px;
      border-radius: 50%;
    }
    .delete-btn {
      padding: 5px 10px;
      background-color: #FF0000;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .delete-btn:hover {
      background-color: #cc0000;
    }
    .search-bar {
      margin-bottom: 20px;
    }
    .search-bar input {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .search-bar button {
      padding: 10px;
      background: #007BFF;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .search-bar button:hover {
      background: #0056b3;
    }
    li {
      display: flex;
      justify-content: space-between;
      padding: 10px;
      margin: 5px 0;
      
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
        <ul>
          <?php foreach ($bloodBanks as $index => $bloodBank): ?>
            <li>
              <span><?php echo htmlspecialchars($bloodBank['name']); ?> - <?php echo htmlspecialchars($bloodBank['location']); ?></span>
              <form method="post" style="display:inline;">
                <button id="removeButton" type="submit" name="remove" value="<?php echo $index; ?>">Remove</button>
              </form>
            </li>
          <?php endforeach; ?>
        </ul>
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
              <label for="LandlineNum">Landline Number</label>
              <input type="tel" id="LandlineNum" name="LandlineNum" required>
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
          if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['remove'])) {
            $bloodBankName = htmlspecialchars($_POST['bloodBankName']);
            $location = htmlspecialchars($_POST['location']);
            $LandlineNum = htmlspecialchars($_POST['LandlineNum']);
            $contactNumber = htmlspecialchars($_POST['contactNumber']);
            $bloodAvailable = htmlspecialchars($_POST['bloodAvailable']);

            // In a real application, you would save this data to a database.
            // For now, we'll just display the submitted data for demonstration purposes.
            echo "<h3>Submitted Data:</h3>";
            echo "Blood Bank Name: " . $bloodBankName . "<br>";
            echo "Location: " . $location . "<br>";
            echo "Landline Number: " . $LandlineNum . "<br>";
            echo "Contact Number: " . $contactNumber . "<br>";
            echo "Blood Available: " . $bloodAvailable . "<br>";
          }
          ?>
        </div>
      </div>
      <div id="users" class="content">
        <h1>Users</h1>
        <div id="userTableContainer">
          <table class="table" id="usersTable">
            <tr>
              <th>Profile Picture</th>
              <th>Name</th>
              <th>Home Address</th>
              <th>Blood Type</th>
              <th>Actions</th>
            </tr>
          </table>
        </div>
      </div>
      <div id="reviews" class="content">
        <h1>Reviews</h1>
        <div class="search-bar">
          <input class="balance" type="text" id="reviewSearch" placeholder="Search reviews...">
          <button class="balance" onclick="searchReviews()">Search</button>
        </div>
        <div id="reviewContainer"></div>
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

      if (pageId === 'users') {
        fetchUsers();
      } else if (pageId === 'reviews') {
        fetchReviews();
      }
    }

    function fetchUsers() {
      fetch('users.php')
        .then(response => response.json())
        .then(data => {
          const usersTable = document.getElementById('usersTable');
          usersTable.innerHTML = `
            <tr>
              <th>Profile Picture</th>
              <th>Name</th>
              <th>Home Address</th>
              <th>Blood Type</th>
              <th>Actions</th>
            </tr>
          `;
          data.forEach(user => {
            const row = document.createElement('tr');
            row.innerHTML = `
              <td><img src="${user.profile_picture}" alt="Profile Picture" class="profile-pic"></td>
              <td>${user.name}</td>
              <td>${user.home_address}</td>
              <td>${user.blood_type}</td>
              <td><button class="delete-btn" onclick="deleteUser(${user.id})">Delete</button></td>
            `;
            usersTable.appendChild(row);
          });
        });
    }

    function deleteUser(userId) {
      if (confirm('Are you sure you want to delete this user?')) {
        fetch(`delete_user.php?id=${userId}`, { method: 'GET' })
          .then(response => response.text())
          .then(result => {
            if (result === 'success') {
              fetchUsers();
            } else {
              alert('Error deleting user.');
            }
          });
      }
    }

    function fetchReviews() {
      fetch('reviews.php')
        .then(response => response.json())
        .then(data => {
          const reviewContainer = document.getElementById('reviewContainer');
          reviewContainer.innerHTML = '';
          data.forEach(review => {
            const reviewDiv = document.createElement('div');
            reviewDiv.classList.add('review');
            reviewDiv.innerHTML = `
              <div class="review-header">
                <img src="${review.profile_picture}" alt="Profile Picture" class="profile-pic">
                <span class="review-user">${review.name}</span>
                <span class="review-date">${review.date}</span>
              </div>
              <p class="review-text">${review.review}</p>
              <button class="delete-btn" onclick="deleteReview(${review.id})">Delete</button>
            `;
            reviewContainer.appendChild(reviewDiv);
          });
        });
    }

    function searchReviews() {
      const query = document.getElementById('reviewSearch').value;
      fetch(`reviews.php?search=${query}`)
        .then(response => response.json())
        .then(data => {
          const reviewContainer = document.getElementById('reviewContainer');
          reviewContainer.innerHTML = '';
          data.forEach(review => {
            const reviewDiv = document.createElement('div');
            reviewDiv.classList.add('review');
            reviewDiv.innerHTML = `
              <div class="review-header">
                <img src="${review.profile_picture}" alt="Profile Picture" class="profile-pic">
                <span class="review-user">${review.name}</span>
                <span class="review-date">${review.date}</span>
              </div>
              <p class="review-text">${review.review}</p>
              <button class="delete-btn" onclick="deleteReview(${review.id})">Delete</button>
            `;
            reviewContainer.appendChild(reviewDiv);
          });
        });
    }

    function deleteReview(reviewId) {
      if (confirm('Are you sure you want to delete this review?')) {
        fetch(`delete_review.php?id=${reviewId}`, { method: 'GET' })
          .then(response => response.text())
          .then(result => {
            if (result === 'success') {
              fetchReviews();
            } else {
              alert('Error deleting review.');
            }
          });
      }
    }
  </script>
</body>

</html>