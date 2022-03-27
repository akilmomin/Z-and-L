<?php 
ob_start();
?>
<?php include 'header.php' ?>
<?php 
if ($_POST["duepaid"] == 'due') {
      $due = $total;
      } else {
      $due = 0;
     }
$query="UPDATE dailyEntry SET id=?, date=?, name=?, duepaid=?, amount=?, bottle=?, total=?, due=? WHERE id=?";
$update_info=[$_POST['id'],$_POST['date'],$_POST['name'],$_POST['duepaid'],$_POST['amount'],$_POST['bottle'],$_POST['total'],$_POST['due'],$_POST['id']];
$database->insert($query,$update_info);

$location="daily_entry.php";
header("Location:$location");
exit;
?>