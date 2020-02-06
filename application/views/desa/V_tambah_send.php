<ol class="breadcrumb">
	<li class="breadcrumb-item">
    <a href="<?= base_url('C_PerangkatDesa/send'); ?>" style="text-decoration: none"><i class="fas fa-city fa-lg"> </i>&nbsp;&nbsp;&nbsp;Kirim Pesan</a>
  </li>
  <li class="breadcrumb-item active">Tulis Pesan</li>
</ol>

<?= $this->session->flashdata('message'); ?>

<div class="row">
   
    <div class="col-md-12">
        <div class="card shadow mb-4">
            
         <div class="card-body">

			
            	<form method="post" action="<?= base_url('C_PerangkatDesa/aksi_send') ?>" role="from" enctype="multipart/form-data">
            		
            		<div class="form-group row mt-4">
						<label class="col-sm-2 col-form-label">Perihal</label>
						<div class="col-sm-6">
							<input type="text" class="form-control text-uppercase" name="perihal" value="<?= set_value('perihal');?>">
							<?= form_error('perihal','<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>
            		<div class="form-group row">
						<label class="col-sm-2 col-form-label">Isi</label>
						<div class="col-sm-6">
							<textarea name="isi" rows="6" cols="69" value="<?= set_value('isi');?>"></textarea>
							<?= form_error('isi','<small class="text-danger pl-3">','</small>'); ?>
							
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">File Pendukung</label>
						<div class="col-sm-6">
							<input type="file" class="form-control-file" name="file" value="<?= set_value('file');?>">
							<?= form_error('file','<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>


					<div class="form-group row">
						<label class="col-sm-2 col-form-label"></label>
						<div class="col-sm-3">
							<button class="btn btn-primary mt-2" type="reset"><i class="fa fa-fw fa-lg fa-undo fa-sm"></i>Reset</button>
							<button class="btn btn-primary mt-2" type="submit"><i class="fa fa-fw fa-lg fa-check-circle fa-sm"></i>Kirim</button>
						</div>
						
					</div>
                    

                </form>


            </div>
        </div>
    </div>
</div>