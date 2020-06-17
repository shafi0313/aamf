<?php
    include 'includes/header.php';
    include 'includes/config.php';
?>
<div class="container">
    <h4 class="n_e_title">NEWS &amp; EVENT</h4>
</div>
      
       
<?php
    $per_page = 4;

    if(isset($_GET['page'])){

        $page = $_GET['page'];
    } else{
        $page = "";
    }

    if($page == "" || $page == 1){
        $page_1 = 0;
    }else{
        $page_1 = ($page * $per_page) - $per_page;
    }

    $post_query_count = "SELECT * FROM post_news_event";
    $find_count = mysqli_query($cont, $post_query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count / $per_page);


    $result = mysqli_query($cont,"SELECT * FROM `post_news_event` order by ne_id DESC LIMIT $page_1, $per_page");

    while($show = mysqli_fetch_array($result)){
        $ne_id       = $show['ne_id'];
        $ne_title    = $show['ne_title'];
        $ne_author   = $show['ne_author'];
        $ne_content  = substr($show['ne_content'],0,350);
        $ne_image    = $show['ne_image']; 
        $ne_date     = date("d-m-Y");
?> 

<section  class="event_area">
    <div class="container">                    
        <div class="row">               
            <div class="col-md-5 ne_">
                <img class="ne_img" src="image/news_event_image//<?php echo $ne_image; ?>" alt="">
            </div>
            <div class="col-md-7">
                <h2>
                    <a href="post.php?p_id=<?php echo $ne_id; ?>"><?php echo $ne_title; ?></a>
                </h2>
                <p class="article_author">
                    <span>by </span>
                    <a href="#"> <?php echo $ne_author; ?></a>
                    <span> <?php echo $ne_date; ?></span>
                </p>
                <p class="article_text">
                    <?php echo $ne_content ?>
                </p>
                <a class="btn btn-primary" href="ne_read.php?p_id=<?php echo $ne_id; ?>">Read More</a>
            </div>
        </div>
    </div>
</section>
<?php } ?>

            
<ul class="pagination justify-content-center">
    <?php
        for($i=1; $i <= $count; $i++) {
            
            if($i == $page){
                echo "<li class='page-item'><a class='page-link active_link' href='news_event.php?page={$i}'>{$i}</a></li>";               
            }else{
                echo "<li class='page-item'><a class='page-link' href='news_event.php?page={$i}'>{$i}</a></li>";
            }
            
        }
    ?>
    
</ul>


<?php
    include 'includes/footer.php';
?>