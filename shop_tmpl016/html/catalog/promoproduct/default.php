<?PHP
/**
 * @version		$Id: default.php  2008-07-29
 * Teimuraz Kevlishvili
 */
// პირდაპირი წვდომის აკრძალვა
defined('_JEXEC') or die('Restricted access');
//require_once JPATH_SITE . DS . 'components' . DS . 'catalog' . DS . 'helpers' . DS . 'Paramhelper.php';
require_once JPATH_SITE . DS . 'components' . DS . 'catalog' . DS . 'helpers' . DS . 'Paramhelper.php';
$params = Param::getParams();
//var_dump($params);
$Itemid = wsHelper::getItemid('catalog', 'catalog');
$limit = $params->limit;
//var_dump($limit);
jimport('imagehelper.gwimage');
$wspic = new GWimage();
$pagination = $this->pagination;
$showimage = $params->show_image;
$wspic->setCacheDir('pictures');
$imageSize = 9;
$doc = JFactory::getDocument();
$title = $doc->title;
$display = (int) $params->catalog_type;
?>
<div class="page_body_products">
    <?php
    if ($this->params->get('show_page_title', 1)) {
        ?>
        <div class="page_title">
            <span>  <?php echo $title ?></span>
        </div>
        <?php
    }


    if (count($this->data) > 0) {
        ?>
        <div class="owl-carousel">
            <?php
            $k = 0;
            $numberofproducts = sizeof($this->data);
            foreach ($this->data as $row) {
                // var_dump($row);
                $ImagePath = $row->image;
                $image = GoodWebSiteHelper::getImageInSize('promoproduct', $ImagePath);
                $link = JRoute::_('index.php?option=catalog&view=item&Itemid=' . $Itemid . '&item=' . $row->id);
                $PayLink = JRoute::_('index.php?option=catalog&view=pay&Itemid=' . $Itemid . '&item=' . $row->id);
                if (JRequest::getInt('pc_range_end', 0)) {

                    $startprice = JRequest::getInt('pc_range_start', 0);
                    $endprice = JRequest::getInt('pc_range_end', 0);


                    if ($row->discount) {
                        $price = $row->discount;
                    } else {

                        $price = $row->price;
                    }
                    if ($price >= $startprice && $price <= $endprice) {
                        ?>
                        <div class="catalog_item">
                            <div class="catalog_item_in "><div class="catalog_item_ini ">

                                    <div class="ItemImage">
                                        <a href="<?php echo $link ?>">
                                            <?php if ((int) $showimage == 1) { ?>
                                                <img src="<?php echo $image; ?>" alt="" />

                                                <?php
                                            }
                                            ?>
                                        </a>
                                    </div>
                                    <?php ?>

                                    <div class="catalog_item_title">
                                        <a href="<?php echo $link ?>">
                                            <?php echo $row->name; ?>
                                        </a>
                                    </div>
                                    <div class="catalog_item_desc">
                                        <?php echo $row->short_description; ?>
                                    </div>


                                    <div class="catalog_item_bot">
                                        <?php
                                        $discount = (int) $row->discount;
                                        ?>

                                        <?php
                                        //if(!$showprice){
                                        if ($display !== 3):
                                            ?>
                                            <?php if ($discount == 0) { ?>                                                
                                                <div class="catalog_item_price">
                                                    <?php echo $row->price . ' ' . JText::_('GEL'); ?>
                                                </div>
                                            <?php } else { ?>
                                                <div class="catalog_item_priceold">
                                                    <?php echo $row->price . ' ' . JText::_('GEL'); ?>
                                                </div>
                                                <div class="catalog_item_price">
                                                    <?php echo $row->discount . ' ' . JText::_('GEL'); ?>
                                                </div>
                                            <?php } ?>
                                            <?php
                                        endif;
                                        // }
                                        ?>    
                                        <?php
                                        if (CatalogHelper::CheckOnSale($row->id)) {
                                            ?>						
                                            <div class = "prod_basket_temp_not_exists">
                                                <?php echo JText::_('PRODUCT TEMPORARY NOT EXISTS'); ?>
                                            </div>
                                            <?php
                                        } else if ($row->count) {
                                            if ($display == 1):
                                                ?>
                                                <div class="item_basket">
                                                    <a href="<?php echo $PayLink ?>"><span></span><span class=""><?php echo JText::_('BUY'); ?></span></a>
                                                </div>
                                                <?php
                                            endif;
                                        }
                                        else {
                                            ?>
                                            <div class = "prod_basket_not_exists">
                                                <?php echo JText::_('Product Not exists'); ?>
                                            </div>
                                            <?php
                                        }
                                        ?><div class="cls"></div></div>
                                    <div class="cls"></div>				
                                </div></div>
                            <div class="catalog_bot_line"></div>     
                            <div class="catalog_bot_line2"></div>     
                        </div>

                        <?php
                    }
                } else {


//                    $ImagePath = $row->image;
//                    $image = GoodWebSiteHelper::getImageInSize('catalog', $ImagePath);
//                    $link = JRoute::_('index.php?option=catalog&view=item&Itemid=' . $Itemid . '&item=' . $row->id);
//                    $PayLink = JRoute::_('index.php?option=catalog&view=pay&Itemid=' . $Itemid . '&item=' . $row->id);
                    ?>
                    <div class="catalog_item">
                        <div class="catalog_item_in "><div class="catalog_item_ini ">
                                <?php //if($showimage){      ?>
                                <div class="ItemImage">
                                    <a href="<?php echo $link ?>">
                                        <?php if ((int) $showimage == 1) { ?>
                                            <img src="<?php echo $image; ?>" alt="" />
                                        <?php } ?>
                                    </a>

                                    <?php
                                    if (CatalogHelper::CheckOnSale($row->id)) {
                                        ?>						
                                        <div class = "prod_basket_temp_not_exists">
                                            <?php echo JText::_('PRODUCT TEMPORARY NOT EXISTS'); ?>
                                        </div>
                                        <?php
                                    } else if ($row->count) {
                                        if ($display == 1):
                                            ?>
                                            <div class="item_basket">
                                                <a href="<?php echo $PayLink ?>"><span></span><span class=""><?php echo JText::_('BUY'); ?></span></a>
                                            </div>
                                            <?php
                                        endif;
                                    }
                                    else {
                                        ?>
                                        <div class = "prod_basket_not_exists">
                                            <?php echo JText::_('Product Not exists'); ?>
                                        </div>
                                        <?php
                                    }
                                    ?>


                                </div>
                                <?php // }       ?>
                                <?php //if($showtitle){     ?>
                                <div class="catalog_item_title">
                                    <a href="<?php echo $link ?>">
                                        <?php echo $row->name; ?>
                                    </a>
                                </div>
                                <div class="catalog_item_desc">
                                    <?php echo $row->short_description; ?>
                                </div>
                                <?php //}        ?>

                                <div class="catalog_item_bot">
                                    <?php
                                    $discount = (int) $row->discount;
                                    ?>

                                    <?php
                                    //if(!$showprice){
                                    if ($row->new) {
                                        ?> <div class="new"> <?php
                                        echo JText::_('New');
                                        ?> </div> <?php
                                    }
                                    if ($display !== 3):
                                        ?>
                                        <?php if ($discount == 0) { ?>                                                
                                            <div class="catalog_item_price">
                                                <?php echo $row->price . ' ' . JText::_('GEL'); ?>
                                            </div>
                                        <?php } else { ?>
                                            <div class="catalog_item_priceold">
                                                <?php echo $row->price . ' ' . JText::_('GEL'); ?>
                                            </div>
                                            <div class="catalog_item_price">
                                                <?php echo $row->discount . ' ' . JText::_('GEL'); ?>
                                            </div>
                                        <?php } ?>
                                        <?php
                                    endif;
                                    // }
                                    ?>    
                                    <div class="cls"></div>	</div>
                                <div class="cls"></div>				
                            </div></div>    
                    </div>
                    <?php
                    //	$k = 1 - $k;
                }
            }
            ?>

        </div>


        <?php
        //echo $this->pagination->getPagesCounter();
//		echo $this->pagination->getPagesLinks();
    } else {
        ?>
        <div class="product_notfound">	
            <?php echo JText::_('No items'); ?>
        </div>
        <?php
    }
    ?>
    <div id="pagination">
        <?php
        if ($numberofproducts >= $limit) {
            echo $pagination->getPagesLinks();
        }
        ?>
    </div>
</div>