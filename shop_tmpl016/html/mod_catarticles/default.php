<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
//jimport('goodweb.session');

require_once JPATH_ROOT . DS . 'components' . DS . 'content' . DS . 'helpers' . DS . 'route.php';

$show_image = $params->get('show_image', 1);
$show_title = $params->get('show_title', 1);
$show_intro = $params->get('show_intro', 1);
$show_date = $params->get('show_date', 1);
$show_readmore = $params->get('show_readmore', 1);
?>

<div class="categories">
    <ul class='categorielist'>
        <li data-catid="0">
            ყველა სერვისი
        </li>

        <?php
        foreach ($categories as $item) {
            ?>

            <li class='categorie' data-catid="<?php echo $item->catid; ?>"> <?php echo $item->title ?></li>


            <?php
        }
        ?>

        <div class='cls'></div>
    </ul>
    <div class="cls"></div>
</div>

<div class="catarticles">

    <?php
    foreach ($data as $item) {
        ?>

        <?php
         $article_id = $item->alias ? $item->id.':'.$item->alias : $item->id;
        $cat_id = C::_('cat_slug', $item) ? $item->catid.':'.$item->cat_slug : $item->catid;
        $url = JRoute::_(ContentHelperRoute::getArticleRoute($article_id, $cat_id));

        $artParam = new JParameter($item->attribs);

        $image = $artParam->get('image', '');

        $image = GoodWebSiteHelper::getImageInSize('modarticle', $image);

//        $attribs = $item->attribs;
//        print_r($attribs); die;
//        if (preg_match('/^(\S*)\s/', $attribs, $m)) {
//            $image = str_replace("image=", "", $m[1]);
//            $articleImage = GoodWebSiteHelper::getImageInSize('modarticle', $image);
//        }
        ?>

        <div data-itemcatid="<?php echo $item->catid; ?>" class="catarticle_item col-md-3 col-sm-4">
            <div class="catarticle_item_in">



                <?php
                if ($show_image) {
                    ?>
                    <div class="catarticle_image">
                        <a href="<?php echo $url; ?>">
                            <img src="<?php echo $image; ?>" />
                        </a>
                    </div>
                    <?php
                }
                ?>

                <div class='catarticle_image_holder'>

                    <?php
                    if ($show_title) {
                        ?>
                        <div class="catarticle_title">
                            <a href="<?php echo $url; ?>"><?php echo $item->title; ?></a>
                        </div>
                        <?php
                    }
                    ?>

                    <?php
                    if ($show_intro && $item->introtext) {
                        ?>
                        <div class="catarticle_intro">
                            <?php echo strip_tags($item->introtext); ?>
                        </div>
                        <?php
                    }
                    ?>

                    <?php if ($show_date || $show_readmore) { ?>
                        <div class="catarticle_data_more">
                            <?php
                        }
                        ?>   

                        <?php if ($show_date) {
                            ?>
                            <div class="catarticle_date">
                                <span><?php echo JHTML::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC3')); ?></span>
                            </div>
                            <?php
                        }
                        ?>    

                        <?php
                        if ($show_readmore) {
                            ?>
                            <div class="catarticle_readmore">
                                <a href="<?php echo $url; ?>">
                                    <?php echo JText::_('Read more...') ?>
                                </a>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="cls"></div>

                        <?php if ($show_date || $show_readmore) { ?>
                        </div>
                        <?php
                    }
                    ?> 

                </div>                 

            </div>
        </div> 

        <?php
    }
    ?>
    <div class="cls"></div>
</div>