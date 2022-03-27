<?php 
ob_start();
?>
<?php include 'header.php' ?>
<?php 
$query="DELETE from contact WHERE id=?";
$update_info=[$_POST['id']];
$database->update($query,$update_info);

$location="dashboard.php";
header("Location:$location");
exit;
?>