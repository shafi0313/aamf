<?php
  include '../includes/config.php';
  include 'includes/header.php'; 
  include 'delete_model.php';  
?>      

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Article</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Article</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">

    <div class="card-body">
      <table id="example1" class="table table-sm table-bordered table-hover  table-light">
        <thead class="bg-info">
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Date</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
          <?php
            $x=1;                    
            $query = "SELECT * FROM users";
            $select_news_event = mysqli_query($cont, $query);
        
            while($show = mysqli_fetch_array($select_news_event)){
                $name       = $show['name'];
                $username   = $show['username'];
                $email      = $show['email'];
                $role       = $show['role'];
                $createDate = $show['createDate'];
            ?>
          <tr>
            <td><?php echo $x++; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $username; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo ($role==1) ? "Active" : "Unactive"; ?></td>
            <td><?php echo $createDate; ?></td>
            <td></td>
          </tr>                                                                            
           <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->        
            
</div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php
    include 'includes/footer.php';
  ?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Sweetalert -->
<script src="dist/js/sweetalert2.all.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script>
    $(document).ready(function(){
        $(".delete_link").on('click', function(){
            var id = $(this).attr("rel");
            var delete_url = "post_news_event.php?delete="+ id +" ";
            $(".modal_delete_link").attr("href", delete_url);
            $("#exampleModalCenter").modal('show');
        });
    });
</script>
</body>
</html>