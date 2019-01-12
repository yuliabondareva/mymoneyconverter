<?php

include_once ROOT . '\models\Logs.php';

class LogsController
{
    public function actionList()
    {
        $countLogs = Logs::getLogs();
        require_once ROOT . '\views\logss.php';
        return true;
    }
}