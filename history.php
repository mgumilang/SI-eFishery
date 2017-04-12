<?php 
    
    require_once('module/HistoryMaster.php');

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

    $hasil = $hm->some(1);

?>
<DOCTYPE! html>
<html>
    <header>
        <title>Inventory Manufaktur eFishery | Edit</title>
		<meta charset = "UTF-8">
		<meta name = "viewport" content = "width = device-width, initial-scale = 1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/edit.css">
        <div class="date"></div>
        <style type="text/css">
            body{
                background-color: rgba(0, 0, 0, .03);
            }
        </style>
    </header>
    <body>
        <div class="container-fluid edit">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        History
                    </h2>
                </div>
            </div><div class="row">
                <div class="col-md-12">
                    <form>
                        <div class="row">
                            <style type="text/css">
                                .search-barang{
                                    
                                }
                                .search-barang div.input-group span:hover{
                                    background-color: rgba(0, 0, 0, .1);
                                    transition: .2s;
                                    cursor: pointer;
                                }
                            </style>
                            <div class="col-md-6">
                                <div class="form-group search-barang">
                                    <label for="id-barang">Search By:</label>
                                    <div class='input-group'>
                                        <input type="date" class="form-control" id="id-barang">
                                        <span class="input-group-addon">
                                            Find
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                        <style type="text/css">
                            .main-data{
                                margin: 0px;
                                padding: 16px;
                                padding-top: 24px;
                                border: solid 1px rgba(0, 0, 0, .2);
                                overflow-y: auto;
                                vertical-align: top;
                                border-radius: 4px;
                                background-color: white;
                            }
                            .main-data .col-md-12{
                                vertical-align: top;
                                padding: 0px;
                            }
                            .komentar{
                                padding: 0;
                                margin: 0;
                            }
                        </style>
                        <div class="row main-data">
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Kegiatan</th>
                                            <th>Nama Barang</th>
                                            <th>Pegawai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i = 0;
                                        foreach($hasil as $baris){
                                            $i++;
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $baris['Tanggal']; ?></td>
                                            <td><?php echo $baris['Kode']; ?></td>
                                            <td><?php echo $baris['Nama']; ?></td>
                                            <td><?php echo $baris['PN']; ?></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>    
                            </div>
                        </div>

                        <style type="text/css">
                            .main-button{
                                margin: 4px 0px;
                            }
                            .main-button .left, .main-button .right{
                                margin: 0px;
                                padding: 0;
                                text-align: left;
                            }
                            .main-button .left button{
                                float: left;
                                margin-right: 4px;
                            }
                            .main-button .right button{
                                float: right;
                            }

                            button {
                                height: 75px;
                                width: 200px;
                            }
                        </style>
                        <div class="row main-button">
                            <div class="col-md-6 left">
                                <button class="btn btn-default" id="back-button">Back</button>
                            </div>
                            <div class="col-md-6 right">
                            </div>
                        </div>
                    </form>     
                </div>
            </div>
        </div>
    </body>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
        $('#back-button').click(function(e){
            e.preventDefault();
            window.location.href = "index.php";
        })
    </script>
    <script src="js/date.js"></script>
</html>