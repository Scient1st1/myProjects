<?php
defined('_JEXEC') or die('Restricted access');
echo '<div class="image_links"><div class="image_links_in  owl-carousel owl-theme owl-default">';
for ($i = 0; $i <= 64; $i++) {
    $link = $params->get('link' . $i, JText::_('#'));
    $image = trim($params->get('img' . $i, ''));
    $name = $params->get('name' . $i, '');
    $target = $params->get('target' . $i, '0');

    if ($target == 0) {
        $target = "_self";
    } else {
        $target = "_blanc";
    }

    $itemid = JRequest::getInt('Itemid');
    if (!empty($image)) {
        ?>
        <div class="image_link">
            <a target="<?php echo $target; ?>" class="" href="<?php echo $link; ?>" title="">
                <span class="image_img"><img src="<?php echo $image; ?>" alt="img"/></span>
                <span class="image_link_name"><?php echo $name; ?></span>
                <span class="image_read_more"><?php echo JText::_('READ MORE'); ?></span>
                <span class="image_new"><?php echo JText::_('NEW'); ?></span>
            </a>
        </div>
        <?php
    }
}
echo '</div></div>';
