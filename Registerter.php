<?php
$host = "dpg-cj37ja98g3n1jkhv05l0-a.singapore-postgres.render.com";           
$port = "5432";                
$dbname = "practice_db_2csu";  
$user = "practice";            
$password = "62fmBKxdw7LqOisV4AiozFRHs2EXOTyE";  

// Create connection
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Prepare and bind the SQL statement
$stmt = pg_prepare($conn, "insert_stmt", "INSERT INTO register (Name, Student_number, Email, Password, Phone_number, Gender) VALUES ($1, $2, $3, $4, $5, $6)");

// Get the form data
$name = $_POST['name'];
$studentid = $_POST['studentid'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];

// Execute the statement
$result = pg_execute($conn, "insert_stmt", array($name, $studentid, $email, $password, $phone, $gender));

if ($result) {
    echo "Registration successful.";
} else {
    echo "Error: " . pg_last_error($conn);
}

pg_close($conn);
?>
