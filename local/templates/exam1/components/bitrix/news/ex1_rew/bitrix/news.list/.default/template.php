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
$noImage = SITE_TEMPLATE_PATH . '/img/rew/no_photo.jpg';
?>
<hr>
	<?php if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
	<?php endif;?>
	<?php foreach($arResult["ITEMS"] as $arItem):?>
		<?php
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="review-block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="review-text">
			<div class="review-block-title">
				<span class="review-block-name">
					<?php if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
						<?php if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
						<?php else:?>
							<?=$arItem["NAME"]?>
						<?php endif;?>
					<?php endif;?>
				</span>
				<span class="review-block-description">
					<?php if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
						<?=$arItem["DISPLAY_ACTIVE_FROM"]?>г.,
					<?php endif?>
					<?php foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
						<?php if(is_array($arProperty["DISPLAY_VALUE"])):?>
							<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?><?php if ($pid == 'POSITION'): ?>,<?php endif ?>
						<?php else:?>
							<?=$arProperty["DISPLAY_VALUE"];?><?php if ($pid == 'POSITION'): ?>,<?php endif ?>
						<?php endif?>
					<?php endforeach;?>
				</span>
			</div>
		<?php if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<div class="review-text-cont"><?=$arItem["PREVIEW_TEXT"];?></div>
		<?php endif;?>
		</div>
		<?php if($arParams["DISPLAY_PICTURE"]!="N"):?>
		<div class="review-img-wrap">
			<?php if (is_array($arItem["PREVIEW_PICTURE"])): ?>
				<?php if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
						<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
							 width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
							 height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
							 alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
							 title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						/></a>
				<?php else:?>
					<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						 width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						 height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						 alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						 title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" />
				<?php endif;?>
			<?php else:?>
			<img src="<?=$noImage?>"/>
			<?php endif ?>
		</div>
		<?php endif?>
	</div>
	<?php endforeach;?>
	<?php if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
	<?php endif;?>
