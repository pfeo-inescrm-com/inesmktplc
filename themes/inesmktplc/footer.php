    <!--================================
    START FOOTER AREA
    =================================-->
    <footer class="footer-area">
        <div class="footer-big section--padding">
            <!-- start .container -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="info-footer">

                            <!-- <p class="info--text">Nunc placerat mi id nisi interdum they mollis. Praesent
                                pharetra, justo ut scel erisque the mattis, leo quam.</p> -->
                            <?php
                            if (is_active_sidebar('inesmktplc-sidebar-footer-1')) {
                                dynamic_sidebar('inesmktplc-sidebar-footer-1');
                            }
                            ?>
                            <!-- <div class="info-footer">
                            <div class="info__logo">
                                <img src="images/logo-inescrm-white-166x35.png" alt="footer logo">
                            </div>
                            <p class="info--text">Nunc placerat mi id nisi interdum they mollis. Praesent
                                pharetra, justo ut scel erisque the mattis, leo quam.</p>
                            <ul class="info-contact">
                                <li>
                                    <span class="lnr lnr-phone info-icon"></span>
                                    <span class="info">0 825 157 825</span>
                                </li>
                                <li>
                                    <span class="lnr lnr-envelope info-icon"></span>
                                    <span class="info">bonjour@inescrm.com</span>
                                </li>
                                <li>
                                    <span class="lnr lnr-map-marker info-icon"></span>
                                    <span class="info">54 bis rue Sala, 69002 Lyon</span>
                                </li>
                            </ul>
                        </div> -->
                            <!-- end /.info-footer -->
                        </div>
                    </div>
                    <!-- end /.col-lg-3 -->

                    <div class="col-lg-3 col-md-6 col-12 mt-5 mt-lg-0">
                        <?php
                        if (is_active_sidebar('inesmktplc-sidebar-footer-2')) {
                            dynamic_sidebar('inesmktplc-sidebar-footer-2');
                        }
                        ?>
                    </div>
                    <!-- end /.col-lg-3 -->

                    <div class="col-lg-3 col-md-6 col-12 mt-5 mt-lg-0">
                        <?php
                        if (is_active_sidebar('inesmktplc-sidebar-footer-3')) {
                            dynamic_sidebar('inesmktplc-sidebar-footer-3');
                        }
                        ?>
                        <!-- <div class="footer-menu">
                            <h4 class="footer-widget-title text--white">Our Company</h4>
                            <ul>
                                <li>
                                    <a href="#">How to Join Us</a>
                                </li>
                                <li>
                                    <a href="#">How It Work</a>
                                </li>
                                <li>
                                    <a href="#">Buying and Selling</a>
                                </li>
                                <li>
                                    <a href="#">Testimonials</a>
                                </li>
                                <li>
                                    <a href="#">Copyright Notice</a>
                                </li>
                                <li>
                                    <a href="#">Refund Policy</a>
                                </li>
                                <li>
                                    <a href="#">Affiliates</a>
                                </li>
                            </ul>
                        </div> -->
                        <!-- end /.footer-menu -->

                        <!-- <div class="footer-menu">
                            <h4 class="footer-widget-title text--white">Help and FAQs</h4>
                            <ul>
                                <li>
                                    <a href="#">How to Join Us</a>
                                </li>
                                <li>
                                    <a href="#">How It Work</a>
                                </li>
                                <li>
                                    <a href="#">Buying and Selling</a>
                                </li>
                                <li>
                                    <a href="#">Testimonials</a>
                                </li>
                                <li>
                                    <a href="#">Copyright Notice</a>
                                </li>
                                <li>
                                    <a href="#">Refund Policy</a>
                                </li>
                                <li>
                                    <a href="#">Affiliates</a>
                                </li>
                            </ul>
                        </div> -->
                        <!-- end /.footer-menu -->
                    </div>
                    <!-- end /.col-lg-3 -->

                    <div class="col-lg-3 col-md-6 col-12 mt-5 mt-lg-0">
                    <div class="info__logo">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/logo-inescrm-white-166x35.png';  ?>" alt="footer logo">
                            </div>
                        <?php
                        if (is_active_sidebar('inesmktplc-sidebar-footer-4')) {
                            dynamic_sidebar('inesmktplc-sidebar-footer-4');
                        }
                        ?>
                        <!-- <div class="newsletter">
                            <h4 class="footer-widget-title text--white">Newsletter</h4>
                            <p>Subscribe to get the latest news, update and offer information. Don't worry,
                                we won't send spam!</p>
                            <div class="newsletter__form">
                                <form action="#">
                                    <div class="field-wrapper">
                                        <input class="relative-field rounded" type="text" placeholder="Enter email">
                                        <button class="btn btn--round" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div> -->

                        <!-- start .social -->
                        <!-- <div class="social social--color--filled">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <span class="fa fa-facebook"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fa fa-twitter"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fa fa-google-plus"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fa fa-linkedin"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                        <!-- end /.social -->
                    </div>
                    <!-- end /.newsletter -->
                </div>
                <!-- end /.col-lg-3 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
        </div>
        <!-- end /.footer-big -->

        <div class="mini-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright-text">
                            <p>&copy; 1998-2019
                                <a href="https://www.inescrm.fr">INES CRM</a>
                                | <?php _e('All rights reserved', 'inesmktplc'); ?>
                            </p>
                        </div>

                        <div class="go_top">
                            <span class="lnr lnr-chevron-up"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--================================
    END FOOTER AREA
    =================================-->

    <!--//////////////////// JS GOES HERE ////////////////-->
    <?php wp_footer() ?>

    </body>

    </html>