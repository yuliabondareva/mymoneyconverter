<?php

class Settings
{
    public static function getAllCurrencies()
    {
        $db = Db::getConnection();

        $list = [];
        $result = $db->query("SELECT * FROM `currencies` ORDER BY `currency`");
        $i = 0;
        while ($row = $result->fetch()) {
            $list[$i]['currency'] = $row['currency'];
            $list[$i]['currency_name'] = $row['currency_name'];
            $list[$i]['id'] = $row['id'];
            $list[$i]['flag'] = $row['flag'];
            $i++;
        }
        return $list;
    }

    public static function showCuerrencies($id)
    {
        $db = Db::getConnection();

        if (isset($_POST['show'])) {
            $id = $_POST['id'];
            return $db->query("UPDATE `currencies` SET flag = '1' WHERE id='$id'");
        }
    }

    public static function hideCuerrencies($id)
    {
        $db = Db::getConnection();

        if (isset($_POST['hide'])) {
            $id = $_POST['id'];
            return $db->query("UPDATE `currencies` SET flag = '0' WHERE id='$id'"); 
        }
    }
}