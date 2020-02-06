<?= $this->session->flashdata('message'); ?>
<div class="row">
    <!-- tambah data kabupaten -->
    <div class="col-md-4">
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold">Tambah Data Kabupaten</h5>
            </div>

            <div class="card-body">
                
                <form class="form-horizontal" method="post" action="<?= base_url('C_Admin/tambah_kabupaten') ?>" role="from">
                    <div class="form-group">
                        
                        <label>Kode Kab/Kota</label>
                        <input class="form-control" placeholder="Enter Kode..." type="text" name="kode" required>
                        <?= form_error('kode','<small class="text-danger pl-3">','</small>'); ?>

                    </div>

                    <div class="form-group">
                        <label>Nama Kab/kota</label>
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
    <!-- end tambah data kabupaten -->


    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold">Data Kabupaten</h5>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                

                <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0" style="font-size: 16px;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Kabupaten/Kota</th>
                      <th>Nama Kabupaten/Kota</th>
                      <th>Aksi</th>
                      
                    </tr>
                  </thead>
                  
                    <tbody>
                    <?php $no=1; foreach($kabupaten as $k): ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $k->kode_kab; ?></td>
                          <td><?= $k->nama_kab; ?></td>
                          <td align="center">
                            <a href="#"  data-toggle="modal" data-target="#modal_edit<?= $k->id_kab;?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="#"  data-toggle="modal" data-target="#modal_hapus<?php echo $k->id_kab;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-xs"></i></a>
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
<?php foreach($kabupaten as $k):  ?>
<div class="modal fade" id="modal_edit<?= $k->id_kab;?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header"> 
                <h4 class="modal-title">Edit Kabupaten</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?= base_url('C_Admin/edit_kabupaten'); ?>">
                    <div class="form-group">
                        <label>Kode Kab/Kota</label>
                        <input type="hidden" name="id" value="<?= $k->id_kab; ?>">
                        <input class="form-control" placeholder="Enter text..." type="text" name="kode" value="<?= $k->kode_kab; ?>">
                        <?= form_error('kode','<small class="text-danger pl-3">','</small>'); ?>
                    </div> 

                    <div class="form-group">
                        <label>Nama Kab/kota</label>
                        <input class="form-control" placeholder="Enter text..." type="text" name="nama" value="<?= $k->nama_kab; ?>">
                        <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
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

<?php   foreach($kabupaten as $k): ?>
<div class="modal fade" id="modal_hapus<?php echo $k->id_kab;?>"  role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h5 class="modal-title" id="myModalLabel">Hapus Kabupaten</h5>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('C_Admin/hapus_kabupaten');?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b>Kabupaten <?php echo $k->nama_kab;?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $k->id_kab;?>">
                    <a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php   endforeach; ?>

                                    <!--END MODAL HAPUS-->
