<?php

    if(isset($_GET['p_id'])){
    $the_post_id =  $_GET['p_id'];
    }

    $result_id = mysqli_query($cont, "SELECT * FROM post_article WHERE article_id = $the_post_id ");

    while($show = mysqli_fetch_array($result_id)){
        $article_id     = $show['article_id'];
        $article_title  = $show['article_title'];
        $article_author = $show['article_author'];        
        $article_text   = $show['article_text'];
        $article_image  = $show['article_image'];
    }

    if(isset($_POST['update_post'])){
          
        $article_title      = $_POST['article_title'];
        $article_author     = $_POST['article_author'];
        $article_text       = $_POST['article_text'];
        $article_date       = $_POST['article_date'];
        $article_image      = $_FILES['image']['name'];
        $article_image_temp = $_FILES['image']['tmp_name'];
        
        move_uploaded_file($article_image_temp, "../image/article_image/$article_image");
        
        $query  = "UPDATE post_article SET ";
        $query .= "article_title = '{$article_title}', "; 
        $query .= "article_author = '{$article_author}', "; 
        $query .= "article_text = '{$article_text}', ";
        $query .= "article_date = '{$article_date}', ";
        $query .= "article_image = '{$article_image}' ";
        $query .= "WHERE article_id = '{$the_post_id}' ";
        
        $update_post = mysqli_query($cont,$query);
        header("Location: post_article.php");
    }
?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1>Edit <?php echo '<div class="text-info">' .$article_title. '</div>'?></h1>
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
                <label for="article_title">Title of Article*</label>
                <input value="<?php echo $article_title; ?>"  class="form-control" type="text" name="article_title" placeholder="Enter Title of Article">
            </div>

            <div class="form-group">
              <label for="">Article Content*</label>
              <div class="form-group">
                <textarea class="textarea" name="article_text" placeholder="Type Article" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $article_text; ?></textarea>
              </div>              
            </div>



            
            <div class="form-group">
                <label for="article_author">Name of Author*</label>
                <input value="<?php echo $article_author; ?>" class="form-control" type="text" name="article_author" placeholder="Enter Author Name">
            </div>                    
            <div class="form-group">
                <label for="date">Date*</label>
                <input class="form-control" type="date" name="article_date" value="<?php echo $article_date; ?>" style="max-width: 180px">
            </div>                    
            <div class="form-group">                    
                <input type="file" name="image" accept="image/gif, image/jpg, image/jpeg, image/png" value="<?php echo $article_image; ?>">                        
                <img src="../image/article_image/<?php echo $article_image; ?>" width="100" alt="" >
            </div>
            <button class="btn btn-outline-info" type="submit" name="update_post">Update Post</button>
            <button class="btn btn-outline-danger" type="reset" name="">Reset</button>
        </form>     