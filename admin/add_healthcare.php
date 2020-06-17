<?php
    include '../includes/config.php';
    include 'includes/header.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Healthcare</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Healthcare</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row"> 
          <!-- right column -->
          <div class="col-md-12">            
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
<?php 
  if (isset($_POST['submit'])) {
        $hc_title      = v($_POST['hc_title']);
        $hc_author     = v($_POST['hc_author']);
        $hc_content    = v($_POST['hc_content']);
        $hc_date       = v($_POST['hc_date']);
        $hc_image      = v($_FILES['image']['name']);
        $hc_image_temp = $_FILES['image']['tmp_name'];

      move_uploaded_file($hc_image_temp, "../image/healthcare/$hc_image");

      if (empty($hc_title) || empty($hc_author) || empty($hc_content) || empty($hc_date) || empty($hc_image)){
          echo '<div class="alert alert-danger" role="alert">
          <strong>Oh span!</strong> Field must be empty.</div>';
      }else{
          $query = "INSERT INTO post_healthcare (hc_title, hc_author, hc_content, hc_date, hc_image) ";
          $query .= "VALUES ('{$hc_title}','{$hc_author}','{$hc_content}','{$hc_date}','{$hc_image}')";
          $create_article = mysqli_query($cont, $query);
          
          if($create_article) {
             echo "<div class='btn btn-primary btn-block'>Data Inserted Successfully</div><br>";
          }

          if(!$create_article) {
              die('QUERY FAILDE' . mysqli_error($cont));
          }                
        }
    }
?>                
   <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Title * </label>
            <input class="form-control" type="text" name="hc_title">
        </div>
        <div class="form-group">
            <label for="">Author * </label>
            <input class="form-control" type="text" name="hc_author">
        </div>
        <div class="form-group">
        <label for="">Article Content*</label>
        <div class="form-group">
            <textarea class="textarea" name="hc_content" placeholder="Type Article" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          </div>              
        </div>
        <div class="form-group">
            <label for="">Date * </label>
            <input class="form-control" type="date" name="hc_date" style="width: 170px;">
        </div>
        <div class="form-group">
            <label for="">Upload Image (max size : 1MB &amp; W:400px; H:200px)</label>
            <input type="file" name="image">
        </div>
        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        <button class="btn btn-danger" type="reset">Reset</button>
    </form>

<?php 
    function v($post){
        $post = trim($post);
        $post = stripcslashes($post);
        $post = htmlspecialchars($post);        
        return $post;
    }
 ?>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php
  include 'includes/footer.php';      
?>
  
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="plugins/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor1'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      })

    // bootstrap WYSIHTML5 - text editor

    $('.textarea').wysihtml5({
      toolbar: { fa: true }
    })
  })
</script>

</body>
</html>