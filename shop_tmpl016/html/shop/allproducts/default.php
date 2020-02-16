<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

//$cparams = JComponentHelper::getParams('com_media');
$params = $mainframe->getParams("shop");
$ordering = JRequest::getVar('ordering') ? JRequest::getVar('ordering') : $params->get('orderby_sec');
?>
<div id="classifier_page">
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
    // echo wsHelper::renderModule('mod_filter');
    // echo wsHelper::renderModule('classifier');
    ?>
      
    

    <div class="page_body">
        <div class="classifier_page_ordering">
            <form method="post">
                <select class="form-control" name="ordering" onchange="this.form.submit()">
                    <option value="rdate" <?= $ordering == 'rdate' ? 'selected' : '' ?> ><?= JText::_('Date Reduce') ?></option>
                    <option value="idate" <?= $ordering == 'idate' ? 'selected' : '' ?> ><?= JText::_('Date Increase') ?></option> 
                    <option value="price_desc" <?= $ordering == 'price_desc' ? 'selected' : '' ?>><?= JText::_('Price: High To Low') ?></option>
                    <option value="price_asc" <?= $ordering == 'price_asc' ? 'selected' : '' ?>><?= JText::_('Price: Low To High') ?></option>
                </select>
                <input type="hidden" name="task" value="order">
                <input type="hidden" name="class_id" value="<?= C::_('class_id', $this->classifierData) ?>">
                <input type="hidden" name="class_alias" value="<?= C::_('class_alias', $this->classifierData) ?>">
            </form>
            <div class="clr"></div>
        </div>   

        <?php if ($this->params->get('show_classifier_image') AND C::_('class_image', $this->classifierData)): ?>
            <div><img src="<?= C::_('class_image', $this->classifierData) ?>"></div>
        <?php endif ?>
        <?php if ($this->params->get('show_classifier_description') AND C::_('class_description', $this->classifierData)): ?>
            <div><?= C::_('class_description', $this->classifierData) ?></div>
        <?php endif ?>
        <div class="classifier_page_items row">
        
            <?php
$k = 0;
             foreach ($this->items->list as $item): ?>
                <?php $productLink = JRoute::_(ShopHelperRoute::getProductRoute(C::_('product_id', $item), C::_('alias', $item, 'product'), C::_('cat_id', $item), C::_('cat_alias', $item)));
            if ($k == 6) {
                            echo '<div class="cls"></div>';
                            $k = 0;
                        }
                        $k ++;
                 ?>
                <div class="classifier_page_item col-md-2">
                    <div class="classifier_page_items_in ">
                    <?php $mainImg = GoodWebSiteHelper::getImageInSize('article', C::_('main_image', $item)); ?>
                    <?php $hoverImg = GoodWebSiteHelper::getImageInSize('article', C::_('hover_image', $item)); ?>
                    <div class="classifier_item_img  <?php if ($hoverImg): ?>two_image<?php endif; ?>">
                        <a href="<?= $productLink ?>"><img class="classifier_img" src="<?= $mainImg ?>" >
                            <?php if ($hoverImg): ?><img class="classifier_imgh" src="<?= $hoverImg ?>" > <?php endif; ?>

                            <?php if (C::_('sale_price', $item)): ?>
                                <div class="saleicon"><?= JText::_('Sale') ?></div>
                            <?php endif ?>
                        </a>   
                    </div>

                    <div class="classifier_item_title"><a href="<?= $productLink ?>"><?= C::_('title', $item) ?></a></div>
                    <div class="classifier_item_price">
                    <?= C::_('sale_price', $item) ? ('<s>' . ShopHelper::RenderProductPrice(C::_('price', $item)) . '</s> ' . ShopHelper::RenderProductPrice(C::_('sale_price', $item))) : ShopHelper::RenderProductPrice(C::_('price', $item)) ?> <?= JText::_('Gel') ?></div>
                        <div class="classifier_item_desc"><?= C::_('short_description', $item) ?></div>
                </div>
 </div>
            <?php


             endforeach ?>
<div class="cls"></div>
           
       
        </div>
            <?= $this->pagination->getPagesLinks();?>


    </div>
</div>

<?php
