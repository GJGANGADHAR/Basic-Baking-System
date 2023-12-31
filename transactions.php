<!DOCTYPE html>
<html>
<head>
  <title>Transactions List</title>
  <style>
    /* CSS styles for the navigation bar */
    ul.navbar {
      box-shadow:1px 1px 2px black;
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      display: flex;
      background-color: black;
    }
    
    ul.navbar li {
      float: center;
    }
    
    ul.navbar li a {
      display: block;
      color: white;
      text-align: center;
      padding: 10px 140px;
      text-decoration: none;
    }
    
    ul.navbar li a:hover {
      background-color: lightgrey;
      color:black;
    }
    
    /* CSS styles for the table */
    table {
      border-collapse: collapse;
      width: 105%;
    }
    
    th, td {
      padding: 8px;
      text-align: center;
      border-bottom: 3px solid #ddd;
    }
    
    th {
      background-color: #f2f2f2;
    }
    div {
          text-align: center;
      }
      h1 {
          background:lightgoldenrodyellow;
          font-size:40px;
          text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;
          color:black;
          text-align:center;
          display: inline-block;
          border: 5px solid black;
          padding:5px;
          border-radius:4px;
      }
  </style>
</head>
<body>
  <!-- Navigation bar -->
  <ul class="navbar">
    <li><a href="index.php">Home</a></li>
    <li><a href="customers.php">Customers</a></li>
    <li><a href="transactions.php">Transactions</a></li>
  </ul>
  <div>
  <h1>Transaction List</h1>
  
  <!-- PHP code for retrieving and displaying transaction data -->
  <?php
  // Replace with your MySQL connection details
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "records";
  
  // Create a new MySQLi object
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  // SQL query to retrieve transaction data from the database
  $sql = "SELECT * FROM transfers";
  
  // Execute the query and get the result
  $result = $conn->query($sql);
  
  // Check if any rows are returned
  if ($result->num_rows > 0) {
    // Output data in a table format
    echo "<table>";
    echo "<tr><th>Id</th><th>Sender</th><th>Receiver</th><th>Amount</th></tr>";
    
    // Loop through each row of data
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["id"] . "</td>";
      echo "<td>" . $row["sender_name"] . "</td>";
      echo "<td>" . $row["receiver_name"] . "</td>";
      echo "<td>" . $row["amount"] . "</td>";
      echo "</tr>";
    }
    
    echo "</table>";
  } else {
    echo "No transactions found.";
  }
  
  // Close the database connection
  $conn->close();
  ?>
  </div>
</body>
</html>