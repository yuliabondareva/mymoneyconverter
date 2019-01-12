<?php

include_once ROOT . '\models\Settings.php';
include_once ROOT . '\models\Logs.php';

class SettingsController
{
    public function actionSettings()
    {
        $list = Settings::getAllCurrencies();
        $countLogs = Logs::getLogs();
        require_once ROOT . '\views\settings.php';
        return true;
    }

    public function actionLists()
    {
        $list = Settings::getAllCurrencies();
        $hide = Settings::hideCuerrencies($id);
        $show = Settings::showCuerrencies($id);
        require_once ROOT . '\views\settings.php';
        return true;
    }
}