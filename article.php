<?php
    include 'includes/header.php';
    include 'includes/config.php';
?>
<div class="container">
    <h4 class="article_title">ARTICLE</h4>
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

    $post_query_count = "SELECT * FROM post_article";
    $find_count = mysqli_query($cont, $post_query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count / $per_page);


    $result = mysqli_query($cont,"SELECT * FROM `post_article` order by article_id DESC LIMIT $page_1, $per_page");

    while($show = mysqli_fetch_array($result)){
        $article_id     = $show['article_id'];
        $article_author = $show['article_author'];
        $article_title  = $show['article_title'];
        $article_text   = substr($show['article_text'],0,500);
        $article_image  = $show['article_image'];
        $article_date   = $show['article_date'];
        
?>
    <section class="article_area">
        <div class="container">            
            <div class="row">               
                <div class="col-md-4 article_">
                    <img class="article_img" src="image/article_image/<?php echo $article_image; ?>" alt="">
                </div>
                <div class="col-md-8">
                    <h2>
                        <a href="post.php?p_id=<?php echo $article_id; ?>"><?php echo $article_title; ?></a>
                    </h2>
                    <p class="article_author">
                        <span>by </span>
                        <a href="#"> <?php echo $article_author; ?></a>
                        <span> <?php echo $article_date; ?></span>
                    </p>
                    <p class="article_text">
                        <?php echo $article_text ?>
                    </p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $article_id; ?>">Read More</a>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<ul class="pagination justify-content-center">
    <?php
        for($i=1; $i <= $count; $i++) {
            
            if($i == $page){
                echo "<li class='page-item'><a class='page-link active_link' href='article.php?page={$i}'>{$i}</a></li>";               
            }else{
                echo "<li class='page-item'><a class='page-link' href='article.php?page={$i}'>{$i}</a></li>";
            }
            
        }
    ?>
    
</ul>

<?php include 'includes/footer.php';?>