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
    <jdoc:include type="modules" name="headerhtml"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="rgb(27, 190, 180)">
    <link rel="stylesheet" href="<?php echo ResponsiveHelper::getCssLink(); ?>" type="text/css" />
</head>
<?php
if ($this->countmodules('slider')) {
    ?>
    <body class="sliderbody <?= $CurrentView ?>_View">
        <?php
    } else {
        ?>  
    <body class="nosliderbody <?= $CurrentView ?>_View">  
        <?php
    }
    ?>
    <header id="header">
        <div class="header_top container-fluid">
            <div class="row position2_wrapper">
                <div class="position2 container">
                    <button></button> 
                    <jdoc:include type="modules" name="position2" style="web" />
                </div>
            </div>
            <div class="container"> 
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 contanct">
                        <jdoc:include type="modules" name="mod_contact" style="web" />
                        <div class="position1 visible-xs">
                        </div>
                    </div> 
                    <div class="col-md-6 col-sm-6 socials hidden-xs">
                        <jdoc:include type="modules" name="socials" style="web" />
                    </div>
                </div>
            </div>
        </div>
        <div class="header_mid container">
            <div class="col-md-4 position1 hidden-xs">
                <jdoc:include type="modules" name="position1" style="web" />
            </div>
            <div class="col-md-4 col-xs-12 logo_holder">
                <div id="logo" class="logo">
                    <?php echo ResponsiveHelper::getLogo(); ?>
                </div> 
            </div>
            <div class="col-md-4 lang_and_login">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6 lang hidden-xs">
                        <div id="lang">
                            <jdoc:include type="modules" name="lang" />
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-6 col-xs-9 mod_login">
                        <div class="login">
                            <div class="logni_btns">
                                <jdoc:include type="modules" name="mod_login"/> 
                            </div>
                        </div>
                    </div>
                    <div class="menu_wrapper_mobile col-xs-3">
                        <button class="menu_button"></button>
                        <button class="menu_button_close"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_bot container-fluid">
            <div class="container"> 
                <div class="row">
                    <div id="supermenu" role="navigation" class="navbar col-md-9">
                        <div class="mainmenu">
                            <jdoc:include type="modules" name="menu" />
                        </div>
                    </div>
                    <div class="col-md-3 filter_and_card">
                        <div class="row">
                            <div class="col-md-7 col-sm-6 col-xs-12 filet_wrapper">
                                <button class="filter_button"><?php echo JText::_("FILTER"); ?></button>
                                <div class="filter_before"></div>
                                <div class="filter">
                                    <button class="filter_button"></button>
                                    <jdoc:include type="modules" name="mod_filter" style="web"/>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-6 card_wrapper  hidden-xs">
                                <?php
                                if ($this->countmodules('card')) {
                                    ?>
                                    <div class="mod_card">
                                        <jdoc:include type="modules" name="card" style="web" /> 
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php
    if ($this->countmodules('slider')) {
        ?>
        <section id="section1" class="slider_wrapper container-fluid">
            <div class="row">
                <div class="slider">           
                    <jdoc:include type="modules" name="slider" style="web" />           
                </div>
            </div>
        </section>
    <?php }
    ?>
    <section class="container visible-xs">
        <div class="row">
                <div class="col-xs-8 lang second_lang">
                    <div>
                        <jdoc:include type="modules" name="lang" />
                    </div>
                </div>
            <?php
            if ($this->countmodules('card')) {
                ?>
                <div class="col-xs-4 card_wrapper">
                    <div class="mod_card">
                        <jdoc:include type="modules" name="card" style="web" /> 
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <section id="section2">
        <div class="container">
            <?php
            if ($this->countmodules('mod_lastproducts')) {
                ?>
                <div class="mod_lastproducts">           
                    <jdoc:include type="modules" name="mod_lastproducts" style="web" />
                </div>
            <?php }
            ?>
            <jdoc:include type="message" />
            <noscript>
            <div class="js_error">
                To See This Web Page You  Need Java Script!!!
            </div>
            </noscript>
            <jdoc:include type="modules" name="center_top" style="web"/> 
            <jdoc:include type="component" style="web"/>
            <jdoc:include type="modules" name="center_bot" style="web"/>
        </div>
    </section>
    <?php
    if ($this->countmodules('position3')) {
        ?>
        <section id="section3">
            <div class="container position3">           
                <jdoc:include type="modules" name="position3" style="web" />
            </div>
        </section>
    <?php }
    ?>
    <section id="section4" class="container">
        <div class="row">
            <div class="col-md-3 col-xs-6 specificproducts">
                <?php
                if ($this->countmodules('specificproducts')) {
                    ?>
                    <jdoc:include type="modules" name="specificproducts" style="web" />
                <?php }
                ?>
            </div>
            <div class="col-md-3 col-xs-6 mod_popularproduct">
                <?php
                if ($this->countmodules('mod_popularproduct')) {
                    ?>
                    <jdoc:include type="modules" name="mod_popularproduct" style="web" />
                <?php }
                ?>
            </div>
            <div class="col-md-3 col-xs-6 specificproducts-2">
                <?php
                if ($this->countmodules('specificproducts-2')) {
                    ?>
                    <jdoc:include type="modules" name="specificproducts-2" style="web" />
                <?php }
                ?>
            </div>
            <div class="col-md-3 col-xs-6 position4_wrapper">
                <?php
                if ($this->countmodules('position4')) {
                    ?>
                    <div class="position4">           
                        <jdoc:include type="modules" name="position4" style="web" />
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </section>
    <?php
    if ($this->countmodules('mod_articles')) {
        ?> 
        <section id="section5" class="container">
            <jdoc:include type="modules" name="mod_articles" style="web"/>
        </section>
    <?php }
    ?>
    <?php
    if ($this->countmodules('position5')) {
        ?> 
        <section id="section6">
            <div class="container position5">           
                <jdoc:include type="modules" name="position5" style="web" />
            </div>
        </section>
    <?php }
    ?>
    <footer>
        <div class="footer_top container">
            <div class="col-md-3 position6">
                <jdoc:include type="modules" name="position6" style="web" />
            </div>
            <div class="col-md-6 footer_menus">
                <jdoc:include type="modules" name="footer_menu" style="web" />
            </div>
            <div class="col-md-3 socials">
                <jdoc:include type="modules" name="socials" style="web" />
                <jdoc:include type="modules" name="mod_forms" style="web" />
            </div>
        </div>
        <div class="footer_bot">
            <div class="container">
                <?php
                require_once(PATH_THEMES . DS . 'system' . DS . 'topge.php');
                require_once(PATH_THEMES . DS . 'system' . DS . 'analitycs.php');
                ?>
                <div class="copyright_and_developed">
                    <p> <span><?php require(PATH_THEMES . DS . 'system' . DS . 'copyright.php'); ?></span><span><?php require(PATH_THEMES . DS . 'system' . DS . 'developed.php'); ?></span> </p>
                    <div class="up">
                        <a href="#header"></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="<?php echo ResponsiveHelper::getJSLink(); ?>"></script>
<jdoc:include type="modules" name="debug" />
<jdoc:include type="modules" name="background" />
</body>
</html>