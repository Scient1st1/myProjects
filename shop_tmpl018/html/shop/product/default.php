<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
$item = $this->item;
$attributes = $this->attributes;
$lang = JRequest::getVar('lang', 'ka');
?>

<div id="shop_product_page">
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

    <div class="page_body">
        <div class="shop_product_back"><a href="<?= $this->backLink ?>"><span class="glyphicon glyphicon-menu-left"></span><?= JText::_('Go Back') ?></a></div>
        <div class="shop_product_item">
            <div class="shop_product_big_img">
                <img id="shopgalimg" alt="<?= C::_('title', $item) ?>" src="<?= $this->mainImg ?>" >
                <?php if ($this->gallery) {
                    ?>
                    <div class="heightfix"></div>
                    <div class="shop_product_lil_imgs_out"> <!-- photogallery -->
                        <div id="tuchstart_gal" class="shop_product_lil_imgs">
                            <?php foreach ($this->gallery as $img): ?>
                                <?php $src = GoodWebSiteHelper::getImageInSize('article', $img); ?>
                                <div class="shop_product_lil_img">
                                    <img alt="<?= C::_('title', $item) ?>" src="<?= $src ?>">
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="shop_prevcat"><span class="glyphicon glyphicon-chevron-left"></span></div>
                        <div class="shop_nextcat"><span class="glyphicon glyphicon-chevron-right"></span></div>
                    </div>

                <?php }
                ?>

                <?= C::_('sale_price', $item) ? '<div class="saleicon">' . JText::_('Sale') . '</div>' : '' ?>
            </div>

            <h2 class="shop_item_title"><?= C::_('title', $item) ?></h2>
            <?php
            if (C::_('sku', $item)) {
                ?>
                <div class="shop_item_sku"><?= Xtext::_('Sku') . ': ' . C::_('sku', $item) ?></div>
                <?php
            }
            ?>


            <div class="shop_item_prices">
                <?php if (C::_('sale_price', $item)): ?>
                    <div class="shop_item_saleprice"><s><?= ShopHelper::RenderProductPrice(C::_('price', $item)) ?></s></div>
                    <div class="shop_item_price"><?= ShopHelper::RenderProductPrice(C::_('sale_price', $item)) ?></div>
                <?php else: ?>
                    <div class="shop_item_price"><?= ShopHelper::RenderProductPrice(C::_('price', $item)) ?></div>
                <?php endif ?>
                <?= JText::_('Gel') ?>
            </div>
            <div class="shop_item_desc"><?= C::_('full_description', $item) ?></div>

            <form id="addtiformid" method="POST" action="?option=shop&view=product&lang=<?= $lang ?>">
                <div class="shop_item_attrs"> <!-- attributes -->
                    <?php echo AttributesHelper::RenderItemAttributes($attributes) ?>

                </div>
                <div class="shop_item_amount">
                    <span><?= XText::_('Amount') ?>:</span> <input type="number" class="form-control" name="amount" value="1" min="1">
                </div>
                <div class="shop_item_btns">
                    <input type="hidden" name="product_id" id="product_id" value="<?= C::_('id', $item) ?>">
                    <div class="shop_item_addtocard">
                        <input type="hidden" name="task" value="ajaxAddToCard" />
                        <button id="submidss" type="submit" class="btn"><?= JText::_('Add To Cart') ?></button></div>
                    <div class="shop_wish_list">
                        <button class="glyphicon glyphicon-heart-empty" type="submit" name="task" value="addtowishlist">

                        </button>
                    </div>
                </div>
            </form>
            <div id="shopgal" class="">
                <span class="shopcalclose">&times;</span>
                <img class="shop_gal_big" id="img01">
            </div>
        </div>




    </div>

<!--added socs and print-->

    <div class="arcitle_bottom">
        <?php
        if ($this->params->get('show_print_icon') || $this->params->get('show_email_icon')) :
            ?>
            <div class="article_socials">
                <?php
                if (!$this->print) {
                    if ($this->article->readmore_link) {
                        $uri = JURI::getInstance();
                        $url = JRoute::_($uri->toString(), true);
                    } else {
                        $url = '';
                    }
                    if ($this->article->title) {
                        $title = htmlspecialchars($this->article->title, ENT_QUOTES);
                    } else {
                        $title = '';
                    }
                }
                ?>
                <span class="soc_print">
                    <?php
                    if ($this->print) {
                        echo JHTML::_('icon.print_screen', $this->article, $this->params, $this->access);
                    } elseif ($this->params->get('show_print_icon')) {
                        echo $this->shares . JHTML::_('icon.print_popup', $this->article, $this->params, $this->access);
                    }
                    ?>
                </span>
                <div class="cls"></div>
            </div>
        <?php endif; ?>
        <div class="cls"></div>
    </div>


