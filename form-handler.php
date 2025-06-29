<?php
include 'db_config_pg.php';

$name = $_POST['name'];
$visitor_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Simpan ke PostgreSQL
$query = "INSERT INTO contact_messages (name, email, subject, message) VALUES ($1, $2, $3, $4)";
$result = pg_query_params($conn, $query, array($name, $visitor_email, $subject, $message));

if (!$result) {
    die("Gagal menyimpan data.");
}

pg_close($conn);

// Kirim email
$email_from = 'memovaultlinq@gmail.com';
$email_subject = 'New Form Submission';
$email_body = "Username: $name.\n".
              "User Email: $visitor_email.\n".
              "Subject: $subject.\n".
              "User Message: $message.\n";

$to = 'memovaultlinq@gmail.com';

$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";

mail($to, $email_subject, $email_body, $headers);

// Redirect
header("Location: contact.html");
?>
