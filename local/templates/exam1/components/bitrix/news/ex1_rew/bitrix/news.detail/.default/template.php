<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<hr>
<div class="review-block">
	<div class="review-text">
		<?php if($arParams["DISPLAY_DETAIL_TEXT"]!="N" && ($arResult["FIELDS"]["DETAIL_TEXT"] ?? '')):?>
		<div class="review-text-cont">
				<?=$arResult["FIELDS"]["DETAIL_TEXT"];?>
		</div>
		<?php endif;?>
		<div class="review-autor">
			<?php if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
				<?=$arResult["NAME"]?>,
			<?php endif;?>
			<?php if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
				<?=$arResult["DISPLAY_ACTIVE_FROM"]?>г,
			<?php endif;?>
			<?php if($arResult["DISPLAY_PROPERTIES"]['POSITION']):?>
				<?=$arResult["DISPLAY_PROPERTIES"]['POSITION']['DISPLAY_VALUE']?>,
			<?php endif;?>
			<?php if($arResult["DISPLAY_PROPERTIES"]['COMPANY']):?>
				<?=$arResult["DISPLAY_PROPERTIES"]['COMPANY']['DISPLAY_VALUE']?>.
			<?php endif;?>
		</div>
	</div>
	<?php if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
	<div style="clear: both;" class="review-img-wrap">
		<img class="detail_picture"
			 src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			 width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
			 height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
			 alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			 title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
		/>
	</div>
	<?php endif?>
</div>
<?php if($arResult["DISPLAY_PROPERTIES"]['DOCUMENTS']):?>
	<div class="exam-review-doc">
		<p><?=GetMessage('DISPLAY_DOCUMENT')?>:</p>
		<div class="exam-review-item-doc">
			<?php if(is_array($arResult["DISPLAY_PROPERTIES"]['DOCUMENTS']["DISPLAY_VALUE"])):?>
				<?php foreach ($arResult['DISPLAY_PROPERTIES']['DOCUMENTS']['VALUE_ENUM'] as $document): ?>
				<?php echo '<pre>' . print_r($document) . '</pre>' ?>
					<img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH?>/img/icons/pdf_ico_40.png">
					<a href="<?=$document['SRC']?>"><?=$document['ORIGINAL_NAME']?></a>
				<?php endforeach ?>
			<?php else:?>
				<img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH?>/img/icons/pdf_ico_40.png">
				<a href="<?=$arResult["DISPLAY_PROPERTIES"]['DOCUMENTS']['SRC']?>">
					<?=$arResult["DISPLAY_PROPERTIES"]['DOCUMENTS']['ORIGINAL_NAME']?>
				</a>
			<?php endif?>
		</div>
	</div>
<?php endif?>
	<?php if($arResult["NAV_RESULT"]):?>
		<?php if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?php endif;?>
		<?php echo $arResult["NAV_TEXT"];?>
		<?php if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?php endif;?>
	<?php endif?>
<hr>