<!--added socs and print-->
</div>

<?php
$cartID = WSHelper::getItemid('shop', 'card');
$backID = WSHelper::getItemid('shop', 'classifier');
?>
<div id="cartitemlist" class="cartitemlist hidden" aria-labelledby="dLabel">		<div class="container">
        <div class="inserted">
        </div>
        <div class="cart-btns">
            <a class="view-cart" href="<?= JRoute::_('index.php?option=shop&view=card&lang=' . $lang . '&Itemid=' . $cartID) ?>">
                <span class="glyphicon glyphicon-shopping-cart"></span> <?= JText::_('Cart'); ?>				</a>
            <a class="close-cart" onclick="closeCart()">
                <span class="glyphicon glyphicon-remove-circle"></span> <?= JText::_('Close'); ?>				</a>
            <div class="back_to_shop">
                <a class="view-cart" href="<?= $this->backLink ?>">
                    <span class="glyphicon glyphicon-menu-left"></span>
                    <?= XText::_('Back To Shop'); ?>					</a>
            </div>
        </div>
    </div>
</div>
<div class="clr"></div>
<?php
$doc = JFactory::getDocument();
$doc->addScript(JURI::base() . DS . 'components' . DS . 'shop' . DS . '_assets' . DS . 'js' . DS . 'product.js');
$doc->addScript(JURI::base() . 'components' . DS . 'shop' . DS . '_assets' . DS . 'js' . DS . 'form.js');
$doc->addScript(JURI::base() . 'components' . DS . 'shop' . DS . '_assets' . DS . 'js' . DS . 'card.js');
ob_start();
if (false):
    ?> <script> <?php endif ?>

                $('#addtiformid').submit(function () {
                    $(this).ajaxSubmit({
                        beforeSubmit: function (formData, jqForm, options) {
                            $('#submidss').button('loading');
                        },
                        success: function (data) {
                            //alert(data);
                            $('#submidss').button('reset');
                            if (data == 'Added') {
                                loadcartpopup();
                                Card.increaseItemTotal();
                            } else {
                                alert(data);
                            }
                        }
                    });
                    return false;
                });

                function loadcartpopup() {
                    $.get('?option=shop&view=product&task=loadcartpopup', function (data) {
                        $('.inserted').html(data);
                        $('#cartitemlist').removeClass('hidden');
                    });
                }


                function closeCart() {
                    $('#cartitemlist').addClass('hidden');
                }
                $(document).ready(function () {
                    var modal = document.getElementById('shopgal');
                    var img = document.getElementById('shopgalimg');
                    var modalImg = document.getElementById("img01");
                    img.onclick = function () {
                        modal.style.display = "block";
                        modalImg.src = this.src;
                    }
                    var span = document.getElementsByClassName("shopcalclose")[0];
                    span.onclick = function () {
                        modal.style.display = "none";
                    }
                    if ($('.shop_product_lil_img').length > 0) {
                        $('.shop_product_lil_img').click(function () {
                            $('.actcat').removeClass('actcat');
                            $(this).addClass('actcat');
                            var src = $('img', this).attr('src');
                            $('.shop_product_big_img > img').attr('src', src);
                        });
                        var shop_nextcat = function () {
                            $('.shop_product_lil_img:first-child').appendTo($('.shop_product_lil_imgs'));
                        };
                        var shop_prevcat = function () {
                            $('.shop_product_lil_img:last-child').prependTo($('.shop_product_lil_imgs'));
                        };
                        $('.shop_prevcat').click(function () {
                            shop_prevcat();
                        });
                        $('.shop_nextcat').click(function () {
                            shop_nextcat();
                        });
                        var ts = '';
                        var te = '';
                        var el = document.getElementById('tuchstart_gal');
                        el.addEventListener('touchstart', function (ev) {
                            ts = ev.touches[0].clientX;

                        }
                        );
                        el.addEventListener('touchend', function (ev) {
                            te = ev.changedTouches[0].clientX;

                            if (te + 20 < ts) {
                                shop_nextcat();
                            }
                            if (te - 20 > ts) {
                                shop_prevcat();
                            }
                        }
                        );
                    }

                    var product_id = $('#product_id').val();
                    $('.attributes').on('change', function () {
                        var attributeValues = [];
                        $('.attributes').each(function () {
                            attributeValues.push($(this).val());
                        });
                        Product.CountItemPriceByAttributes(product_id, attributeValues, '<?= JURI::base() . '?option=shop&task=getCombinationJs' ?>');

                    });


                });
    <?php
    $js = ob_get_clean();
    $doc->addScriptDeclaration($js);
    