<?php
$conn = pg_connect("host=localhost dbname=burningflames user=postgres password=yourpassword");

if (!$conn) {
    die("Koneksi ke PostgreSQL gagal.");
}
?>
