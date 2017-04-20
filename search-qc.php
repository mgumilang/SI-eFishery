<?php 
    
    require_once('module/PengolahBarang.php');
    if(!isset($_GET['datamasukan'])){
        $_GET['datamasukan'] = "qc";
        $_GET['idbarang'] = "";
        $_GET['hasil'] = "";
        $_GET['tanggal'] = "";
        $_GET['idpegawai'] = "";
    }


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
    $pb = new PengolahBarang($dbhelper);

    $hasil = $pb->allQCWithParams($_GET['idbarang'], $_GET['hasil'], $_GET['tanggal'], $_GET['idpegawai']);

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
                        Search Quality Control (QC)
                    </h2>
                </div>
            </div><div class="row">
                <div class="col-md-12">
                    <form action="" method="GET">
                        <style type="text/css">
                            .search-barang{
                                
                            }
                            .search-barang div.input-group span:hover{
                                background-color: rgba(0, 0, 0, .1);
                                transition: .2s;
                                cursor: pointer;
                            }
                        </style>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group search-barang">
                                    <label for="tipe">Search Data:</label>
                                    <select class="form-control" name="datamasukan" id="tipe">
                                        <option value="barang">Barang</option>
                                        <option value="pengambilan">Pengambilan</option>
                                        <option value="qc" selected>QC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id-barang">ID Barang:</label>
                                    <input type="text" class="form-control" name="idbarang" id="idbarang" value="<?php echo $_GET['idbarang']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group search-barang">
                                    <label for="tipe">Hasil:</label>
                                    <select class="form-control" name="hasil">
                                        <option value="" <?php echo ($_GET['hasil'] == '') ? 'selected' : ''; ?>></option>
                                        <option value="Lulus" <?php echo ($_GET['hasil'] == 'Lulus') ? 'selected' : ''; ?>>Lulus</option>
                                        <option value="Tidak Lulus" <?php echo ($_GET['hasil'] == 'Tidak Lulus') ? 'selected' : ''; ?>>Tidak Lulus</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal:</label>
                                    <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?php echo $_GET['tanggal'] ? $_GET['tanggal'] : ''; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pemeriksa">Pemeriksa:</label>
                                    <select class="form-control" name="idpegawai" id="pemeriksa">
                                        <option value="" <?php echo ($_GET['hasil'] == '') ? 'selected' : ''; ?>></option>
                                    <?php
                                        require('module/PengolahPegawai.php');


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
                                        $pp = new PengolahPegawai($dbhelper);


                                        $res = $pp->all();

                                        foreach ($res->data as $pegawai){
                                            echo '<option value="' . $pegawai['ID'] . '" ' . (($_GET['idpegawai'] == $pegawai['ID']) ? 'selected' : '') . '>' . $pegawai['Nama'] . '</option>' . "\n";
                                        }
                                        
                                        // dump result
                                        
                                        
                                    ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" value="Search" />
                            </div>

                            <br/>
                            <br/>
                            <br/>
                        </div>
                    </form>
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
                                        <th>ID Barang</th>
                                        <th>Hasil</th>
                                        <th>Pemeriksa</th>
                                        <th>File QC</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 0;
                                    foreach($hasil->data as $baris){
                                        $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $baris['Tanggal_QC']; ?></td>
                                        <td><?php echo $baris['ID_Barang']; ?></td>
                                        <td><?php echo $baris['Hasil_QC']; ?></td>
                                        <td><?php echo $baris['Pemeriksa']; ?></td>
                                        <td><a href="<?php echo $baris['File_QC']; ?>"><?php echo $baris['File_QC']; ?></a></td>
                                        <td><?php echo $baris['Keterangan']; ?></td>
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
        });

        $('#tipe').change(function(){
            position = $(this).val();
            if(position == 'barang')
                window.location.href = 'search.php';
            else if(position == 'pengambilan')
                window.location.href = 'search-pengambilan.php';
            else if(position == 'qc')
                window.location.href = 'search-qc.php';
        });
    </script>
    <script src="js/date.js"></script>
</html>