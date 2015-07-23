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
<div id="analog-wrapper">
<?/*--------------- Навигация ------------------*/?>
<div class="nav-wrap">
	<a class="prev" id="slider_cat_<?=ToLower($arParams["FLAG_PROPERTY_CODE"])?>_prev" href="#">
	<img src="data:image/png;base64,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" alt="" title="prev" />
	</a>
		
	<a class="next" id="slider_cat_<?=ToLower($arParams["FLAG_PROPERTY_CODE"])?>_next" href="#">
	<img src="data:image/png;base64,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" alt="" title="next" />
	</a>
</div>

<?/*--------------- Конец Навигация ------------------*/?>	
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
