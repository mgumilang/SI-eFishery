<DOCTYPE! html>
<html>
    <header>
        <title>Inventory Manufaktur eFishery | Search</title>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/search.css">
        <div class="date"></div>
    </header>
    <body>
        <div class="container-fluid">
            <form>
                <div class="form-head">
                    <span class="jenis-search">
                        Search data:
                        <select name="jenis-search">
                            <option value="barang">Barang</option>
                            <option value="qc">QC</option>
                            <option value="pengambilan">Pengambilan</option>
                        </select>
                    </span>
                    <span class="id-barang">
                        ID Barang:
                        <input type="text" name="id-barang">
                    </span>
                    <span class="nama-barang">
                        Nama Barang:
                        <input type="text" name="nama-barang">
                    </span>
                    <br>
                    <span class="search-tanggal">
                        Tanggal:
                        <span class="tanggal">
                            <input type="number" name="tanggal" min="1" max="31" step="1" value="">
                        </span>
                        <span class="bulan">
                            <select name="bulan">
                                <option value=""></option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                        </span>
                        <span class="tahun">
                            <input type="number" name="tanggal" min="2010" max="2017" step="1" value="">
                        </span>
                    </span>
                    <span class="status">
                        Status:
                        <select name="status">
                            <option value=""></option>
                            <option value="ada">Ada</option>
                            <option value="kosong">Tidak ada</option>
                        </select>
                    </span>
                    <span class="jenis-barang">
                        Jenis:
                        <input type="text" name="jenis-barang">
                    </span>
                    <br>
                    <button type="button" class="btn btn-info">
                        Search...
                    </button>
                </div>
            </form>     
            <div class="form-body panel panel-default panel-light panel-summary">
                <div class="panel-body nopadding">
                    <div class="input-field">
                        <table>
                            
                        </table>
                    </div>
                </div>
            </div>
            <button class="btn btn-default">Back</button>
        </div>
    </body>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/date.js"></script>
</html>