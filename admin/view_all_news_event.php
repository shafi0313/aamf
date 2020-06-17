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
            <h1>All News &amp; Events</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All News &amp; Events</li>
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
                $query = "SELECT * FROM post_news_event order by ne_id DESC";
                $select_news_event = mysqli_query($cont, $query);
            
                while($show = mysqli_fetch_array($select_news_event)){
                    $ne_id       = $show['ne_id'];
                    $ne_title    = $show['ne_title'];
                    $ne_author   = $show['ne_author'];
                    $ne_content  = substr($show['ne_content'],0,350);
                    $ne_image    = $show['ne_image']; 
                    $ne_date     = date("d-m-Y");
            ?>

            <tr>
                <td><?php echo $ne_id; ?></td>
                <td><?php echo $ne_title; ?></td>
                <td><?php echo $ne_author; ?></td> 
                <td><?php echo $ne_content; ?></td>                 
                <td><img class="ne_image" src="../image/news_event_image/<?php echo $ne_image; ?>" height="80" width="80" alt=""></td>
                <td><?php echo $ne_date; ?></td>
                <td style="width: 80px; vertical-align: middle; text-align: center">
                <?php echo "<a class='btn btn-sm btn-warning' href='post_news_event.php?source=edit_ne&p_id={$ne_id}'><i class='fa fa-pencil-square-o'></i></a>"; ?> || 
                <?php echo "<a rel='$ne_id' href='javascript:void(0);' class='delete_link btn btn-sm btn-danger'><i class='fa fa-trash'></i></a>"; ?>
                
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
        $query = "DELETE FROM post_news_event WHERE ne_id = {$the_post_id} ";
        $delete_query = mysqli_query($cont, $query);       
        header("Location: post_news_event.php");
    }   
?> 