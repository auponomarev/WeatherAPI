<?php

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class Auponomarev_WeatherApi extends CModule
{
    public $MODULE_ID = "auponomarev.weatherapi";

    public $MODULE_NAME;
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $MODULE_DESCRIPTION;
    public $PARTNER_NAME;
    public $PARTNER_URI;
    public $MODULE_PATH;

    public $MODULE_GROUP_RIGHTS = "Y";

    public function __construct()
    {
        $arModuleVersion = [];
        include(__DIR__ . "/version.php");
        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];

        $this->MODULE_NAME = Loc::getMessage("auponomarev.weatherapi_MODULE_NAME");
        $this->MODULE_DESCRIPTION = Loc::getMessage("auponomarev.weatherapi_MODULE_DESCRIPTION");
        $this->PARTNER_NAME = Loc::getMessage("auponomarev.weatherapi_MODULE_PARTNER_NAME");
        $this->PARTNER_URI = Loc::getMessage("auponomarev.weatherapi_MODULE_PARTNER_URL");
    }
    
    public function DoInstall()
    {
        CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/local/modules/auponomarev.weatherapi/install/components", $_SERVER["DOCUMENT_ROOT"]."/local/components/custom", true, true);
        $this->registerModule();
        $this->registerEvents();
    }
    public function registerModule(): void
    {
        RegisterModule($this->MODULE_ID);
    }    
    public function registerEvents(): void
    {
    }
    public function DoUninstall()
    {
        $this->unregisterEvents();
        $this->unRegisterModule();
        DeleteDirFilesEx("/local/components/custom/auponomarev.weatherapi");
    }
    public function unRegisterModule()
    {
        UnRegisterModule($this->MODULE_ID);
    }
    public function unregisterEvents(): void
    {
    }
}