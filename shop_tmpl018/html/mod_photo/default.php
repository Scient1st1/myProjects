<?php
defined('_JEXEC') or die('Restricted access');

require_once PATH_ROOT . DS . 'components' . DS . 'content' . DS . 'helpers' . DS . 'route.php';

$document = JFactory::GetDocument();

if ($params->get('image_pop')) {



    $js = "$(document).ready(function(){    

    $( '.galswipebox' ).swipebox({

    afterClose: function() {}

    });

});";

    $document->addScriptDeclaration($js);

    $imageclass = "galswipebox";
} else {

    $imageclass = "";
}
?>



<div class="module-block">



    <div class="module-body">

        <?php
        $codename = new stdClass();

        $codename->listing = GoodWebSiteHelper::getSiteCfg('photogallery.listing');

        $i = 0;

        $ids = $params->get('gid');

        $cat_ids = (array) $params->get('cid');

        $k = 0;
       
        foreach ($gallery as $one) {





            $link = ContentHelperRoute::getArticleRoute($ids[$k], $cat_ids[$k]);

            $k++;



            foreach ($one->fulltext as $image) {

                if ($i == $params->get('count', 5)) {

                    break;
                }
                ?>

                <?php
                if (strpos($link, '?')) {

                    $link .= '&';
                } else {

                    $link .= '?';
                }

                $link .= 'image=' . $image->id;



                if ($params->get('image_pop')) {

                    $linki = (object) array('fullsize' => GoodWebSiteHelper::getSiteCfg('photogallery.individual'));



                    $linki = GoodWebSiteHelper::getImageInSize('fullsize', $image->path, $linki);
                } else {

                    $linki = JRoute::_($link);
                }
                ?>

                <div class="photo_image_out">

                    <div class="photo_image_out_in">

                        <div class="photo_image_hover">

                            <?php if ($params->get('show_title') && !empty($image->title)) {
                                ?>    

                                <div class="mod_photo_title"><a class="<?php echo $imageclass; ?>" href="<?php echo $linki; ?> ">

                                        <?php echo $image->title; ?></a>

                                </div>

                            <?php } ?>

                            <?php
                            $img = GoodWebSiteHelper::getImageInSize('image', $image->path, $codename);
                            ?>

                            <div class="mod_photo_image">

                                <div class="mod_photo_image_in">

                                    <a class="<?php echo $imageclass; ?>" href="<?php echo $linki; ?> ">

                                        <img class="" src="<?php echo $img; ?>" alt="<?php echo $image->title; ?>" />

                                    </a>

                                </div>

                            </div>



                            <?php if ($params->get('show_date')) {
                                ?>

                                <div class="mod_photo_date">

                                    <?php
                                    $date = JFactory::getDate($one->publish_up);

                                    echo $date->toFormat('%d-%m-%Y %H:%M:%S');
                                    ?>

                                </div>

                            <?php } ?>

                        </div>

                    </div>

                </div>
                <?php
                if ($i > 6) {
                    echo '<div class="cls"></div>';
                }
                ?> 


                <?php
                $i++;
            }
        }
        ?>



        <div class="cls"></div>

    </div>

    <?php
    if ($params->get('show_readmore')) {
        ?>

        <div class="readmore_gal">

            <a href="<?= $params->get('readmore_url') ?>"><?= $params->get('readmore_text') ?></a>

        </div>

        <?php
    }
    ?>

</div>

