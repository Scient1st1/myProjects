<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
if (!empty($this->items)) {
    //echo GoodWebSiteHelper::getUserID();
    ?>
    <div class="container no_padding">
        <div class="frontpage">
            <?php
            if ($this->params->get('show_page_title', 1)) {
                ?>
                <div class="page_title">
                    <h1>
                        <?php echo $this->escape($this->params->get('page_title')); ?>
                    </h1>
                </div>
                <?php
            }
            ?>
            <div  class="page_body">
                <div class="front">
                    <?php
                    $k = 0;

                    foreach ($this->items as $item) {

                        if ($k == 3) {
                            echo '<div class="cls"></div>';
                            $k = 0;
                        }
                        $k ++;
                        $item = $this->getItem($item, $this->params);
                        $item->title = htmlspecialchars($item->title, ENT_QUOTES);
                        ?>

                        <div class="col-sm-4 col-md-4">
                            <div class="page_item about">
                                <?php
                                $image = $item->params->get('image');
                                if (!empty($image)) {
                                    $image = GoodWebSiteHelper::getImageInSize('front', $image);
                                    ?>
                                    <div class="item_image_holder">
                                        <div class="item_image">
                                            <a href="<?php echo $item->readmore_link; ?>"><img src="<?php echo $image; ?>"  alt="<?php echo $item->title; ?>" title="<?php echo $item->title; ?>" /></a>
                                        </div>
                                    </div>

                                    <?php
                                }
                                ?>

                                <?php
                                if ($item->params->get('show_create_date')) {
                                    ?>
                                    <div class="item_date">
                                        <?php echo JHTML::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC3')); ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class = "item_title">
                                    <h3>
                                        <?php
                                        if (!empty($item->readmore_link) && $item->params->get('show_title')) {
                                            ?>		
                                            <a href="<?php echo $item->readmore_link; ?>" title="<?php echo $item->title; ?>">
                                                <?PHP
                                            }
                                            if (!empty($item->title) && $item->params->get('show_title')) {
                                                echo $item->title;
                                            }
                                            if ((!empty($item->readmore_link) || (!empty($item->title)) && $item->params->get('show_title'))) {
                                                ?>
                                            </a>
                                            <?PHP
                                        }
                                        ?>
                                    </h3>
                                </div>
                                <?php
                                if (($item->params->get('show_section') && $item->sectionid) || ($item->params->get('show_category') && $item->catid)) {
                                    ?>
                                    <?php
                                    if ($item->params->get('show_category') && $item->catid) {
                                        ?>
                                        <div class="item_category">
                                            <?php
                                            if ($item->params->get('link_category')) {
                                                echo '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($item->catslug, $item->sectionid)) . '">';
                                            }
                                            echo JText::_("Category") . " - " . $this->escape($item->category);
                                            if ($item->params->get('link_category')) {
                                                echo '</a>';
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                if (!empty($item->introtext) && $item->params->get('show_intro')) {
                                    ?>
                                    <div class="item_intro">
                                        <?php echo $item->introtext; ?>
                                    </div>
                                <?php }
                                ?>

                                <div class="date_more">
                                    <?php
                                    if (!empty($item->readmore_link) && $item->params->get('readmore_link')) {
                                        ?>
                                        <div class="readmore">
                                            <a href="<?php echo $item->readmore_link; ?>" class="readmorein">
                                                <?php echo JText::_('more'); ?>

                                            </a>
                                            <div class="cls"></div>
                                        </div>
                                        <?php
                                    }
                                    $h++;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if ($this->params->get('show_pagination')) {
                        echo $this->pagination->getPagesLinks();
                    }
                    ?>
                    <div class="clr"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

