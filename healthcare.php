<?php
    include 'includes/header.php';
    include 'includes/config.php';
?>
<div class="container">
    <h4 class="article_title">স্বাস্থ্যকথা</h4>
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

    $post_query_count = "SELECT * FROM post_healthcare";
    $find_count = mysqli_query($cont, $post_query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count / $per_page);


    $result = mysqli_query($cont,"SELECT * FROM `post_healthcare` order by hc_id DESC LIMIT $page_1, $per_page");

    while($show = mysqli_fetch_array($result)){
        $hc_id      = $show['hc_id'];
        $hc_author  = $show['hc_author'];
        $hc_title   = $show['hc_title'];
        $hc_content = substr($show['hc_content'],0,500);
        $hc_image   = $show['hc_image'];
        $hc_date    = date("d-m-Y");
        
?>
    <section class="article_area">
        <div class="container">            
            <div class="row">               
                <div class="col-md-4 article_">
                    <img class="article_img" src="image/healthcare/<?php echo $hc_image; ?>" alt="">
                </div>
                <div class="col-md-8">
                    <h2>
                        <a href="healthcare_read.php?p_id=<?php echo $hc_id; ?>"><?php echo $hc_title; ?></a>
                    </h2>
                    <p class="article_author">
                        <span>by </span>
                        <a href="#"> <?php echo $hc_author; ?></a>
                        <span> <?php echo $hc_date; ?></span>
                    </p>
                    <p class="article_text">
                        <?php echo $hc_content ?>
                    </p>
                    <a class="btn btn-primary" href="healthcare_read.php?p_id=<?php echo $hc_id; ?>">Read More</a>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<ul class="pagination justify-content-center">
    <?php
        for($i=1; $i <= $count; $i++) {
            
            if($i == $page){
                echo "<li class='page-item'><a class='page-link active_link' href='healthcare.php?page={$i}'>{$i}</a></li>";               
            }else{
                echo "<li class='page-item'><a class='page-link' href='healthcare.php?page={$i}'>{$i}</a></li>";
            }
            
        }
    ?>
    
</ul>

<?php include 'includes/footer.php';?>