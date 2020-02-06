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
       
</ol>



<div class="col-md-12">
        <div class="card shadow mb-2">
            <div class="col-xl-12 col-md-12 mb-2 mt-2">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Kelurahan</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jumlah; ?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?=$jumlah; ?>%"  aria-valuemin="0" aria-valuemax="10000"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                

                <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0" style="font-size: 16px;">
                  <thead>
                    <tr>
                      <th width="30px">#</th>
                      <th style="text-align:center">Nama Kelurahan</th>
                      <th align="center">Aksi</th>
                     
                    </tr>
                  </thead>
                  
                    <tbody>
                    <?php $no=1; foreach($monitoring_kelurahan as $k): ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td style="text-align:center"><?= $k->nama_kelurahan; ?></td>
                          <td align="center">
                                <a href="<?= base_url('C_FrontPage/monitoring_lihat_data_kelurahan/'.$k->id_kel); ?>" class="btn btn-info btn-sm">Detail Data</a>

                                 <a href="<?= base_url('C_FrontPage/monitoring_histori_lurah/'.$k->id_kel); ?>" class="btn btn-success btn-sm">Histori Lurah</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
              </div>
            </div>
        </div>
</div>