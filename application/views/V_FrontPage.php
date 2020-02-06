
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
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">

				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

			        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
			           	<i class="fa fa-bars"></i>
			        </button>
			        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
			            <div class="input-group">
                   <!--  <img src="<?= base_url('assets/img/gbr.jpg') ?>"> -->
			             <b style="font-family: robot; font-size: 30px;color: #ADD8E6 ">SIPDesKel</b>
			            </div>
			        </form>

			      	<ul class="nav nav-tabs">
			          	<li class="nav-item">
			              <a class="nav-link" href="<?= base_url('C_FrontPage/'); ?>" >
			                Beranda</a>
			            </li>

			            <li class="nav-item dropdown no-arrow mx-1">
			              	<a class="nav-link" href="<?= base_url('C_FrontPage/data'); ?>" >
			                Data Desa</a>
			            </li>
			        		
			            <li class="nav-item dropdown no-arrow mx-1">
			              <a class="nav-link" href="<?= base_url('C_Login'); ?>" >
			                Login</a>
			            </li>
			        </ul>

        		</nav>
        
		        <div class="container-fluid"> 
		        	<?php $this->load->view($content); ?>
		        </div>

    		</div>
   
	     	<!-- <footer class="sticky-footer bg-white">
    		<div class="container my-auto">
    		  <div class="copyright text-center my-auto">
    		    <span>Copyright &copy; Your Website <?= date('Y'); ?></span>
    		  </div>
    		</div>
      </footer> -->
      	</div>
  	</div>
  
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
  <script src="<?= base_url('assets/'); ?>js/jquery.validate.js"></script>
  <script src="<?= base_url('assets/'); ?>js/jquery.chained.min.js"></script>

  <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
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
  $jml_kel= $this->db->query("SELECT * FROM kelurahan WHERE id_kab='$kab'")->num_rows();
?>
  <script>
    var ctx = document.getElementById("myPieChart1");
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Jumlah Kecamatan", "Jumlah Desa","Jumlah Kelurahan"],
        datasets: [{
          data: [<?= $jml_kec ?>, <?= $jml_desa; ?>, <?= $jml_kel; ?>],
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

</body>
</html>
