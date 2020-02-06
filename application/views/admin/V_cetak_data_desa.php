
<div class="card shadow mb-4">
	<div class="card-header py-3">
      <h5 class="m-0 font-weight-bold">Cetak Data Aparatur </h5>
  </div>

  <div class="card-body">

           <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Per Kabupaten</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Per Kecamatan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Per kelurahan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="desa-tab" data-toggle="tab" href="#desaaa" role="tab" aria-controls="desa" aria-selected="false">Per Desa</a>
              </li>
            </ul>

            <div class="tab-content" id="myTabContent">
<!-- ================================== perkabupaten ===============================-->
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><br>
                <div class="col-md-6">
                  <form class="form-horizontal" id="form1" method="post" action="<?= base_url('C_Cetak/perkabupaten') ?>" role="from" >

                      <div class="form-group">
                          <!-- <label>Nama Kabupaten</label> -->
                          <select name="id_kab" class="form-control" required>
                              <option value="">---pilih Kabupaten / Kota---</option>
                              option
                                  <?php foreach($kabupaten as $k): ?>
                                      <option  value="<?= $k->id_kab; ?>"><?= $k->nama_kab; ?> </option>
                                  <?php endforeach;  ?>
                            </select>
                          <?= form_error('id_kab','<small class="text-danger pl-3">','</small>'); ?>
                      </div>


                      <div class="form-group">
                        <select name="opsi" id="opsi"  class="form-control" onchange="show()" required>
                            <option>---pilih Kelurahan atau Desa---</option>
                            <option value="kelurahan">Kelurahan</option>
                            <option value="desa">Desa</option>
                        </select>
                          <?= form_error('opsi','<small class="text-danger pl-3">','</small>'); ?>
                      </div>

                      <div class="form-group" >
                        <select name="jabatan" class="form-control" id="tampil" required>
                          <option>---Pilih jabatan---</option>
                        </select>
                      </div>  
                      
                    
                      <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" value="Cetak">
                      </div>
                  </form>
                </div>                     
              </div>
<!-- ================================== perkecamatan ===============================-->
                                            
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><br>
                <div class="col-md-6">
                  <form class="form-horizontal" id="form2" method="post" action="<?= base_url('C_Cetak/perkecamatan') ?>" role="from">

                    <div class="form-group">
                      
                        <select name="id_kab" class="form-control" id="kabupaten" required>
                          <option value="">---pilih Kabupaten---</option>
                          option
                          <?php foreach($kabupaten as $k): ?>
                            <option <?= $kab_selected == $k->id_kab ? 'selected="selected"' :'' ?> value="<?= $k->id_kab; ?>"><?= $k->nama_kab; ?> </option>
                          <?php endforeach;  ?>
                        </select>
                        <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                    </div>

                    <div class="form-group">
                      
                        <select name="id_kec" class="form-control" id="kecamatan">
                          <option value="">---pilih Kecamatan---</option>
                          
                        <?php foreach($kecamatan as $k): ?>
                          <option <?= $kec_selected == $k->id_kab ? 'selected="selected"' :'' ?> class="<?= $k->id_kab ?>" value="<?= $k->id_kec; ?>"><?= $k->nama_kec; ?> </option>
                        <?php endforeach;  ?>
                      </select>
                        <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select name="opsi" class="form-control" onchange="showw()">
                            <option>---Pilih Kelurahan / Desa---</option>
                            <option value="kelurahan">Kelurahan</option>
                            <option value="desa">Desa</option>
                        </select>
                          <?= form_error('opsi','<small class="text-danger pl-3">','</small>'); ?>
                      </div>

                      <div class="form-group" >
                        <select name="jabatan" class="form-control" id="tampil1" required>
                          <option>---Pilih jabatan---</option>
                        </select>
                      </div>              

                      <div class="form-group">
                          <input type="submit" class="form-control btn btn-primary " value="Cetak">
                      </div>

                  </form>
                </div>
              
              </div>                                                                                                                 

<!-- ================================== perkelurahan ===============================-->

              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><br>
                <div class="col-md-6">
                  <form class="form-horizontal" method="post" action="<?= base_url('C_Cetak/perkelurahan') ?>" role="from">
