<div class="container-fluid">
      <ol class="breadcrumb">
        <!-- <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li> -->
          
        <li class="breadcrumb-item active"><i class="fas fa-home fa-lg"></i> Dashboard</li>
      </ol>
          
    <div class="row">
      	<?php foreach($kabupaten as $k): ?>
        
        <div class="col-xl-3 col-md-6 mb-4">
          	<div class="card border-left-primary shadow h-100 py-2">
            	<div class="card-body">
              		<div class="row no-gutters align-items-center">
		                <div class="col mr-2">
		                 	<div class="text-md font-weight-bold text-primary text-uppercase mb-2"><?= $k->nama_kab	; ?>
		                  	</div>
		                </div>
               		</div>
               		
               		<!-- <p style="font-size: 12px;margin-bottom: 10px;">Jumlah Kecamatan :<?= $jml_kec_inhil; ?></p>
               		<p style="font-size: 12px;margin-bottom: 10px;margin-top: -10px;">Jumlah Desa :</p> -->

	            	<div class="my-2">          
	                	<a href="<?= base_url('C_admin/monitoring_kab/'.$k->id_kab); ?>" class="btn btn-light btn-icon-split btn-sm">
		                    <span class="icon text-white">
		                      <i class="fas fa-info-circle"></i>
		                    </span>
		                    <span class="text">View Detail</span>
	              		</a>
	              	</div>
            	</div>
          	</div>
        </div>

    	<?php endforeach ?>

    </div>
 </div>