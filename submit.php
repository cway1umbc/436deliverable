<?php
// Connection
$servername = "studentdb-maria.gl.umbc.edu";
$username = "RI08899";
$password = "RI08899";
$dbname = "RI08899";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
  echo 'entry successful';
}

// Process form data
if (!empty($_POST)) {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    
    // Validate form data
    

    // Insert data into tblusers table using prepared statements
    $stmt = $conn->prepare("INSERT INTO tblusers (fname, lname, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fname, $lname, $email, $password);
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Create tblusers table
//$sql = "CREATE TABLE IF NOT EXISTS tblusers (
//        uid INT NOT NULL,
//        fname VARCHAR(255) NOT NULL,
//        lname VARCHAR(255) NOT NULL,
//        email VARCHAR(255) NOT NULL,
//        password VARCHAR(255) NOT NULL,
//        PRIMARY KEY (uid)
//    ) ENGINE=InnoDB";
//if ($conn->query($sql) === TRUE) {
//    echo "Table tblusers created successfully";
//} else {
//    echo "Error creating table: " . $conn->error;
//}
//
//$conn->close();
?