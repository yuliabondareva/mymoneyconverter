<?php

session_start();

class Logs
{
    public static function getLogs()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $count = $_POST["count-logs"];
            $_SESSION['countLogs'] = $count;
            $countLogs = $_SESSION['countLogs'];
        return $countLogs;        
        }
    }
}