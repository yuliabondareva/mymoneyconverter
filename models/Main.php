<?php

class Main
{
    public static function getAllActiveCurrencies()
    {
        $db = Db::getConnection();

        $list = [];
        $result = $db->query("SELECT `currency` FROM `currencies` WHERE `flag` = 1
            ORDER BY `currency`");
        $i = 0;
        while ($row = $result->fetch()) {
            $list[$i]['currency'] = $row['currency'];
            $i++;
        }
        return $list;
    }

    public static function getCrossCurr()
    {
        $db = Db::getConnection();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ammount = $_POST["ammount"];
            $sourceid = $_POST["sourceid"];
            $currencies = $_POST["currencies"];

            $chIn = curl_init('http://apilayer.net/api/live?access_key=50ee15ca20b4da3b2a31bb2c0f47c884&currencies='.$currencies.'&source=USD&format=1');
            $chOut = curl_init('http://apilayer.net/api/live?access_key=50ee15ca20b4da3b2a31bb2c0f47c884&currencies='.$sourceid.'&source=USD&format=1');

            curl_setopt($chIn, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($chOut, CURLOPT_RETURNTRANSFER, true);

            $jsonIn = curl_exec($chIn);
            $jsonOut = curl_exec($chOut);
            curl_close($chIn);
            curl_close($chOut);
            $exchangeRatesIn = json_decode($jsonIn, true);
            $exchangeRatesOut = json_decode($jsonOut, true);
            $myCurIn = 'USD'.$currencies;
            $myCurOut = 'USD'.$sourceid;
            $exchangeIn = $exchangeRatesIn['quotes'][$myCurIn];
            $exchangeOut = $exchangeRatesOut['quotes'][$myCurOut];
            $myCurFun = $exchangeIn/$exchangeOut*$ammount;
            $crossCur = round($myCurFun, 2);
            $result = $ammount.' '.$sourceid.' = '.$crossCur.' '.$currencies;

            return $result;
        }
    }
    
}