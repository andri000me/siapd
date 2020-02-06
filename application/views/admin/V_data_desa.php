<div class="container-fluid"> 
		<div class="panel-body">
				<ol class="breadcrumb">
	        				<li class="breadcrumb-item active"><i class="fas fa-home fa-lg"></i> Data Desa</li>
	     				</ol>
  
					    <div class="row">
					      	<?php foreach($kabupaten as $k): ?>
					        
					        <div class="col-xl-3 col-md-6 mb-4">
					          	<div class="card border-left-primary shadow">
					            	<div class="card-body">
					              		<div class="row no-gutters align-items-center">
							                <div class="col mr-2">
							                 	<div class="text-md font-weight-bold text-primary text-uppercase mb-2"><?= $k->nama_kab	; ?>
							                  	</div>
							                </div>
					               		</div>
					               		
					               		
						            	<div class="my-2">          
						                	<a href="<?= base_url('C_FrontPage/monitoring_kab/'.$k->id_kab); ?>" class="btn btn-light btn-icon-split btn-sm">
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
 
</div>

    



