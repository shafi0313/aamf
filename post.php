<?php
    include 'includes/header.php';
    include 'includes/config.php';
?>

<?php
    if(isset($_GET['p_id'])){
        $the_post_id = $_GET['p_id'];
    }
?>
                            
   <?php
        $result = mysqli_query($cont,"SELECT * FROM post_article WHERE article_id = $the_post_id ");

        while($show = mysqli_fetch_array($result)){
            $article_id     = $show['article_id'];
            $article_author = $show['article_author'];
            $article_title  = $show['article_title'];
            $article_text   = $show['article_text'];
            $article_image  = $show['article_image'];
    ?>
    
    <section class="article_area">
        <div class="container">
            <div class="row">                
                <div class="col-md-12">
                    <h2>
                    <a href="#"><?php echo $article_title; ?></a>
                    </h2>
                    <p class="article_author">
                        <span>by </span>
                        <a href="#"> <?php echo $article_author; ?></a>
                        <span> <?php echo $show['article_date']; ?></span>
                    </p>
                    <img class="article_img" src="image/article_image/<?php echo $article_image; ?>" alt="">
                    <br>
                    <p class="article_text">
                        <?php echo $show['article_text']; ?>
                    </p>                    
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php include 'includes/footer.php';?>