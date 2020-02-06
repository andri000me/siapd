<ol class="breadcrumb">
  <li class="breadcrumb-item active"><i class="fas fa-city fa-lg"> </i> &nbsp;&nbsp;&nbsp;Data Aparatur Kelurahan</li>
</ol>


	<?= $this->session->flashdata('message'); ?>
<div class="row">
 	<div class="col-md-12">
        <div class="card shadow mb-4">
           	<div class="card-body">
            	<div class="row">
					<div class="col-md-12 ">
						<a href="<?= base_url('C_PerangkatKelurahan/tambah_data'); ?>" class="btn btn-primary btn-sm mb-2 "><!-- <i class="fas fa-plus">  -->Tambah Data<!-- </i> --></a>
						<a href="<?= base_url('C_PerangkatKelurahan/cetak_data'); ?>" class="btn btn-success btn-sm mb-2 "><!-- <i class="fas fa-print">  -->Cetak Data<!-- </i> --></a>
						<a href="<?= base_url('C_PerangkatKelurahan/daftar_lurah'); ?>" class="btn btn-info btn-sm mb-2 "><!-- <i class="fas fa-print"> --> Daftar Pejabat <!-- </i> --></a>
						
	     
	     
              
              		<div class="table-responsive mt-3">
                    <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0" style="font-size: 16px;">
		                <thead>
		                	<tr>
		                      	<th>No</th>
		                      	<th>Nama</th>
		                      	<th>Jabatan</th>
		                      	<th>Aksi</th>
	                       	</tr>
	                  	</thead>
	                  
                    	<tbody>
		                  <?php $no=1; foreach($perangkat as $p): ?> 
		                        <tr>
		                          <td><?= $no++; ?></td>
		                          <td class="text-uppercase"><?= $p->nama; ?></td>
		                          <td class="text-uppercase"><?= $p->jabatan ?></td>
		                          <td align="center">
		                          	<a href="#"  data-toggle="modal" data-target="#modal_view<?php echo $p->id;?>" class="btn btn-success btn-sm mt-1"><!-- <i class="fa fa-eye fa-xs"></i> -->Detail</a>
		                            <a href="<?= base_url('C_PerangkatKelurahan/edit_perangkat/'.$p->id); ?>"  class="btn btn-info btn-sm mt-1"><!-- <i class="fa fa-edit fa-xs"></i> -->Edit</a>
		                            <a href="#"  data-toggle="modal" data-target="#modal_hapus<?php echo $p->id;?>" class="btn btn-danger btn-sm mt-1"><!-- <i class="fa fa-trash fa-xs"></i> -->Hapus</a>
		                            <!-- <a href="#"  class="btn btn-warning btn-sm mt-1" tooltip="sdfsf"><i class="fa fa-cog fa-xs"></i>Ganti Aparatur</a> -->
		                          </td>
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

<!-- modal detail -->
<?php foreach($perangkat as $p):  ?>
<div class="modal fade" id="modal_view<?= $p->id;?>" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"> 
                <h4 class="modal-title" >BIODATA</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group row">
						<p class="col-sm-2">Jabatan</p>
						<div class="col-sm-6">
							<p class="text-uppercase">:&nbsp;&nbsp;&nbsp;<?= $p->jabatan; ?>	</p>
						</div>
					</div>
                    
                    <div class="form-group row">
						<p class="col-sm-2">Nama</p>
						<div class="col-sm-6">
							<p class="text-uppercase">:&nbsp;&nbsp;&nbsp;<?= $p->nama; ?>	</p>
						</div>
					</div>

					<div class="form-group row">
						<p class="col-sm-2">NIP</p>
						<div class="col-sm-6">
							<p>:&nbsp;&nbsp;&nbsp;<?= $p->nip; ?>	</p>
						</div>
					</div>
					<div class="form-group row">
						<p class="col-sm-2">Tempat Lahir</p>
						<div class="col-sm-6">
							<p class="text-uppercase">:&nbsp;&nbsp;&nbsp;<?= $p->tempat_lahir; ?>	</p>
						</div>
					</div>
					<div class="form-group row">
						<p class="col-sm-2">Tgl Lahir</p>
						<div class="col-sm-6">
							<p>:&nbsp;&nbsp;&nbsp;<?= $p->tanggal_lahir; ?>	</p>
						</div>
					</div>
					<div class="form-group row">
						<p class="col-sm-2">Jenis Kelamin</p>
						<div class="col-sm-6">
							<p>:&nbsp;&nbsp;&nbsp;<?= $p->jk; ?>	</p>
						</div>
					</div>
					<div class="form-group row">
						<p class="col-sm-2">Pendidikan</p>
						<div class="col-sm-6">
							<p>:&nbsp;&nbsp;&nbsp;<?= $p->pendidikan; ?>	</p>
						</div>
					</div>
					<div class="form-group row">
						<p class="col-sm-2">Masa Jabatan</p>
						<div class="col-sm-6">
							<p class="text-uppercase">:&nbsp;&nbsp;&nbsp;<?= $p->tanggal_pelantikan; ?> sampai <?= $p->masa_akhir_jabatan ?>	</p>
						</div>
					</div>
					<div class="form-group row">
						<p class="col-sm-2">No HP</p>
						<div class="col-sm-6">
							<p>:&nbsp;&nbsp;&nbsp;<?= $p->no_hp; ?>	</p>
						</div>
					</div>

                   
                    <div class="modal-footer">
                        <a class="btn btn-primary icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- end modal detail -->


<?php   foreach($perangkat as $p): ?>
<div class="modal fade" id="modal_hapus<?php echo $p->id;?>"  role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="myModalLabel">Hapus Data</h5>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('C_PerangkatKelurahan/hapus_perangkat');?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus ?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $p->id;?>">
                    <a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php   endforeach; ?>

