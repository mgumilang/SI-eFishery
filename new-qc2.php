<DOCTYPE! html>
<html>
    <head>
        <title>Inventory Manufaktur eFishery | New</title>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/new-supply.css">
        <style type="text/css">
            body{
                background-color: rgba(0, 0, 0, .03);
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
                        New Quality Control (QC)
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipe">Tipe:</label>
                                    <select class="form-control" name="data-masukan" id="tipe">
                                        <option value="supply">Supply</option>
                                        <option value="pengambilan">Pengambilan</option>
                                        <option value="qc" selected>QC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jumlah">Oleh:</label>
                                    <input type="text" class="form-control" id="jumlah">
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
                                overflow-x: hidden;
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

                                    .keterangan{
                                        padding: 0;
                                        margin: 0;
                                    }
                                </style>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ID:</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Hasil:</label>
                                            <div>
                                                <label class="radio-inline"><input type="radio" name="optradio">Lulus</label>
                                                <label class="radio-inline"><input type="radio" name="optradio">Tidak Lulus</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>File:</label>
                                            <input type="file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row keterangan">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan:</label>
                                            <textarea class="form-control" rows="5" id="keterangan"></textarea>
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
                        </style>
                        <div class="row main-button">
                            <div class="col-md-6 left">
                                <button class="btn btn-default" id="back-button">Back</button>
                                <button class="btn btn-danger">Reset</button>
                            </div>
                            <div class="col-md-6 right">
                                <button type="submit" class="btn btn-primary">Insert</button>
                            </div>
                        </div>
                    </form>     
                </div>
            </div>
        <!-- </div> -->
    </body>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
        $('#back-button').click(function(e){
            e.preventDefault();
            window.location.href = "index.php";
        });

        var get_new_card = function(){
            return '\
            <div class="card">\
                <div class="form-group">\
                    <label>ID:</label>\
                    <input type="text" class="form-control">\
                </div>\
                <div class="form-group">\
                    <label>Nama Barang:</label>\
                    <input type="text" class="form-control">\
                </div>\
                <div class="form-group">\
                    <label>Jenis Barang:</label>\
                    <input type="text" class="form-control">\
                </div>\
            </div>';
        }


        $('#card_add').click(function(){
            console.log(999);
            $(this).before(get_new_card());
        });

        $('#tipe').change(function(){
            position = $(this).val();
            if(position == 'supply')
                window.location.href = 'new-supply.php';
            else if(position == 'pengambilan')
                window.location.href = 'new-pengambilan2.php';
            else if(position == 'qc')
                window.location.href = 'new-qc2.php';
            
        });
    </script>
    <script src="js/date.js"></script>
</html>