<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo BASE_URL; ?>">SIA-<i>Desa</i></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class=""><a class="btn" href="<?php echo BASE_URL; ?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-book"></i> Surat Menyurat <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL.'import/excel'; ?>">Surat Permohonan SKT</a></li>
            <li class="divider"></li>
            <li><a href="#">Surat Pengantar</a></li>
            <li><a href="#">Surat Keterangan</a></li>
            <li><a href="#">Surat Rekomendasi</a></li>
          </ul>

        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="<?php echo  BASE_URL.'login';?>">Login Ke Sistem</a>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
