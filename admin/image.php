<?php  
    include 'includes/header.php';
    include '../includes/config.php';
    include 'delete_model.php';

    
    $result = mysqli_query($cont, "SELECT * FROM gallery order by gallery_id DESC");
?>
         
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All News &amp; Events</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All News &amp; Events</li>
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
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th>Id</th>                                
                            <th>Image 1</th>
                            <th>Image 2</th>
                            <th>Image 3</th>
                            <th>Image 4</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                            while($show = mysqli_fetch_array($result)){
                                $gallery_id = $show['gallery_id'];
                        ?>

                        <tr>
                            <td><?php echo $gallery_id; ?></td>
                            <td>
                                <img class="article_img" src="../image/gallery/<?php echo $show['gallery_image']; ?>" alt="" height="80" width="80">
                            </td>
                            <td>
                                <img class="article_img" src="../image/gallery2/<?php echo $show['gallery_image2']; ?>" alt="" height="80" width="80">
                            </td>
                            <td>
                                <img class="article_img" src="../image/gallery3/<?php echo $show['gallery_image3']; ?>" alt="" height="80" width="80">
                            </td>
                            <td>
                                <img class="article_img" src="../image/gallery4/<?php echo $show['gallery_image4']; ?>" alt="" height="80" width="80">
                            </td>
                            <td style="width: 95px;">
                                <?php echo "<a rel='$gallery_id' href='javascript:void(0);' class='delete_link btn btn-danger'><i class='fa fa-trash'></i></a>"; ?>                                   
                            </td> 
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
<?php
    if(isset($_GET['delete'])){                
        $the_post_id = $_GET['delete'];                
        $query = "DELETE FROM gallery WHERE gallery_id = {$the_post_id} ";
        $delete_query = mysqli_query($cont, $query);       
        header("Location: gallery.php");
    }   
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
            var delete_url = "gallery.php?delete="+ id +" ";
            $(".modal_delete_link").attr("href", delete_url);
            $("#exampleModalCenter").modal('show');
        });
    });
</script>
</body>
</html>