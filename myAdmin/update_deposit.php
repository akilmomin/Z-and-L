<?php 
ob_start();
?>
<?php include 'header.php' ?>
<?php 
$query="UPDATE bankDeposit SET id=?, date=?, from_date=?, to_date=?, amount=? WHERE id=?";
$update_info=[$_POST['id'],$_POST['date'],$_POST['from_date'],$_POST['to_date'],$_POST['amount'],$_POST['id']];
$database->insert($query,$update_info);

$location="deposit.php";
header("Location:$location");
exit;
?>