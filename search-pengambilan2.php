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
                        Search Pengambilan
                    </h2>
                </div>
            </div><div class="row">
                <div class="col-md-12">
                    <form>
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
                            <div class="col-md-6">
                                <div class="form-group search-barang">
                                    <label for="tipe">Search Data:</label>
                                    <select class="form-control" name="data-masukan" id="tipe">
                                        <option value="barang">Barang</option>
                                        <option value="pengambilan" selected>Pengambilan</option>
                                        <option value="qc">QC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id-barang">ID Barang:</label>
                                    <input type="text" class="form-control" id="id-barang">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal:</label>
                                    <input type="date" class="form-control" id="tanggal">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pegawai">Pegawai:</label>
                                    <input type="text" class="form-control" id="pegawai">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a class="btn btn-primary">
                                    Search
                                </a>
                            </div>

                            <br/>
                            <br/>
                            <br/>
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
                                            <th>ID Barang</th>
                                            <th>Nama Pegawai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>21 Maret 2017</td>
                                            <td>FR-17</td>
                                            <td>John Smith</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>20 Maret 2017</td>
                                            <td>AC-22</td>
                                            <td>John Smith</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>19 Maret 2017</td>
                                            <td>FR-02</td>
                                            <td>John Smith</td>
                                        </tr>
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
        });

        $('#tipe').change(function(){
            position = $(this).val();
            if(position == 'barang')
                window.location.href = 'search2.php';
            else if(position == 'pengambilan')
                window.location.href = 'search-pengambilan2.php';
            else if(position == 'qc')
                window.location.href = 'search-qc2.php';
        });
    </script>
    <script src="js/date.js"></script>
</html>