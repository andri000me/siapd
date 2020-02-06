<?= $this->session->flashdata('message'); ?>
<div class="row">

    								<!-- =============tambah data kecamatan==================== -->

    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold">Tambah Data Kecamatan</h5>
            </div>
            <div class="card-body">
                

                <form class="form-horizontal" method="post" action="<?= base_url('C_Admin/tambah_kecamatan') ?>" role="from">

                	<div class="form-group">
                        <label>Nama Kabupaten</label>
                        <select name="kode_kab" class="form-control" required>
                        	<option>---pilih Kabupaten---</option>}
                        	option
								<?php foreach($kabupaten as $k): ?>
									<option value="<?= $k->id_kab; ?>"><?= $k->nama_kab; ?> </option>
								<?php endforeach;  ?>
							</select>
                        <?= form_error('kode_kab','<small class="text-danger pl-3">','</small>'); ?>
                    </div>

                    <div class="form-group">
                        
                        <label>Kode Kecamatan</label>
                        <input class="form-control" placeholder="Enter Kode..." type="text" name="kode_kec" required>
                        <?= form_error('kode_kec','<small class="text-danger pl-3">','</small>'); ?>

                    </div>

                    

                    <div class="form-group">
                        <label>Nama Kecamatan</label>
                        <input class="form-control" placeholder="Enter Nama..." type="text" name="nama" required>
                        <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                    </div>

                    

                    <div class="modal-footer">
                        <button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    								<!-- ==============end tambah data kabupaten=============== -->

    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold">Data Kecamatan</h5>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                

                <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0" style="font-size: 16px;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Kecamatan</th>
                      <th>Nama kecamatan</th>
                      <th>nama Kabupaten</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  
                    <tbody>
                    <?php $no=1; foreach($kecamatan as $k): ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $k->kode_kec; ?></td>
                          <td><?= $k->nama_kec; ?></td>
                          <td><?= $k->nama_kab; ?></td>
                          <td align="center">
                            <a href="#"  data-toggle="modal" data-target="#modal_edit<?= $k->id_kec;?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="#"  data-toggle="modal" data-target="#modal_hapus<?php echo $k->id_kec;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-xs"></i></a>
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

    								<!-- edit modal -->
<?php foreach($kecamatan as $k):  ?>
<div class="modal fade" id="modal_edit<?= $k->id_kec;?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">Edit Kecamatan</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?= base_url('C_Admin/edit_kecamatan'); ?>">

                	<input type="hidden" name="id_kab" value="<?= $k->id_kab; ?>" disabled>
                	
                    <div class="form-group">
                        <label>Kode Kecamatan</label>
                        <input type="hidden" name="id" value="<?= $k->id_kec; ?>">
                        <input class="form-control" placeholder="Enter text..." type="text" name="kode_kec" value="<?= $k->kode_kec; ?>">
                        <?= form_error('kode_kec','<small class="text-danger pl-3">','</small>'); ?>
                    </div> 

                    <div class="form-group">
                        <label>Nama Kecamatan</label>
                        <input class="form-control" placeholder="Enter text..." type="text" name="nama_kec" value="<?= $k->nama_kec; ?>">
                        <?= form_error('nama_kec','<small class="text-danger pl-3">','</small>'); ?>
                    </div>

                   
                    <div class="modal-footer">
                        <a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<?php endforeach; ?>

								<!-- end edit modal -->

								<!-- modal hapus -->

<?php   foreach($kecamatan as $k): ?>
<div class="modal fade" id="modal_hapus<?php echo $k->id_kec;?>"  role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="myModalLabel">Hapus Kecamatan</h5>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('C_Admin/hapus_kecamatan');?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b>Kecamatan <?php echo $k->nama_kec;?> ?</b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_kec" value="<?php echo $k->id_kec;?>">
                    <a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php   endforeach; ?>

                                    <!--END MODAL HAPUS-->
