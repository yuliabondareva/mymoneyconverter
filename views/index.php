<?php 

require_once ROOT . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('convert');
$log->pushHandler(new StreamHandler(ROOT . '/logs/info/log.log', Logger::INFO));
    if (isset($result)) $log->info('convert', array('time' => date('H:i:s d/m/Y'), 'res' => $result));

?>

<!DOCTYPE html>
<html>
<head>
    <title>Converter</title>
    <link rel="stylesheet" type="text/css" href="..\templates\css\style.css">
    <link rel="stylesheet" type="text/css" href="..\vendor\twbs\bootstrap\dist\css\bootstrap.min.css">
    <script type="text/javascript" src="../templates/js/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="../templates/js/script.js"></script>  
</head>
<body>
    <div class="nav">
        <a href="http://localhost/mymoneyconverter/settings/">Settings</a>
        <a href="http://localhost/mymoneyconverter/logss/">Logs</a>
    </div>
    <h1>Money Converter</h1>
        <form class="form-bg form-horizontal col-md-4" method="POST" id="form">
            <div class="form-container">
                <div class="form-group row col-md-10">
                    <label class="col-md-4">From</label>
                    <div class="col-md-5">
                        <select name='sourceid' class="form-control">
                            <option value='USD' title='United State America Dollar' selected>USD</option>
                            <?php    
                             foreach ($list as $value) {
                            ?>
                            <option value = "<?php echo $value['currency'];?>" title='<?php echo $value['currency_name'];?>'>
                                <?php echo $value['currency'];?></option>
                            <?php
                                }
                            ?>
                            <option value='CNY' title='Chinese Yuan'>CNY</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row col-md-10">
                    <label class="col-md-4">To</label>
                    <div class="col-md-5">
                        <select name='currencies' class="form-control">
                            <option value='CNY' title='Chinese Yuan' selected>CNY</option>
                        <?php    
                             foreach ($list as $value) {
                        ?>
                            <option value = "<?php echo $value['currency'];?>" title='<?php echo $value['currency_name'];?>'>
                                <?php echo $value['currency'];?></option>
                         <?php
                              }
                         ?>
                            <option value='USD' title='United State America Dollar'>USD</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row col-md-12">
                        <div class="col-md-4">
                            <input type="text" class="form-control form-input" name="ammount" id="ammount" placeholder="Amount">
                        </div>
                        <div class="col-md-8">
                            <span id="result" class="form-control form-output"><?php echo $result; ?></span>
                        </div>
                </div>
                <div class="form-group row col-md-12">
                    <input type="submit" class="btn btn-primary col-md-12" name="submit" value="Convert" id="convert">
                </div>
            </div>
        </form> 
</body>
</html>