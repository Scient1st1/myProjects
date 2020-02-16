<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
$CurrentView = JRequest::getVar('view');
require_once(PATH_THEMES . DS . 'system' . DS . 'responsive.php');
global $mainframe;
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
    <head>
        <jdoc:include type="head" />
        <link rel="stylesheet" href="<?php echo ResponsiveHelper::getCssLink(); ?>" type="text/css" />
    </head>
    <body class="print_page">
        <div class="container">
            <!--START Header-->
            <div class="logo">
                <?php echo ResponsiveHelper::getLogo(); ?>
            </div>
            <!--END Header-->
            <jdoc:include type="message" />
            <jdoc:include type="component" />
            <jdoc:include type="modules" name="debug" />
        </div>
    </body>
</html>