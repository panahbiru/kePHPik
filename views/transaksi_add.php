<p class="text-right text-small"><a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a></p>
<div class="row">
    <div class="col-md-12">
        <h1>Tambah Transaksi</h1>
        <p>
            Berikut adalah form untuk menambah transaksi baru ke dalam database.
                 <a class="text-right btn btn-danger btn-sm" href="<?php echo $conf->site_url;?>home/transaksi">Lihat Transaksi</a>
        </p>
        <form class="form-horizontal" method="POST" action="<?php echo $conf->site_url;?>home/add_transaksi">
        <div class="form-group">
            <label class="col-md-4">Nama Pembeli</label>
            <div class="col-md-8">
                <input type="text" name="nama_pembeli" value="" maxlength="200" placeholder="tulis nama pembeli" class="form-control"/>
            </div>
        </div>
        <div class="form-group">
			<label class="col-md-4">Alamat Kirim</label>
			<div class="col-md-8">
			<textarea name="alamat" rows="10" cols="60"></textarea>
			</div>
        </div>
        <div class="form-group">
			<label class="col-md-4">No. HP</label>
			<div class="col-md-8">
				<input type="text" name="no_hp" value="" maxlength="15" />
			</div>
        </div>
        <div class="from-group">
			<label class="col-md-4">ID Transaksi Lain</label>
			<div class="col-md-8">
				<input type="text" name="id_transaksi_lain" value="" placeholder="tulis ID transaksi Tokopedia/Bukalapak/Shopee dkk" />
			</div>
        </div>
        <div class="form-group">
			<label class="col-md-4">Vendor</label>
			<div class="col-md-8">
				<input type="radio" name="vendor" value="tokopedia" /> Tokopedia<br/>
				<input type="radio" name="vendor" value="bukalapak" /> Bukalapak<br/>
				<input type="radio" name="vendor" value="shopee" /> Shopee<br/>
				<input type="radio" name="vendor" value="cod" /> COD<br/>
				<input type="radio" name="vendor" value="direct" /> Direct<br/>
			</div>
        </div>
        
        <div class="form-group">
			<label class="col-md-4">Vendor Ongkir</label>
        </div>
        <div class="form-group">
            <label class="col-md-4"></label>
            <div class="col-md-8">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</div>
