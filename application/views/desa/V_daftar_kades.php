
<ol class="breadcrumb">
	<li class="breadcrumb-item">
    <a href="<?= base_url('C_PerangkatDesa'); ?>" style="text-decoration: none"><i class="fas fa-city fa-lg"> </i>&nbsp;&nbsp;&nbsp;Data Aparatur Desa</a>
  </li>
  <li class="breadcrumb-item active">Data Kepala Desa Periode Lalu</li>
</ol>

<div class="row">
 	<div class="col-md-12">
        <div class="card shadow mb-4">
           	<div class="card-body">
            	<div class="row">
					<div class="col-md-12 ">
						
              		<div class="table-responsive mt-3">
                    <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0" style="font-size: 16px;">
		                <thead>
		                	<tr>
		                      	<th>No</th>
		                      	<th>Nama</th>
		                      	<th>periode</th>
		                      	<th>TTL</th>
		                      	<!-- <th>Aksi</th> -->
	                       	</tr>
	                  	</thead>
	                  
                    	<tbody>
		                  <?php $no=1; foreach($kades as $p): ?> 
		                        <tr>
		                          <td><?= $no++; ?></td>
		                          <td class="text-uppercase"><?= $p->nama; ?></td>
		                          <td class="text-uppercase"><?= $p->tgl_pelantikan ?> sampai <?= $p->akhir_jabatan; ?> </td>
		                          <td class="text-uppercase"><?= $p->tempat_lahir; ?> , <?= $p->tgl_lahir; ?> </td>
		                         
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
