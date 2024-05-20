<div class="container">
  <h2>Add Blood Bank</h2>
  <form action="add_bloodbank.php" method="POST">
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
