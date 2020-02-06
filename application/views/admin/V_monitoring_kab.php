<ol class="breadcrumb">
       
        <li class="breadcrumb-item active">
        	<i class="fas fa-home fa-lg"></i> Dashboard
        </li>
        
        <li class="breadcrumb-item">
        	<?php foreach($kab as $k): ?>
				<a href="javascript:window.history.go(-1)" style="text-decoration: none"><?= $k->nama_kab;?></a>
			<?php endforeach; ?>
        </li>

       
</ol>
          
<div class="row mt-2">
	
	<div class="col-xl-4 col-lg-4">
      	<div class="card shadow mb-4">
	        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	          <h6 class="m-0 font-weight-bold" ">Info Data</h6>
	        </div>
	        
	        <div class="card-body">
	        		
	          	<div class="chart-pie pt-4 pb-2">
	            	<canvas id="myPieChart1"></canvas>
	          	</div>
		        <div class="mt-4 text-center small">
		        	
		            <span class="mr-2">
		              <i class="fas fa-circle text-success"></i> Jml Desa
		            </span>

		            <span class="mr-2">
		              <i class="fas fa-circle text-primary"></i> Jml Kecamatan
		            </span>

		            <span class="mr-2">
		              <i class="fas fa-circle text-info"></i> Jml Kelurahan
		            </span>
		            
		        </div>
	        </div>
	    </div>
	</div>
	        
	<div class="col-xl-8">
	    <div class="card shadow mb-4"> 
	      	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	            <h6 class="m-0 font-weight-bold" ">Data Kecamatan</h6>
	        </div>  
	        <div class="card-body">
	          	<div class="table-responsive">
	            	<table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0" style="font-size: 16px;">
			            <thead>
			                <tr>
			            	    <th width="30px">No</th>
			                	<th style="text-align:center">Nama Kecamatan</th>
			                  	<!-- <th>Jumlah Desa</th> -->
			                  	<th style="text-align:center">Aksi</th>
			                </tr>
			            </thead>
	              
		                <tbody>
			                <?php $no=1; foreach($monitoring_kab as $k): ?>
			                    <tr>
				                    <td><?= $no++; ?></td>
			                      	<td style="text-align:center"><?= $k->nama_kec; ?></td>
			                    	<!-- <td><?= $jumlah; ?></td> -->
				                    <td align="center">
				                        <a href="<?= base_url('C_admin/monitoring_kec/'.$k->id_kec); ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"> Lihat Desa</i></a>
				                        <a href="<?= base_url('C_admin/monitoring_kec1/'.$k->id_kec); ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"> Lihat Kelurahan</i></a>
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