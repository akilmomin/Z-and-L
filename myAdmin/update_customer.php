<?php 
ob_start();
?>
<?php include 'header.php' ?>
<?php 
$query="UPDATE customer SET id=?, name=?, address=?, phone=?, deposit=? WHERE id=?";
$update_info=[$_POST['id'],$_POST['name'],$_POST['address'],$_POST['phone'],$_POST['deposit'],$_POST['id']];
$database->insert($query,$update_info);

$location="customer.php";
header("Location:$location");
exit;
?>