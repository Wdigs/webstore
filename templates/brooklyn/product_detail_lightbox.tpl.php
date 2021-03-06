<?php
/*
  LightSpeed Web Store
 
  NOTICE OF LICENSE
 
  This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to support@lightspeedretail.com <mailto:support@lightspeedretail.com>
 * so we can send you a copy immediately.
   
 * @copyright  Copyright (c) 2011 Xsilva Systems, Inc. http://www.lightspeedretail.com
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 
 */

/**
 * template Lightbox product view, used when viewing another user's
 * Gift Registry (Wish List)
 * 
 *
 */

?>

<div>
			<div class="product_details border rounded" style="display: block; float: left; margin-left: 12px;">
				
				<div class="left">
					<?php $this->pnlImgHolder->Render(); ?><br style="clear: both;" />
					
					<div class="small_imgs">
					<?php $this->pnlAdditionalProdImages->Render('CssClass=small_imgs'); ?>
					<?php if(_xls_get_conf('PRODUCT_ENLARGE_SHOW_LIGHTBOX' , 1)): ?>
					<br/><a href="#" <?php $this->pxyEnlarge->RenderAsEvents($this->prod->ImageId) ?>><?php _xt('Preview') ?></a>
					<?php endif; ?>
					</div>
				</div>	
				
				<div class="right">
						<p style="margin-top: 100px;"></p> 
				
				<div style="clear: both;"></div>
				<?php $this->giftRegistryPnl->Render('Display=false'); ?>
				
				
				 <h1><?php $this->lblTitle->Render(); ?></h1> 
				 <h2><?= $this->prod->Code ?></h2>

				<?php	if(_xls_get_conf('INVENTORY_DISPLAY')):	?>
					<h3><?php $this->lblStock->Render() ; ?></h3>
				<?php endif; ?>
			
				 <br />
				
				<?php if(!_xls_get_conf('DISABLE_CART' , false)): ?>
					<?php $this->txtQty->Render('CssClass=pdetails_qty'); ?>
				<?php endif; ?>
	
				<?php $this->lstSize->Render(); ?>
				<?php $this->lstColor->Render(); ?>


					
				
		<?php  if(($this->prod->SellWeb != 0) && ($this->prod->SellWeb < $this->prod->Sell)): ?>
				<!--  
				<div class="price_reg"><?php _xt("Regular Price"); ?> : <strike><?= _xls_currency($this->prod->Sell) ; ?></strike></div>
				-->
				<div class="price"><?php _xt("Price"); ?>: <?php $this->lblPrice->Render(); ?></div>
		<?php else: ?>
				<div class="price"><?php _xt("Price"); ?>: <?php $this->lblPrice->Render(); ?></div>
		<?php endif; ?>				
				
				<p><?php $this->lblDescription->Render() ; ?></p>


				<?php if(count($this->arrAutoAddProducts)>0): ?>
				<fieldset>
					<legend><?php _xt("Recommended Products"); ?></legend>
					
					<?php foreach($this->arrAutoAddProducts as $pqty): ?>
					<?php $prod = $pqty['prod']; $qty = $pqty['qty']; ?>
					<?php if(!_xls_get_conf('DISABLE_CART' , false)): ?>
					<div class="checkbox"><?php $this->AutoAddCheckBox($prod , $qty) ?></div>
					<?php endif; ?>
					<a href="<?= $prod->Link; ?>">
					<p><?= $prod->Name ?></p>
					<img src="<?= $prod->SmallImage ?>" alt="<?php $prod->Code ?>" class="" />
					</a>
					<br style="clear: both"/>
					<?php endforeach; ?>
				</fieldset>
				<?php endif; ?>
				</div>
				
			</div>		
		
			
			<?php if(count($this->arrRelatedProducts)>0): ?>
			<?php $this->sldRelated->Render(); ?>
			<?php endif; ?>
		
</div>
<?php $this->dxImage->Render(); ?>
