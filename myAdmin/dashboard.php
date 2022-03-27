<?php include 'header.php' ?>
    <!-- Right Panel -->
<?php 
   if(isset($_SESSION['user'])){
        $query = "SELECT * FROM contact";
        $result=$database->select($query);
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8"></div>
        </div>

        <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body table-responsive-sm">
                            <table id="editable_table" class="table table-bordered table-striped" style="width: 80%; margin-left: 10%">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Phone Number</th>
                              <th>Comment</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach ($result as  $value) {
                            ?>
                            <tr>
                              <td><?php echo $value["id"]; ?></td>
                              <td><?php echo $value["name"]; ?></td>
                              <td><?php echo $value["phone"]; ?></td>
                              <td><?php echo $value["comment"]; ?></td>
                               <form method="post" action="delete_message.php">
                              <input type="hidden" name="id" value=<?php echo $value["id"]; ?>>
                              <td><button type="submit" name="submit"><i class="fa fa-trash" style="font-size:26px;color:red"></i></button></td>
                              </form>
                            </tr>
                            <?php } } ?>
                          </tbody>
                        </table>
                      </div>
                  </div>
              </div>
        </div>

 
    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>
</body>
</html>
