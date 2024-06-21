<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$previousLevel = 0;?>
<?php if ($arResult):?>
<nav class="nav">
<div class="inner-wrap">
	<div class="menu-block popup-wrap">
		<a href="" class="btn-menu btn-toggle"></a>
		<div class="menu popup-block">
			<ul class="">
	<?php foreach($arResult as $arItem):?>
	<?php if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?php endif?>
	<?php if ($arItem["IS_PARENT"]):?>
		<?php if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="<?=$arItem["LINK"]?>" class=""><?=$arItem["TEXT"]?></a>
					<ul>
		<?php else:?>
				<li class=""><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
					<ul>
		<?php endif?>
	<?php else:?>
		<?php if ($arItem["PERMISSION"] > "D"):?>
			<?php if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="<?php if($arItem['LINK'] == '/'): ?>main-page<?php endif?>"><a href="<?=$arItem["LINK"]?>" class=""><?=$arItem["TEXT"]?></a></li>
			<?php else:?>
				<li class=""><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?php endif?>
<!--		--><?php //else:?>
<!--			--><?php //if ($arItem["DEPTH_LEVEL"] == 1):?>
<!--				<li><a href="" class="--><?php //if ($arItem["SELECTED"]):?><!--root-item-selected--><?php //else:?><!--root-item--><?php //endif?><!--" title="--><?php //=GetMessage("MENU_ITEM_ACCESS_DENIED")?><!--">--><?php //=$arItem["TEXT"]?><!--</a></li>-->
<!--			--><?php //else:?>
<!--				<li><a href="" class="denied" title="--><?php //=GetMessage("MENU_ITEM_ACCESS_DENIED")?><!--">--><?php //=$arItem["TEXT"]?><!--</a></li>-->
<!--			--><?php //endif?>
		<?php endif?>
	<?php endif?>
	<?php $previousLevel = $arItem["DEPTH_LEVEL"];?>
<?php endforeach?>
	<?php if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
	<?php endif?>
				</ul>
				<a href="" class="btn-close"></a>
		</div>
					<div class="menu-overlay"></div>
	</div>
</div>
</nav>
<?php endif?>
