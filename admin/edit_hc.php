<?php

    if(isset($_GET['p_id'])){
    $the_post_id =  $_GET['p_id'];
    }

    $result_id = mysqli_query($cont, "SELECT * FROM post_healthcare WHERE hc_id = $the_post_id ");

    while($show = mysqli_fetch_array($result_id)){
        $hc_id      = $show['hc_id'];
        $hc_title   = $show['hc_title'];
        $hc_author  = $show['hc_author'];        
        $hc_content = $show['hc_content'];
        $hc_date    = $show['hc_date'];
        $hc_image   = $show['hc_image'];
    }

    if(isset($_POST['update_post'])){          
        $hc_title      = $_POST['hc_title'];
        $hc_author     = $_POST['hc_author'];
        $hc_content    = $_POST['hc_content'];
        $hc_date       = $_POST['hc_date'];
        $hc_image      = $_FILES['image']['name'];
        $hc_image_temp = $_FILES['image']['tmp_name'];
        
        move_uploaded_file($hc_image_temp, "../image/healthcare/$hc_image");
        
        $query  = "UPDATE post_healthcare SET ";
        $query .= "hc_title     = '{$hc_title}', "; 
        $query .= "hc_author    = '{$hc_author}', "; 
        $query .= "hc_content   = '{$hc_content}', ";
        $query .= "hc_date      = '{$hc_date}', ";
        $query .= "hc_image     = '{$hc_image}' ";
        $query .= "WHERE hc_id  = '{$the_post_id}' ";
        
        $update_post = mysqli_query($cont,$query);
        header("Location: post_healthcare.php");
    }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit <?php echo '<div class="text-info">' .$hc_title. '</div>'?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit</li>
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
            <!-- /.card-header -->
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="article_title">Title of Article*</label>
                <input value="<?php echo $hc_title; ?>"  class="form-control" type="text" name="hc_title" placeholder="Enter Title of Healthcare">
            </div>
            <div class="form-group">
                <label for="article_text">Text Area*</label>
                <textarea class="form-control" type="text" name="hc_content" id="body" placeholder="Content" cols="30" rows="10"><?php echo $hc_content; ?></textarea>
            </div>
            <div class="form-group">
                <label for="article_author">Name of Author*</label>
                <input value="<?php echo $hc_author; ?>" class="form-control" type="text" name="hc_author" placeholder="Enter Author Name">
            </div>                    
            <div class="form-group">
                <label for="date">Date*</label>
                <input class="form-control" type="date" name="hc_date" placeholder="Enter Date Name" style="width: 175px;">
            </div>                    
            <div class="form-group">                    
                <input type="file" name="image">                        
                <img src="../image/healthcare/<?php echo $hc_image; ?>" width="100" alt="">
            </div>
            <button class="btn btn-outline-info" type="submit" name="update_post">Update Post</button>
            <button class="btn btn-outline-danger" type="reset" name="">Reset</button>
        </form>