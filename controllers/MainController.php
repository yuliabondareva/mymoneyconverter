<?php

include_once ROOT . '\models\Main.php';

class MainController
{
    public function actionIndex()
    {
        $list = Main::getAllActiveCurrencies();
        $result = Main::getCrossCurr();
        require_once ROOT . '\views\index.php';
        return true;
    }
}