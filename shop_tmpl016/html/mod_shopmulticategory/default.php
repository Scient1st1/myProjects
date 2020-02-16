<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$db = JFactory::getDBO();
?>
<div class="shop_products shopmulticategory">
	<div class="row">

		<ul class="nav nav-tabs" role="tablist">
			<?php
		$c = 1;
		foreach ( $modarticles->list as $item2 )
		{  ?>
			<li role="presentation" <?php if($c==1){echo 'class="active"';} ?> ><a href="#clasiffier_mod_id_<?= C::_( 'id', $item2 ) ?>" aria-controls="clasiffier_mod_id_<?= C::_( 'id', $item2 ) ?>" role="tab" data-toggle="tab"><?= C::_( 'title', $item2, '' ) ?></a></li>
		<?php $c++;
		} ?>						
			
		</ul>
<div class="tab-content">
		<?php
	$c=1;
	   $k = 0;
		foreach ( $modarticles->list as $item2 )
		{

			$db->setQuery( 'SELECT sp.*, spl.*, sp.id AS product_id, sc.id AS cat_id, sc.alias AS cat_alias FROM #__shop_product as sp'
							. ' LEFT JOIN #__shop_product_lang as spl on (sp.id = spl.parent_id and ' . Xmultilang::getLangWhere( 'spl' ) . ') LEFT JOIN #__shop_classifier AS sc on sp.classifier_id = sc.id '
							. ' where sp.status=1 and sc.id=' . C::_( 'id', $item2 )
							. ' ' . GoodWebSiteHelper::getWhere( false, false, 'sp', false )
							. ' order by sp.id desc limit 0,' . $modarticles->limit );
			$prodList = $db->loadAssocList();
			?>
			<div role="tabpanel" class="tab-pane <?php if($c==1){echo 'active';} ?>" id="clasiffier_mod_id_<?= C::_( 'id', $item2 ) ?>">
				<?php
				foreach ( $prodList as $item )
				{
					$k ++;

					$productLink = JRoute::_( ShopHelperRoute::getProductRoute( C::_( 'product_id', $item ), C::_( 'alias', $item, 'product' ), C::_( 'cat_id', $item ), C::_( 'cat_alias', $item ) ) );
					?>
					<div class="catalog_item col-md-3 col-sm-3 col-xs-6">
						<div class="catalog_item_in ">
							<?php
							if ( (bool) $params->get( 'show_image' ) )
							{
								?>
								<?php $mainImg = GoodWebSiteHelper::getImageInSize( 'article', C::_( 'main_image', $item ) ); ?>
								<?php $hoverImg = GoodWebSiteHelper::getImageInSize( 'article', C::_( 'hover_image', $item ) ); ?>
								<div class="classifier_item_img  <?php if ( $hoverImg ): ?>two_image<?php endif; ?>">
									<a href="<?= $productLink ?>"><img class="classifier_img" src="<?= $mainImg ?>" >
										<?php if ( $hoverImg ): ?><img class="classifier_imgh" src="<?= $hoverImg ?>" > <?php endif; ?>
									</a>   
								</div>
								<?php
							}
							if ( (bool) $params->get( 'show_title' ) )
							{
								?>
								<div class="classifier_item_title"><a href="<?= $productLink ?>"><?= C::_( 'title', $item ) ?></a></div>
								<?php
							}
							if ( (bool) $params->get( 'show_description' ) )
							{
								?>
								<div class="classifier_item_desc"><?= C::_( 'short_description', $item ) ?></div>
								<?php
							}
							if ( (bool) $params->get( 'show_price' ) )
							{
								?>
								<div class="classifier_item_price"><?= C::_( 'sale_price', $item ) ? ('<s>' . C::_( 'price', $item ) . '</s> ' . C::_( 'sale_price', $item )) : C::_( 'price', $item ) ?> <?= JText::_( 'Gel' ) ?></div>

							<?php } ?>


						</div>
					</div>


				<?php 
if ($k == 4) {
                        echo '<div class="cls"></div>';
                        $k = 0;
                    }
			}
				?>
				<div class="clr"></div>
			</div>
		<?php $c++; }
		?>
		<div class="clr"></div>
	</div>
</div>
</div>