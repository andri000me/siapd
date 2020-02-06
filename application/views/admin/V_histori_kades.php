<ol class="breadcrumb">
       
  <li class="breadcrumb-item active">
    <i class="fas fa-home fa-lg"></i> Dashboard
  </li>
  
  <li class="breadcrumb-item">
    <?php foreach($kab as $k): ?>
    <a href="javascript:window.history.go(-2)" style="text-decoration: none"><?= $k->nama_kab;?></a>
    <?php endforeach; ?>
  </li>

  <li class="breadcrumb-item">
    <?php foreach($kab as $k): ?>
    <a href="javascript:window.history.go(-1)" style="text-decoration: none;"><?= $k->nama_kec ?></a>
    <?php endforeach; ?>
  </li>

  <li class="breadcrumb-item">
    <?php foreach($kab as $k): ?>
    <a href="javascript:window.history.go(-1)" style="text-decoration: none;"><?= $k->nama_desa ?></a>
    <?php endforeach; ?>
  </li>

  <li class="breadcrumb-item">
    <?php foreach($kab as $k): ?>
    	Histori Kepala Desa <?= $k->nama_desa ?>
    
    <?php endforeach; ?>
  </li>
       
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
