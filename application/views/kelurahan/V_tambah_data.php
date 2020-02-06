<ol class="breadcrumb">
	<li class="breadcrumb-item">
    <a href="<?= base_url('C_PerangkatDesa'); ?>" style="text-decoration: none"><i class="fas fa-city fa-lg"> </i>&nbsp;&nbsp;&nbsp;Data Aparatur Kelurahan</a>
  </li>
  <li class="breadcrumb-item active">Tambah Data</li>
</ol>

<?= $this->session->flashdata('message'); ?>

<div class="row">
   
    <div class="col-md-12">
        <div class="card shadow mb-4">
            
         <div class="card-body">

			
            	<form method="post" action="<?= base_url('C_PerangkatKelurahan/tambah_perangkat') ?>" role="from">
            		<!-- <div class="" style="border-style: outset;border-radius: 10px!important"> -->
            			<?php foreach($perangkat as $k): ?>
							<p>KABUPATEN <?= $k->nama_kab; ?></p>
							<p>KECAMATAN <?= $k->nama_kec; ?></p>
							<p>DESA / KEL <?= $k->nama_desa; ?></p>
		         		<?php endforeach; ?>
            		<!-- </div> -->
            	

            	<div class="form-group row mt-4">
					<label class="col-sm-2 col-form-label">Jabatan</label>
					<div class="col-sm-6">
						<select name="jabatan" class="form-control" required>
                        	<option>---pilih Jabatan---</option>
                        	<option value="Lurah">Lurah</option>
                        	<option value="Sekretaris Lurah">Sekretaris Lurah</option>
                       		<option value="Ketua BPD Kelurahan">Ketua BPD</option>
                       		<option value="Wakil BPD Kelurahan">Wakil BPD</option>
                       		<option value="Sekretaris BPD Kelurahan">Sekretaris BPD</option>
                       		<option value="Anggota BPD Kelurahan">Anggota BPD</option>
                       		<option value="Ketua RT Kelurahan">Ketua RT</option>
                       		<option value="Sekretaris RT Kelurahan">Sekretaris RT</option>
                       		<option value="Ketua LPM Kelurahan">Ketua LPM</option>
                       		<option value="Wakil LPM Kelurahan">Wakil LPM</option>
                       		<option value="Sekretaris LPM Kelurahan">Sekretaris LPM</option>
                       		<option value="Bendahara LPM Kelurahan">Bendahara LPM</option>
                       		<option value="Anggota LPM Kelurahan">Anggota LPM</option>
                      		<option value="Ketua PKK Kelurahan">Ketua PKK</option>
                       		<option value="Waki PKK Kelurahan">Wakil PKK</option>
                       		<option value="Sekretaris PKK Kelurahan">Sekretaris PKK</option>
                       		<option value="Bendahara PKK Kelurahan">Bendahara PKK</option>
                       		<option value="Ketua Pokja I Kelurahan">Ketua Pokja I</option>
                       		<option value="Wakil Pokja I Kelurahan">Wakil Pokja I</option>
                       		<option value="Sekretaris Pokja I Kelurahan">Sekretaris Pokja I</option>
                       		<option value="Anggota Pokja I Kelurahan">Anggota Pokja I</option>
                       		<option value="Ketua Pokja II Kelurahan">Ketua Pokja II</option>
                       		<option value="Wakil Pokja II Kelurahan">Wakil Pokja II</option>
                       		<option value="Sekretaris Pokja II Kelurahan">Sekretaris Pokja II</option>
                       		<option value="Anggota Pokja II Kelurahan">Anggota Pokja II</option>
                       		<option value="Ketua Pokja III Kelurahan">Ketua Pokja III</option>
                       		<option value="Wakil Pokja III Kelurahan">Wakil Pokja III</option>
                       		<option value="Sekretaris Pokja III Kelurahan">Sekretaris Pokja III</option>
                       		<option value="Anggota Pokja III Kelurahan">Anggota Pokja III</option>
                       		<option value="Ketua Pokja IV Kelurahan">Ketua Pokja IV</option>
                       		<option value="Wakil Pokja IV Kelurahan">Wakil Pokja IV</option>
                       		<option value="Sekretaris Pokja IV Kelurahan">Sekretaris Pokja IV</option>
                       		<option value="Anggota Pokja IV Kelurahan">Anggota Pokja IV</option>
                       		<option value="Kasi Pemerintahan Kelurahan">Kasi Pemerintahan</option>
                       		<option value="Kasi Pembangunan Kelurahan">Kasi Pembangunan</option>
                       		<option value="Kasi Pemberdayaan Masyarakat Kelurahan">Kasi Pemberdayaan Masyarakat</option>
                       		<option value="Kasi Kesejahteraan Masyarakat Kelurahan">Kasi Kesejahteraan Masyarakat</option>
                       		<option value="Kasi Umum Kelurahan">Kasi Umum</option>
                       		<option value="Kasi Keuangan Kelurahan">Kasi Keuangan</option>
                       		<option value="Kasi Perekonomian Kelurahan">Kasi Perekonomian</option>
                       		<option value="Kasi Data Dan Informasi Kelurahan">Kasi Data Dan Informasi</option>
                       		<option value="Kaur Pemerintahan Kelurahan">Kaur Pemerintahan</option>
                       		<option value="Kaur Pembangunan Kelurahan">Kaur Pembangunan</option>
                       		<option value="Kaur Pemberdayaan Masyarakat Kelurahan">Kaur Pemberdayaan Masyarakat</option>
                       		<option value="Kaur Kesejahteraan Masyarakat Kelurahan">Kaur Kesejahteraan Masyarakat</option>
                       		<option value="Kaur Umum Kelurahan">Kaur Umum</option>
                       		<option value="Kaur Keuangan Kelurahan">Kaur Keuangan</option>
                       		<option value="Kaur Perekonomian Kelurahan">Kaur Perekonomian</option>
                       		<option value="Kaur Data Dan Informasi Kelurahan">Kaur Data Dan Informasi</option>
                       		<option value="Kepala Dusun Kelurahan">Kepala Dusun</option>
                       		<option value="Ketua RW Kelurahan">Ketua RW</option>
                       		<option value="Sekretaris RW Kelurahan">Sekretaris RW</option>
                       		<option value="Ketua Karang Taruna Kelurahan">Ketua Karang Taruna</option>
                       		<option value="Wakil Karang Taruna Kelurahan">Wakil Karang Taruna</option>
                       		<option value="Sekretaris Karang Taruna Kelurahan">Sekretaris Karang Taruna</option>
                       		<option value="Bendahara Karang Taruna Kelurahan">Bendahara Karang Taruna</option>
                       		<option value="Anggota Karang Taruna Kelurahan">Anggota Karang Taruna</option>
                       		<option value="Ketua Lembaga Adat Kelurahan">Ketua Lembaga Adat</option>
                       		<option value="Wakil Lembaga Adat Kelurahan">Wakil Lembaga Adat</option>
                       		<option value="Sekretaris Lembaga Adat Kelurahan">Sekretaris Lembaga Adat</option>
                       		<option value="Bendahara Lembaga Adat Kelurahan">Bendahara Lembaga Adat</option>
                       		<option value="Anggota Lembaga Adat Kelurahan">Anggota Lembaga Adat</option>
                       		<option value="Direktur BUMDES Kelurahan">Direktur BUMDES</option>
                       		<option value="Wakil BUMDES Kelurahan">Wakil BUMDES</option>
                       		<option value="Sekretaris BUMDES Kelurahan">Sekretaris BUMDES</option>
                       		<option value="Bendahara BUMDES Kelurahan">Bendahara BUMDES</option>
                       		<option value="Unit Usaha BUMDES Kelurahan">Unit Usaha BUMDES</option>

						</select>
							<!-- <input type="text" class="form-control text-uppercase" name="jabatan" value="<?= set_value('jabatan');?>"> -->
							<?= form_error('jabatan','<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>
            		<div class="form-group row">
						<label class="col-sm-2 col-form-label">Nama</label>
						<div class="col-sm-6">
							<input type="text" class="form-control text-uppercase" name="nama" value="<?= set_value('nama');?>">
							<?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">NIP</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nip" value="<?= set_value('nip');?>">
							<?= form_error('nip','<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-2 control-label">Jenis Kelamin</label>
						<div class="col-md-10">
							<label class="checkbox-inline"  style="margin-right: 10px">
								<input type="radio" id="lk" name="jk" value="L">
								Laki-laki</label>
							<label class="checkbox-inline">
								<input type="radio" id="pr" name="jk" value="P">
								Perempuan </label>
							<?= form_error('jk','<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-2 control-label">Pendidikan</label>
						<div class="col-md-10">
							<label class="checkbox-inline"  style="margin-right: 10px">
								<input type="radio"  name="pd" value="SD">
								SD</label>
							<label class="checkbox-inline"  style="margin-right: 10px">
								<input type="radio" name="pd" value="SMP">
								SMP</label>
							<label class="checkbox-inline"  style="margin-right: 10px">
							<input type="radio" name="pd" value="SLTA">
							SLTA</label>
								<label class="checkbox-inline"  style="margin-right: 10px">
								<input type="radio"  name="pd" value="D1">
								D1</label>
								<label class="checkbox-inline"  style="margin-right: 10px">
								<input type="radio" name="pd" value="D2">
								D2</label>
								<label class="checkbox-inline"  style="margin-right: 10px">
								<input type="radio" name="pd" value="D3">
								D3</label>
								<label class="checkbox-inline"  style="margin-right: 10px">
								<input type="radio" name="pd" value="S1">
								S1</label>
								<label class="checkbox-inline"  style="margin-right: 10px">
								<input type="radio" name="pd" value="S2">
								S2</label>
								<label class="checkbox-inline"  style="margin-right: 10px">
								<input type="radio" name="pd" value="S3">
								S3</label>
								<?= form_error('pd','<small class="text-danger pl-3">','</small>'); ?>
							
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Tempat Lahir</label>
						<div class="col-sm-6">
							<input type="text" class="form-control text-uppercase" name="tpt_lahir" value="<?= set_value('tpt_lahir');?>">
							<?= form_error('tpt_lahir','<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
						<div class="col-sm-6">
							<input type="date" class="form-control" name="tgl_lahir" value="<?= set_value('tgl_lahir');?>">
							<?= form_error('tgl_lahir','<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Masa Jabatan</label>
						<div class="col-sm-1">Dari</div>
						<div class="col-sm-2">
							<input type="date" class="form-control" name="awal_jabatan" value="<?= set_value('awal_jabatan');?>">
							<?= form_error('awal_jabatan','<small class="text-danger pl-3">','</small>'); ?>
						</div>
						<div class="col-sm-1">Sampai</div>
						<div class="col-sm-2">
							<input type="date" class="form-control" name="akhir_jabatan" value="<?= set_value('akhir_jabatan');?>">
							<?= form_error('akhir_jabatan','<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">No Hp</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="no_hp" value="<?= set_value('no_hp');?>">
							<?= form_error('no_hp','<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-5">
							
						</div>
						<div class="col-sm-3">
							<button class="btn btn-primary mt-2" type="reset"><i class="fa fa-fw fa-lg fa-undo fa-sm"></i>Reset</button>
							<button class="btn btn-primary mt-2" type="submit"><i class="fa fa-fw fa-lg fa-check-circle fa-sm"></i>Simpan</button>
						</div>
						
					</div>
                    

                </form>


            </div>
        </div>
    </div>
</div>




