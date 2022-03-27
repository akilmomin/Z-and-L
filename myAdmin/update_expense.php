<?php 
ob_start();
?>
<?php include 'header.php' ?>
<?php 
$query="UPDATE expense SET id=?, date=?, expense_type=?, vendor=?, expense_amount=? WHERE id=?";
$update_info=[$_POST['id'],$_POST['date'],$_POST['expense_type'],$_POST['vendor'],$_POST['expense_amount'],$_POST['id']];
$database->insert($query,$update_info);

$location="expense.php";
header("Location:$location");
exit;
?>