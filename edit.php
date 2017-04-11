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
                        Edit
                    </h2>
                </div>
            </div><div class="row">
                <div class="col-md-12">
                    <form action="middleware/edit.php" method="POST">
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
                                    <label for="id-barang">ID Barang:</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" name="id" value="<?php
                                            echo isset($_GET['id']) ? $_GET['id'] : "";
                                        ?>" id="id-barang">
                                        <span class="input-group-addon" id="search-id">
                                            Search
                                        </span>
                                    </div>
                                    <div id="search-result-hint"></div>
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Barang:</label>
                                            <input type="text" class="form-control" name="nama" id="nama-barang">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Barang:</label>
                                            <select class="form-control" name="jenis" id="jenis-barang">
                                                <option value="-1"></option>
                                            <?php
                                                require('module/PengolahBarang.php');

                                                // Simple driver test
                                                $dbHost = "localhost";
                                                $dbName = "ef_manufacture";
                                                $dbUser = "root";
                                                $dbPass = "";

                                                // create instance
                                                $dbhelper = new DatabaseHelper($dbHost, $dbName, $dbUser, $dbPass);
                                                $pb = new PengolahBarang($dbhelper);


                                                $res = $pb->allJenisBarang();

                                                foreach ($res->data as $pegawai){
                                                    echo '<option value="' . $pegawai['ID'] . '">' . $pegawai['Nama'] . '</option>' . "\n";
                                                }
                                                
                                                // dump result
                                                
                                                
                                            ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>File:</label>
                                            <input type="file" class="form-control" name="file">
                                        </div>
                                        <div class="form-group">
                                            <label>Hasil:</label>
                                            <div>
                                                <label class="radio-inline"><input type="radio" id="hasil-0" name="hasil" value="Lulus" id="">Lulus</label>
                                                <label class="radio-inline"><input type="radio" id="hasil-1" name="hasil" value="Tidak Lulus">Tidak Lulus</label>
                                                <label class="radio-inline"><input type="radio" id="hasil-2" name="hasil" value="">Belum Diperiksa</label>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Masuk:</label>
                                            <input type="date" class="form-control" id="tanggal-masuk-barang" name="tanggal_masuk">
                                        </div>
                                        <div class="form-group">
                                            <label>Status:</label>
                                            <div>
                                                <label class="radio-inline"><input type="radio" id="status-0" value="0" name="status">Ada</label>
                                                <label class="radio-inline"><input type="radio" id="status-1" value="1" name="status">Tidak Ada</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row komentar">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan:</label>
                                            <textarea class="form-control" rows="5" id="keterangan" name="keterangan"></textarea>
                                        </div>
                                    </div>
                                </div>
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
                                <button class="btn btn-danger">Cancel</button>
                            </div>
                            <div class="col-md-6 right">
                                <button type="submit" class="btn btn-primary" id="edit-button" disabled>Edit</button>
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

        var formUpdate = function(){
            var setUpForm = function(data){
                $('#nama-barang').val(data.Nama);
                $('#jenis-barang').val(data.E_Jenis_ID);

                if(data.R_diperiksa_Hasil == "Lulus")
                    $('#hasil-0').prop("checked", true);
                else if(data.R_diperiksa_Hasil == "Tidak Lulus")
                    $('#hasil-1').prop("checked", true);
                else if(data.R_diperiksa_Hasil == "")
                    $('#hasil-2').prop("checked", true);
                else{
                    $('#hasil-0').prop("checked", false);
                    $('#hasil-1').prop("checked", false);
                    $('#hasil-2').prop("checked", false);
                }

                $('#tanggal-masuk-barang').val(data.Tanggal_Masuk);

                if(data.Status == "0")
                    $('#status-0').prop("checked", true);
                else if(data.Status == "1")
                    $('#status-1').prop("checked", true);
                else{
                    $('#status-0').prop("checked", false);
                    $('#status-1').prop("checked", false);
                }

                $('#keterangan').val(data.R_diperiksa_Keterangan);
            }
            if(!$('#id-barang').val())
                $('#search-result-hint').html("ID cannot be empty");
            else
                $.ajax({url: "middleware/find-supply.php?id_barang=" + $('#id-barang').val(), success: function(result){
                    // console.log(result.Nama);
                    if(result.length > 0){
                        var json = JSON.parse(result);
                        setUpForm(json);
                        $('#search-result-hint').html("Result for ID = <b>" + $('#id-barang').val() + "</b>");
                        $('#edit-button').removeAttr('disabled');
                    }else{
                        setUpForm({
                            Nama: "",
                            E_Jenis_ID: "",
                            R_diperiksa_Hasil: "-1",
                            Tanggal_Masuk: "",
                            Status: "-1",
                            R_diperiksa_Keterangan: ""
                        });
                        $('#search-result-hint').html("<i>No Result for ID = " + $('#id-barang').val() + "</i>");
                        $('#edit-button').attr('disabled', 'disabled');
                    }
                }});
        }

        $(document).ready(function(){
            if($('#id-barang').val())
                formUpdate();
        });

        $('#search-id').click(function(){
            formUpdate();
        });
    </script>
    <script src="js/date.js"></script>
</html>