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
            <h1>Add Article</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Article</li>
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
      $article_title      = v($_POST['article_title']);
      $article_text       =   $_POST['article_text'];
      $article_author     = v($_POST['article_author']);
      $article_date       = v($_POST['article_date']);
      $article_image      = v($_FILES['image']['name']);
      $article_image_temp = $_FILES['image']['tmp_name']; 

      move_uploaded_file($article_image_temp, "../image/article_image/$article_image");

      if (empty($article_title) || empty($article_text) || empty($article_author) || empty($article_date) || empty($article_image)){
          echo '<div class="alert alert-danger" role="alert">
          <strong>Oh span!</strong> Field must be empty.</div>';
      }else{
          $query = "INSERT INTO post_article (article_title, article_text, article_author, article_date, article_image) ";
          $query .= "VALUES ('{$article_title}','{$article_text}','{$article_author}','{$article_date}','{$article_image}')";
          $create_article = mysqli_query($cont, $query);
          
          if($create_article) {
             echo "<div class='btn btn-primary btn-block'>Data Inserted Successfully</div><br>";
             header("Location: post_article.php");
          }

          if(!$create_article) {
              die('QUERY FAILDE' . mysqli_error($cont));
          }                
        }
    }
?>                
    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="form-group">
            <label for="">Title of Article*</label>
            <input class="form-control" type="text" name="article_title" placeholder="Enter Title of Article">
        </div>

         <div class="form-group">
          <label for="">Article Content*</label>
          <div class="form-group">
            <textarea class="textarea" name="article_text" placeholder="Type Article" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          </div>              
        </div>
        
        <div class="form-group">
            <label for="">Name of Author*</label>
            <input class="form-control" type="text" name="article_author" placeholder="Enter Author Name">
        </div>                    
        <div class="form-group">
            <label for="">Date*</label>
            <input class="form-control" style="max-width: 180px;" type="date" name="article_date">
        </div>                    
        <div class="form-group">
            <label for="">Upload Image (max size : 1MB &amp; W:400px; H:200px)</label>
            <input type="file" name="image" id="name">
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