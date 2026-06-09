<?php
include "../security.php";
include "../../koneksi.php";

$registration_id = $_GET['id'];

$sql = "update registrations set is_followed_up = 0, followed_up_by=null, followed_up_at=null where id='$registration_id'";
$query = mysqli_query($conn, $sql) or die($sql);

header("Location: index.php");
exit;
