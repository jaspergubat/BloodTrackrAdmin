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
            <a href="dashboard.php">
              <span class="text nav-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="bloodbanks.php">
              <span class="text nav-text">Blood Banks</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="addbloodbank.php">
              <span class="text nav-text">Add Blood Bank</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="users.php">
              <span class="text nav-text">Users</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="reviews.php">
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
    <div class="text">Dashboard Sidebar</div>
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
      if (body.classList.contains("dark")) {
        modeText.innerText = "Light mode";
      } else {
        modeText.innerText = "Dark mode";
      }
    });
  </script>
</body>

</html>