<?php
    include 'includes/header.php';
    include 'includes/config.php';    
?>

<!--Gallery Title Start-->
<section class="title_bg">
    <div class="container">
        <h2 class="title">Gallery</h2>
    </div>
</section>
<!--Gallery Title End-->


    <?php
            
        $result = mysqli_query($cont, "SELECT * FROM post_news_event order by ne_id DESC");
        
        while($show = mysqli_fetch_array($result)){
        $ne_id    = $show['ne_id'];
        $ne_title = $show['ne_title'];
        $ne_image = $show['ne_image'];
        $ne_date  = date("d-m-Y");
            
        ?>
    
    
  <!--   <span class="gallery">
        <a class="test-popup-link" href="image/news_event_image/<?php echo $ne_image; ?> ">
            <img src="image/news_event_image/<?php echo $ne_image; ?> " alt="<?php echo $ne_title ?>" title="<?php echo $article_title ?>">
            <p><?php echo $ne_date ?></p>
        </a>
    </span> -->


<?php } ?>



<?php
    $result = mysqli_query($cont, "SELECT * FROM gallery order by gallery_id DESC");

    while($show = mysqli_fetch_array($result)){
        $gallery_date   = date("d/m/Y");
        $gallery_image  = $show['gallery_image'];
        $gallery_image2 = $show['gallery_image2'];
        $gallery_image3 = $show['gallery_image3'];
        $gallery_image4 = $show['gallery_image4'];
        
    
    ?>
    <span class="gallery">
        <a class="test-popup-link" href="image/gallery/<?php echo $gallery_image; ?> ">
            <img src="image/gallery/<?php echo $gallery_image; ?> " alt="">
            <p><?php echo $gallery_date ?></p>
        </a>
    </span>
    <span class="gallery">
        <a class="test-popup-link" href="image/gallery2/<?php echo $gallery_image2; ?> ">
            <img src="image/gallery2/<?php echo $gallery_image2; ?> " alt="">
            <p><?php echo $gallery_date ?></p>
        </a>
    </span>
    <span class="gallery">
        <a class="test-popup-link" href="image/gallery3/<?php echo $gallery_image3; ?> ">
            <img src="image/gallery3/<?php echo $gallery_image3; ?> " alt="">
            <p><?php echo $gallery_date ?></p>
        </a>
    </span>
    <span class="gallery">
        <a class="test-popup-link" href="image/gallery4/<?php echo $gallery_image4; ?> ">
            <img src="image/gallery4/<?php echo $gallery_image4; ?> " alt="">
            <p><?php echo $gallery_date ?></p>
        </a>
    </span>
</span>
<?php } ?>


<?php include 'includes/footer.php'; ?>