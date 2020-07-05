<?php
    include 'includes/header.php';
    include 'includes/config.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gallery</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css"
    />
    <link rel="stylesheet" href="css/gallery.css" />
  </head>
  <body>
    <section class="gallery-block compact-gallery">
        <!--Gallery Title Start-->
<section class="title_bg">
    <div class="container">
        <h2 class="title">Gallery</h2>
    </div>
</section>
<br>
<!--Gallery Title End-->
      <div class="container">
        <div class="row no-gutters">
        <?php
            $result = mysqli_query($cont, "SELECT * FROM gallery order by id DESC");

            while($show = mysqli_fetch_array($result)){
            $date   = date("d/m/Y");
            $image  = $show['image'];
        ?>
        <div class="col-md-6 col-lg-4 item zoom-on-hover">
            <a class="lightbox" href="image/gallery/<?php echo $image; ?> ">
              <img
                class="img-fluid image"
                src="image/gallery/<?php echo $image; ?> "
                alt="Shafi"
              />
              <span class="description">
                <span class="description-heading"></span>
                <span class="description-body"> </span>
              </span>
            </a>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <?php
  include 'includes/footer.php';
?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script>
      baguetteBox.run(".compact-gallery", { animation: "slideIn" });
    </script>
  </body>
</html>