<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Monitoring Kelembaban</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Laurensius Dede Suhardiman - IoT Engineer" name="keywords">
  <meta content="Monitoring Kelembaban berbasis web dan Mobile karya Laurensius Dede Suhardiman" name="description">
  <link href="<?php echo base_url('assets/img/favicon.png');?>" rel="icon">
  <link href="<?php echo base_url('assets/img/apple-touch-icon.png');?>" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
  <link href="<?php echo base_url('assets/lib/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/lib/animate/animate.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/lib/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/lib/ionicons/css/ionicons.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/lib/magnific-popup/magnific-popup.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div id="grafik"></div>
  </div>
  <script src="<?php echo base_url('assets/lib/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/jquery/jquery-migrate.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/chart/highcharts.js'); ?>"></script>
  <script>
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
                var array_tanggal = new Array(response.data.monitoring.length);
                var array_kelembaban = new Array(response.data.monitoring.length);
                for(var x=0;x<response.data.monitoring.length;x++){
                  array_tanggal[x] = response.data.monitoring[x].datetime;
                  array_kelembaban[x] = parseFloat(response.data.monitoring[x].kelembaban,2);
                }
                $('#grafik').highcharts({
                  chart: {
                      type: 'line',
                      marginRight: 120,
                      marginBottom: 100
                  },
                  title: {
                      text: 'Grafik Kelembaban ',
                      x: -20 
                  },
                  subtitle: {
                      text: 'Source: 10 Record terakhir yang tersimpan di database',
                      x: -20
                  },
                  xAxis: {
                      categories: array_tanggal
                  },
                  yAxis: {
                      title: {
                          text: 'Kelembaban (dalam analog digital sensor)'
                      },
                      plotLines: [{
                          value: 0,
                          width: 1
                      }]
                  },
                  legend: {
                      layout: 'vertical',
                      align: 'right',
                      verticalAlign: 'top',
                      x: -10,
                      y: 100,
                      borderWidth: 0
                  },
                  series: [{
                      name: 'Kelembaban',
                      data: array_kelembaban,
                      color: '#41dff4'
                  }]
                }); 
                  
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
