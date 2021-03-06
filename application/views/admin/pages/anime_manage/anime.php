<?php
$assets= base_url()."assets/adminlte/";
$admin= base_url()."admin/";
$dir= __DIR__ ."/../../"; ?>
<!DOCTYPE html>
<html>
  <?php include $dir."header.php"?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <?php include $dir."sidebar.php" ?>
        <!-- Main content -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Anime Management
            <small>Anime</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Anime Management</a></li>
            <li class="active">Anime</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			 <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Anime List</h3>
                </div><!-- /.box-header -->
		<div class="box-body">
		<?php echo $this->table->generate(); ?>

					</div>
              </div><!-- /.box -->
			 <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Management</h3>
                </div><!-- /.box-header -->
                <form role="form" method="post" action="<?php echo $admin."addanime/"; ?>" enctype="multipart/form-data" >
                  <div class="box-body">
					<div class="form-group">
                      <label for="IdAnime">Anime ID</label>
                      <input type="text" class="form-control" id="IdAnime_show" name="IdAnime_show" placeholder="Automatically Added" disabled>
					  <input type="hidden" id="IdAnime" name="IdAnime" value="">
                    </div>
                    <div class="form-group">
                      <label for="InputTitle">Anime Title</label>
                      <input type="text" class="form-control" id="InputTitle" name="InputTitle" placeholder="Enter Title">
                    </div>
					<div class="form-group">
                      <label for="InputEpisode">Total Episode</label>
                      <input type="number" class="form-control" id="InputEpisode" name="InputEpisode" min="1" placeholder="Enter Total Episode" style="width: 10%" min="0">
                    </div>
                    <div class="form-group">
                      <label for="InputDescription">Description</label>
                      <textarea class="form-control" rows="5" id="InputDescription" name="InputDescription" placeholder="Enter Description Here..."></textarea>
                    </div>
                    <div class="form-group">
                      <label for="InputGenre">Genre</label>
						<select class="form-control" name="InputGenre[]" id="InputGenre" multiple="multiple" style="width: 100%;">
						</select>
                    </div>
					<div class="form-group">
						<label for="InputMalLink">MyAnimeList Link</label>
						<input type="text" class="form-control" id="InputMalLink" name="InputMalLink" placeholder="Enter MAL Link">
					</div>
					<div class="form-group">
						<label for="InputImage">Input Image Cover</label>
						<input type="file" id="InputImage" name="InputImage" accept="image/*">
						<p class="help-block">Must *.Jpg, *.png, *.gif<br> Max file size: 20 MB</p>
					</div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
					<button type="reset" class="btn btn-primary btn-khusus" id="btnReset" disabled>Clear</button>
                </form>
					<button type="button" class="btn btn-danger btn-khusus" id="btnDelete" disabled>Delete!</button>
				  </div>
              </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	  	 <!-- Datatables and Select 2 for Anime Main Table -->
	<script src="<?php echo base_url()."assets/"?>js/table_anime.js"></script>
    <?php include $dir."footer.php" ?>
</html>