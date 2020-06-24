<?php 
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
  <table id="example1" class="table table-sm table-bordered table-hover table-responsive table-light">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Content</th>
                <th>Image</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>                                                            
           <?php            
                $query = "SELECT * FROM post_healthcare order by hc_id DESC";
                 $select_healthcare = mysqli_query($cont, $query);
            
                while($show = mysqli_fetch_array($select_healthcare)){
                    $hc_id       = $show['hc_id'];
                    $hc_title    = $show['hc_title'];
                    $hc_author   = $show['hc_author'];
                    $hc_content  = substr($show['hc_content'],0,350);
                    $hc_image    = $show['hc_image']; 
                    $hc_date     = date("d-m-Y");
            ?>

            <tr>
                <td><?php echo $hc_id; ?></td>
                <td><?php echo $hc_title; ?></td>
                <td><?php echo $hc_author; ?></td> 
                <td><?php echo $hc_content ."..."; ?></td>
                <td><img class="article_img" src="../image/healthcare/<?php echo $hc_image; ?>" height="80" width="80" alt=""></td>
                <td><?php echo $hc_date; ?></td>
                <td style="width: 80px; vertical-align: middle; text-align: center">
                <?php echo "<a class='btn btn-sm btn-warning' href='post_healthcare.php?source=edit_hc&p_id={$hc_id}'><i class='fa fa-pencil-square-o'></i></a>"; ?> || 
                <?php echo "<a rel='$hc_id' href='javascript:void(0);' class='delete_link btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>"; ?>
                
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    </div>
    <!-- /.card-body -->
<?php
    if(isset($_GET['delete'])){                
        $the_post_id = $_GET['delete'];
        $image = mysqli_query($cont, "SELECT * FROM post_healthcare WHERE hc_id = {$the_post_id}");
        while($row = mysqli_fetch_array($image)){
          $path = '../image/healthcare/'. $row['hc_image'];
        }
        if(file_exists($path)){
          unlink($path);
        }

        $query = "DELETE FROM post_healthcare WHERE hc_id = {$the_post_id} ";
        $delete_query = mysqli_query($cont, $query);       
        header("Location: post_healthcare.php");
    }   
?> 