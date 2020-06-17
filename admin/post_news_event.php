<?php
  include '../includes/config.php';
  include 'includes/header.php';   
?>              
    <?php
        if(isset($_GET['p_id'])){
            $the_post_id = $_GET['p_id'];
        }
    ?>  
    
    <?php
        if(isset($_GET['source'])){
            $source = $_GET['source'];
            
        }else {
            $source = '';
        }
    
    switch($source) {
            case 'add_news_event';
            include 'add_news_event.php';
            break;
            
            case 'edit_ne';
            include 'edit_ne.php';
            break;                            
            
            default:
            include 'view_all_news_event.php';
            break;
        }
    ?>              
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