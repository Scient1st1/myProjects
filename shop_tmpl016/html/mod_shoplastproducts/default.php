<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="shop_products   owl-carousel owl-theme owl-default">
    <?php
    $c = 1;
    $k = 0;
    foreach ($modarticles->list as $item) {
        $k ++;
        $productLink = JRoute::_(ShopHelperRoute::getProductRoute(C::_('product_id', $item), C::_('alias', $item, 'product'), C::_('cat_id', $item), C::_('cat_alias', $item)));
        ?>
        <div class="catalog_item">
            <div class="catalog_item_in ">
                <div class="catalog_item_ini ">
    <?php
    if ((bool) $params->get('show_image')) {
        ?>
                        <?php $mainImg = GoodWebSiteHelper::getImageInSize('article', C::_('main_image', $item)); ?>
                        <?php $hoverImg = GoodWebSiteHelper::getImageInSize('article', C::_('hover_image', $item)); ?>
                        <div class="classifier_item_img  <?php if ($hoverImg): ?>two_image<?php endif; ?>">
                            <a href="<?= $productLink ?>">
                                <img class="classifier_img" src="<?= $mainImg ?>" >
                        <?php if ($hoverImg): ?>
                                    <img class="classifier_imgh" src="<?= $hoverImg ?>" > 
        <?php endif; ?>
                            </a> 
                                <?php if (C::_('sale_price', $item)) {
                                    echo '<div class="saleicon">' . JText::_('Sale') . '</div>';
                                } ?>   
                        </div>
                            <?php
                        }
                        if ((bool) $params->get('show_title')) {
                            ?>
                        <div class="classifier_item_title"><a href="<?= $productLink ?>"><?= C::_('title', $item) ?></a></div>
                        <?php
                    }
                    if ((bool) $params->get('show_description')) {
                        ?>
                        <div class="classifier_item_desc"><?= C::_('short_description', $item) ?></div>
                        <?php
                    }
                    if ((bool) $params->get('show_price')) {
                        ?>
                        <div class="classifier_item_price"><?= C::_('sale_price', $item) ? ('<s>' . ShopHelper::RenderProductPrice(C::_('price', $item)) . '</s> ' . ShopHelper::RenderProductPrice(C::_('sale_price', $item))) : ShopHelper::RenderProductPrice(C::_('price', $item)) ?> <?= JText::_('Gel') ?></div>

                    <?php } ?>


                </div>
            </div>
        </div>


    <?php
}
?>
</div>