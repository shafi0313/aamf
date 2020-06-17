<?php
    include 'includes/header.php';
?>
    
    <!--Contact Title Start-->
    <section class="title_bg">
        <div class="container">
            <h2 class="title">Contact Us</h2>
        </div>
    </section>
    <!--Contact Title End-->
    
    <!--Map Start-->
    <section class="contact_map">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="cf_title">Location</h3>
                </div>
                <div class="col-md-12">
                    <img class="map_img" src="image/aamf_map.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
   <!--Map End-->

    <!--Contace Form Start-->
    <div class="form_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="cf_title">Contact Form</h3>
                </div>
            </div>
            
            <?php
            
                if(isset($_POST['submit'])) {
                    
                    $to      = "mhoque10@gmail.com";
                    $subject = wordwrap($_POST['subject'], 70);
                    $message = $_POST['message'];
                    $header  = "From: " .$_POST['email'];
                    
                    mail($to, $subject, $message, $header);
                }
            ?>
                                        
            <form action="" method="post" id="login-form" autocomplete="off">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" type="email" id="email" placeholder="Email Address">
                        </div>                        
                        <div class="form-group">
                            <input class="form-control" type="text" id="subject" name="subject" placeholder="Subject">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Message"></textarea>
                        </div>  
                    </div>
                    <input class="btn btn-primary btn-block" type="submit" name="submit" value="Send">
                </div>                
            </form>
        </div>
    </div>      
    <!--Contace Form End-->
    
    
    <section class="bank_area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Legal Status and Financial Contacts </h3>
                    <ul>
                        <li>গন প্রজাতন্তী বাংলাদেশ সরকার</li>
                        <li>সমাজসেবা অধিদপ্তর</li>
                        <li>জেলা সমাজসেবা কার্য্যালয়</li>
                        <li>ময়মনসসিংহ।</li>
                        <li>স্বারক নং: জেসসেকা / ম / নিবন্ধন – ২ / ৩৭৩ / ০৭</li>
                        <li>তারিখঃ ২৩/০৪/২০০৭</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3>Bank Account no.</h3>
                    <ul>
                        <li>The City Bank Ltd</li>
                        <li>Mymensingh Branch</li>
                        <li>A/C: 1401267867001</li>                        
                    </ul>
                </div>
            </div>
        </div>
    </section>    
    
    <!--Present Address Start-->
    <section class="about_area">
        <div class="container">
            <h3 class="pr_addr">ADDRESS</h3>
            <div class="row">
                <div class="col-md-6 col-md-3 col-lg-3">
                    <div class="about_bor">
                        <div class="about_text">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <h3>Address</h3>
                        <p>21 /A, Gobinda Gungulee Road, Postal Code-2200, Mymensingh</p>
                    </div>
                </div>
                <div class="col-md-6 col-md-3 col-lg-3">
                    <div class="about_bor">
                        <div class="about_text">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h3>Phone</h3>
                        <p>+8801711-147378</p>
                        <br>
                    </div>
                </div>
                <div class="col-md-6 col-md-3 col-lg-3">
                    <div class="about_bor">
                        <div class="about_text">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3>Email</h3>
                        <p>mhoque10@gmail.com</p>
                        <br>
                    </div>
                </div>
                <div class="col-md-6 col-md-3 col-lg-3">
                    <div class="about_bor">
                        <div class="about_text">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h3>Web</h3>
                        <p><a class="web_site" href="http://aamfoundation.com/" target="_blank">www.aamfoundation.com</a></p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Present Address End--> 
    
    
<?php
    include 'includes/footer.php';
?>