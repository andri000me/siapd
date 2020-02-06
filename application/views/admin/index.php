<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIPDesKel</title>

  <link href="<?= base_url('assets/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  

</head>

<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
         <!--  <i class="fas fa-laugh-wink"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3">SIPDesKel</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <?php if ($this->session->userdata('role_id')==1): ?>
            
      <!-- Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('C_Admin'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Monitoring</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Data Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('C_Admin/kabupaten') ?>">Kabupaten</a>
            <a class="collapse-item" href="<?= base_url('C_Admin/Kecamatan'); ?>">Kecamatan</a>
            <a class="collapse-item" href="<?= base_url('C_Admin/desa'); ?>">Desa</a>
            <a class="collapse-item" href="<?= base_url('C_Admin/kelurahan'); ?>">Kelurahan</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('C_Admin/Manajemen_user'); ?>">
          <i class="fas fa-fw fa-user-alt"></i>
          <span>Manajemen Users</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('C_Cetak/cetak_data_aparatur_desa'); ?>">
          <i class="fas fa-fw fa-print"></i>
          <span>Cetak Aparatur</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('C_Admin/changePassword'); ?>">
         <i class="fas fa-fw fa-key"></i>
          <span>Change Password</span>
        </a>
      </li>

      

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span>
        </a>
      </li>

      <?php elseif ($this->session->userdata('role_id')==2):?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('C_Admin'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Monitoring</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('C_PerangkatDesa'); ?>">
          <i class="fas fa-fw fa-list-alt"></i>
          <span>Perangkat Desa</span></a>
        </li>

        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-paper-plane"></i>
          <span>Pesan</span>
        </a>
        <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('C_PerangkatDesa/send') ?>">Tulis</a>
            <a class="collapse-item" href="<?= base_url('C_perangkatDesa/inbox'); ?>">inbox</a>
            <!-- <a class="collapse-item" href="<?= base_url('C_Admin/desa'); ?>">Send</a> -->
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('C_Admin/changePassword'); ?>">
         <i class="fas fa-fw fa-key"></i>
          <span>Change Password</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span>
        </a>
      </li>

      <?php elseif ($this->session->userdata('role_id')==3):?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('C_Admin'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Monitoring</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('C_PerangkatKelurahan'); ?>">
          <i class="fas fa-fw fa-list-alt"></i>
          <span>Perangkat Kelurahan</span></a>
        </li>

        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-paper-plane"></i>
          <span>Pesan</span>
        </a>
        <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('C_PerangkatDesa/send') ?>">Tulis</a>
            <a class="collapse-item" href="<?= base_url('C_perangkatDesa/inbox'); ?>">inbox</a>
            <!-- <a class="collapse-item" href="<?= base_url('C_Admin/desa'); ?>">Send</a> -->
          </div>
        </div>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="<?= base_url('C_Admin/changePassword'); ?>">
         <i class="fas fa-fw fa-key"></i>
          <span>Change Password</span>
        </a>
      </li>

      

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span>
        </a>
      </li>
    <?php else: ?>
    <?php endif ;?>
      <!-- DATA MASTER -->
      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <?php 
            $id=$this->session->userdata('id_desa');
            $nama=$this->db->query("SELECT * FROM kelurahan WHERE id_kel='$id'")->row_array();
            $nd=$this->db->query("SELECT * FROM desa WHERE id_desa='$id'")->row_array();
          ?>

          <?php if ($this->session->userdata('role_id')==3):?>
            <b><p style="text-transform: uppercase;font-size: 20px;color: blue;margin-left: 400px;font-family: proggy;">SELAMAT DATANG DI KELURAHAN <?=$nama['nama_kelurahan'] ?></p></b>

          <?php elseif($this->session->userdata('role_id')==2): ?>
            <b><p style="text-transform: uppercase;font-size: 20px;color: blue;margin-left: 400px;font-family: proggy;">SELAMAT DATANG DI DESA <?=$nama['nama_desa'] ?></p></b>
          <?php else: ?>
            <b><p style="text-transform: uppercase;font-size: 20px;color: blue;margin-left: 400px;font-family: proggy;">SELAMAT DATANG ADMIN</p></b>

          <?php endif; ?>




          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Messages -->
            <?php if ($this->session->userdata('role_id')==1): ?>
              <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="<?= base_url('C_Admin/pesann'); ?>" >
                  <i class="fas fa-envelope fa-fw"></i>
                  <?php if($info!=0): ?>
                    <span class="badge badge-danger badge-counter"><?= $info; ?></span>
                  <?php else: ?>
                    
                  <?php endif; ?>
                    <!-- <span class="badge badge-danger badge-counter"><?= $info; ?></span> -->
                </a>
              </li>
             <!--  -->
            <?php endif ?>
            

            <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

            <!-- Nav Item - User Information -->
            

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid"> 
          <?php $this->load->view($main_view); ?>
        </div>

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
    		<div class="container my-auto">
    		  <div class="copyright text-center my-auto">
    		    <span>Copyright &copy; Your Website <?= date('Y'); ?></span>
    		  </div>
    		</div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Mau Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih 'Logout' Jika Anda Ingin Keluar Dari Sistem Ini</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('C_Login/logout') ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
 <!--  <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script> -->
  <script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
 <script src="<?= base_url('assets/'); ?>js/jquery.validate.js"></script>
 <!-- <script src="<?= base_url('assets/'); ?>js/Chart.min.js"></script> -->
  <!-- pilih selected -->
  <script src="<?= base_url('assets/'); ?>js/jquery.chained.min.js"></script>

  <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
  </script>


  <script>
    $("#kecamatan").chained("#kabupaten"); // disini kita hubungkan kecamatan dengan kabupaten
    $("#kelurahan").chained("#kecamatan");
    $("#desa").chained("#kecamatan"); // disini kita hubungkan desa dengan kecamatan
    

  </script>

  <script>
     $("#kecamatan1").chained("#kabupaten1"); // disini kita hubungkan kecamatan dengan kabupaten
    $("#kelurahan1").chained("#kecamatan1");

   
  </script>

  <script>
     $("#kecamatan2").chained("#kabupaten2"); // disini kita hubungkan kecamatan dengan kabupaten
    $("#desa2").chained("#kecamatan2"); // disini kita hubungkan desa dengan kecamatan
   
  </script>


  <script>
    function goBack(){
      window.history.back();
    }
  </script>
<?php 
  $kab=$this->uri->segment(3);
  $jml_kec= $this->M_admin->getJumKec($kab);
  $jml_desa= $this->db->query("SELECT * FROM desa WHERE id_kab='$kab'")->num_rows();
  $jml_kel=$this->db->query("SELECT * FROM kelurahan WHERE id_kab='$kab'")->num_rows();
?>
  <script>
    var ctx = document.getElementById("myPieChart1");
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Jumlah Kecamatan", "Jumlah Desa","Jumlah Kelurahan"],
        datasets: [{
          data: [<?= $jml_kec ?>, <?= $jml_desa; ?>, <?= $jml_kel ?>],
          backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
          hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });

  </script>

  <script>
    function show()
    {
      var jabatan=document.getElementById("form1").opsi.value;
      if (jabatan=="desa") {
        document.getElementById("tampil").
        innerHTML="<option>---Pilih Jabatan---</option><option value='Kepala Desa'>Kepala Desa</option><option value='Sekretaris Desa'>Sekretaris Desa</option><option value='Ketua BPD Desa'>Ketua BPD</option><option value='Wakil BPD Desa'>Wakil BPD</option><option value='Sekre BPD Desa'>Sekretaris BPD</option><option value='Anggota BPD Desa'>Anggota BPD</option><option value='ketua RT Desa'>Ketua RT</option><option value='Sekretaris RT Desa'>Sekretaris RT</option><option value='Ketua LPM Desa'>Ketua LPM</option><option value='Wakil LPM Desa'>Wakil LPM</option><option value='Sekretaris LPM Desa'>Sekretaris LPM</option><option value='Bendahara LPM Desa'>Bendahara LPM</option><option value='Anggota LPM Desa'>Anggota LPM</option><option value='Ketua PKK Desa'>Ketua PKK</option>ption value='Waki PKK Desa'>Wakil PKK</option><option value='Sekretaris PKK Desa'>Sekretaris PKK</option><option value='Bendahara PKK Desa'>Bendahara PKK</option><option value='Ketua Pokja I Desa'>Ketua Pokja I</option><option value='Wakil Pokja I Desa'>Wakil Pokja I</option><option value='Sekretaris Pokja I Desa'>Sekretaris Pokja I</option><option value='Anggota Pokja I Desa'>Anggota Pokja I</option><option value='Ketua Pokja II Desa'>Ketua Pokja II</option><option value='Wakil Pokja II Desa'>Wakil Pokja II</option><option value='Sekretaris Pokja II Desa'>Sekretaris Pokja II</option><option value='Anggota Pokja II Desa'>Anggota Pokja II</option><option value='Ketua Pokja III Desa'>Ketua Pokja III</option><option value='Wakil Pokja III Desa'>Wakil Pokja III</option><option value='Sekretaris Pokja III Desa'>Sekretaris Pokja III</option><option value='Anggota Pokja III Desa'>Anggota Pokja III</option><option value='Ketua Pokja IV Desa'>Ketua Pokja IV</option><option value='Wakil Pokja IV Desa'>Wakil Pokja IV</option><option value='Sekretaris Pokja IV Desa'>Sekretaris Pokja IV</option><option value='Anggota Pokja IV Desa'>Anggota Pokja IV</option><option value='Kasi Pemerintahan Desa'>Kasi Pemerintahan</option><option value='Kasi Pembangunan Desa'>Kasi Pembangunan</option><option value='Kasi Pemberdayaan Masyarakat Desa'>Kasi Pemberdayaan Masyarakat</option><option value='Kasi Kesejahteraan Masyarakat Desa'>Kasi Kesejahteraan Masyarakat</option><option value='Kasi Umum Desa'>Kasi Umum</option><option value='Kasi Keuangan Desa'>Kasi Keuangan</option><option value='Kasi Perekonomian Desa'>Kasi Perekonomian</option><option value='Kasi Data Dan Informasi Desa'>Kasi Data Dan Informasi</option><option value='Kaur Pemerintahan Desa'>Kaur Pemerintahan</option><option value='Kaur Pembangunan Desa'>Kaur Pembangunan</option><option value='Kaur Pemberdayaan Masyarakat Desa'>Kaur Pemberdayaan Masyarakat</option><option value='Kaur Kesejahteraan Masyarakat Desa'>Kaur Kesejahteraan Masyarakat</option><option value='Kaur Umum Desa'>Kaur Umum</option><option value='Kaur Keuangan Desa'>Kaur Keuangan</option><option value='Kaur Perekonomian Desa'>Kaur Perekonomian</option><option value='Kaur Data Dan Informasi Desa'>Kaur Data Dan Informasi</option><option value='Kepala Dusun Desa'>Kepala Dusun</option><option value='Ketua RW Desa'>Ketua RW</option><option value='Sekretaris RW Desa'>Sekretaris RW</option><option value='Ketua Karang Taruna Desa'>Ketua Karang Taruna</option><option value='Wakil Karang Taruna Desa'>Wakil Karang Taruna</option><option value='Sekretaris Karang Taruna Desa'>Sekretaris Karang Taruna</option><option value='Bendahara Karang Taruna Desa'>Bendahara Karang Taruna</option><option value='Anggota Karang Taruna Desa'>Anggota Karang Taruna</option><option value='Ketua Lembaga Adat Desa'>Ketua Lembaga Adat</option><option value='Wakil Lembaga Adat Desa'>Wakil Lembaga Adat</option><option value='Sekretaris Lembaga Adat Desa'>Sekretaris Lembaga Adat</option><option value='Bendahara Lembaga Adat Desa'>Bendahara Lembaga Adat</option><option value='Anggota Lembaga Adat Desa'>Anggota Lembaga Adat</option><option value='Direktur BUMDES Desa'>Direktur BUMDES</option><option value='Wakil BUMDES Desa'>Wakil BUMDES</option><option value='Sekretaris BUMDES Desa'>Sekretaris BUMDES</option><option value='Bendahara BUMDES Desa'>Bendahara BUMDES</option><option value='Unit Usaha BUMDES Desa'>Unit Usaha BUMDES</option>";
      }
      else if (jabatan ="kelurahan") {
         document.getElementById("tampil").innerHTML="<option>---pilih Jabatan---</option><option value='Lurah'>Lurah</option><option value='Sekretaris Lurah'>Sekretaris Lurah</option><option value='Ketua BPD Kelurahan'>Ketua BPD</option><option value='Wakil BPD Kelurahan'>Wakil BPD</option><option value='Sekretaris BPD Kelurahan'>Sekretaris BPD</option><option value='Anggota BPD Kelurahan'>Anggota BPD</option><option value='Ketua RT Kelurahan'>Ketua RT</option><option value='Sekretaris RT Kelurahan'>Sekretaris RT</option><option value='Ketua LPM Kelurahan'>Ketua LPM</option><option value='Wakil LPM Kelurahan'>Wakil LPM</option><option value='Sekretaris LPM Kelurahan'>Sekretaris LPM</option><option value='Bendahara LPM Kelurahan'>Bendahara LPM</option><option value='Anggota LPM Kelurahan'>Anggota LPM</option><option value='Ketua PKK Kelurahan'>Ketua PKK</option><option value='Waki PKK Kelurahan'>Wakil PKK</option><option value='Sekretaris PKK Kelurahan'>Sekretaris PKK</option><option value='Bendahara PKK Kelurahan'>Bendahara PKK</option><option value='Ketua Pokja I Kelurahan'>Ketua Pokja I</option><option value='Wakil Pokja I Kelurahan'>Wakil Pokja I</option><option value='Sekretaris Pokja I Kelurahan'>Sekretaris Pokja I</option><option value='Anggota Pokja I Kelurahan'>Anggota Pokja I</option><option value='Ketua Pokja II Kelurahan'>Ketua Pokja II</option><option value='Wakil Pokja II Kelurahan'>Wakil Pokja II</option><option value='Sekretaris Pokja II Kelurahan'>Sekretaris Pokja II</option><option value='Anggota Pokja II Kelurahan'>Anggota Pokja II</option><option value='Ketua Pokja III Kelurahan'>Ketua Pokja III</option><option value='Wakil Pokja III Kelurahan'>Wakil Pokja III</option><option value='Sekretaris Pokja III Kelurahan'>Sekretaris Pokja III</option><option value='Anggota Pokja III Kelurahan'>Anggota Pokja III</option><option value='Ketua Pokja IV Kelurahan'>Ketua Pokja IV</option><option value='Wakil Pokja IV Kelurahan'>Wakil Pokja IV</option><option value='Sekretaris Pokja IV Kelurahan'>Sekretaris Pokja IV</option><option value='Anggota Pokja IV Kelurahan'>Anggota Pokja IV</option><option value='Kasi Pemerintahan Kelurahan'>Kasi Pemerintahan</option><option value='Kasi Pembangunan Kelurahan'>Kasi Pembangunan</option><option value='Kasi Pemberdayaan Masyarakat Kelurahan'>Kasi Pemberdayaan Masyarakat</option><option value='Kasi Kesejahteraan Masyarakat Kelurahan'>Kasi Kesejahteraan Masyarakat</option><option value='Kasi Umum Kelurahan'>Kasi Umum</option><option value='Kasi Keuangan Kelurahan'>Kasi Keuangan</option><option value='Kasi Perekonomian Kelurahan'>Kasi Perekonomian</option><option value='Kasi Data Dan Informasi Kelurahan'>Kasi Data Dan Informasi</option><option value='Kaur Pemerintahan Kelurahan'>Kaur Pemerintahan</option><option value='Kaur Pembangunan Kelurahan'>Kaur Pembangunan</option><option value='Kaur Pemberdayaan Masyarakat Kelurahan'>Kaur Pemberdayaan Masyarakat</option><option value='Kaur Kesejahteraan Masyarakat Kelurahan'>Kaur Kesejahteraan Masyarakat</option><option value='Kaur Umum Kelurahan'>Kaur Umum</option><option value='Kaur Keuangan Kelurahan'>Kaur Keuangan</option><option value='Kaur Perekonomian Kelurahan'>Kaur Perekonomian</option><option value='Kaur Data Dan Informasi Kelurahan'>Kaur Data Dan Informasi</option><option value='Kepala Dusun Kelurahan'>Kepala Dusun</option><option value='Ketua RW Kelurahan'>Ketua RW</option><option value='Sekretaris RW Kelurahan'>Sekretaris RW</option><option value='Ketua Karang Taruna Kelurahan'>Ketua Karang Taruna</option><option value='Wakil Karang Taruna Kelurahan'>Wakil Karang Taruna</option><option value='Sekretaris Karang Taruna Kelurahan'>Sekretaris Karang Taruna</option><option value='Bendahara Karang Taruna Kelurahan'>Bendahara Karang Taruna</option><option value='Anggota Karang Taruna Kelurahan'>Anggota Karang Taruna</option><option value='Ketua Lembaga Adat Kelurahan'>Ketua Lembaga Adat</option><option value='Wakil Lembaga Adat Kelurahan'>Wakil Lembaga Adat</option><option value='Sekretaris Lembaga Adat Kelurahan'>Sekretaris Lembaga Adat</option><option value='Bendahara Lembaga Adat Kelurahan'>Bendahara Lembaga Adat</option><option value='Anggota Lembaga Adat Kelurahan'>Anggota Lembaga Adat</option><option value='Direktur BUMDES Kelurahan'>Direktur BUMDES</option><option value='Wakil BUMDES Kelurahan'>Wakil BUMDES</option><option value='Sekretaris BUMDES Kelurahan'>Sekretaris BUMDES</option><option value='Bendahara BUMDES Kelurahan'>Bendahara BUMDES</option><option value='Unit Usaha BUMDES Kelurahan'>Unit Usaha BUMDES</option>";
      }
    }
  </script>

   <script>
    function showw()
    {
   
      var jabatan=document.getElementById("form2").opsi.value;
      if (jabatan=="desa") {
        document.getElementById("tampil1").
        innerHTML="<option>---Pilih Jabatan---</option><option value='Kepala Desa'>Kepala Desa</option><option value='Sekretaris Desa'>Sekretaris Desa</option><option value='Ketua BPD Desa'>Ketua BPD</option><option value='Wakil BPD Desa'>Wakil BPD</option><option value='Sekre BPD Desa'>Sekretaris BPD</option><option value='Anggota BPD Desa'>Anggota BPD</option><option value='ketua RT Desa'>Ketua RT</option><option value='Sekretaris RT Desa'>Sekretaris RT</option><option value='Ketua LPM Desa'>Ketua LPM</option><option value='Wakil LPM Desa'>Wakil LPM</option><option value='Sekretaris LPM Desa'>Sekretaris LPM</option><option value='Bendahara LPM Desa'>Bendahara LPM</option><option value='Anggota LPM Desa'>Anggota LPM</option><option value='Ketua PKK Desa'>Ketua PKK</option>ption value='Waki PKK Desa'>Wakil PKK</option><option value='Sekretaris PKK Desa'>Sekretaris PKK</option><option value='Bendahara PKK Desa'>Bendahara PKK</option><option value='Ketua Pokja I Desa'>Ketua Pokja I</option><option value='Wakil Pokja I Desa'>Wakil Pokja I</option><option value='Sekretaris Pokja I Desa'>Sekretaris Pokja I</option><option value='Anggota Pokja I Desa'>Anggota Pokja I</option><option value='Ketua Pokja II Desa'>Ketua Pokja II</option><option value='Wakil Pokja II Desa'>Wakil Pokja II</option><option value='Sekretaris Pokja II Desa'>Sekretaris Pokja II</option><option value='Anggota Pokja II Desa'>Anggota Pokja II</option><option value='Ketua Pokja III Desa'>Ketua Pokja III</option><option value='Wakil Pokja III Desa'>Wakil Pokja III</option><option value='Sekretaris Pokja III Desa'>Sekretaris Pokja III</option><option value='Anggota Pokja III Desa'>Anggota Pokja III</option><option value='Ketua Pokja IV Desa'>Ketua Pokja IV</option><option value='Wakil Pokja IV Desa'>Wakil Pokja IV</option><option value='Sekretaris Pokja IV Desa'>Sekretaris Pokja IV</option><option value='Anggota Pokja IV Desa'>Anggota Pokja IV</option><option value='Kasi Pemerintahan Desa'>Kasi Pemerintahan</option><option value='Kasi Pembangunan Desa'>Kasi Pembangunan</option><option value='Kasi Pemberdayaan Masyarakat Desa'>Kasi Pemberdayaan Masyarakat</option><option value='Kasi Kesejahteraan Masyarakat Desa'>Kasi Kesejahteraan Masyarakat</option><option value='Kasi Umum Desa'>Kasi Umum</option><option value='Kasi Keuangan Desa'>Kasi Keuangan</option><option value='Kasi Perekonomian Desa'>Kasi Perekonomian</option><option value='Kasi Data Dan Informasi Desa'>Kasi Data Dan Informasi</option><option value='Kaur Pemerintahan Desa'>Kaur Pemerintahan</option><option value='Kaur Pembangunan Desa'>Kaur Pembangunan</option><option value='Kaur Pemberdayaan Masyarakat Desa'>Kaur Pemberdayaan Masyarakat</option><option value='Kaur Kesejahteraan Masyarakat Desa'>Kaur Kesejahteraan Masyarakat</option><option value='Kaur Umum Desa'>Kaur Umum</option><option value='Kaur Keuangan Desa'>Kaur Keuangan</option><option value='Kaur Perekonomian Desa'>Kaur Perekonomian</option><option value='Kaur Data Dan Informasi Desa'>Kaur Data Dan Informasi</option><option value='Kepala Dusun Desa'>Kepala Dusun</option><option value='Ketua RW Desa'>Ketua RW</option><option value='Sekretaris RW Desa'>Sekretaris RW</option><option value='Ketua Karang Taruna Desa'>Ketua Karang Taruna</option><option value='Wakil Karang Taruna Desa'>Wakil Karang Taruna</option><option value='Sekretaris Karang Taruna Desa'>Sekretaris Karang Taruna</option><option value='Bendahara Karang Taruna Desa'>Bendahara Karang Taruna</option><option value='Anggota Karang Taruna Desa'>Anggota Karang Taruna</option><option value='Ketua Lembaga Adat Desa'>Ketua Lembaga Adat</option><option value='Wakil Lembaga Adat Desa'>Wakil Lembaga Adat</option><option value='Sekretaris Lembaga Adat Desa'>Sekretaris Lembaga Adat</option><option value='Bendahara Lembaga Adat Desa'>Bendahara Lembaga Adat</option><option value='Anggota Lembaga Adat Desa'>Anggota Lembaga Adat</option><option value='Direktur BUMDES Desa'>Direktur BUMDES</option><option value='Wakil BUMDES Desa'>Wakil BUMDES</option><option value='Sekretaris BUMDES Desa'>Sekretaris BUMDES</option><option value='Bendahara BUMDES Desa'>Bendahara BUMDES</option><option value='Unit Usaha BUMDES Desa'>Unit Usaha BUMDES</option>";
      }
      else if (jabatan ="kelurahan") {
         document.getElementById("tampil1").innerHTML="<option>---pilih Jabatan---</option><option value='Lurah'>Lurah</option><option value='Sekretaris Lurah'>Sekretaris Lurah</option><option value='Ketua BPD Kelurahan'>Ketua BPD</option><option value='Wakil BPD Kelurahan'>Wakil BPD</option><option value='Sekretaris BPD Kelurahan'>Sekretaris BPD</option><option value='Anggota BPD Kelurahan'>Anggota BPD</option><option value='Ketua RT Kelurahan'>Ketua RT</option><option value='Sekretaris RT Kelurahan'>Sekretaris RT</option><option value='Ketua LPM Kelurahan'>Ketua LPM</option><option value='Wakil LPM Kelurahan'>Wakil LPM</option><option value='Sekretaris LPM Kelurahan'>Sekretaris LPM</option><option value='Bendahara LPM Kelurahan'>Bendahara LPM</option><option value='Anggota LPM Kelurahan'>Anggota LPM</option><option value='Ketua PKK Kelurahan'>Ketua PKK</option><option value='Waki PKK Kelurahan'>Wakil PKK</option><option value='Sekretaris PKK Kelurahan'>Sekretaris PKK</option><option value='Bendahara PKK Kelurahan'>Bendahara PKK</option><option value='Ketua Pokja I Kelurahan'>Ketua Pokja I</option><option value='Wakil Pokja I Kelurahan'>Wakil Pokja I</option><option value='Sekretaris Pokja I Kelurahan'>Sekretaris Pokja I</option><option value='Anggota Pokja I Kelurahan'>Anggota Pokja I</option><option value='Ketua Pokja II Kelurahan'>Ketua Pokja II</option><option value='Wakil Pokja II Kelurahan'>Wakil Pokja II</option><option value='Sekretaris Pokja II Kelurahan'>Sekretaris Pokja II</option><option value='Anggota Pokja II Kelurahan'>Anggota Pokja II</option><option value='Ketua Pokja III Kelurahan'>Ketua Pokja III</option><option value='Wakil Pokja III Kelurahan'>Wakil Pokja III</option><option value='Sekretaris Pokja III Kelurahan'>Sekretaris Pokja III</option><option value='Anggota Pokja III Kelurahan'>Anggota Pokja III</option><option value='Ketua Pokja IV Kelurahan'>Ketua Pokja IV</option><option value='Wakil Pokja IV Kelurahan'>Wakil Pokja IV</option><option value='Sekretaris Pokja IV Kelurahan'>Sekretaris Pokja IV</option><option value='Anggota Pokja IV Kelurahan'>Anggota Pokja IV</option><option value='Kasi Pemerintahan Kelurahan'>Kasi Pemerintahan</option><option value='Kasi Pembangunan Kelurahan'>Kasi Pembangunan</option><option value='Kasi Pemberdayaan Masyarakat Kelurahan'>Kasi Pemberdayaan Masyarakat</option><option value='Kasi Kesejahteraan Masyarakat Kelurahan'>Kasi Kesejahteraan Masyarakat</option><option value='Kasi Umum Kelurahan'>Kasi Umum</option><option value='Kasi Keuangan Kelurahan'>Kasi Keuangan</option><option value='Kasi Perekonomian Kelurahan'>Kasi Perekonomian</option><option value='Kasi Data Dan Informasi Kelurahan'>Kasi Data Dan Informasi</option><option value='Kaur Pemerintahan Kelurahan'>Kaur Pemerintahan</option><option value='Kaur Pembangunan Kelurahan'>Kaur Pembangunan</option><option value='Kaur Pemberdayaan Masyarakat Kelurahan'>Kaur Pemberdayaan Masyarakat</option><option value='Kaur Kesejahteraan Masyarakat Kelurahan'>Kaur Kesejahteraan Masyarakat</option><option value='Kaur Umum Kelurahan'>Kaur Umum</option><option value='Kaur Keuangan Kelurahan'>Kaur Keuangan</option><option value='Kaur Perekonomian Kelurahan'>Kaur Perekonomian</option><option value='Kaur Data Dan Informasi Kelurahan'>Kaur Data Dan Informasi</option><option value='Kepala Dusun Kelurahan'>Kepala Dusun</option><option value='Ketua RW Kelurahan'>Ketua RW</option><option value='Sekretaris RW Kelurahan'>Sekretaris RW</option><option value='Ketua Karang Taruna Kelurahan'>Ketua Karang Taruna</option><option value='Wakil Karang Taruna Kelurahan'>Wakil Karang Taruna</option><option value='Sekretaris Karang Taruna Kelurahan'>Sekretaris Karang Taruna</option><option value='Bendahara Karang Taruna Kelurahan'>Bendahara Karang Taruna</option><option value='Anggota Karang Taruna Kelurahan'>Anggota Karang Taruna</option><option value='Ketua Lembaga Adat Kelurahan'>Ketua Lembaga Adat</option><option value='Wakil Lembaga Adat Kelurahan'>Wakil Lembaga Adat</option><option value='Sekretaris Lembaga Adat Kelurahan'>Sekretaris Lembaga Adat</option><option value='Bendahara Lembaga Adat Kelurahan'>Bendahara Lembaga Adat</option><option value='Anggota Lembaga Adat Kelurahan'>Anggota Lembaga Adat</option><option value='Direktur BUMDES Kelurahan'>Direktur BUMDES</option><option value='Wakil BUMDES Kelurahan'>Wakil BUMDES</option><option value='Sekretaris BUMDES Kelurahan'>Sekretaris BUMDES</option><option value='Bendahara BUMDES Kelurahan'>Bendahara BUMDES</option><option value='Unit Usaha BUMDES Kelurahan'>Unit Usaha BUMDES</option>";
      }
    }
  </script>


 <!--  <script>
    $(document).ready(function(){
      $('#kab').change(function(){
        var id_kab = $('#kab').val();
        if (id_kab != '') 
        {
          $.ajax({
            url:"<?= base_url(); ?>C_Cetak/fetch_kecamatan",
            method:"POST",
            data:{id_kab:id_kab},
            success:function(data)
            {
              $('#kec').html(data);
              $('#kel').html('<option value="">Pilih Kelurahan</option>');
            }
          });
        }
        else{
           $('#kec').html('<option value="">Pilih Kecamatan</option>');
           $('#kel').html('<option value="">Pilih Kelurahan</option>');
        }
      });

         $('#kec').change(function(){
            var id_kec = $('#kec').val();
            if (id_kec != '') 
            {
              $.ajax({
              url:"<?= base_url(); ?>C_Cetak/fetch_kelurahan",
              method:"POST",
              data:{id_kec:id_kec},
              success:function(data)
            {
              
              $('#kel').html(data);
            }
          });
            }
            else
            {
              $('#kel').html('<option value="">Select Kelurahan</option>');
            }
          });
        });
     
  </script> -->

</body>
</html>

