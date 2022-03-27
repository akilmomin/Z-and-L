<?php include 'header.php' ?>
<?php

if(isset($_SESSION['user'])){

  $query = "SELECT * FROM customer";
  $result=$database->select($query);
  ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Customer Detail</strong><a href="<?php echo 'add-customer.php' ?>"><button class="btn btn-info float-right">Add Customer</button></a>
                        </div>
                    </div>
                </div>
            </div>
           <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <center>
                        <div class="card-body table-responsive-sm">
                          <table id="bootstrap-data-table" class="table table-striped table-bordered table-responisve" style="width: 100%">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Customer name</th>
                                <th>Address</th>
                                <th>phone</th>
                                <th>Deposit</th>
                                <th>Action</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($result as  $value) {
                                ?>
                              <tr>
                                <td><?php echo $value["id"]; ?></td>
                                <td><?php echo $value["name"]; ?></td>
                                <td><?php echo $value["address"]; ?></td>
                                <td><?php echo $value["phone"]; ?></td>
                                <td><?php echo $value["deposit"]; ?></td>
                                <td><form method="post" action="update_customer_info.php">
                                  <input type="hidden" name="id" value=<?php echo $value["id"]; ?>>
                                  <button type="submit" name="submit"><i class="fa fa-edit" style="font-size:26px;color:red"></i> </button>
                                  </form>
                                </td>
                              </tr>
                              <?php } } ?>
                            </tbody>
                          </table>
                        </div>
                        </center>
                      </div>
                  </div>
            </div>
<?php include 'footer.php' ?>