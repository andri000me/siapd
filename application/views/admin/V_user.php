<ol class="breadcrumb">
    <li class="breadcrumb-item active"><i class="fas fa-user fa-lg"></i> Manajemen Users</li>
</ol>



<?= $this->session->flashdata('message'); ?>
<div class="row">       
       

    <div class="col-md-12">
        <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold">Data Kabupaten</h5>
            </div> -->
            
            <div class="card-body">
              <div class="table-responsive">
                <div class="btn">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                Tambah User
              </button><br>
          </div>   
                

                <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0" style="font-size: 16px;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Hak Akses</th>
                      <th>Aksi</th>
                      
                    </tr>
                  </thead>
                  
                    <tbody>
                    <?php $no=1; foreach($user as $k): ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $k->username; ?></td>
                          <td><?= md5($k->password); ?></td>
                          <td><?php if ($k->role_id == 1) {
                          	echo 'Admin';
                          }elseif($k->role_id==2){
                          	echo'Operator Desa';
                          }else{
                            echo'Operator Kelurahan';
                          }?></td>
                          <td align="center">
                            <a href="#"  data-toggle="modal" data-target="#modal_edit<?= $k->id;?>" class="btn btn-primary btn-sm"><i class="fa fa-edit fa-xs"></i></a>
                            <a href="#"  data-toggle="modal" data-target="#modal_hapus<?php echo $k->id;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-xs"></i></a>

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


<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah User</h4>

      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?= base_url('C_Admin/tambahuser'); ?>" method="post" role="from" enctype="multipart/form-data">
          <div class="box-body">
            
            <div class="form-group">
              <label  class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" name="username" class="form-control" required autofocus>
                <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="text" name="password" class="form-control" required >
                <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-3 control-label">Hak Akses</label>
              <div class="col-sm-10">
                <select class="form-control" name="hak_akses" required>
                  <option>---Pilih Akses---</option>
                  <option value="1">ADMIN</option>
                  <option value="2">OPERATOR DESA</option>
                  <option value="3">OPERATOR KELURAHAN</option>
                  
                </select>
                <?= form_error('hak_akses','<small class="text-danger pl-3">','</small>'); ?>
              </div>
            </div>

          </div> 

          <div class="modal-footer">
            <button type="submit" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>  
        
        </form>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
</div>


<?php   foreach($user as $k): ?>
<div class="modal fade" id="modal_hapus<?php echo $k->id;?>"  role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h5 class="modal-title" id="myModalLabel">Hapus User</h5>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('C_Admin/hapus_user');?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b>Kabupaten <?php echo $k->username;?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $k->id;?>">
                    <a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php   endforeach; ?>

                                    <!--END MODAL HAPUS-->

                                    <!-- edit modal -->
<?php foreach($user as $k):  ?>
<div class="modal fade" id="modal_edit<?= $k->id;?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">Edit User</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?= base_url('C_Admin/edit_user'); ?>">

                  <input type="hidden" name="id" value="<?= $k->id; ?>">
                  
                    <div class="form-group">
                        <label>Username</label>
                       
                        <input class="form-control" type="text" name="username" value="<?= $k->username; ?>">
                        <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
                    </div> 

                    <div class="form-group">
                        <label>password</label>
                        <input class="form-control" placeholder="Enter text..." type="text" name="password" value="<?= $k->password; ?>">
                        <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                    </div>

                    <div class="form-group">
                      <label>Hak Akses</label>
                    <?php if ($k->role_id == 1) {
                            echo 'Admin';
                          }elseif($k->role_id==2){
                            echo'Operator Desa';
                          }else{
                            echo'Operator Kelurahan';
                          } ?>
                        <select class="form-control" name="hak_akses" required>
                          <option value="<?=$k->role_id ?>"><?= $k->role_id; ?> (<?php if($k->role_id ==1){
                            echo'Admin';
                          }elseif ($k->role_id ==2) {
                            echo'Operator Desa';
                          }elseif ($k->role_id==3) {
                            echo'Operator Kelurahan';
                          }else{
                            echo'Operator Kabupaten';
                          } ?>)</option>
                          <option value="1">ADMIN</option>
                          <option value="2">OPERATOR DESA</option>
                          <option value="3">OPERATOR KELURAHAN</option>
                          <option value="4">OPERATOR KABUPATEN</option>
                        </select>
                        <?= form_error('hak_akses','<small class="text-danger pl-3">','</small>'); ?>
                      
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