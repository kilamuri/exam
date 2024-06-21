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

<div class="review-block">
	<div class="review-text">
		<div class="review-text-cont">
			Вы сможете организовать внутри компании коллективную работу над проектами в рабочих группах, вести учет и планирование времени и событий, обмениваться сообщениями и почтой через портал, проводить внутри компании видеоконференции и делать многое другое.
			Вы сможете организовать внутри компании коллективную работу над проектами в рабочих группах, вести учет и планирование времени и событий, обмениваться сообщениями и почтой через портал, проводить внутри компании видеоконференции и делать многое другое.
			Вы сможете организовать внутри компании коллективную работу над проектами в рабочих группах, вести учет и планирование времени и событий, обмениваться сообщениями и почтой через портал, проводить внутри компании видеоконференции и делать многое другое.
		</div>
		<div class="review-autor">
			Сергей Родионов, 12 мая 2020 г., Генеральный директор, CTC-Медиа.
		</div>
	</div>
	<div style="clear: both;" class="review-img-wrap"><img src="img/rew/photo_1.jpg" alt="img"></div>
</div>
<div class="exam-review-doc">
	<p>Документы:</p>
	<div class="exam-review-item-doc"><img class="rew-doc-ico" src="./img/icons/pdf_ico_40.png"><a href="">Файл 1</a></div>
	<div class="exam-review-item-doc"><img class="rew-doc-ico" src="./img/icons/pdf_ico_40.png"><a href="">Файл 2</a></div>
	<div class="exam-review-item-doc"><img class="rew-doc-ico" src="./img/icons/pdf_ico_40.png"><a href="">Файл 3</a></div>
</div>


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
			<?php foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
				<?php if(is_array($arProperty["DISPLAY_VALUE"])):?>
					<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?><?php if ($pid == 'POSITION'): ?>,<?php endif ?>
				<?php else:?>
					<?=$arProperty["DISPLAY_VALUE"];?><?php if ($pid == 'POSITION'): ?>,<?php endif ?>
				<?php endif?>
			<?php endforeach;?>
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
<div class="exam-review-doc">
	<p>Документы:</p>
	<div class="exam-review-item-doc"><img class="rew-doc-ico" src="./img/icons/pdf_ico_40.png"><a href="">Файл 1</a></div>
</div>
	<?php if($arResult["NAV_RESULT"]):?>
		<?php if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?php endif;?>
		<?php echo $arResult["NAV_TEXT"];?>
		<?php if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?php endif;?>
	<?php endif?>
<hr>
