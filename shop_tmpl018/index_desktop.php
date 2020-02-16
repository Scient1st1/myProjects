<?php
defined('_JEXEC') or die('Restricted access');

// Check View
$CurrentView = JRequest::getVar('view');

// Check Language
$sitelang = JFactory::getSiteLanguage();
$sitelang = $sitelang->getCurrentTag();

require_once(PATH_THEMES . DS . 'system' . DS . 'define.php');
?>
<!DOCTYPE HTML>
<html> 
    <head>
    <jdoc:include type="head" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#fff">
    <link rel="stylesheet" href="<?php echo ResponsiveHelper::getCssLink(); ?>" type="text/css" />
</head>
<?php
if ($this->countmodules('slider')) {
    ?>
    <body class="sliderbody ">
        <?php
    } else {
        ?>  
    <body class="nosliderbody">  
        <?php
    }
    ?>

    <!--start all-->
    <div id="all">


        <!--start center-->
        <!--start header-->
        <div class="header">       
            <div class="container_fluid">
                <div class="container_in">
                    <div class="header_contact col-md-4 col-sm-4 col-xs-12">
                        <?php
                        if ($this->countmodules('mod_contact')) {
                            ?>
                            <div class="contact_cont">                      
                                <jdoc:include type="modules" name="mod_contact" style="web"/>
                            </div>
                        <?php }
                        ?>   
                    </div>
                    <div class="logo_cont col-md-4 col-sm-4 col-xs-12">
                        <div id="logo" class="logo">
                            <?php echo ResponsiveHelper::getLogo(); ?>

                        </div> 
                    </div> 



                    <div class="col-md-4 col-sm-4 col-xs-12 search-cart-login">
                        <div class="search_cart_login_inner">
                            <?php
                            if ($this->countmodules('mod_login')) {
                                ?>
                                <div class="mod_login">
                                    <div class="user_icon"> </div>
                                    <div class="logni_btns">
                                        <jdoc:include type="modules" name="mod_login"/> 
                                    </div>
                                </div>
                            <?php }
                            ?>  
                            <?php
                            if ($this->countmodules('lang')) {
                                ?>
                                <div class="lang-cont"> 
                                    <div class="lang_icon_div">
                                        <jdoc:include type="modules" name="lang" style="" />

                                    </div>

                                </div>
                            <?php }
                            ?>   

                            <?php
                            if ($this->countmodules('card')) {
                                ?>
                                <div class="card-holder">
                                    <jdoc:include type="modules" name="card"/>  
                                </div>
                            <?php }
                            ?> 
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!--header-end-->
        <!-- SLIDER START  -->
        <?php
        if ($this->countmodules('slider')) {
            ?>
            <div class="slider">           
                <jdoc:include type="modules" name="slider" style="web" />           
            </div>
        <?php }
        ?>
        <div class="cls"></div>

        <!-- SLIDER END -->

        <!--message-->
        <div class="container">
            <jdoc:include type="message" />
            <noscript>
            <div class="js_error">
                To See This Web Page You  Need Java Script!!!
            </div>
            </noscript>
        </div>
        <!--message-end-->

        <!--component-->

        <div class="container">
            <jdoc:include type="modules" name="center_top" style="web"/> 
            <jdoc:include type="component" style="web"/>
            <jdoc:include type="modules" name="center_bot" style="web"/> 
        </div>

        <!--component end-->
        <div class="maincontent">
            <section class="container">
                <?php
                if ($this->countmodules('position1')) {
                    ?>
                    <div class="free_content_one">           
                        <jdoc:include type="modules" name="position1" style="web" />           
                    </div>
                <?php }
                ?>
                <div class="mod_specific_alternative">
                    <jdoc:include type="modules" name="specificproducts-2" style="web"/>
                </div>

            </section>

            <?php
            if ($this->countmodules('position3')) {
                ?>
                <div class="free_content_three">           
                    <jdoc:include type="modules" name="position3" style="web" />           
                </div>
            <?php }
            ?>

            <?php
            if ($this->countmodules('mod_photo')) {
                ?>
                <div class="container">
                    <div class="mod_photo_holder">           
                        <jdoc:include type="modules" name="mod_photo" style="web" /> 
                        <div class="cls"></div>
                    </div>
                </div>
            <?php }
            ?>

            <?php
            if ($this->countmodules('image')) {
                ?>
                <div class="container">
                    <div class="mod_icon_holder">           
                        <jdoc:include type="modules" name="image" style="web" /> 
                        <div class="cls"></div>
                    </div>
                </div>
            <?php }
            ?>




        </div>









        <!--start footer-->

        <div id="footer">
            <div class="footer_top"> 
                <div class="container">
                    <div class="footer_logo col-md-6 col-sm-6">
                        <?php echo ResponsiveHelper::getLogo(); ?>


                        <?php
                        if ($this->countmodules('mod_contact_footer')) {
                            ?>    
                            <div class="mod_contact_footer">
                                <jdoc:include type="modules" name="mod_contact_footer" style="web"/> 
                            </div>
                        <?php } ?>

                        <div class="footer_socs">
                            <?php
                            if ($this->countmodules('socials')) {
                                ?>  
                                <div class="social-holder">
                                    <div class="socials">
                                        <jdoc:include type="modules" name="socials" />
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="cls"></div>


                    </div>

                    <div class="col-md-3 col-sm-3">
                        <?php
                        if ($this->countmodules('simple_menu')) {
                            ?>             
                            <div class="mod_simplemenu">
                                <jdoc:include type="modules" name="simple_menu" style="web"/> 
                                <div class="cls"></div>
                            </div>
                            <?php
                        }
                        ?> 
                    </div>



                    <div class="col-md-3 col-sm-3">
                        <?php
                        if ($this->countmodules('position2')) {
                            ?>             
                            <div class="free_content_two">
                                <jdoc:include type="modules" name="position2" style="web"/> 

                            </div>
                            <?php
                        }
                        ?> 
                        <div class="cls"></div>

                    </div>
                    <div class="cls"></div>

                </div>   
                <div class="footer_bot">

                    <div class="footer_bot_container_in">
                        <div class="copyright">
                            <?php
                            require_once(PATH_THEMES . DS . 'system' . DS . 'copyright.php');
                            ?> 
                        </div>

                        <!--                        <div class="rates">
                        <?php
                        require_once(PATH_THEMES . DS . 'system' . DS . 'topge.php');
                        require_once(PATH_THEMES . DS . 'system' . DS . 'analitycs.php');
                        ?>
                                                </div>-->

                        <div class="developed">
                            <?php
                            require_once(PATH_THEMES . DS . 'system' . DS . 'developed.php');
                            ?> 
                        </div>
                    </div>
                    <div class="cls"></div>
                </div>



                <div class="arrow_up">

                </div>


            </div>
            <!--</div>-->
            <!--end all-->

            <script src="<?php echo ResponsiveHelper::getJSLink(); ?>" type="text/javascript"></script>

            <jdoc:include type="modules" name="debug" />
            <jdoc:include type="modules" name="background" />
            </body>
            </html>