<?php 

require_once ROOT . '/vendor/autoload.php';

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
        <a href="http://localhost/mymoneyconverter/main/">Main page</a>
        <a href="http://localhost/mymoneyconverter/logss/">Logs</a>
    </div>
    
    <h3>Show/hide currencies</h3>

        <div class="form-container">
        <table class="form-bg form-horizontal col-md-4">
            <tr>
                <th>Currencies code</th>
                <th>Currencies name</th>
                <th>Show/hide</th>
            </tr>
            <?php    
                foreach ($list as $value) {
            ?>
            <tr id="new_currencie">    
                <td><?php echo $value['currency'];?></td>
                <td><?php echo $value['currency_name'];?></td>
                <td>
                    <form action="http://localhost/mymoneyconverter/settings/status" method="post" id="form">
                        <input type="hidden" name="id" value="<?php echo $value['id'];?>" id="<?php echo $value['id'];?>">
                        <?php if($value['flag'] == "1") {?>
                                <input type="submit" class="btn btn-danger" name="hide" value="Hide" id="hide">
                        <?php 
                            } 
                        ?>
                        <?php if($value['flag'] == "0") {?>
                                <input type="submit" class="btn btn-danger" name="show" value="Show" id="show">
                        <?php 
                            } 
                        ?>
                    </form>
                </td>
            </tr>
            <?php    
                }
            ?>
        </table>
    </div>

    <h3>Set cout of logs</h3>
        <form class="form-bg form-horizontal col-md-2" method="POST" id="logs" action="http://localhost/mymoneyconverter/settings/">
            <div class="form-container">
                <div class="form-group">
                    <input type="text" class="form-control form-input" name="count-logs" id="count-logs" placeholder="Count logs">
                </div> 
                <div class="form-group">
                    <input type="submit" class="btn btn-primary col-md-12" name="logs" value="Save" id="logs">
                </div>        
            </div>
        </form>
</body>
</html>