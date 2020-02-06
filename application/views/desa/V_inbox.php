<ol class="breadcrumb">
  <li class="breadcrumb-item active"><i class="fas fa-paper-plane fa-lg"> </i>&nbsp;&nbsp;&nbsp;INBOX</li>
</ol>

<?= $this->session->flashdata('message'); ?>

<div class="row">
 	<div class="col-md-12">
        <div class="card shadow mb-4">
           	<div class="card-body">
            	<div class="row">
					<div class="col-md-12 ">

						<!-- <a href="<?= base_url('C_PerangkatDesa/tambah_pesan'); ?>" class="btn btn-primary btn-sm mb-2 "> --><!-- <i class="fas fa-plus">  --><!-- Pesan --><!-- </i> --><!-- </a> -->
              		<div class="table-responsive mt-3">
                    
                    <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0" style="font-size: 16px;">
		                <thead>
		                	<tr>
		                      	<th>No</th>
		                      	<th>Isi</th>
		                      	<th >Tgl Terima</th>
		                      	
		                      	<!-- <th >Aksi</th> -->
		                      	
	                       	</tr>
	                  	</thead>
	                  
                    	<tbody>
		                  <?php $no=1; foreach($pesan as $p): ?> 
		                        <tr>
		                          <td><?= $no++; ?></td>
		                          <td><?= $p->balas; ?></td>
		                         
		                          <td><?= $p->tanggal_balas; ?></td>
		                          <!-- <td align="center"><?php if ($p->status == '0') : ?>
		                          	<a class="btn btn-success btn-sm" href="<?= base_url('C_Admin/konfirmasi_pesan/') ?><?= $p->id ?>" data-toggle="tooltip" title="Konfirmasi Telah Diterima"><i class="fa fa-lg fa-check fa-sm"></i></a>
		                          	
		                          <?php else: ?>
		                          	<a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_balas<?= $p->id;?>" >Balas</a>
		                          <?php endif ?></td> -->
		                         
		                        </tr>
		                  <?php endforeach ?> 
                    	</tbody>
                	</table>
              		</div>
              		</div>
				</div>
            </div>
        </div>
    </div>
</div>

<?php foreach($pesan as $p):  ?>
<div class="modal fade" id="modal_balas<?= $p->id;?>" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Balas</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" method="post" action="<?= base_url('C_Admin/balas_pesan'); ?>">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Isi</label>
						<div class="col-sm-6">
							<input type="hidden" name="id" value="<?=$p->id; ?>">
							<textarea name="isi" rows="6" cols="80" value="<?= set_value('isi');?>"></textarea>
							<?= form_error('isi','<small class="text-danger pl-3">','</small>'); ?>
							
						</div>
					</div>
										
					

					<div class="form-group">
						<a class="btn btn-warning float-center " href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;
						<button class="btn btn-primary float-center" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;
						
					</div>

				</form>
			</div>

		</div>
	</div>
</div>
<?php endforeach; ?>





