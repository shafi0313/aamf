<?php
    include 'includes/header.php';
    include 'includes/config.php';
?>

<?php
    if(isset($_GET['p_id'])) {
        $the_post_id = $_GET['p_id'];
    }
?>
                            
   <?php
        $result = mysqli_query($cont,"SELECT * FROM post_news_event WHERE ne_id = $the_post_id ");

        while($show = mysqli_fetch_array($result)){
            $ne_id      = $show['ne_id'];
            $ne_title   = $show['ne_title'];
            $ne_author  = $show['ne_author'];
            $ne_content = $show['ne_content'];
            $ne_image   = $show['ne_image'];
            $ne_date    = date("d-m-Y");
    ?>
    
    <section class="article_area">
        <div class="container">
            <div class="row">                
                <div class="col-md-12">
                    <h2>
                    <a href="#"><?php echo $ne_title; ?></a>
                    </h2>
                    <p class="article_author">
                        <span>by </span>
                        <a href="#"> <?php echo $ne_author; ?></a>
                        <span> <?php echo $ne_date; ?></span>
                    </p>
                    <p class="article_text">
                        <?php echo $ne_content; ?>
                    </p>
                    <br>
                    <img class="article_img" src="image/news_event_image/<?php echo $ne_image; ?>" alt="">                    
                                        
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php include 'includes/footer.php';?>