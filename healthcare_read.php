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
        $result = mysqli_query($cont,"SELECT * FROM post_healthcare WHERE hc_id = $the_post_id ");

        while($show = mysqli_fetch_array($result)){
            $hc_id      = $show['hc_id'];
            $hc_title   = $show['hc_title'];
            $hc_author  = $show['hc_author'];
            $hc_content = $show['hc_content'];
            $hc_image   = $show['hc_image'];
            $hc_date    = date("d-m-Y");
    ?>
    
    <section class="article_area">
        <div class="container">
            <div class="row">                
                <div class="col-md-12">
                    <h2>
                    <a href="#"><?php echo $hc_title; ?></a>
                    </h2>
                    <p class="article_author">
                        <span>by </span>
                        <a href="#"> <?php echo $hc_author; ?></a>
                        <span> <?php echo $hc_date; ?></span>
                    </p>
                    <img class="hc_img" src="image/healthcare/<?php echo $hc_image; ?>" alt="">
                    <br>
                    <p class="article_text">
                        <?php echo $hc_content; ?>
                    </p>                    
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php include 'includes/footer.php';?>