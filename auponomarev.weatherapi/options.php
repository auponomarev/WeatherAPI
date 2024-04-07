<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}
/**
 * @var CMain $APPLICATION
 * @var string $REQUEST_METHOD
 * @var string $RestoreDefaults
 * @var string $Update
 * @var string $mid
 */

$module_id = "auponomarev.weatherapi";
IncludeModuleLangFile(__FILE__);
$SUP_RIGHT = $APPLICATION->GetGroupRight($module_id);
if ($REQUEST_METHOD == "GET" && $SUP_RIGHT >= "W" && $RestoreDefaults <> '' && check_bitrix_sessid()) {
    COption::RemoveOption($module_id);
}

if ($REQUEST_METHOD == "POST" && $SUP_RIGHT >= "W" && $Update <> '' && check_bitrix_sessid()) {
    COption::SetOptionString($module_id, "lat", $_POST['lat']);
    COption::SetOptionString($module_id, "lon", $_POST['lon']);
    COption::SetOptionString($module_id, "api_key", $_POST['api_key']);
    COption::SetOptionString($module_id, "lang", $_POST['lang']);
}

$lat = COption::GetOptionString($module_id, "lat");
$lon = COption::GetOptionString($module_id, "lon");
$api_key = COption::GetOptionString($module_id, "api_key");
$lang = COption::GetOptionString($module_id, "lang");

$aTabs = array(
    array("DIV" => "edit1", "TAB" => GetMessage("MAIN_TAB_SET"), "TITLE" => GetMessage("MAIN_TAB_TITLE_SET")),
    array("DIV" => "edit2", "TAB" => GetMessage("MAIN_TAB_RIGHTS"), "TITLE" => GetMessage("MAIN_TAB_TITLE_RIGHTS")),
);
$tabControl = new CAdminTabControl("tabControl", $aTabs);
$tabControl->Begin(); ?>
<form method="POST"
      action="<?= $APPLICATION->GetCurPage() ?>?mid=<?= htmlspecialcharsbx($mid) ?>&lang=<?= LANGUAGE_ID ?>">
    <?= bitrix_sessid_post() ?>
    <?php
    $tabControl->BeginNextTab(); ?>
    <tr>
        <td style="vertical-align:top; width:50%;"><?= GetMessage("auponomarev.weatherapi_lat") ?></td>
        <td style="vertical-align:top; width:50%;">
            <input type="text" size="40" value="<?= htmlspecialcharsbx($lat) ?>" name="lat">
        </td>
    </tr>
    <tr>
        <td style="vertical-align:top; width:50%;"><?= GetMessage("auponomarev.weatherapi_lon") ?></td>
        <td style="vertical-align:top; width:50%;">
            <input type="text" size="40" value="<?= htmlspecialcharsbx($lon) ?>" name="lon">
        </td>
    </tr>
    <tr>
        <td style="vertical-align:top; width:50%;"><?= GetMessage("auponomarev.weatherapi_api_key") ?></td>
        <td style="vertical-align:top; width:50%;">
            <input type="text" size="40" value="<?= htmlspecialcharsbx($api_key) ?>" name="api_key">
        </td>
    </tr>
    
    <?php
    $tabControl->BeginNextTab(); ?>
    <?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/admin/group_rights.php"); ?>
    <?php
    $tabControl->Buttons(); ?>
    <script language="JavaScript">
        function RestoreDefaults() {
            if (confirm('<?= AddSlashes(GetMessage("MAIN_HINT_RESTORE_DEFAULTS_WARNING"))?>'))
                window.location = "<?= $APPLICATION->GetCurPage(
                )?>?RestoreDefaults=Y&lang=<?= LANG?>&mid=<?= urlencode($mid)?>&<?= bitrix_sessid_get()?>";
        }
    </script>
    <?php if($SUP_RIGHT < "W"): ?>
    
    <?php else: ?>
    <input type="submit" name="Update"
           value="<?= GetMessage("auponomarev.weatherapi_SUP_SAVE") ?>">
    <input type="hidden" name="Update" value="Y">
    <input type="button" OnClick="RestoreDefaults();"
        value="<?= GetMessage("auponomarev.weatherapi_RESTORE_DEFAULTS") ?>"
    >
    <?php endif; ?>
    <?php
    $tabControl->End(); ?>
</form>