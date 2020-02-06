<ol class="breadcrumb">
	<li class="breadcrumb-item">
    <a href="<?= base_url('C_PerangkatDesa'); ?>" style="text-decoration: none"><i class="fas fa-city fa-lg"> </i>&nbsp;&nbsp;&nbsp;Data Aparatur Desa</a>
  </li>
  <li class="breadcrumb-item active">Tambah Data</li>
</ol>

<?= $this->session->flashdata('message'); ?>

<div class="row">
   
    <div class="col-md-12">
        <div class="card shadow mb-4">
            
         <div class="card-body">

			
            	<form method="post" action="<?= base_url('C_PerangkatDesa/tambah_perangkat') ?>" role="from">
            		<div class="card-body" style="border-style: outset;border-radius: 10px!important">
            			<?php foreach($perangkat as $k): ?>
						<p>KABUPATEN : <?= $k->nama_kab; ?></p>
						<p>KECAMATAN : <?= $k->nama_kec; ?></p>
						<p>DESA : <?= $k->nama_desa; ?></p>
		         	<?php endforeach; ?>
            		</div>
            		
            		<div class="form-group row mt-4">
						<label class="col-sm-2 col-form-label">Jabatan</label>
						<div class="col-sm-6">
							<select name="jabatan" class="form-control" required>
                        	<option>---pilih Jabatan---</option>
                        	<option value="Kepala Desa">Kepala Desa</option>
                        	<option value="Sekretaris Desa">Sekretaris Desa</option>
                       		<option value="Ketua BPD Desa">Ketua BPD</option>
                       		<option value="Wakil BPD Desa">Wakil BPD</option>
                       		<option value="Sekre BPD Desa">Sekretaris BPD</option>
                       		<option value="Anggota BPD Desa">Anggota BPD</option>
                       		<option value="ketua RT Desa">Ketua RT</option>
                       		<option value="Sekretaris RT Desa">Sekretaris RT</option>
                       		<option value="Ketua LPM Desa">Ketua LPM</option>
                       		<option value="Wakil LPM Desa">Wakil LPM</option>
                       		<option value="Sekretaris LPM Desa">Sekretaris LPM</option>
                       		<option value="Bendahara LPM Desa">Bendahara LPM</option>
                       		<option value="Anggota LPM Desa">Anggota LPM</option>
                      		<option value="Ketua PKK Desa">Ketua PKK</option>
                       		<option value="Waki PKK Desa">Wakil PKK</option>
                       		<option value="Sekretaris PKK Desa">Sekretaris PKK</option>
                       		<option value="Bendahara PKK Desa">Bendahara PKK</option>
                       		<option value="Ketua Pokja I Desa">Ketua Pokja I</option>
                       		<option value="Wakil Pokja I Desa">Wakil Pokja I</option>
                       		<option value="Sekretaris Pokja I Desa">Sekretaris Pokja I</option>
                       		<option value="Anggota Pokja I Desa">Anggota Pokja I</option>
                       		<option value="Ketua Pokja II Desa">Ketua Pokja II</option>
                       		<option value="Wakil Pokja II Desa">Wakil Pokja II</option>
                       		<option value="Sekretaris Pokja II Desa">Sekretaris Pokja II</option>
                       		<option value="Anggota Pokja II Desa">Anggota Pokja II</option>
                       		<option value="Ketua Pokja III Desa">Ketua Pokja III</option>
                       		<option value="Wakil Pokja III Desa">Wakil Pokja III</option>
                       		<option value="Sekretaris Pokja III Desa">Sekretaris Pokja III</option>
                       		<option value="Anggota Pokja III Desa">Anggota Pokja III</option>
                       		<option value="Ketua Pokja IV Desa">Ketua Pokja IV</option>
                       		<option value="Wakil Pokja IV Desa">Wakil Pokja IV</option>
                       		<option value="Sekretaris Pokja IV Desa">Sekretaris Pokja IV</option>
                       		<option value="Anggota Pokja IV Desa">Anggota Pokja IV</option>
                       		<option value="Kasi Pemerintahan Desa">Kasi Pemerintahan</option>
                       		<option value="Kasi Pembangunan Desa">Kasi Pembangunan</option>
                       		<option value="Kasi Pemberdayaan Masyarakat Desa">Kasi Pemberdayaan Masyarakat</option>
                       		<option value="Kasi Kesejahteraan Masyarakat Desa">Kasi Kesejahteraan Masyarakat</option>
                       		<option value="Kasi Umum Desa">Kasi Umum</option>
                       		<option value="Kasi Keuangan Desa">Kasi Keuangan</option>
                       		<option value="Kasi Perekonomian Desa">Kasi Perekonomian</option>
                       		<option value="Kasi Data Dan Informasi Desa">Kasi Data Dan Informasi</option>
                       		<option value="Kaur Pemerintahan Desa">Kaur Pemerintahan</option>
                       		<option value="Kaur Pembangunan Desa">Kaur Pembangunan</option>
                       		<option value="Kaur Pemberdayaan Masyarakat Desa">Kaur Pemberdayaan Masyarakat</option>
                       		<option value="Kaur Kesejahteraan Masyarakat Desa">Kaur Kesejahteraan Masyarakat</option>
                       		<option value="Kaur Umum Desa">Kaur Umum</option>
                       		<option value="Kaur Keuangan Desa">Kaur Keuangan</option>
                       		<option value="Kaur Perekonomian Desa">Kaur Perekonomian</option>
                       		<option value="Kaur Data Dan Informasi Desa">Kaur Data Dan Informasi</option>
                       		<option value="Kepala Dusun Desa">Kepala Dusun</option>
                       		<option value="Ketua RW Desa">Ketua RW</option>
                       		<option value="Sekretaris RW Desa">Sekretaris RW</option>
                       		<option value="Ketua Karang Taruna Desa">Ketua Karang Taruna</option>
                       		<option value="Wakil Karang Taruna Desa">Wakil Karang Taruna</option>
                       		<option value="Sekretaris Karang Taruna Desa">Sekretaris Karang Taruna</option>
                       		<option value="Bendahara Karang Taruna Desa">Bendahara Karang Taruna</option>
                       		<option value="Anggota Karang Taruna Desa">Anggota Karang Taruna</option>
                       		<option value="Ketua Lembaga Adat Desa">Ketua Lembaga Adat</option>
                       		<option value="Wakil Lembaga Adat Desa">Wakil Lembaga Adat</option>
                       		<option value="Sekretaris Lembaga Adat Desa">Sekretaris Lembaga Adat</option>
                       		<option value="Bendahara Lembaga Adat Desa">Bendahara Lembaga Adat</option>
                       		<option value="Anggota Lembaga Adat Desa">Anggota Lembaga Adat</option>
                       		<option value="Direktur BUMDES Desa">Direktur BUMDES</option>
                       		<option value="Wakil BUMDES Desa">Wakil BUMDES</option>
                       		<option value="Sekretaris BUMDES Desa">Sekretaris BUMDES</option>
                       		<option value="Bendahara BUMDES Desa">Bendahara BUMDES</option>
                       		<option value="Unit Usaha BUMDES Desa">Unit Usaha BUMDES</option>

							</select>							


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




