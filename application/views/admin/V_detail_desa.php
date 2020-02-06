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
    	 <?= $k->nama_desa ?>
    
    <?php endforeach; ?>
  </li>
       
</ol>


<div class="row">
	<div class="col-md-12">
        <div class="card shadow mb-2">
            
            
            <div class="card-body">
              <div class="table-responsive">
                

                <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0" style="font-size: 16px;">
                  <thead>
                    <tr>
                      <th width="30px">No</th>
                      <th width="30px">Nama</th>
                      <th>NIP</th>
                      <th>Jabatan</th>
                      <th>JK</th>
                      <th>Pendidikan</th>
                      <th>TTL</th>
                      <th>Masa jabatan</th>
                      <?php if ($this->session->userdata('role_id')==1): ?>
                            <th>No HP</th> 
                      <?php else: ?>  
                      <?php endif ?>
                                          
                    </tr>
                  </thead>
                  
                    <tbody>
                    <?php $no=1; foreach($monitoring_desa as $k): ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $k->nama; ?></td>
                          <td><?= $k->nip; ?></td>
                          <td><?= $k->jabatan; ?></td>
                          <td><?= $k->jk; ?></td>
                          <td><?= $k->pendidikan; ?></td>
                          <td><?= $k->tempat_lahir; ?>, <?= $k->tanggal_lahir; ?></td>
                          <td><?= $k->tanggal_pelantikan; ?> sampai <?= $k->masa_akhir_jabatan; ?></td>
                          <?php if ($this->session->userdata('role_id')==1): ?>
                            <td><?= $k->no_hp; ?></td>
                          <?php else: ?>  
                          <?php endif ?>
                          
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
              </div>
            </div>
        </div>
</div>	
</div>
