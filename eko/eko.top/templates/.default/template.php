<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(count($arResult["ITEMS"]) > 0): ?>
	<?
	$notifyOption = COption::GetOptionString("sale", "subscribe_prod", "");
	$arNotify = unserialize($notifyOption);
	?>
	

<?if ($arParams["FLAG_PROPERTY_CODE"]):?>
<div id="content">
<div class="catalog_title catalog_title_<?=ToLower($arParams["FLAG_PROPERTY_CODE"])?>">
	<h2><span><?=GetMessage("CR_TITLE_".$arParams["FLAG_PROPERTY_CODE"])?></span></h2>
</div>
<?else:?>
	<?
	$arParams["FLAG_PROPERTY_CODE"] = rand();
	?>
<?endif?>
</div>



<div class="catalog_slider_wrapper" id="slider_wrapper_<?=ToLower($arParams["FLAG_PROPERTY_CODE"])?>">
<div id="content">
	<ul id="slider_cat_<?=ToLower($arParams["FLAG_PROPERTY_CODE"])?>">

<?foreach($arResult["ITEMS"] as $key => $arItem):
	if(is_array($arItem))
	{

		$bPicture = is_array($arItem["PREVIEW_IMG"]);
		?>
		<li class="catalog_item" itemscope itemtype = "http://schema.org/Product">
			<div class="catalog_item_content">
				<div class="catalog_item_top_block">
				
			
					<div class="catalog_item_top_panel">
					<h4><a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["NAME"]?>">
					<span itemprop = "name"><?=$arItem["NAME"]?></span></a></h4>

					</div>

					<?if ($bPicture):?>
						<a class="catalog_item_content_a" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
						<div class="item_img" style="background-image: url('<?=$arItem["PREVIEW_IMG"]["SRC"]?>');"></div>
						</a>
					<?endif?>





<?/*--------------- Дополнительные поля ------------------*/?>				
<div class="catalog_item_descr">
				
<? if($arItem['PROPERTIES']['MANUFACTURER']): ?>
<div class="item">
	<span class="name-item"><?=$arItem["PROPERTIES"]["MANUFACTURER"]["NAME"]?>: </span>
	<span class="prop-item"><?=$arItem["PROPERTIES"]["MANUFACTURER"]["VALUE"]?></span>
</div>	
<?
endif;

if($arItem['PROPERTIES']['MATERIAL']): ?>

<div class="item">
	<span class="name-item"><?=$arItem["PROPERTIES"]["MATERIAL"]["NAME"]?>: </span>
	<span class="prop-item"><?=$arItem["PROPERTIES"]["MATERIAL"]["VALUE"]?></span>
</div>
<?	
endif;
if($arItem['PROPERTIES']['PILE_HEIGHT']): ?>
<div class="item">
	<span class="name-item"><?=$arItem["PROPERTIES"]["PILE_HEIGHT"]["NAME"]?>: </span>
	<span class="prop-item"><?=$arItem["PROPERTIES"]["PILE_HEIGHT"]["VALUE"]?></span>
</div>
<?	
endif;
?>


					
				</div>
<?/*--------------- Конец Дополнительные поля ------------------*/?>


					
<div class="block-bottom">
<?/*--------------- Цена ------------------*/?>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class='prices' itemprop = "offers" itemscope itemtype = "http://schema.org/Offer">
					<?
					if(is_array($arItem["OFFERS"]) && !empty($arItem["OFFERS"]))   //if product has offers
					{
						if (count($arItem["OFFERS"]) > 1)
						{
						?>
							<span itemprop="price" class='price'>
						<?
							//echo GetMessage("CR_PRICE_OT");// add word "от"
							echo $arItem["PRINT_MIN_OFFER_PRICE"];
						?>
							</span>
						<?
						}
						else
						{
							$numPrices = count($arParams["PRICE_CODE"]);
							foreach($arItem["OFFERS"] as $arOffer):?>
								<?foreach($arOffer["PRICES"] as $code=>$arPrice):?>
									<?if($arPrice["CAN_ACCESS"]):?>
										<?if ($numPrices>1):?><span class="price_name_catalog"><?=$arResult["PRICES"][$code]["TITLE"];?></span><?endif?>
										<?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
											<span itemprop="price" class='price new_price'><?=$arPrice["PRINT_DISCOUNT_VALUE"]?></span><br/>
											<span class='old_price'><?=$arPrice["PRINT_VALUE"]?></span>
											<?else:?>
											<span itemprop="price" class='price'><?=$arPrice["PRINT_VALUE"]?></span>
										<?endif?>
									<?endif;?>
								<?endforeach;?>
							<?endforeach;
						}
					}
					else // if product doesn't have offers
					{
						$numPrices = count($arParams["PRICE_CODE"]);
						foreach($arItem["PRICES"] as $code=>$arPrice):
							if($arPrice["CAN_ACCESS"]):?>
								<?if ($numPrices>1):?><span class="price_name_catalog"><?=$arResult["PRICES"][$code]["TITLE"];?></span><?endif?>
								<?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
									<span itemprop="price" class='price new_price'><?=$arPrice["PRINT_DISCOUNT_VALUE"]?></span><br/>
									<span class='old_price'><?=$arPrice["PRINT_VALUE"]?></span>
								<?else:?>
									<span itemprop="price" class='price'><?=$arPrice["PRINT_VALUE"]?></span>
								<?endif;
							endif;
						endforeach;
					}
					?>
					</a>
<?/*--------------- Конец Цена ------------------*/?>	


				
				

				
				


	<div class="bttn-more">
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="<?=GetMessage("CATALOG_MORE")?>"><?=GetMessage("CATALOG_MORE")?></a>
	</div>
</div>	
</div>	




			</div>
		</li>
<?
	}
