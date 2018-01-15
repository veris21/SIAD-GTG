  <div id="control">
		<center>
		<a href="<?php echo base_url('login');?>">
		<img src="<?php echo base_url().'assets/new-logo.png'; ?>" width="60%" alt="Logo si-desa.id">
		</a>
		</center>
		<br>
		<hr>		
		<!-- <h2>Temukan Data <br>Tanah Anda</h2> -->
		<p>Kami membantu anda melihat status tanah anda melalui database Si Desa pemerintah Desa Gantung </p>
		<hr>
		<br>
			<!-- <button type="submit" class="learnButton">Tanah Terdekat</button> -->
			<button type="button" id="searchBtn" class="learnButton">Cari Data Tanah</button>
			<?php echo form_open('',array('id'=>'form_cari'));?>
			<div id="desa" class="form-group" >
				<label for="">Desa</label>
				<select name="desa" class="form-control select2" style="width:100%" >
					<?php 
					foreach ($desa as $desa) {
						echo "<option value='".$desa->id."'>".$desa->nama_desa."</option>";
					}
					?>					
				</select>
			</div>
			
			<div id="cariDesa" class="pull-right" >			
				<button onclick="buka_dusun()"  class="btn btn-primary" type="button"><i class="fa fa-search"></i> Dusun</button>
				<button name="clickDesa" class="btn btn-success" type="button"><i class="fa fa-search"></i> Desa</button>
			</div>

			<div id="dusun" class="form-group" >
				<label for="">Dusun</label>
				<select name="dusun" class="form-control select2" style="width:100%" >					
				</select>
			</div>

			<div id="cariDusun" class="pull-right" >
			
				<button onclick="buka_nik()"  class="btn btn-primary" type="button"><i class="fa fa-search"></i> Pemilik</button>
				<button name="clickDusun"  class="btn btn-success" type="button"><i class="fa fa-search"></i> Dusun </button>
			</div>

			<div id="nama_or_nik" class="form-group" >
				<label for="">Nama / NIK</label>
				<input onkeyup="cari_data()" type="text" name="nikData" class="form-control" id="">
			</div>

			<div id="btnCari" class="pull-right" >
				<button class="btn btn-warning" type="reset">Reset <i class="fa fa-ban"></i> </button>
				<button  name="clickNama" class="btn btn-success" type="button">Cari <i class="fa fa-search"></i> </button>
			</div>
			<br>
			<div id="btnReload">
				<hr>
				<button type="button" id="reload" class="btn btn-warning btn-block">Reload <i class="fa fa-refresh"></i></button>
			</div>
			</form>
		<div class="social">		
			<div class="twitter">
				<!-- <a href="https://twitter.com/share" class="twitter-share-button" data-via="pauldessert">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script> -->
			</div>
			
			<div class="facebook">
				<!-- <iframe src=""></iframe>		 -->
			</div>

		
		</div>
		<div class="clear"></div>
		<div id="results"></div>
		
		<p style="font-size:11px;">Simple Project by <?php echo anchor('login','Si-Desa Gantung');?></p>
	</div>
<div id="map-canvas"></div> 

<script src="https://maps.google.com/maps/api/js?key=AIzaSyDbCwhTP2mtDKcb2s8A-bzrwMVKGwK-keY"></script>
<script> var baseUrl = '<?php echo base_url();?>';</script>
<!-- <script type="text/javascript" src="<?php //echo base_url().APPS;?>js/map-icons.js"></script> -->
<script type="text/javascript" src="<?php echo base_url().APPS;?>js/peta.js"></script>
<script type="text/javascript" src="<?php echo base_url().APPS;?>js/search.js"></script>
