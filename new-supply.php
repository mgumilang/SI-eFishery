<DOCTYPE! html>
<html>
    <head>
    	<title>Inventory Manufaktur eFishery | New</title>
		<meta charset = "UTF-8">
		<meta name = "viewport" content = "width = device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/new-supply.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style type="text/css">
            body{
                background-color: rgba(0, 0, 0, .03);
            }

            /* Delete button on new supply card */
            .fa-trash{
                float:right;
                padding: 2px;
                border: solid 1px rgba(0, 0, 0, .1);
                margin-top: -8px;
                padding: 4px;
                cursor: pointer;
            }
            .fa-trash:hover{
                color: red;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="date"></div>
        </header>
        <div class="container-fluid new-supply">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        New Supply
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipe">Tipe:</label>
                                    <select class="form-control" name="data-masukan" id="tipe">
                                        <option value="supply" selected>Supply</option>
                                        <option value="pengambilan">Pengambilan</option>
                                        <option value="qc">QC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jumlah">Jumlah:</label>
                                    <input type="text" class="form-control" id="jumlah" disabled="disabled" value="0">
                                </div>
                            </div>
                        </div>
                        <style type="text/css">
                            .main-data{
                                margin: 0px;
                                padding: 8px;
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
                        </style>
                        <div class="row main-data">
                            <div class="col-md-12">
                                <style type="text/css">
                                    .card{
                                        margin: 4px;
                                        width: 32%;
                                        border: solid 1px rgba(0, 0, 0, .2);
                                        padding: 16px;
                                        display: inline-block;
                                        background-color: rgba(0, 0, 0, .05);
                                        text-align: left;
                                        border-radius: 4px;
                                        position: relative;
                                    }
                                    .add:hover{
                                        background-color: rgba(0, 0, 0, .2);
                                        cursor: pointer;
                                        transition: .2s;
                                    }
                                    .add div{
                                        visibility: hidden;
                                    }
                                    .add div.plus{
                                        visibility: visible;
                                        position: absolute;
                                        font-size: 5em;
                                        width: 90%;
                                        text-align: center;
                                        margin-top: 80px;
                                    }
                                </style>
                                <div class="add card" id="card_add">
                                    <div class="plus">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Barang:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Barang:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Masuk Barang:</label>
                                        <input type="text" class="form-control">
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
                        </style>
                        <div class="row main-button">
                            <div class="col-md-6 left">
                                <button class="btn btn-default" id="back-button">Back</button>
                                <button class="btn btn-danger">Reset</button>
                            </div>
                            <div class="col-md-6 right">
                                <form action="middleware/new-supply.php" method="POST">
                                    <input type="hidden" name="alltanggal" id="alltanggal" value="2017-04-11" />
                                    <input type="hidden" name="allnama" id="allnama" value="aaa" />
                                    <input type="hidden" name="alljenis" id="alljenis" value="1" />
                                    <button type="submit" class="btn btn-primary" id="insert_now">Insert</button>
                                </form>
                            </div>
                        </div>  
                </div>
            </div>
        <!-- </div> -->
    </body>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">

        // override click back button
        $('#back-button').click(function(e){
            e.preventDefault();
            window.location.href = "index.php";
        });

        // Before submit
        $('form').submit(function(e){
            // get array of data
            var datatanggal = $('.input-tanggal');
            var datanama = $('.input-nama');
            var datajenis = $('.input-jenis');

            // temporary string data
            var outtanggal = "";
            var outnama = "";
            var outjenis = "";

            // serialized data with ',' separator
            var len = parseInt($('#jumlah').val());
            for(var i = 0; i < len; i++){
                outtanggal += $(datatanggal[i]).val() + (i ==  (len - 1) ? "" : ",");
                outnama += $(datanama[i]).val() + (i == (len - 1) ? "" : ",");
                outjenis += $(datajenis[i]).val() + (i == (len - 1) ? "" : ",");
            }

            // assign data to each input
            $('#alltanggal').val(outtanggal);
            $('#allnama').val(outnama);
            $('#alljenis').val(outjenis);

            console.log($('#alltanggal').val());
            console.log($('#allnama').val());
            console.log($('#alljenis').val());

            // submit form
            return true;
        });

        // Get Jenis barang record
        // assigned to local js variable 'arr_jenis'
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

            // dump result
            echo "var arr_jenis = " . json_encode($pb->allJenisBarang()) . ";";
        ?>

        // return options HTML Tag of Jenis
        function getAllJenisOptionOnHTMLMode(){
            var res = "";
            arr_jenis.data.forEach(function(jenis){
                res += '<option value="' + jenis.ID + '">' + jenis.Nama + '</option>\n';
            });
            
            return res;
        }

        // create new HTML input card tag for new supply
        var get_new_card = function(){
            return '\
            <div class="card">\
                <i class="fa fa-trash"></i>\
                <div class="form-group">\
                    <label>Nama Barang:</label>\
                    <input type="text" class="form-control input-nama">\
                </div>\
                <div class="form-group">\
                    <label>Jenis Barang:</label>\
                    <select class="form-control input-jenis">'
                    + getAllJenisOptionOnHTMLMode() +
                    '</select>\
                </div>\
                <div class="form-group">\
                    <label>Tanggal Masuk Barang:</label>\
                    <input type="date" class="form-control input-tanggal">\
                </div>\
            </div>';
        }

        // on [+] card button clicked
        $('#card_add').click(function(){
            $('#jumlah').val(parseInt($('#jumlah').val()) + 1);
            $(this).before(get_new_card());
        });

        // on tipe supply, pengambilan, qc changed
        $('#tipe').change(function(){
            position = $(this).val();
            if(position == 'supply')
                window.location.href = 'new-supply.php';
            else if(position == 'pengambilan')
                window.location.href = 'new-pengambilan.php';
            else if(position == 'qc')
                window.location.href = 'new-qc.php';
            
        });

        // on card removed
        $(document).on('click', '.fa-trash', function(){ 
            $(this).parent().remove();
            $('#jumlah').val(parseInt($('#jumlah').val()) - 1);
        });
    </script>
    <script src="js/date.js"></script>
</html>