endforeach;
?>
	</ul>
	</div>
	<div class="clearfix"></div>
	
<div class="tlt-nav"><span><?=GetMessage("OFFERS")?></span></div>
<?/*--------------- Навигация ------------------*/?>
<div class="navigation-wrap">

	<a class="prev" id="slider_cat_<?=ToLower($arParams["FLAG_PROPERTY_CODE"])?>_prev" href="#">
	<div class="glyphicon glyphicon-chevron-left"></div>
	<span>prev</span></a>
		
	<a class="next" id="slider_cat_<?=ToLower($arParams["FLAG_PROPERTY_CODE"])?>_next" href="#">
	<div class="glyphicon glyphicon-chevron-right"></div>
	<span>next</span></a>
</div>
	
	<?/*<div class="pagination" id="slider_cat_<?=ToLower($arParams["FLAG_PROPERTY_CODE"])?>_pag"></div>*/?>
<?/*--------------- Конец Навигация ------------------*/?>

	
</div>


<?elseif($USER->IsAdmin()):?>
	<h3 class="hitsale"><?=GetMessage("CR_TITLE_".$arParams["FLAG_PROPERTY_CODE"])?></h3>
	<div class="listitem-carousel">
		<?=GetMessage("CR_TITLE_NULL")?>
	</div>
<?endif;?>

<script type="text/javascript">
	$(document).ready(function() {
		$("#slider_cat_<?=ToLower($arParams["FLAG_PROPERTY_CODE"])?>").carouFredSel({
			circular: true,
			infinite: false,
			auto: false,
			width: "100%",
			align: false,
			prev: {
				button: "#slider_cat_<?=ToLower($arParams["FLAG_PROPERTY_CODE"])?>_prev",
				key: "left"
			},
			next: {
				button: "#slider_cat_<?=ToLower($arParams["FLAG_PROPERTY_CODE"])?>_next",
				key: "right"
			},
			pagination: "#slider_cat_<?=ToLower($arParams["FLAG_PROPERTY_CODE"])?>_pag"
		});

		/* Catalog item hover - begin*/
		$('.catalog_item').mouseenter(function(){
			$('.catalog_item_compare', this).css({'visibility': 'visible'});
		});
		$('.catalog_item').mouseleave(function(){
			$('.catalog_item_compare', this).css({'visibility': 'hidden'});
		});
		/* Catalog item hover - end*/
	});
</script>
