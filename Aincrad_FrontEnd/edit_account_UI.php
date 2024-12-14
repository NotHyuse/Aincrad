  <?php 
  session_start();
  include("connect.php");
  
  // Fetch customer data from the database
  $query = "SELECT * FROM Customer";  
  $result = mysqli_query($conn, $query);
  
  if (!$result) {
      die('Query Failed: ' . mysqli_error($conn));
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Accounts</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
      }

      body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: url(wp.gif);
        background-size: cover;
        background-position: center;
      }

      .container {
        width: 1000px;
        height: 500px;
        background: url(background.png);
        background-size: cover;
        opacity: 0.9;
        border-radius: 20px;
        display: flex;
        background-color: white;
        box-shadow: 0 0 100px rgb(255, 255, 255);
        position: relative;
      }

      .orders-section {
        width: 90%;
        padding: 20px;
      }

      .orders-section .header {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
        color: white;
      }

      .orders-list {
        width: 100%;
        height: calc(100% - 40px);
        border: 2px solid white;
        border-radius: 20px;
        padding: 10px;
        overflow-y: auto;
        background-color: whitesmoke;
      }

      .orders-list table {
        width: 100%;
        border-collapse: collapse;
        background-color: whitesmoke;
      }

      .orders-list table th, 
      .orders-list table td {
        padding: 5px;
        text-align: center;
        font-size: 14px;
      }

      .orders-list table th {
        font-weight: bold;
        font-size: 14px;
        color: black;
      }

      .details-section {
        width: 40%;
        padding: 20px;
        position: relative;
      }

      .details-section .header {
        margin-top: 20px;
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 20px;
        color: white;
      }

      .details {
        display: flex;
        flex-direction: column;
        gap: 7px;
        margin-top: 40px;
        color: white;
        width: 100%;
      }

      .details label {
        font-size: 14px;
        font-weight: bold;
      }

      .details input {
        padding: 7px;
        font-size: 14px;
        border: none;
        border-radius: 20px;
      }

      .details .birthdate {
        display: flex;
        gap: 10px;
      }

      .details .birthdate input {
        width: calc(33.33% - 7px);
      }

      .details button {
        background-color: white;
        color: black;
        border: none;
        padding: 10px;
        text-align: center;
        font-size: 10px;
        margin-top: 5px;
        cursor: pointer;
        border-radius: 20px;
        transition: background-color 0.3s, transform 0.3s;
        width: 48%;
      }

      .details button:hover {
        background-color: #ddd;
        transform: scale(1.05);
      }

      .details .button-row {
        display: flex;
        justify-content: space-between;
        gap: 4%;
      }


      .close a{
        position: absolute;
        top: 10px;
        right: 20px;
        font-size: 25px;
        cursor: pointer;
        color: white;
        text-decoration: none;
      }

      </style>
</head>
<body>
  <div class="container">
    <div class="orders-section">
      <div class="header">ACCOUNTS</div>
      <div class="orders-list">
        <form id="edit-form" method="POST" action="edit_account.php">
          <table>
            <thead>
              <tr>
                <th>Select</th>
                <th>ID</th>
                <th>NAME</th>
                <th>IGN</th>
                <th>BIRTHDAY</th>
                <th>EMAIL</th>
                <th>PHONE #</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Loop through the result set and display data in the table
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td><input type='radio' name='selected_id' value='" . htmlspecialchars($row['Customer_ID_PK']) . "' onclick='populateFields(this)'></td>";
                  echo "<td>" . htmlspecialchars($row['Customer_ID_PK']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['Customer_FirstName'] . " " . $row['Customer_LastName']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['Customer_Username']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['Customer_Birthday']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['Customer_Email']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['Customer_PhoneNumber']) . "</td>";
                  echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </form>
      </div>
    </div>

    <div class="details-section">
      <div class="close"><a href="Admin_accounts.php">&times;</a></div>
      <div class="details">
        <label for="first-name">FIRST NAME*</label>
        <input type="text" id="first-name" name="first_name" placeholder="Enter first name" required>

        <label for="last-name">LAST NAME*</label>
        <input type="text" id="last-name" name="last_name" placeholder="Enter last name" required>

        <label for="ign">IGN (USERNAME)*</label>
        <input type="text" id="ign" name="username" placeholder="Enter username" required>

        <label for="email">EMAIL ADDRESS*</label>
        <input type="email" id="email" name="email" placeholder="Enter email" required>

        <label>BIRTHDAY*</label>
        <input type="date" id="birthday" name="birthday" placeholder="Enter birthday" required>

        <label for="phone">PHONE NUMBER*</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter phone number" required>

        <div class="button-row">
          <button type="button" onclick="resetFields()">CLEAR</button>
          <button type="button" onclick="submitForm()">CONFIRM</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Populate fields with the selected row's data
    function populateFields(radio) {
      const row = radio.closest('tr');
      const cells = row.getElementsByTagName('td');
      
      // Extract and populate values
      document.getElementById('first-name').value = cells[2].innerText.split(' ')[0];
      document.getElementById('last-name').value = cells[2].innerText.split(' ')[1];
      document.getElementById('ign').value = cells[3].innerText;
      document.getElementById('birthday').value = cells[4].innerText;
      document.getElementById('email').value = cells[5].innerText;
      document.getElementById('phone').value = cells[6].innerText;
    }

    // Clear all input fields
    function resetFields() {
      document.getElementById('first-name').value = '';
      document.getElementById('last-name').value = '';
      document.getElementById('ign').value = '';
      document.getElementById('birthday').value = '';
      document.getElementById('email').value = '';
      document.getElementById('phone').value = '';
    }

    // Submit the form with selected data
    function submitForm() {
      const selectedRadio = document.querySelector('input[name="selected_id"]:checked');
      if (!selectedRadio) {
        alert('Please select a row to edit.');
        return;
      }
      const form = document.getElementById('edit-form');
      const inputs = {
        id: selectedRadio.value,
        first_name: document.getElementById('first-name').value,
        last_name: document.getElementById('last-name').value,
        username: document.getElementById('ign').value,
        birthday: document.getElementById('birthday').value,
        email: document.getElementById('email').value,
        phone: document.getElementById('phone').value,
      };

      // Add hidden fields to the form
      for (const key in inputs) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = inputs[key];
        form.appendChild(input);
      }

      form.submit();
    }
  </script>
</body>
</html>
