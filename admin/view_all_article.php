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
      <table id="example1" class="table table-bordered table-hover table-responsive table-light">
        <thead class="bg-info">
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Text</th>
            <th>Image</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>                                                                              
           <?php                    
                $query = "SELECT * FROM post_article order by article_id DESC";
                $select_news_event = mysqli_query($cont, $query);
            
                while($show = mysqli_fetch_array($select_news_event)){
                    $article_id     = $show['article_id'];
                    $article_author = $show['article_author'];
                    $article_title  = $show['article_title'];
                    $article_text   = substr($show['article_text'],0,250);
                    $article_image  = $show['article_image'];
            ?>

            <tr>
                <td class="text-center"><?php echo $article_id; ?></td>
                <td><?php echo $article_author; ?></td>
                <td><?php echo $article_title; ?></td>
                <td><?php echo $article_text. "...";?></td>
                <td><img class="article_img" src="../image/article_image/<?php echo $article_image; ?>" height="80" weight="80" alt=""></td>
                <td><?php echo $show['article_date']; ?></td>
                <td style="width: 95px;">
                    <?php echo "<a class='btn btn-warning' href='post_article.php?source=edit_article&p_id={$article_id}'><i class='fa fa-pencil-square-o'></i></a>"; ?> || 
                    <?php echo "<a rel='$article_id' href='javascript:void(0);' class='delete_link btn btn-danger'><i class='fa fa-trash'></i></a>"; ?>
                    
                </td>
            <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
<?php
    if(isset($_GET['delete'])){                
        $the_post_id = $_GET['delete']; 
        $image = mysqli_query($cont, "SELECT * FROM post_article WHERE article_id = {$the_post_id} ");
        while($row = mysql_fetch_array($image)){
          $path = 'image/article_image/'. $row['article_image'];
        }
        if(file_exists($path)){
          unlink($path);
        }
        var_dump($path);
        //$query = "DELETE FROM post_article WHERE article_id = {$the_post_id} ";
        //$delete_query = mysqli_query($cont, $query);       
        // header("Location: post_article.php");
    }   
?> 