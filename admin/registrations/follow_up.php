<?php
include "../security.php";
include "../../koneksi.php";

$registration_id = $_GET['id'];

$sql_admin = "select id from users where username='$username'";
$query_admin = mysqli_query($conn, $sql_admin) or die($sql_admin);
$result_admin = mysqli_fetch_array($query_admin);
$admin_id = $result_admin['id'];

$sql = "update registrations set is_followed_up = 1, followed_up_by='$admin_id', followed_up_at= now() where id='$registration_id'";
$query = mysqli_query($conn, $sql) or die($sql);

header("Location: index.php");
exit;
