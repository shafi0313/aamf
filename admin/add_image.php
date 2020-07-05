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
                // if(isset($_POST['submit']))
                // {
                //   $fileCount = count($_FILES['file']['name']);
                //   for($i=0;$i<$fileCount;$i++)
                //   {
                //     $fileName = $_FILES['file']['name'][$i];
                //     $sql =mysqli_query($cont,"INSERT INTO new_gallery (title,img) VALUES ('$fileName','$fileName')");

                //     // if($cont->query($sql)===TRUE)
                //     // {}
                //     // move_uploaded_file($gallery_image_temp, "../image/gallery/$gallery_image");
                //     move_uploaded_file($_FILES['file']['tmp_name'][$i],'../image/gallery/'.$fileName);
                //   }
                // }

                ?>
              <!-- <form method="post" enctype="multipart/form-data">
                <input type="file" name="file[]" id="file" multiple>
                <input type="submit" name="submit" value="Submit">
              </form> -->

<?php
  $errors = array();
  $uploadedFiles = array();
  $extension = array("jpeg","jpg","png","JPG","PNG");
  $bytes = 1024;
  $KB = 1024;
  $totalBytes = $bytes * $KB;
  $UploadFolder = "../image/gallery/";
  $counter = 0;
  if(isset($_FILES["files"]["tmp_name"])){
    foreach( $_FILES["files"]["tmp_name"] as $key => $tmp_name){
      $temp = $_FILES["files"]["tmp_name"][$key];
      $name = $_FILES["files"]["name"][$key];

      if(empty($temp))
      {
          break;
      }

      $counter++;
      $UploadOk = true;

      if($_FILES["files"]["size"][$key] > $totalBytes)
      {
          $UploadOk = false;
          array_push($errors, $name." file size is larger than the 1 MB.");
      }

      $ext = pathinfo($name, PATHINFO_EXTENSION);
      if(in_array($ext, $extension) == false){
          $UploadOk = false;
          array_push($errors, $name." is invalid file type.");
      }

      if(file_exists($UploadFolder."/".$name) == true){
          $UploadOk = false;
          array_push($errors, $name." file is already exist.");
      }

      if($UploadOk == true){
        $sql =mysqli_query($cont,"INSERT INTO gallery (title,image,create_at) VALUES ('$name','$name',NOW())");


          move_uploaded_file($temp,$UploadFolder."/".$name);
          array_push($uploadedFiles, $name);
      }
    }
  }

  if($counter>0){
      if(count($errors)>0)
      {
          echo "<b>Errors:</b>";
          echo "<br/><ul class='list-group'>";
          foreach($errors as $error)
          {
              echo "<li class='list-group-item list-group-item-danger'>".$error."</li>";
          }
          echo "</ul><br/>";
      }

      if(count($uploadedFiles)>0){
          echo "<b>Uploaded Files:</b>";
          echo "<br/><ul class='list-group'>";
          foreach($uploadedFiles as $fileName)
          {
              echo "<li class='list-group-item list-group-item-success'>".$fileName."</li>";
          }
          echo "</ul><br/>";

          echo count($uploadedFiles)." file(s) are successfully uploaded.";
      }
  }
  else{
      echo "Please, Select file(s) to upload.";
  }
?>


<br>

<form method="post" enctype="multipart/form-data" name="formUploadFile">
    <label>Select One or More File to upload:</label><br>
    <input type="file" name="files[]" multiple="multiple" /><br><br>
    <input class="btn btn-info" type="submit" value="Upload Image" name="btnSubmit"/>
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

<script type="text/javascript">
      $(document).ready(function(){

        var html = '<tr><td><input class="form-control" type="file" name="image[]" required=""></td><td><input class="btn btn-danger" type="button" id="remove" name="remove" value="Remove"></td></tr>';

        var max = 10;
        var x = 1;

        $("#add").click(function(){
          if(x <= max){
            $("#table_field").append(html);
            x++;
          }
        });
        $("#table_field").on('click','#remove',function(){
          $(this).closest('tr').remove();
          x--;
        });

      });
  </script>

</body>
</html>