<!-- 
                    <div class="form-group">
                      <select name="id_kab" id="kab" class="form-control">
                        <option value="">Pilih Kabupaten</option>
                        <?php 
                          foreach ($kabupatenn as $k) {
                            echo'<option value="'.$k->id_kab.'">'.$k->nama_kab.'</option>';
                          }
                         ?>
                      </select>
                      
                    </div>

                    <div class="form-group">
                      <select name="id_kec" id="kec" class="form-control">
                        <option value="">Pilih Kecamatan</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <select name="id_kel" id="kel" class="form-control">
                        <option value="">Pilih Kelurahan</option>
                      </select>
                    </div> -->
                     <div class="form-group">
                        
                        <select name="id_kab" class="form-control" id="kabupaten1" required>
                          <option value="">---pilih Kabupaten---</option>
                          option
                          <?php foreach($kabupaten as $k): ?>
                            <option <?= $kab_selected == $k->id_kab ? 'selected1="selected1"' :'' ?> value="<?= $k->id_kab; ?>"><?= $k->nama_kab; ?> </option>
                          <?php endforeach;  ?>
                        </select>
                        <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                    </div>

                    <div class="form-group">
                      
                        <select name="id_kec" class="form-control" id="kecamatan1">
                          <option value="">---pilih Kecamatan---</option>
                          
                        <?php foreach($kecamatan as $k): ?>
                          <option <?= $kec_selected == $k->id_kab ? 'selected1="selected1"' :'' ?> class="<?= $k->id_kab ?>" value="<?= $k->id_kec; ?>"><?= $k->nama_kec; ?> </option>
                        <?php endforeach;  ?>
                      </select>
                        <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                    </div>

                    <div class="form-group">
                      
                        <select name="id_kel" class="form-control" id="kelurahan1">
                          <option value="">---pilih Kelurahan---</option>
                          
                        <?php foreach($kelurahan as $k): ?>
                          <option <?= $kel_selected == $k->id_kel ? 'selected1="selected1"' :'' ?> class="<?= $k->id_kec ?>" value="<?= $k->id_kel; ?>"><?= $k->nama_kelurahan; ?> </option>
                        <?php endforeach;  ?>
                      </select>
                        <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                    </div> 

                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary " value="Cetak">
                    </div>

                  </form>
                </div>

              </div>

              <!-- ================================== perDesa ===============================-->

              <div class="tab-pane fade" id="desaaa" role="tabpanel" aria-labelledby="desa-tab"><br>
                <div class="col-md-6">
                  <form class="form-horizontal" method="post" action="<?= base_url('C_Cetak/perdesa') ?>" role="from">

                    <div class="form-group">
                        <!-- <label>Nama Kabupaten</label> -->
                        <select name="id_kab" class="form-control" id="kabupaten2" required>
                          <option value="">---pilih Kabupaten---</option>
                          option
                          <?php foreach($kabupaten as $k): ?>
                            <option <?= $kab_selected == $k->id_kab ? 'selected2="selected2"' :'' ?> value="<?= $k->id_kab; ?>"><?= $k->nama_kab; ?> </option>
                          <?php endforeach;  ?>
                        </select>
                        <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                    </div>

                    <div class="form-group">
                      
                        <select name="id_kec" class="form-control" id="kecamatan2">
                          <option value="">---pilih Kecamatan---</option>
                          
                        <?php foreach($kecamatan as $k): ?>
                          <option <?= $kec_selected == $k->id_kab ? 'selected2="selected2"' :'' ?> class="<?= $k->id_kab ?>" value="<?= $k->id_kec; ?>"><?= $k->nama_kec; ?> </option>
                        <?php endforeach;  ?>
                      </select>
                        <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                    </div>

                    <div class="form-group">
                      
                        <select name="id_desa" class="form-control" id="desa2">
                          <option value="">---pilih Desa---</option>
                          
                        <?php foreach($desa as $k): ?>
                          <option <?= $desa_selected == $k->id_desa ? 'selected2="selected2"' :'' ?> class="<?= $k->id_kec ?>" value="<?= $k->id_desa; ?>"><?= $k->nama_desa; ?> </option>

                        <?php endforeach;  ?>
                      </select>
                        <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary " value="Cetak">
                    </div>

                  </form>
                </div>

              </div>
            </div>
  </div>
</div>

