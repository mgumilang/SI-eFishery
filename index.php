<?php 
    
    require_once('module/HistoryMaster.php');
    if(!isset($_GET['datamasukan'])) $_GET['datamasukan'] = '';
    if(!isset($_GET['nama'])) $_GET['nama'] = '';
    if(!isset($_GET['tanggal'])) $_GET['tanggal'] = '';
    if(!isset($_GET['idpegawai'])) $_GET['idpegawai'] = '';

    require_once('dbconfig.php');
    global $HOST;
    global $NAME;
    global $USER;
    global $PASS;
    
    // Database credential
    $dbHost = $HOST;
    $dbName = $NAME;
    $dbUser = $USER;
    $dbPass = $PASS;

    // create instance
    $dbhelper = new DatabaseHelper($dbHost, $dbName, $dbUser, $dbPass);
    $hm = new HistoryMaster($dbhelper);

    $hasil = $hm->getWithParams($_GET['datamasukan'], $_GET['nama'], $_GET['tanggal'], $_GET['idpegawai']);

?>

<DOCTYPE! html>
<html>
    <header>
        <title>Inventory Manufaktur eFishery | Homepage</title>
		<meta charset = "UTF-8">
		<meta name = "viewport" content = "width = device-width, initial-scale = 1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index.css">
        <style type="text/css">
            body{
                background-color: rgba(0, 0, 0, .05);
            }
        </style>
    </header>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 side-bar">
                    <div class="menu">
                        <style type="text/css">
                            .custom-100{
                                width: 100%;
                                padding: 16px;
                                margin: 8px 0;
                            }
                        </style>
                        <button id="New" class="btn btn-default custom-100" onclick="location.href='new-supply.php';">
                            New
                        </button>
                        <button id="Edit" class="btn btn-default custom-100" onclick="location.href='edit.php';">
                            Edit
                        </button>
                        <button id="Search" class="btn btn-default custom-100" onclick="location.href='search.php';">
                            Search
                        </button>
                        <button id="History" class="btn btn-default custom-100" onclick="location.href='history.php';">
                            History
                        </button>
                        <button id="Settings" class="btn btn-default custom-100" onclick="location.href='settings.php';">
                            Settings
                        </button>
                    </div>
                </div>
                <div class="col-md-7 right-bar">
                    <div class="date text-left"></div>
                    <div class="logo">
                        <img src="img/logo.png">
                    </div>
                    <div class="last-activity">
                        <div class="title">
                            Last Updates: 
                        </div>
                        <table>
                            <?php
                                $i = 0;
                                while($i <= 9){
                                    $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $hasil[$i-1]['Tanggal']; ?></td>
                                    <td><?php echo $hasil[$i-1]['Kode']; ?></td>
                                    <td><?php echo $hasil[$i-1]['Nama']; ?></td>
                                    <td><?php echo $hasil[$i-1]['PN']; ?></td>
                                </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/date.js"></script>
    <script src="js/index.js"></script>
</html>
