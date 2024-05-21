<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BloodTrackr Dashboard</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Boxicons CDN Link -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
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
    ul {
      list-style: none;
      padding: 0;
    }
    li {
      display: flex;
      justify-content: flex-start;
      padding: 10px;
      margin: 5px 0;
    }
    .form-inline {
      display: flex;
      gap: 10px;
    }
    input[type="text"],
    input[type="tel"] {
      padding: 5px;
      margin-right: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .update-btn, .delete-btn {
      padding: 5px 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .update-btn {
      background-color: #007BFF;
      color: white;
    }
    .delete-btn {
      background-color: #FF0000;
      color: white;
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
      <i class="bx bx-chevron-right toggle"></i>
    </header>
    <div class="menu-bar">
      <div class="menu">
        <ul class="menu-links">
          <li class="nav-link">
            <a href="#" onclick="showPage('dashboard')">
              <i class="bx bx-grid-alt icon"></i>
              <span class="text nav-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="#" onclick="showPage('bloodBanks')">
              <i class="bx bx-donate-blood icon"></i>
              <span class="text nav-text">Blood Banks</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="#" onclick="showPage('addBloodBank')">
              <i class="bx bx-plus-circle icon"></i>
              <span class="text nav-text">Add Blood Bank</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="#" onclick="showPage('users')">
              <i class="bx bx-user icon"></i>
              <span class="text nav-text">Users</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="#" onclick="showPage('reviews')">
              <i class="bx bx-message-square-dots icon"></i>
              <span class="text nav-text">Reviews</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="bottom-content">
        <ul>
          <li>
            <a href="#">
              <i class="bx bx-log-out icon"></i>
              <span class="text nav-text">Logout</span>
            </a>
          </li>
          <li class="mode">
            <div class="sun-moon">
              <i class="bx bx-moon icon moon"></i>
              <i class="bx bx-sun icon sun"></i>
            </div>
            <span class="text nav-text mode-text">Dark mode</span>
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
        <h2>Dashboard</h2>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-user fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">123</div>
                    <div>Blood Banks</div>
                  </div>
                </div>
              </div>
              <div class="panel-footer" onclick="showPage('bloodBanks')">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-tasks fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">12</div>
                    <div>Users</div>
                  </div>
                </div>
              </div>
              <div class="panel-footer" onclick="showPage('users')">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6"></div>
          <div class="col-lg-3 col-md-6"></div>
        </div>
      </div>
      <div id="bloodBanks" class="content">
        <h2>Blood Banks</h2>
        <ul>
          <?php
          $bloodBanks = [
              ["id" => 1, "name" => "Blood Bank A", "location" => "Location A", "landline" => "1234567890", "contact" => "9876543210", "bloodAvailable" => "A+, B-"],
              ["id" => 2, "name" => "Blood Bank B", "location" => "Location B", "landline" => "1234567890", "contact" => "9876543210", "bloodAvailable" => "O+, AB-"],
              // Add more blood banks as needed
          ];

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
              if (isset($_POST['remove'])) {
                  $idToRemove = $_POST['id'];
                  $bloodBanks = array_filter($bloodBanks, function ($bank) use ($idToRemove) {
                      return $bank['id'] != $idToRemove;
                  });
                  $bloodBanks = array_values($bloodBanks);
              }
              if (isset($_POST['update'])) {
                  $idToUpdate = $_POST['id'];
                  foreach ($bloodBanks as &$bank) {
                      if ($bank['id'] == $idToUpdate) {
                          $bank['name'] = $_POST['name'];
                          $bank['location'] = $_POST['location'];
                          $bank['landline'] = $_POST['landline'];
                          $bank['contact'] = $_POST['contact'];
                          $bank['bloodAvailable'] = $_POST['bloodAvailable'];
                          break;
                      }
                  }
              }
          }

          foreach ($bloodBanks as $bank) {
              echo '<li>';
              echo '<form class="form-inline" action="" method="POST">';
              echo '<input type="hidden" name="id" value="' . $bank['id'] . '">';
              echo '<input type="text" name="name" value="' . $bank['name'] . '" required>';
              echo '<input type="text" name="location" value="' . $bank['location'] . '" required>';
              echo '<input type="tel" name="landline" value="' . $bank['landline'] . '" required>';
              echo '<input type="tel" name="contact" value="' . $bank['contact'] . '" required>';
              echo '<input type="text" name="bloodAvailable" value="' . $bank['bloodAvailable'] . '" required>';
              echo '<button type="submit" name="update" class="update-btn">Update</button>';
              echo '<button type="submit" name="remove" class="delete-btn">Remove</button>';
              echo '</form>';
              echo '</li>';
          }
          ?>
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
        </div>
      </div>
      <div id="users" class="content">
        <h2>Users</h2>
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
        <h2>Reviews</h2>
        <div class="search-bar">
          <input type="text" id="reviewSearch" placeholder="Search reviews...">
          <button onclick="searchReviews()">Search</button>
        </div>
        <div id="reviewContainer"></div>
      </div>
    </div>
  </section>

  <script>
    const body = document.querySelector('body'),
      sidebar = body.querySelector('.sidebar'),
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

    // Initially show the "dashboard" content
    showPage('dashboard');
  </script>
</body>
</html>
