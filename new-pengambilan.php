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
                        New Pengambilan
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tipe">Tipe:</label>
                                    <select class="form-control" name="data-masukan" id="tipe">
                                        <option value="supply">Supply</option>
                                        <option value="pengambilan" selected>Pengambilan</option>
                                        <option value="qc">QC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="jumlah">Jumlah:</label>
                                    <input type="text" class="form-control" id="jumlah" value="0" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="oleh">Oleh:</label>
                                    <select class="form-control" name="oleh" id="oleh">

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
                                            echo '<option value="' . $pegawai['ID'] . '">' . $pegawai['Nama'] . '</option>' . "\n";
                                        }
                                        
                                        // dump result
                                        
                                        
                                    ?>

                                    </select>
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
                                        <label>ID:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Barang:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Barang:</label>
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
                                <button class="btn btn-danger" id="reset-button">Reset</button>
                            </div>
                            <div class="col-md-6 right">
                                <form action="middleware/new-pengambilan.php" method="POST">
                                    <input type="hidden" name="allid" id="allid" />
                                    <input type="hidden" name="id_pegawai" id="id_pegawai" />
                                    <button type="submit" class="btn btn-primary">Insert</button>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        <!-- </div> -->
    </body>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#back-button').click(function(e){
            e.preventDefault();
            window.location.href = "index.php";
        });

        $('#reset-button').click(function(e){
            e.preventDefault();
            window.location.href = "new-pengambilan.php";
        });

        $('form').submit(function(e){
            var dataid = $('.input-id');

            var outid = "";

            var len = parseInt($('#jumlah').val());
            for(var i = 0; i < len; i++){
                outid += $(dataid[i]).val() + (i ==  (len - 1) ? "" : ",");
            }

            $('#allid').val(outid);
            $('#id_pegawai').val($('#oleh').val());

            console.log($('#allid').val());
            console.log($('#id_pegawai').val());

            // e.preventDefault();
            return true;
        });

        var get_new_card = function(){
            return '\
            <div class="card">\
                <i class="fa fa-trash"></i>\
                <div class="form-group">\
                    <label>ID:</label>\
                    <input type="text" class="form-control input-id">\
                </div>\
                <div class="form-group">\
                    <label>Nama Barang:</label>\
                    <input type="text" class="form-control" disabled="disabled">\
                </div>\
                <div class="form-group">\
                    <label>Jenis Barang:</label>\
                    <input type="text" class="form-control" disabled="disabled">\
                </div>\
            </div>';
        };


        $(document).on('keyup', '.input-id', function(){
            var this_parent = this;
            var setSibsData = function(a, b){
                var sibs = $(this_parent).parent().siblings();
                $(sibs[1]).children('input').val(a);
                $(sibs[2]).children('input').val(b);
            }
            $.ajax({url: "middleware/find-supply.php?id_barang=" + $(this).val(), success: function(result){
                // console.log(result.Nama);
                if(result.length > 0){
                    var json = JSON.parse(result);
                    console.log(json);
                    setSibsData(json.Nama, json.Jenis);
                }else{
                    setSibsData("", "");
                }
            }});
        });


        $('#card_add').click(function(){
            $('#jumlah').val(parseInt($('#jumlah').val()) + 1);
            $(this).before(get_new_card());
        });


        $('#tipe').change(function(){
            position = $(this).val();
            if(position == 'supply')
                window.location.href = 'new-supply.php';
            else if(position == 'pengambilan')
                window.location.href = 'new-pengambilan.php';
            else if(position == 'qc')
                window.location.href = 'new-qc.php';
            
        });

        $(document).on('click', '.fa-trash', function(){ 
            $(this).parent().remove();
            $('#jumlah').val(parseInt($('#jumlah').val()) - 1);
        });
    </script>
    <script src="js/date.js"></script>
</html>