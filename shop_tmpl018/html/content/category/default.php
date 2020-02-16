<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

$cparams = JComponentHelper::getParams('com_media');
$imageeffects = GoodWebSiteHelper::getSiteCfg('effects.contentgroup.imageeffects');

if ($imageeffects == 'No') {
    $imageeffects = '';
}
?>
<div class="category" id="category">
    <?php
    if ($this->params->get('show_page_title', 1)) {
        ?>
        <div class="page_title">
            <span>
                <h1>
                    <?php echo $this->escape($this->params->get('page_title')); ?>
                </h1>
            </span>
        </div>
        <?php
    }
    ?>
    <div class="category_page_wrapper">
        <div class="page_body">
            <?php
            $description = trim(Collection::getVar('description', Collection::getVar('category', $this)));
            if ($this->params->get('show_description', 0) && $description) {
                ?>
                <div class="category_description">
                    <?php echo $description; ?>
                </div>
                <?php
            }
            $show_category_title = $this->params->get('show_category_title', '');
            $k = 0;
            foreach ($this->items as $item) {
                if ($k == 3) {
                    echo '<div class="cls"></div>';
                    $k = 0;
                }
                $k ++;

                $item = $this->getItem($item, $this->params);
                ?>
                <div class="page_item col-md-4">

                    <div class="page_item_in">

                        <?php
                        $image = $item->params->get('image');
                        if (!empty($image)) {
                            $image = GoodWebSiteHelper::getImageInSize('category', $image);
                            ?>		
                            <div class="item_image">

                                <a href="<?php echo $item->readmore_link; ?>" title="<?php echo $item->title; ?>">
                                    <img class="<?php echo $imageeffects; ?>" src="<?php echo $image; ?>"  alt="<?php echo $item->title; ?>" title="<?php echo $item->title; ?>"  /></a>
                                <?php
                                if ($item->params->get('show_create_date')) {
                                    ?>

                                    <?php
                                }
                                ?>
                            </div>  
                            <div class="category_desc">

                                <?php
                            }
                            ?>
                            <div class="item_title">
                                <h3>
                                    <?php
                                    if (!empty($item->readmore_link)) {
                                        ?>		
                                        <a href="<?php echo $item->readmore_link; ?>" title="<?php echo $item->title; ?>">
                                            <?PHP
                                        }
                                        if ($item->params->get('show_title')) {
                                            if (!empty($item->title)) {
                                                echo $item->title;
                                            }
                                        }
                                        if (!empty($item->readmore_link) || !empty($item->title)) {
                                            ?>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </h3>
                            </div>
                            <?php
                            if ($show_category_title && $item->category) {
                                ?>
                                <div class="item_category">
                                    <?php echo JText::_('category') . ' - ' . $item->category; ?>
                                </div>                
                                <?php
                            }

                            echo $item->event->beforeDisplayContent;
                            if ($item->params->get('show_intro')) {
                                ?> 

                                <div class="item_intro">
                                    <?php echo $item->introtext; ?>
                                </div>
                                <?php
                            }
                            echo $item->event->afterDisplayContent;
                            ?>
                            <div class="cls"></div>
                            <div class="date_more">
                                <div class="item_date">
                                    <?php echo JHTML::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC3')); ?>
                                </div>
                                <?php
                                if ($item->params->get('readmore_link')) {
                                    ?>

                                    <span class="readmore">
                                        <a href="<?php echo $item->readmore_link; ?>" class="readmorein">
                                            <?php echo JText::_('more'); ?>
                                        </a>
                                    </span>

                                    <?php
                                }
                                ?>
                                <div class="cls"></div> 
                            </div>
                        </div>
                        <div class="cls"></div> 
                    </div>
                </div>
                <?php
            }
            ?>


            <div class="cls"></div> 
        </div>
        <?php
        if ($this->params->get('show_pagination')) {
            echo $this->pagination->getPagesLinks();
        }
        ?>
        <div class="cls"></div> 
    </div>
</div>