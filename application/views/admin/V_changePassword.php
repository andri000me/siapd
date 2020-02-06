<ol class="breadcrumb">
	        				<li class="breadcrumb-item active"><i class="fas fa-key fa-lg"></i> Change Password</li>
	     				</ol>
                <?= $this->session->flashdata('message'); ?>

                <form class="user" method="post" action="<?= base_url('C_Admin/aksiChange'); ?>">
                	<label>Password Lama</label>
                  <div class="form-group">
                  	
                    <input type="text" name="pl" class="form-control form-control-user" id="Username"  placeholder="Input password..."  required>
                    <?= form_error('pl','<small class="text-danger pl-3">','</small>');?>
                   <!--  -->
                  </div>


                  <div class="form-group">
                  	<label>Password Baru</label>
                    <input type="text" class="form-control form-control-user" id="Password" placeholder="Input Password" name="pb" required>
                    <?= form_error('pb','<small class="text-danger pl-3">','</small>'); ?>
                   </div>
                  
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Simpan
                  </button>
                  
                 
                </form>
                <hr>
