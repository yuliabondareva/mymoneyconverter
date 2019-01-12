<?php 

require_once ROOT . '/vendor/autoload.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Converter</title>
    <link rel="stylesheet" type="text/css" href="..\templates\css\style.css">
    <link rel="stylesheet" type="text/css" href="..\vendor\twbs\bootstrap\dist\css\bootstrap.min.css">
    <script type="text/javascript" src="..\templates\js\jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="..\templates\js\script.js"></script>  
</head>
<body>
    <div class="nav">
        <a href="http://localhost/mymoneyconverter/main/">Main page</a>
        <a href="http://localhost/mymoneyconverter/settings/">Settings</a>
    </div>
    
    <h3>Logs</h3>
        <?php 
            $countLogs = $_SESSION['countLogs'];
            $lines = file(ROOT.'\logs\info\log.log');
            $lines = array_slice($lines, -$countLogs);
                foreach ($lines as $line) {
                    if (preg_match('/\\btime":"*(.*).*\\b","res":"*(.*)".*/i', $line, $match))
                        echo $match[1], '  ', $match[2].'<br>';
                }
        ?>
</body>
</html>