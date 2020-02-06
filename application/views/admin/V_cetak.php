<div class="card shadow mb-4">
	<div class="card-header py-3">
                <h5 class="m-0 font-weight-bold">Cetak Daftar Hadir</h5>
    </div>
<div class="card-body">
	<div class="col-md-4">
		
	
	<form class="form-horizontal" method="post" action="<?= base_url('C_Cetak/cetak_daftar_hadir') ?>" role="from">

                	<div class="form-group">
                        <label>Nama Kabupaten</label>
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
                        <label>Nama Kecamatan</label>
                        <select name="id_kec" class="form-control" id="kecamatan">
                        	<option value="">---pilih Kecamatan---</option>
                        	
								<?php foreach($kecamatan as $k): ?>
									<option <?= $kec_selected == $k->id_kab ? 'selected="selected"' :'' ?> class="<?= $k->id_kab ?>" value="<?= $k->id_kec; ?>"><?= $k->nama_kec; ?> </option>
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