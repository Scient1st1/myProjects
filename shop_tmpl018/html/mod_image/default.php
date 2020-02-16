<?php
defined('_JEXEC') or die('Restricted access');
echo '<div class="image_links"><div class="image_links_in">';
for ($i = 0; $i <= 64; $i++) {
    $link = $params->get('link' . $i, JText::_('#'));
    $image = trim($params->get('img' . $i, ''));
    $name = $params->get('name' . $i, '');
    $intro = $params->get('intro' . $i, '');
    $target = $params->get('target' . $i, '0');

    if ($target == 0) {
        $target = "_self";
    } else {
        $target = "_blanc";
    }

    $itemid = JRequest::getInt('Itemid');
    if (!empty($image)) {
        ?>
        <div class="image_link col-md-3 col-sm-6 col-xs-12">
            <a target="<?php echo $target; ?>" class="" href="<?php echo $link; ?>" title="">
                <span class="image_img"><img src="<?php echo $image; ?>" alt="img"/></span>
                <div class="img_desc_in">
                    <span class="image_link_name"><?php echo $name; ?></span>
                    <?php
                    if (!empty($intro)) {
                        ?>
                        <span class="image_link_intro"><?php echo $intro; ?></span>
                        <?php
                    }
                    ?>
                </div>

            </a>
        </div>
        <?php
    }
}
echo '</div></div>';
