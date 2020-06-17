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
            <h1>Add Image</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Image</li>
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
                    $gallery_date       = mysqli_real_escape_string($cont, $_POST['gallery_date']);
                    $gallery_image      = $_FILES['image']['name'];
                    $gallery_image_temp = $_FILES['image']['tmp_name'];
                    
                    $gallery_image2      = $_FILES['image2']['name'];
                    $gallery_image_temp2 = $_FILES['image2']['tmp_name'];
                    
                    $gallery_image3      = $_FILES['image3']['name'];
                    $gallery_image_temp3 = $_FILES['image3']['tmp_name'];
                    
                    $gallery_image4      = $_FILES['image4']['name'];
                    $gallery_image_temp4 = $_FILES['image4']['tmp_name'];
                    
                    move_uploaded_file($gallery_image_temp, "../image/gallery/$gallery_image");
                    move_uploaded_file($gallery_image_temp2, "../image/gallery2/$gallery_image2");
                    move_uploaded_file($gallery_image_temp3, "../image/gallery3/$gallery_image3");
                    move_uploaded_file($gallery_image_temp4, "../image/gallery4/$gallery_image4");
                    
                        if (empty($gallery_date)){
                            echo '<div class="alert alert-danger" role="alert">
                            <strong>Oh span!</strong> Date is empty.</div>';
                        }else{
                            $result = mysqli_query($cont, "INSERT INTO `gallery`(`gallery_image`,`gallery_image2`,`gallery_image3`,`gallery_image4`,`gallery_date`) VALUES ('$gallery_image','$gallery_image2','$gallery_image3','$gallery_image4','$gallery_date')");
                            
                            if($result) {
                             echo "<div class='btn btn-primary btn-block'>Image Inserted Successfully</div><br>";
                            }

                            if(!$result) {
                              die('QUERY FAILDE' . mysqli_error($cont));
                            }              
                            
                        }
                  }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                   <div class="form-group">
                        <label for="">Date</label>
                        <input class="form-control" type="date" name="gallery_date" style="width: 170px;">
                    </div>                 
                    <div class="form-group">
                        <label for="">Upload Image (max size : 1MB &amp; W:400px; H:200px)</label>
                        <input type="file" name="image">
                    </div>               
                    <div class="form-group">
                        <label for="">Upload Image (max size : 1MB &amp; W:400px; H:200px)</label>
                        <input type="file" name="image2">
                    </div>               
                    <div class="form-group">
                        <label for="">Upload Image (max size : 1MB &amp; W:400px; H:200px)</label>
                        <input type="file" name="image3">
                    </div>               
                    <div class="form-group">
                        <label for="">Upload Image (max size : 1MB &amp; W:400px; H:200px)</label>
                        <input type="file" name="image4">
                    </div>      
                    <button class="btn btn-secondary" type="submit" name="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                </form>
         

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