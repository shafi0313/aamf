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


<!-- Insert Model -->
<!-- Button trigger modal -->

<!-- Modal -->
<form id="user" action="ajax/user_core.php" method="post">
  <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="username">User Name</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="User Name">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="Password">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- /Insert Model -->
<div  class="bg-success d-flex justify-content-end">
  <button type="button" style="width: 200px; font-weight: 600" class="btn btn-primary " data-toggle="modal" data-target="#userModal">Add User</button>
</div>

    <div class="card-body">
      <table class="table table-sm table-bordered table-hover table-light userTable">
        
      </table>

      <!-- <table id="example1" class="table table-sm table-bordered table-hover table-light">
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
      </table> -->
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
<script src="../assets/toastr/build/toastr.min.js"></script>
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
<script>
  $('#user').on('submit', function (e) {
    e.preventDefault();
    form = $(this);
    let modal = $('#userModal');
    $.ajax({
        url: form.attr('action'),
        method: form.attr('method'),
        data: form.serialize(),
        success: function (msg) {
          // $("form").trigger("reset");
          // modal.modal('hide');
            if (msg == 1){
              toastr["error"]("Something is wrong")
              $("form").trigger("reset");
            }else {
              modal.modal('hide');
              toastr["success"]("Insert Successful!")
              $("form").trigger("reset");
            }
            readData();
        }
    });
  });

  function readData(){
    // let client_id = "{{$client->id}}";
    // let period_id = "{{$period->id}}";
    $.ajax({
        url:"ajax/user_core.php",
        method: 'get',
        
        success: function (data) {
            data = $.parseJSON(data);
            if (data.status == 'success') {
                $('.userTable').html(data.html);
            }
        }
    });
  }
</script>

<script>
  toastr.options = {
    "closeButton": true,
    "debug": true,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1500",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  // toastr["success"]("Have fun storming the castle!")
  // toastr["info"]("My name is Inigo Montoya. You killed my father. Prepare to die!")
  // toastr["error"]("Are you the six fingered man?")
</script>
</body>
</html>