<?php
// no direct access

defined('_JEXEC') or die('Restricted access');
$document = JFactory::getDocument();
$Itemid = WSHelper::getItemid('attributes', 'attributes');

$this->article->title = htmlspecialchars($this->article->title, ENT_QUOTES);
?>
<?php
if ($this->mparams->get('show_category_title_article_page')) {
    ?>
    <div class="page_title">
        <span>
            <h1>
                <?php
                echo '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->article->catslug, $this->article->sectionid)) . '">';
                echo $this->article->category;
                echo '</a>';
                ?>
            </h1>
        </span>
    </div>

    <?php
} else {
    ?>
    <div class="page_title">
        <span>
            <h1>
                <?php
                echo $this->escape($this->params->get('page_title'));
                ?>
            </h1>
        </span>
    </div>
    <?php
}
?>
<div class="page_body">
    <?php
    if (!$this->params->get('show_page_title', 1) && $this->params->get('page_title') != $this->article->title) {
        ?>
        <?php
    }
    echo $this->article->event->beforeDisplayContent;
    ?>
    <div class="article-content">
        <?php
        $image = $this->params->get('image');
        if (!empty($image) && $this->params->get('show_article_image', 1)) {
            $fullsize = (object) array('fullsize' => GoodWebSiteHelper::getSiteCfg('photogallery.individual'));

            $fullimg = GoodWebSiteHelper::getImageInSize('fullsize', $image, $fullsize);
            $image = GoodWebSiteHelper::getImageInSize('articlemain', $image);
            $showImage = $this->params->get('show_article_page_image');

            if ((int) $showImage == 1 || $showImage == '') {
                ?>

                <div class="page_image"> 

                    <a href="<?php echo $fullimg; ?>" title="<?php echo htmlspecialchars($this->article->title); ?>" rel="lightbox">
                        <img src="<?php echo $image; ?>" alt="<?php echo htmlspecialchars($this->article->title); ?>" />
                    </a>
                </div>
                <?php
            }
        }
        ?>
        <div class="article_desc">
            <div class="article_title">
                <span>
                    <h3>
                        <?php echo $this->article->title; ?>
                    </h3>
                </span>
            </div>

            <?php
            if ($this->attributes) {
                ?>			
                <div class="article_attributes">
                    <?php
                    $attrs = $this->attributes;

                    $title;
                    $last;
                    foreach ($attrs as $attr) {
                        $title = $title != $attr->title ? $attr->title : $title;
                        echo $title != $last ? $title . " :" : '';
                        $last = $title;
                        if ((int) $attr->article_link == 1) {
                            //  $href = JRoute::_( 'index.php?option=attributes&ids='. $attr->id);
                            $href = JRoute::_('index.php?option=attributes&view=attributes&Itemid=' . $Itemid . '&ids=' . $attr->id);
                            $link = "<a href='" . $href . "'>" . $attr->name . "</a>";
                        } else {
                            $link = $attr->name;
                        }
                        echo " " . $link . ";";
                    }
                    ?>
                </div>
                <?php
            }
            ?>				
            <?php
            if (($this->params->get('show_category') && $this->article->catid)) {
                ?>
                <div class="item_category">
                    <?php if ($this->params->get('link_category') and empty($this->print)) : ?>
                        <?php echo '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->article->catslug, $this->article->sectionid)) . '">'; ?>
                    <?php endif; ?>
                    <?php echo Jtext::_("category") . " - " . $this->article->category; ?>
                    <?php if ($this->params->get('link_category') and empty($this->print)) : ?>
                        <?php echo '</a>'; ?>
                    <?php endif; ?>
                </div>
                <?php
            }
            ?>

            <div class="article_text">
                <?php
                echo $this->article->text;
                ?>
            </div>

            <?php
            if ($this->params->get('show_create_date')) {
                ?>
                <div class="item_date">
                    <?php echo JHTML::_('date', $this->article->publish_up, JText::_('DATE_FORMAT_LC3')) ?>                    
                </div>
                <?php
            }
            ?>

        </div>

        <div class="cls"></div>
        <?php
        if ($this->article->has_photo) {
            $images = $this->article->images;
            $potoSizes = photoGalleryHelper::getphotoCfg();


            $imgsize = null;
            $fullsize = null;
            if (!empty($potoSizes)) {
                $codename = 'list';
                $imgsize = (object) array('list' => $potoSizes->listing);

                $sl_codename = 'fullsize';
                $fullsize = (object) array('fullsize' => $potoSizes->individual);
            } else {
                $codename = 'article';
                $sl_codename = 'article';
            }
            ?>

            <?php
            $photoGallStyle = $this->params->get('photogall_style') ? $this->params->get('photogall_style') : $potoSizes->chose->photogall_style;

            if ($photoGallStyle == 1) {
                ?>
                <div class="photogallery">
                    <?php
                    foreach ($images as $key => $img) {
                        $fullimg = GoodWebSiteHelper::getImageInSize($sl_codename, $img->path, $fullsize);
                        $listimg = GoodWebSiteHelper::getImageInSize($codename, $img->path, $imgsize);
                        ?>
                        <div class="photo_image">
                            <div class="photo_image_in">
                                <a href="<?php echo $fullimg; ?>?<?php echo $img->id; ?>" data-id="<?php echo $img->id; ?>" title="<?php echo $img->title; ?>" rel="artbox[pp_gal]">
                                    <img class="sl_img_small"  src="<?php echo $listimg; ?>" alt="<?php echo $img->title; ?>" />
                                </a>
                                <?php
                                if (!empty($img->title)) {
                                    ?>
                                    <div class="img_title">
                                        <?php echo htmlspecialchars($img->title); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div> 
                    <?php } ?>
                    <div class="cls"></div>
                </div>
                <?php
            } else {
                ?>
                <div id="photogallery_slides">

                    <div class="photogallery_slides">
                        <?php
                        $sls1 = 0;
                        foreach ($images as $key => $img) {
                            $sls1++;
                            ?>
                            <div style="display:none;" class="galery_slide<?php echo $sls1 ?> slids">
                                <img class="sl_img_slider_small" width = "" src="<?php echo $img->path ?>" alt="<?php echo $img->title; ?>" />
                                <?php
                                if (!empty($img->title)) {
                                    ?>
                                    <div class="img_slider_title">
                                        <?php echo htmlspecialchars($img->title); ?>
                                    </div>
                                <?php } ?>
                            </div> 

                            <?php
                        }
                        ?>
                    </div>
                    <div class="photogallery_slide_arrows">
                        <div class="next_gal_slide"><span class="icon-right-open"></span></div>
                        <div class="prev_gal_slide"><span class="icon-left-open"></span></div>
                        <div class="cls"></div>

                    </div>
                </div>
                <div class="photogallery_slider">
                    <?php
                    $sls = 0;
                    foreach ($images as $key => $img) {
                        $sls++;
                        //$fullimg = $img->path;GoodWebSiteHelper::getImageInSize($sl_codename, $img->path, $fullsize);


                        $listimg = GoodWebSiteHelper::getImageInSize($codename, $img->path, $imgsize);
                        ?>
                        <div class="photo_image_slider " >
                            <div class="photo_image_slider_in" id="galery_slide<?php echo $sls ?>">
            <!--                                <a href="<?php echo $fullimg; ?>?<?php echo $img->id; ?>" data-id="<?php echo $img->id; ?>" title="<?php echo $img->title; ?>" rel="artbox[pp_gal]">-->
                                <img class="sl_img_slider_small"  src="<?php echo $listimg; ?>" alt="<?php echo $img->title; ?>" />
                                <!--                                </a>-->
                                <?php
                                if (!empty($img->title)) {
                                    ?>
                                    <div class="img_slider_title">
                                        <?php echo htmlspecialchars($img->title); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div> 
                    <?php } ?>
                </div>
                <?php
            }
            ?>

            <div class="cls"></div>
        <?php } ?>
    </div>

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

</div> 
<?php
echo $this->article->event->afterDisplayContent;
$doc = JFactory::getDocument();
$uri = JURI::getInstance();
$url = $uri->toString();
if (strpos($url, '?')) {
    $url .= '&';
} else {
    $url .= '?';
}
$js = ' var layout = \'<div class="pp_social"><div id="pic_socials"><span><span style="cursor:pointer" onclick=" openwind($(this)); " data-layout="button_count" class="facebookshare fb-share-button" title="FaceBook" ><img src="' . JURI::root() . '/templates/system/images/facebook_share.png" alt="FaceBook" /></span></span></div></div>\';'
        . ' var gal = $("a[rel^=\'artbox\']").prettyPhoto({pp_socials:true,'
        . '                                     changepicturecallback: onPictureChanged, '
        . '                                         social_tools : layout '
        . '                                     }); '
        . ' function openwind(a){'
        . '  window.open( a.attr("data-href"),"Facebook", \'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=700,height=480,directories=no,location=no\' );'
        . ' }'
        . ' function onPictureChanged(){ console.log($(this));'
        . ' var original = $("#fullResImage").attr("src"); '
        . ' var temp = original.split("?");'
        . ' var curent_url = "' . $url . 'image="+temp[1]; '
        . ' var cur = "http://www.facebook.com/sharer.php?u="+curent_url+"&title="+$(".pp_description").html(); '
        . ' $(".facebookshare").attr("data-href",cur );'
        . '};';
$doc->addScriptDeclaration($js);
?>
