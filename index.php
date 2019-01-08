<html>
  <head>
    <title> e-Voting Pemilihan Ketua Osis</title>   
    <link href="assets/css/general.css" rel="stylesheet"/>       
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>            
  </head>  
<body>
    <div class="container">  
        <header style="background: url(header.png); height: 400px;"> 
            <div class="row" >
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-3"></div>
            </div>
        </header><br><br>
        <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="?">E-Voting Ketua Osis</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
              <?php if($_SESSION['level']!=='admin'): ?>
             <li><a href="?m=daftar_peserta"><span class="glyphicon glyphicon-glyphicon glyphicon-user"></span> Daftar Peserta</a></li>
              <li><a href="?m=tanda_terima"><span class="glyphicon glyphicon-glyphicon glyphicon-cloud"></span> Pemilih</a></li>
              <?php endif?>
             
              <?php if($_SESSION['level']=='admin'):?>
                <li><a href="?m=pencalon"><span class="glyphicon glyphicon-user"></span> Pencalon</a></li>
                <li><a href="?m=pemilih"><span class="glyphicon glyphicon-th-large"></span> Pemilih</a></li>                
              <?php endif ?>

              <?php if($_SESSION['level']=='pengawas'):?>
                <li><a href="?m=daftar_peserta"><span class="glyphicon glyphicon-user"></span> Pencalon</a></li>
                <li><a href="?m=pemilih"><span class="glyphicon glyphicon-th-large"></span> Pemilih</a></li>                
              <?php endif ?>			  
                                 
              </ul>          
              <ul class="nav navbar-nav navbar-right">
              <?php if($_SESSION['login'] && sudah_memilih($_SESSION['id_pemilih'])):?>
               <li><a href="?m=hasil_voting"><span class="glyphicon glyphicon-glyphicon glyphicon-signal"></span> Hasil Voting</a></li>
              <?php endif ?> 
			  
			  <?php if($_SESSION['level']!='admin' && !$_SESSION['login']):?>
              <li><a href="?m=login"><span class="glyphicon glyphicon-calendar"></span> Admin</a></li>
			  <?php endif?>

              <?php if($_SESSION['login'] ):?>
                <li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
                <li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              <?php endif ?>

              </ul>
            </div><!--/.nav-collapse -->
        </div>
        </nav>          
        <div class="">
            <?php
                if(file_exists($mod.'.php')){
                    if($mod=='tanda_terima' && $_SESSION['level']!='pemilih'){
                        redirect_js('?m=login_pemilih');
                    } else {
                        include $mod.'.php';
                    }                               
                }else
                    include 'pilkada.php';
            ?>
        </div>                          
    </div>
    <footer class="footer">
      <div class="container">
        <p>Copyright &copy; <?=date('Y')?> Mustopha Comp. <em class="pull-right">Edited by : Hamba Allah</em></p>
      </div>
    </footer>
    </body>
</html>