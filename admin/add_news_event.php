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
            <h1>Add News &amp; Events</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Add News &amp; Events</li>
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
        $ne_title      = v($_POST['ne_title']);
        $ne_author     = v($_POST['ne_author']);
        $ne_content    =   $_POST['ne_content'];
        $ne_date       = v($_POST['ne_date']);
        $ne_image      = v($_FILES['image']['name']);
        $ne_image_temp = $_FILES['image']['tmp_name'];

      move_uploaded_file($ne_image_temp, "../image/news_event_image/$ne_image");

      if (empty($ne_title) || empty($ne_author) || empty($ne_content) || empty($ne_date) || empty($ne_image)){
          echo '<div class="alert alert-danger" role="alert">
          <strong>Oh span!</strong> Field must be empty.</div>';
      }else{
          $query = "INSERT INTO post_news_event (ne_title, ne_author, ne_content, ne_date, ne_image) ";
          $query .= "VALUES ('{$ne_title}','{$ne_author}','{$ne_content}','{$ne_date}','{$ne_image}')";
          $create_news_event = mysqli_query($cont, $query);
          
          if($create_news_event) {
             echo "<div class='btn btn-primary btn-block'>Data Inserted Successfully</div><br>";
          }

          if(!$create_news_event) {
              die('QUERY FAILDE' . mysqli_error($cont));
          }                
        }
    }
?>                
   <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Title * </label>
            <input class="form-control" type="text" name="ne_title">
        </div>
        <div class="form-group">
            <label for="">Author * </label>
            <input class="form-control" type="text" name="ne_author">
        </div>
        <div class="form-group">
        <label for="">Article Content*</label>
        <div class="form-group">
            <textarea class="textarea" name="ne_content" placeholder="Type Article" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          </div>              
        </div>
        <div class="form-group">
            <label for="">Date * </label>
            <input class="form-control" type="date" name="ne_date" style="width: 170px;">
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