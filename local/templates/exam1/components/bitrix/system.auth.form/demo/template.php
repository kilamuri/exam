<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//dump($arParams);
//var_dump($arResult);
CJSCore::Init();
?>
<nav class="menu-block">
	<ul>
		<?php if ($arResult['SHOW_ERRORS'] === 'Y' && $arResult['ERROR'] && !empty($arResult['ERROR_MESSAGE'])) {
			ShowMessage($arResult['ERROR_MESSAGE']);
		} ?>
<?php if($arResult["FORM_TYPE"] == "login"): ?>
		<li class="att popup-wrap">
			<a id="hd_singin_but_open" href="" class="btn-toggle"><?=GetMessage("AUTH_LOGIN_LINK_TEXT")?></a>
			<form class="frm-login popup-block" name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
				<div class="frm-title"><?=GetMessage("AUTH_LOGIN_LINK_TEXT")?></div>
				<a href="" class="btn-close"><?=GetMessage("AUTH_LOGIN_LINK_CLOSE_TEXT")?></a>
				<?php if($arResult["BACKURL"] <> ''):?>
					<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
				<?php endif?>
				<?php foreach ($arResult["POST"] as $key => $value):?>
					<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
				<?php endforeach?>
					<input type="hidden" name="AUTH_FORM" value="Y" />
					<input type="hidden" name="TYPE" value="AUTH" />
				<div class="frm-row">
					<input type="text" placeholder="<?=GetMessage("AUTH_LOGIN")?>" name="USER_LOGIN" maxlength="50" value="" size="17" />
					<script>
						BX.ready(function() {
							var loginCookie = BX.getCookie("<?=CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"])?>");
							if (loginCookie)
							{
								var form = document.forms["system_auth_form<?=$arResult["RND"]?>"];
								var loginInput = form.elements["USER_LOGIN"];
								loginInput.value = loginCookie;
							}
						});
					</script>
				</div>
				<div class="frm-row">
					<input type="password" placeholder="<?=GetMessage("AUTH_PASSWORD")?>" name="USER_PASSWORD" maxlength="50" size="17" autocomplete="off" />			
				</div>
				<div class="frm-row">
					<a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" class="btn-forgot"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a>
				</div>
				<div class="frm-row">
					<div class="frm-chk">
						<input type="checkbox" id="login" name="USER_REMEMBER" value="Y"><label for="login"><?=GetMessage("AUTH_REMEMBER_ME_SHORT")?></label>
					</div>
				</div>
				<?php if ($arResult["CAPTCHA_CODE"]):?>
				<div class="frm-row">
					<?=GetMessage("AUTH_CAPTCHA_PROMT")?>:<br />
					<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
					<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /><br /><br />
					<input type="text" name="captcha_word" maxlength="50" value="" />
				</div>
				<?php endif ?>
				<div class="frm-row">
					<input type="submit" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>">
				</div>
				<?php if($arResult["AUTH_SERVICES"]):?>
					<div class="frm-row">
						<div class="bx-auth-lbl"><?=GetMessage("socserv_as_user_form")?></div>
						<?php $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "icons",
							array(
								"AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
								"SUFFIX"=>"form",
							),
							$component,
							array("HIDE_ICONS"=>"Y")
						); ?>
					</div>
				<?php endif?>
			</form></li>
		<li><a href="<?=$arResult["AUTH_REGISTER_URL"]?>"><?=GetMessage("AUTH_REGISTER")?></a></li>
	<?php if($arResult["AUTH_SERVICES"]):?>
		<?php $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
			array(
				"AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
				"AUTH_URL"=>$arResult["AUTH_URL"],
				"POST"=>$arResult["POST"],
				"POPUP"=>"Y",
				"SUFFIX"=>"form",
			),
			$component,
			array("HIDE_ICONS"=>"Y")
		); ?>
	<?php endif?>
<?php elseif ($arResult['FORM_TYPE'] == 'logout'): ?>
<form action="<?=$arResult["AUTH_URL"]?>">
	<li>
		<a href="<?=$arResult['PROFILE_URL']?>"><?=$arResult['USER_NAME']?> [<?=$arResult['USER_LOGIN']?>]</a>
	</li>
	<?php foreach ($arResult["GET"] as $key => $value):?>
		<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
	<?php endforeach?>
	<?=bitrix_sessid_post()?>
	<input type="hidden" name="logout" value="yes" />
	<li><input type="submit" name="logout_butt" value="<?=GetMessage("AUTH_LOGOUT_BUTTON")?>" /></li>
</form>
<?php endif ?>
		</ul>
	</nav>