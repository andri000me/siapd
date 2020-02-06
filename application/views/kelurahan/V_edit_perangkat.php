<ol class="breadcrumb">
	<li class="breadcrumb-item">
    <a href="javascript:window.history.go(-1)" style="text-decoration: none"><i class="fas fa-city fa-lg"> </i>&nbsp;&nbsp;&nbsp;Data Aparatur Kelurahan</a>
  </li>
  <li class="breadcrumb-item active">Edit Data</li>
</ol>
<?php foreach($perangkat as $p):  ?>
<div class="row">
   
    <div class="col-md-12">
        <div class="card shadow mb-4">
            
         <div class="card-body">
         
            	<form method="post" action="<?= base_url('C_PerangkatKelurahan/edit_perangkat') ?>" role="from">
            		<input type="hidden" name="id" value="<?= $p->id; ?>">
            		<div class="form-group row">
						<label class="col-sm-2 col-form-label">Jabatan</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="jabatan" value="<?= $p->jabatan; ?>">
							<?= form_error('jabatan','<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>
            		<div class="form-group row">
						<label class="col-sm-2 col-form-label">Nama</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nama" value="<?= $p->nama; ?>">
							<?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">NIP</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nip" value="<?= $p->nip; ?>">
							<?= form_error('nip','<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<?php $kelamin=$p->jk; 
							$pd=$p->pendidikan;
						?>
						<label class="col-md-2 control-label">Jenis Kelamin</label>
						<div class="col-md-10">
							<label class="checkbox-inline"  style="margin-right: 10px">
								<input type="radio" id="lk" name="jk" value="L" <?php if ($kelamin=="L") {
									echo'checked=\'checked\'';
								}; ?>>
								Laki-laki</label>
							<label class="checkbox-inline">
								<input type="radio" id="pr" name="jk" value="P" <?php if ($kelamin=="P") {
									echo'checked=\'checked\'';
								}; ?>>
								Perempuan </label>
							<?= form_error('jk','<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-2 control-label">Pendidikan</label>
						<div class="col-md-10">
							<label class="checkbox-inline"  style="margin-right: 10px">
								<input type="radio"  name="pd" value="SD" <?php if ($pd=="SD") {
									echo'checked=\'checked\'';
								}; ?>>
								SD</label>
							<label class="checkbox-inline"  style="margin-right: 10px">
								<input type="radio" name="pd" value="SMP" <?php if ($pd=="SMP") {
									echo'checked=\'checked\'';
								}; ?>>
								SMP</label>
							<label class="checkbox-inline"  style="margin-right: 10px">
							<input type="radio" name="pd" value="SLTA" <?php if ($pd=="SLTA") {
									echo'checked=\'checked\'';
								}; ?>>
							SLTA</label>
								<label class="checkbox-inline"  style="margin-right: 10px">
								<input type="radio"  name="pd" value="D1" <?php if ($pd=="D1") {
									echo'checked=\'checked\'';
								}; ?>>
								D1</label>
								<label class="checkbox-inline"  style="margin-right: 10px">
								<input type="radio" name="pd" value="D2" <?php if ($pd=="D2") {
									echo'checked=\'checked\'';
								}; ?>>
								D2</label>
								<label class="checkbox-inline"  style="margin-right: 10px">
								<input type="radio" name="pd" value="D3" <?php if ($pd=="D3") {
									echo'checked=\'checked\'';
								}; ?>>
								D3</label>
								<label class="checkbox-inline"  style="margin-right: 10px">
								<input type="radio" name="pd" value="S1" <?php if ($pd=="S1") {
									echo'checked=\'checked\'';
								}; ?>>
								S1</label>
								<label class="checkbox-inline"  style="margin-right: 10px">
								<input type="radio" name="pd" value="S2" <?php if ($pd=="S2") {
									echo'checked=\'checked\'';
								}; ?>>
								S2</label>
								<label class="checkbox-inline"  style="margin-right: 10px">
								<input type="radio" name="pd" value="S3" <?php if ($pd=="S3") {
									echo'checked=\'checked\'';
								}; ?>>
								S3</label>
								<?= form_error('pd','<small class="text-danger pl-3">','</small>'); ?>
							
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Tempat Lahir</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="tpt_lahir" value="<?= $p->tempat_lahir; ?>">
							<?= form_error('tpt_lahir','<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
						<div class="col-sm-6">
							<input type="date" class="form-control" name="tgl_lahir" value="<?= $p->tanggal_lahir; ?>">
							<?= form_error('tgl_lahir','<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Masa Jabatan</label>
						<div class="col-sm-1">Dari</div>
						<div class="col-sm-2">
							<input type="date" class="form-control" name="awal_jabatan" value="<?= $p->tanggal_pelantikan; ?>">
							<?= form_error('awal_jabatan','<small class="text-danger pl-3">','</small>'); ?>
						</div>
						<div class="col-sm-1">Sampai</div>
						<div class="col-sm-2">
							<input type="date" class="form-control" name="akhir_jabatan" value="<?= $p->masa_akhir_jabatan; ?>">
							<?= form_error('akhir_jabatan','<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>


					<div class="form-group row">
						<label class="col-sm-2 col-form-label">No Hp</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="no_hp" value="<?= $p->no_hp ?>">
							<?= form_error('no_hp','<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label"></label>
						<div class="col-sm-6">
							
							<button class="btn btn-primary float-right" type="submit"><i class="fa fa-fw fa-lg fa-check-circle fa-sm"></i>Simpan</button>
						</div>
						
					</div>
                    

                </form>


            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>