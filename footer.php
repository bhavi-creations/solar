<!-- ===== NABHAS SOLAR FOOTER START ===== -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Nunito:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    /* ---- FOOTER WRAPPER ---- */
    .nabhas_footer_section {
        position: relative;
        /* background: linear-gradient(160deg, #020b18 0%, #04183a 40%, #061e4a 70%, #030e22 100%); */
        background-color: white ;
        /* color: #ffffff; */
        color:#0b1f3a;
        padding: 80px 0 0;
        font-family: 'Nunito', sans-serif;
        overflow: hidden;
    }

    /* ---- GLOWING BACKGROUND BLOBS ---- */
    .nabhas_footer_section::before {
        content: "";
        position: absolute;
        top: -80px;
        left: -100px;
        width: 420px;
        height: 420px;
        /* background: radial-gradient(circle, rgba(0, 180, 255, 0.10) 0%, transparent 70%); */
        border-radius: 50%;
        pointer-events: none;
    }

    .nabhas_footer_section::after {
        content: "";
        position: absolute;
        bottom: 60px;
        right: -80px;
        width: 380px;
        height: 380px;
        background: radial-gradient(circle, rgba(255, 140, 0, 0.08) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    /* ---- TOP SOLAR DIVIDER ---- */
    .nabhas_footer_top_bar {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, transparent 0%, #00aaff 30%, #ffa500 60%, #00aaff 80%, transparent 100%);
    }

    /* ---- LOGO ---- */
    .nabhas_footer_logo {
        width: 250px;
        margin-bottom: 18px;
        filter: brightness(1.15);
        background-color: white;
        padding: 10px;
    }

    /* ---- TAGLINE BADGE ---- */
    .nabhas_tagline_badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        /* background: rgba(0, 170, 255, 0.12); */
        background-color: #0b1f3a;
        border: 1px solid rgba(0, 170, 255, 0.3);
        color: #ffffff;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        padding: 5px 12px;
        border-radius: 20px;
        margin-bottom: 14px;
    }

    .nabhas_tagline_badge i {
        color: #ffa500;
        font-size: 10px;
    }

    /* ---- FOOTER TEXT ---- */
    .nabhas_footer_text {
        font-size: 13.5px;
        color: #000000;
        /* color: #9db4d8; */
        line-height: 1.8;
        margin-bottom: 20px;
    }

    /* ---- SOCIAL ICONS ---- */
    .nabhas_social_row {
        display: flex;
        gap: 10px;
        margin-top: 6px;
    }

    .nabhas_social_icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        text-decoration: none;
        transition: transform 0.3s, box-shadow 0.3s;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .nabhas_social_icon:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 170, 255, 0.3);
    }

    .nabhas_si_fb {
        background: rgba(24, 119, 242, 0.2);
        color: #5b9cf6;
    }

    .nabhas_si_ig {
        background: rgba(225, 48, 108, 0.2);
        color: #f26093;
    }

    .nabhas_si_yt {
        background: rgba(255, 0, 0, 0.2);
        color: #ff6161;
    }

    .nabhas_si_li {
        background: rgba(0, 119, 181, 0.2);
        color: #5ba8d4;
    }

    .nabhas_si_wa {
        background: rgba(37, 211, 102, 0.2);
        color: #4dd87b;
    }

    /* ---- SECTION TITLE ---- */
    .nabhas_footer_title {
        font-family: 'Syne', sans-serif;
        font-weight: 800;
        font-size: 17px;
        margin-bottom: 26px;
        color: #0b1f3a;
        letter-spacing: 0.3px;
        position: relative;
        padding-bottom: 12px;
    }

    .nabhas_footer_title::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 36px;
        height: 3px;
        border-radius: 4px;
        background: linear-gradient(90deg, #00aaff, #ffa500);
    }

    /* ---- QUICK LINKS ---- */
    .nabhas_footer_links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .nabhas_footer_links li {
        margin-bottom: 9px;
    }

    .nabhas_footer_links a {
        color: #000000;
        /* color: #9db4d8; */
        text-decoration: none;
        font-size: 13.5px;
        transition: color 0.3s, padding-left 0.3s;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .nabhas_footer_links a::before {
        content: "";
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: linear-gradient(135deg, #00aaff, #0066cc);
        flex-shrink: 0;
        transition: transform 0.3s;
    }

    .nabhas_footer_links a:hover {
        /* color: #ffffff; */
        padding-left: 4px;
    }

    .nabhas_footer_links a:hover::before {
        transform: scale(1.5);
        background: linear-gradient(135deg, #ffa500, #ff6600);
    }

    /* ---- CONTACT LIST ---- */
    .nabhas_footer_contact {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .nabhas_footer_contact li {
        display: flex;
        gap: 14px;
        margin-bottom: 16px;
        font-size: 13.5px;
        color: #9db4d8;
        align-items: flex-start;
    }

    .nabhas_contact_icon {
        width: 34px;
        height: 34px;
        border-radius: 9px;
        /* background: rgba(0, 170, 255, 0.12); */
        background-color: #0b1f3a;
        border: 1px solid rgba(0, 170, 255, 0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        margin-top: 1px;
    }

    .nabhas_contact_icon i {
        color: #ffffff;
        font-size: 13px;
    }

    .nabhas_contact_text strong {
        display: block;
        color: #0b1f3a;
        /* color: #c8daf2; */
        font-size: 11px;
        letter-spacing: 0.8px;
        text-transform: uppercase;
        margin-bottom: 2px;
        font-weight: 600;
    }

    .nabhas_contact_text span {
        color: #000000;
        /* color: #9db4d8; */
        font-size: 13.5px;
        line-height: 1.6;
    }

    /* ---- STATS ROW ---- */
    .nabhas_footer_stats {
        display: flex;
        gap: 0;
        margin-top: 24px;
        border: 1px solid rgba(0, 170, 255, 0.15);
        border-radius: 14px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.02);
    }

    .nabhas_stat_item {
        flex: 1;
        text-align: center;
        padding: 14px 8px;
        border-right: 1px solid rgba(0, 170, 255, 0.1);
    }

    .nabhas_stat_item:last-child {
        border-right: none;
    }

    .nabhas_stat_num {
        font-family: 'Syne', sans-serif;
        font-weight: 800;
        font-size: 22px;
        background: linear-gradient(135deg, #00aaff, #ffa500);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1;
    }

    .nabhas_stat_label {
        font-size: 10px;
        color: #6e8db5;
        letter-spacing: 0.6px;
        text-transform: uppercase;
        margin-top: 4px;
    }

    /* ---- DIVIDER ---- */
    .nabhas_footer_divider {
        border: none;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(0, 170, 255, 0.3), rgba(255, 165, 0, 0.3), transparent);
        margin: 40px 0 0;
    }

    /* ---- BOTTOM BAR ---- */
    .nabhas_footer_bottom {
        padding: 18px 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
    }

    .nabhas_footer_copy {
        font-size: 13px;
        color: #6e8db5;
    }

    .nabhas_footer_copy b {
        color: #5dcfff;
        font-weight: 700;
    }

    .nabhas_footer_badge {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: #6e8db5;
        border: 1px solid rgba(255, 255, 255, 0.07);
        padding: 5px 12px;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.02);
    }

    .nabhas_footer_badge i {
        color: #ffa500;
    }

    /* ---- RESPONSIVE ---- */
    @media (max-width: 768px) {

        .nabhas_footer_section {
            text-align: center;
            padding-top: 60px;
        }

        .nabhas_footer_title::after {
            left: 50%;
            transform: translateX(-50%);
        }

        .nabhas_footer_links a {
            justify-content: center;
        }

        .nabhas_footer_contact li {
            justify-content: center;
            text-align: left;
        }

        .nabhas_social_row {
            justify-content: center;
        }

        .nabhas_footer_bottom {
            justify-content: center;
            text-align: center;
        }

        .nabhas_footer_stats {
            max-width: 320px;
            margin: 24px auto 0;
        }
    }
</style>

<footer class="nabhas_footer_section">

    <div class="nabhas_footer_top_bar"></div>

    <div class="container">

        <div class="row gy-5">

            <!-- COLUMN 1 — BRAND -->
            <div class="col-lg-3 col-md-6">

                <img src="./assets/img/logo.png" class="nabhas_footer_logo" alt="Nabhas Solar Logo">

                <div class="nabhas_tagline_badge">
                    <i class="fas fa-sun"></i> Clean Energy Leaders
                </div>

                <p class="nabhas_footer_text">
                    Nabhas Solar delivers innovative renewable energy solutions for homes,
                    businesses, and industries. With 400+ successful installations, we help
                    communities shift to clean energy while reducing carbon emissions and electricity costs.
                </p>

                <!-- SOCIAL ICONS -->
                <div class="nabhas_social_row">
                    <a href="#" class="nabhas_social_icon nabhas_si_fb" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="nabhas_social_icon nabhas_si_ig" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="nabhas_social_icon nabhas_si_yt" title="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="nabhas_social_icon nabhas_si_li" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <!-- <a href="#" class="nabhas_social_icon nabhas_si_wa" title="WhatsApp"><i class="fab fa-whatsapp"></i></a> -->
                </div>

                <!-- MINI STATS -->
                <!-- <div class="nabhas_footer_stats">
          <div class="nabhas_stat_item">
            <div class="nabhas_stat_num">400+</div>
            <div class="nabhas_stat_label">Projects</div>
          </div>
          <div class="nabhas_stat_item">
            <div class="nabhas_stat_num">10+</div>
            <div class="nabhas_stat_label">Years</div>
          </div>
          <div class="nabhas_stat_item">
            <div class="nabhas_stat_num">5 MW</div>
            <div class="nabhas_stat_label">Installed</div>
          </div>
        </div> -->

            </div>

            <!-- COLUMN 2 — QUICK LINKS -->
            <div class="col-lg-2 col-md-6">

                <h4 class="nabhas_footer_title">Quick Links</h4>

                <ul class="nabhas_footer_links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="service.php">Services</a></li>
                    <!-- <li><a href="get_in_touch.php">Get a Free Quote’</a></li> -->
                    <!-- <li><a href="#">Residential Solar</a></li>
                    <li><a href="#">Projects</a></li> -->
                    <li><a href="contact.php">Contact</a></li>
                </ul>

            </div>

            <!-- COLUMN 3 — SERVICES -->
            <div class="col-lg-3 col-md-6">

                <h4 class="nabhas_footer_title">Our Services</h4>

                <ul class="nabhas_footer_links">
                    <li><a href="service.php">Residential Solar Installation</a></li>
                    <li><a href="service.php">Commercial Solar Systems</a></li>
                    <li><a href="service.php">EPC Services</a></li>
                    <li><a href="service.php">Battery Storage</a></li>
                    <li><a href="service.php">AMC & Support</a></li>
                    <li><a href="service.php">Smart Monitoring</a></li>
                    <!-- <li><a href="#">AMC Maintenance</a></li> -->
                </ul>

            </div>

            <!-- COLUMN 4 — CONTACT -->
            <div class="col-lg-4 col-md-6">

                <h4 class="nabhas_footer_title">Contact Info</h4>

                <ul class="nabhas_footer_contact">

                    <li>
                        <div class="nabhas_contact_icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="nabhas_contact_text">
                            <strong>Address</strong>
                            <span>#70-7-2/4,2nd floor,road
                                <br>no.4,siddartha nagar,kakinada-533005</span>
                        </div>
                    </li>

                    <li>
                        <div class="nabhas_contact_icon"> <i class="bi bi-telephone-fill"></i></div>
                        <div class="nabhas_contact_text">
                            <strong>Phone</strong>
                            <span>+91 8341950894</span>
                        </div>
                    </li>

                    <li>
                        <div class="nabhas_contact_icon"><i class="fas fa-envelope"></i></div>
                        <div class="nabhas_contact_text">
                            <strong>Email</strong>
                            <span> project@nabhasconstuctions.com</span>
                        </div>
                    </li>

                    <!-- <li>
                        <div class="nabhas_contact_icon"><i class="fas fa-globe"></i></div>
                        <div class="nabhas_contact_text">
                            <strong>Website</strong>
                            <span>www.nabhassolar.com</span>
                        </div>
                    </li> -->

                </ul>

            </div>

        </div><!-- /row -->

        <hr class="nabhas_footer_divider">

        <div class="nabhas_footer_bottom">
            <div class="nabhas_footer_copy">
                © 2026 All Rights Reserved by <b>Nabhas Solar Pvt Ltd</b>
            </div>
            <div class="nabhas_footer_badge">
                <i class="fas fa-leaf"></i> Powered by Clean Energy
            </div>
        </div>

    </div><!-- /container -->
    <style>
        /* Style for the WhatsApp link */
        .whatsapp-link {
            width: 50px;
            height: 50px;
            position: fixed;
            bottom: 90px;
            right: 20px;
            background-color: #25d366;
            color: #fff;

            border-radius: 50%;
            text-decoration: none;
            font-size: 35px;
            text-align: center;
            z-index: 999;
        }


        .call_link {

            position: fixed;
            bottom: 160px;
            right: 20px;
            /* background-color: #25d366; */
            color: #fff;
            /* padding: 5px; */
            border-radius: 50%;
            text-decoration: none;
            font-size: 35px;
            text-align: center;
            z-index: 99999;
        }

        .broucher_link {
            position: fixed;
            bottom: 230px;
            right: 20px;
             width: 50px;
            height: 50px;        }
    </style>

    <a href="https://api.whatsapp.com/send?phone=918341950894" style="color: #fff;" class="whatsapp-link"
        target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- <div class="broucher_link ">
        <a href="./assets/img/Nabhas Solar Broucher.pdf" download="Nabhas_Solar_Brochure" class="text-decoration-none">
            <div class="image-container">
                <img src="./assets/img/favicons.png" alt="Brochure" class="img-fluid">


            </div>
        </a>
    </div> -->




    <a href="tel:+919290019948" style="color: #fff;" class="call_link  "
        target="_blank">
        <img src="./assets/img/Call.png" alt="" style="width:50px;  height:50px;" ;>
    </a>

</footer>

<!-- ===== NABHAS SOLAR FOOTER END ===== -->