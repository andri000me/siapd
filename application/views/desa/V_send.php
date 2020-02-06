<ol class="breadcrumb">
  <li class="breadcrumb-item active"><i class="fas fa-paper-plane fa-lg"> </i>&nbsp;&nbsp;&nbsp;Kirim Pesan</li>
</ol>

<?= $this->session->flashdata('message'); ?>

<div class="row">
 	<div class="col-md-12">
        <div class="card shadow mb-4">
           	<div class="card-body">
            	<div class="row">
					<div class="col-md-12 ">

						<a href="<?= base_url('C_PerangkatDesa/tambah_pesan'); ?>" class="btn btn-primary btn-sm mb-2 "><!-- <i class="fas fa-plus">  -->Tulis Pesan<!-- </i> --></a>
              		<div class="table-responsive mt-3">
                    
                    <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0" style="font-size: 16px;">
		                <thead>
		                	<tr>
		                      	<th width="30px">No</th>
		                      	<th width="170px">perihal</th>
		                      	<th>Isi</th>
		                      	<th width="170px">Tgl Kirim</th>
		                      	<th width="100px">Status</th>
		                      	
	                       	</tr>
	                  	</thead>
	                  
                    	<tbody>
		                  <?php $no=1; foreach($send as $p): ?> 
		                        <tr>
		                          <td><?= $no++; ?></td>
		                          <td class="text-uppercase"><?= $p->perihal; ?></td>
		                          <td class="text-uppercase"><?= $p->isi; ?> </td>
		                          <td class="text-uppercase"><?= $p->tanggal; ?></td>
		                          <td class="text-uppercase"><?php if ($p->status==0) {
		                          	echo'Terkirim';
		                          }else{
		                          	echo'Diterima';
		                          } ?></td>
		                         
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





