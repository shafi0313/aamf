<?php

    if(isset($_GET['p_id'])){
    $the_post_id =  $_GET['p_id'];
    }

    $result_id = mysqli_query($cont, "SELECT * FROM post_news_event WHERE ne_id = $the_post_id ");

    while($show = mysqli_fetch_array($result_id)){
        $ne_id      = $show['ne_id'];
        $ne_title   = $show['ne_title'];
        $ne_author  = $show['ne_author'];        
        $ne_date    = $show['ne_date'];        
        $ne_content = $show['ne_content'];
        $ne_image   = $show['ne_image'];
    }

    if(isset($_POST['update_post'])){
          
        $ne_title      = $_POST['ne_title'];
        $ne_author     = $_POST['ne_author'];
        $ne_date       = $_POST['ne_date'];
        $ne_content    = $_POST['ne_content'];
        $ne_image      = $_FILES['image']['name'];
        $ne_image_temp = $_FILES['image']['tmp_name'];
        
        move_uploaded_file($ne_image_temp, "../image/news_event_image/$ne_image");
        
        $query  = "UPDATE post_news_event SET ";
        $query .= "ne_title     = '{$ne_title}', "; 
        $query .= "ne_author    = '{$ne_author}', "; 
        $query .= "ne_date      = '{$ne_date}', "; 
        $query .= "ne_content   = '{$ne_content}', ";
        $query .= "ne_image     = '{$ne_image}' ";
        $query .= "WHERE ne_id  = '{$the_post_id}' ";
        
        $update_post = mysqli_query($cont,$query);
        header("Location: post_news_event.php");
    }
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1>Edit <?php echo '<div class="text-info">' .$ne_title. '</div>'?></h1>
          </div>
          <div class="col-sm-4">
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

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="article_title">Title *</label>
                <input value="<?php echo $ne_title; ?>"  class="form-control" type="text" name="ne_title" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label for="article_text">content*</label>
                <textarea class="form-control" type="text" name="ne_content" id="body" placeholder="" cols="30" rows="10"><?php echo $ne_content; ?></textarea>
            </div>
            <div class="form-group">
                <label for="article_author">Name of Author*</label>
                <input value="<?php echo $ne_author; ?>" class="form-control" type="text" name="ne_author" placeholder="Enter Author Name">
            </div>                    
            <div class="form-group">
                <label for="date">Date*</label>
                <input class="form-control" type="date" name="ne_date" style="width: 180px;">
            </div>                    
            <div class="form-group">                    
                <input type="file" name="image">                        
                <img src="../image/news_event_image/<?php echo $ne_image; ?>" width="100" alt="">
            </div>
            <button class="btn btn-secondary" type="submit" name="update_post">Update Post</button>
        </form>                