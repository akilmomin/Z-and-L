<?php 
ob_start();
?>
<?php include 'header.php' ?>

<?php 
if(isset($_SESSION['user'])){

     if (isset($_POST["submit"])){
     $name = $_POST['name'];
     $address = $_POST['address'];
     $phone = $_POST['phone'];
     $deposit = $_POST['deposit'];

        $insert_query="INSERT INTO customer(name,address,phone,deposit) VALUES(:name,:address,:phone,:deposit)";
          $cust_info=[$name,$address,$phone,$deposit];
          $database->insert($insert_query,$cust_info);
           header("Location: customer.php");
     }
?>
<div class="row">
  <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="card">
                      <div class="card-header"><strong>CUSTOMER DETAIL</strong><a href="<?php echo 'customer.php' ?>"><button class="btn btn-info float-right"> Back to list</button></a></div>
                        <div class="card-body card-block">
                            <form method="post" action="add-customer.php">
                                  
                                   <div class="form-group">
                                    <label>Customer Name:</label>
                                    <input type="text" class="form-control" id="name" placeholder="Customer Name" name="name" required>
                                  </div>
                                  <div class="form-group">
                                    <label >Address:</label>
                                    <input type="text" class="form-control" id="address" placeholder="Address" name="address" required>
                                  </div>
                                   <div class="form-group">
                                    <label>Phone:</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="Phone" name="phone" maxlength="10" required>
                                  </div>
                                   <div class="form-group">
                                    <label>Deposit:</label>
                                    <input type="number" class="form-control" id="deposit" placeholder="Deposit" name="deposit" required>
                                  </div>
                                  
                                  <button type="submit" class="btn btn-success" name="submit">Submit</button>

                                  
                                  <!-- <input type="submit" value="Upload Image" name="submit"> -->

                          </form>  
                        </div>
                      </div>
        </div>
      </div>
  <div class="col-md-1"></div>
</div>

<?php } ?>
<?php include 'footer.php' ?>