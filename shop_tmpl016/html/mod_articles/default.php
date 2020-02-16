<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

require_once JPATH_ROOT . DS . 'components' . DS . 'content' . DS . 'helpers' . DS . 'route.php';
?>
<div class="module_articles">
    <div class="modarticle-items">
<?php $c = 1;
foreach ($modarticles as $article) {
    $artParam = new JParameter($article->attribs);
    //$link = JRoute::_(ContentHelperRoute::getArticleRoute($article->id, $article->catid, 0));
   /* if($article->sectionid){
        $link = JRoute::_(ContentHelperRoute::getPhotogalleryRoute($article->id, $article->catid, 0));
    }else{
        $link = JRoute::_(ContentHelperRoute::getArticleRoute($article->id, $article->catid, 0));
    }*/
 
	 $article_id = C::_('alias', $article) ? $article->id.':'.C::_('alias', $article) : $article->id;
    $cat_id = C::_('catalias', $article) ? $article->catid.':'.C::_('catalias', $article) : $article->catid;
    $link =  JRoute::_(ContentHelperRoute::getArticleRoute($article_id, $cat_id));
    echo '<div class="modarticle_item col-md-3"><div class="modarticle_item_in"><div class="modarticle_item_ini">';
    if ((bool) $params->get('show_image')) {
        $image = $artParam->get('image', '');
        if (!empty($image)) {
            $image = GoodWebSiteHelper::getImageInSize('modarticle', $image);
            ?>
            <a href="<?php echo $link; ?>"> 
                <img src="<?php echo $image; ?>" alt="<?php echo $article->title; ?>" />
            </a>
            <?php
            }
        }
        if ((bool) $params->get('show_title')) {
            ?>
            <div class="articleMod_title<?php echo $params->get('moduleclass_sfx'); ?>">
                <a href="<?php echo $link; ?>">
                    <?php echo $article->title; ?>
                </a>
            </div>
            <?php
            if ($params->get('show_intro')) {
                if (!empty($article->introtext)) {
                    ?>
                    <div class="mod-introtext">
                <?php echo $article->introtext; ?>
                    </div>
                    <?php
                }
            }
            ?>
               
            <?php
        }
        $date = $article->publish_up;
        if(($date && $params->get('show_date')) or ($params->get('show_btn')) ){
            ?>
            <div class="mod_date_more">
           <?php 
        }
        
        if ($date && $params->get('show_date')) {
            ?>
            <span class="article_date"><?php echo $date; ?></span>
            <?php
        }
        $btn = $params->get('more_btn');
        if ($btn && $params->get('show_btn')) {
            ?>
            <div class="modarticle_readmore"> <a href="<?php echo $link; ?>">
            <?php echo $btn; ?>
                </a>
            </div>
             <div class="cls"></div>
                
            <?php
        }
        if(($date && $params->get('show_date')) or ($params->get('show_btn')) ){
            ?>
            </div>
           <?php 
        } 
         echo '</div></div></div>'; 
        if($c%4 == 0 && $c < count($modarticles)){
            echo '<div class="cls"></div></div><div class="modarticle-items">';
        }
        $c++;
    }
    ?>
    <div class="cls"></div>
    <?php
    $btnall = $params->get('more_btn_all');
    $btnalllink = $params->get('more_btn_link');
        if ($btnall && $params->get('show_btn_all')) {
            ?>
            <div class="modarticle_all_readmore"> <a href="<?php echo $btnalllink; ?>">
            <?php echo $btnall; ?>
                </a>
            </div>
             <div class="cls"></div>
                
            <?php
        }
    ?>
    </div>
</div>