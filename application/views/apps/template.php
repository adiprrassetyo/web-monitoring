<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Monitoring Kelembaban</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="IoT Engineer" name="keywords">
  <meta content="Monitoring Kelembaban berbasis web" name="description">
  <link href="<?php echo base_url('assets/img/deskripsi.png');?>" rel="icon">
  <link href="<?php echo base_url('assets/img/apple-touch-icon.png');?>" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
  <link href="<?php echo base_url('assets/lib/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/lib/animate/animate.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/lib/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/lib/ionicons/css/ionicons.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/lib/magnific-popup/magnific-popup.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
</head>
<body onload="init();">
  <header id="header">
    <div class="container">
      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">Web Monitoring</a></h1>
      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Beranda</a></li>
          <li><a href="#features">Monitoring</a></li>
          <li><a href="#more-features">Total</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <section id="intro">
    <div class="intro-text">
      <h2>Sensor Kelembaban</h2>
    </div>
    <div class="product-screens">
      <div class="product-screen-1 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.6s">
        <img src="<?php echo base_url('assets/img/monitoring.png');?>" alt="">
      </div>
      <div class="product-screen-2 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.6s">
        <img src="<?php echo base_url('assets/img/grafik.png');?>" alt="">
      </div>
      <div class="product-screen-3 wow fadeInUp" data-wow-duration="0.6s">
        <img src="<?php echo base_url('assets/img/about.png');?>" alt="">
      </div>
    </div>
  </section>
  <main id="main">
    <section id="features">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-4">
            <div class="section-header wow fadeIn" data-wow-duration="1s">
              <h3 class="section-title">Monitoring</h3>
              <span class="section-divider"></span>
            </div>
          </div>
          <div class="col-lg-4 col-md-5 features-img">
            <img src="<?php echo base_url('assets/img/product-features.png');?>" alt="" class="wow fadeInLeft">
          </div>
          <div class="col-lg-8 col-md-7 ">
            <div class="row" id="sensor_offline">
              <div class="col-lg-12 col-md-12 box wow fadeInLeft">
                <div class="icon">
                    <i class="ion-ios-cloudy"></i>
                </div>
                <h4 class="title"><a href="">Whoops . . . Sensor offline!</a></h4>
                <p class="description">Saat ini Anda tidak dapat melakukan monitoring, sensor dalam keadaan offline. Untuk informasi lebih lanjut silakan hubungi melalui kontak yang tersedia. Terima kasih.</p>
              </div>
            </div>
            <div class="row" id="sensor_online">
              <div class="col-lg-12 col-md-12 box wow fadeInLeft">
                <p class="description">Kelembaban yang dikirim dari sensor pada tanggal <span id="datetime"></span></p>
              </div>
              <div class="col-lg-12 col-md-12 box wow fadeInRight" data-wow-delay="0.1s">
                <div class="icon">
                    <i class="ion-ios-snowy"></i>
                    <h2><span id="nilai_kelembaban">0</span></h2>
                </div>
                <h4 class="title"><a href="">Kelembaban</a></h4>
                <p class="description"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="more-features" class="section-bg">
      <div class="container">
        <div class="section-header">
          <h3 class="section-title">Informasi Lainnya</h3>
          <span class="section-divider"></span>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><i class="ion-podium"></i></div>
              <h4 class="title"><a href="">Jumlah Record Hari Ini</a><br></h4>
              <p class="description">Jumlah record yang dikirim dari sensor pada hari ini, 
              tanggal <?php echo date('d-M-Y') ?> sebanyak <b><span id="today_record">0</span></b> record.</p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><i class="ion-podium"></i></div>
              <h4 class="title"><a href="">Total Record</a></h4>
              <p class="description">Jumlah record seluruhnya yang tersimpan di database server sebanyak <b><span id="total_record">0</span></b> record.</p>
            </div>
          </div>
          <div class="col-lg-12" id="grafik_box_kelembaban">
            <div class="box wow fadeInLeft">
              <div class="container">  
                <iframe src="<?php echo site_url('iot/grafik_kelembaban/'); ?>" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong><a href="http://laurensius-dede-suhardiman.com/" target="_blank">Kelembaban Tanaman Mangga</a></strong>. 
          </div>
          <div class="credits">
            <!-- Thanks to <a href="https://bootstrapmade.com/" target="_blank">BootstrapMade</a> -->
          </div>
        </div>
        <div class="col-lg-6">
          <!-- <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Home</a>
            <a href="#about" class="scrollto">About</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
          </nav> -->
        </div>
      </div>
    </div>
  </footer>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <script src="<?php echo base_url('assets/lib/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/jquery/jquery-migrate.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/easing/easing.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/wow/wow.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/superfish/hoverIntent.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/superfish/superfish.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/magnific-popup/magnific-popup.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/contactform/contactform.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
  <script src="<?php echo base_url("assets/justgage/justgage-1.1.0.js");?>" type="text/javascript"></script>
  <script src="<?php echo base_url("assets/justgage/raphael-2.1.4.min.js");?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/chart/highcharts.js'); ?>"></script>
  <script>
    function init(){
        $('#sensor_online').hide();
        $('#sensor_offline').hide();
        $('#grafik_box_kelembaban').hide();
    }

    function setOnline(){
        $('#sensor_online').show();
        $('#sensor_offline').hide();
        $('#grafik_box_kelembaban').show();
    }

    function setOffline(){
        $('#sensor_online').hide();
        $('#sensor_offline').show();
        $('#grafik_box_kelembaban').hide();
    }
    
    $(document).ready(function(){
        function load_data(){
          $.ajax({
              url : '<?php echo site_url("api/monitoring/") ?>' ,
              type : 'GET',
              dataType : 'json',
              cache: false,
              contentType: false,
              processData: false,
              success : function(response){
                  if(response.data.status_sensor[0].status == "Offline"){
                      setOffline();
                  }else{
                      setOnline();
                      $('#nilai_kelembaban').html(response.data.monitoring[response.data.monitoring.length - 1].kelembaban);
                      $('#datetime').html(response.data.monitoring[response.data.monitoring.length - 1].datetime);
                      $('#today_record').html(response.data.today_record[0].today_record);
                      $('#total_record').html(response.data.total_record[0].total_record);    
                  }
              },
              error : function(response){
              console.log(response);
              },
          });
        }
        setInterval(function(){load_data();},3000);
    }); 
  </script>
</body>
</html>
