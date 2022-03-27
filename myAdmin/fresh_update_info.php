<?php 
ob_start();
?>
<?php include 'header.php' ?>
<?php 
$query="UPDATE freshAnimal SET animal_id=?, village=?, price=?, return_reason=?, sold_price=?, date=? WHERE id=?";
$update_info=[$_POST['animal_id'],$_POST['village'],$_POST['price'],$_POST['return_reason'],$_POST['sold_price'],$_POST['date'],$_POST['id']];
$database->insert($query,$update_info);

$location="fresh_animal.php";
header("Location:$location");
exit;
?>