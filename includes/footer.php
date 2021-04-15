    <!-- Footer Top Start-->
    <section class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-md 12">
                    <div class="social_icon">
                        <ul>
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href=""><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Top End-->


    <!-- Footer Center Start-->
    <section class="footer_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-3 col-lg-3  footer_style">
                    <h3>Amzad Ali Memorial Foundation</h3>
                    <p>
                        The “Amzad Ali Memorial Foundation” is an ongoing effort to keeping him alive. We stand beside our poor people to assist them in this society.
                        Our main intention is to educate the poor people and to give them health services free of charge.
                    </p>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3  footer_style">
                    <h3>IMPORTANT LINKS</h3>
                    <div class="row footer_sub">
                        <div class="col-md-6">
                            <ul>
                                <li><a href="about_us.php"><i class="fas fa-caret-right"></i> About Us</a></li>
                                <li><a href="gallery.php"><i class="fas fa-caret-right"></i> Photo Gallery</a></li>
                                <li><a href="article.php"><i class="fas fa-caret-right"></i> Articles</a></li>

                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul>
                                <li><a href="contact_us.php"><i class="fas fa-caret-right"></i> Contact Us</a></li>
                                <li><a href="#"><i class="fas fa-caret-right"></i> FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3  footer_style">
                    <h3>CONTACT US</h3>
                    <ul>
                        <li><i class="fas fa-map-marked-alt"></i> 21 /A, Gobinda Gungulee Road, Postal Code-2200, Mymensingh</li>
                        <li><i class="fas fa-envelope"></i> mhoque10@gmail.com</li>
                        <li><a href="http://aamfoundation.com/"><i class="fa fa-globe"></i> www.aamfoundation.com</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3  footer_style">
                    <h3>DONATE US</h3>
                    <ul>
                        <li>AMZAD ALI MEMORIAL FOUNDATION</li>
                        <li>The City Bank Limited</li>
                        <li>Branch: City Bank Mymensingh Branch, Mymensingh</li>
                        <li>A/C: 1401261867001</li>
                        <li>SWIFT Code: CIBLBDDH</li>
                        <li>Routing Number: 225611753</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Center End-->

    <!-- Footer Bottom Start -->
    <section class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 copyright">
                    Copyright &copy; <?php echo date('Y'); ?>
                </div>
                <div class="col-md-6 footer-menu">
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="contact_us.php">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Bottom End -->

    <!-- scrollup-->
    <a href="#" class="scrollup">
        <i class="fas fa-angle-up"></i>
    </a>

    <!--Scripts-->
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/script.js"></script>

    <!-- Magnific Popup-->
    <script>
        $('.test-popup-link').magnificPopup({
          type: 'image'

        });
    </script>

    <!--Model-->
    <script>
        $(document).ready(function(){
            $("#flip").click(function(){
                $("#panel").slideToggle("slow");
            });
        });
    </script>
</body>
</html>