<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vote 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Vote</li>
      </ol>
    </section>
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">List Paslon</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">
            <div class="hasil"></div>
            <div class="row" id="vote-body" style="padding-bottom:20px; ">
              <?php           
               foreach ($list as $data) { ?>
                    <div class="tb<?=$data->id?> col-md-6 col-sm-12" >
                    <div class="card" style="border:1px dashed; margin-top:25px; padding:10px;">
                    <h4 class="card-title text-center"><b><?=$data->nomor_paslon?> - <?=$data->nama?></b></h5>
                    <img src="<?=base_url().$data->foto?>" class="card-img-top" style="width:100%; " >
                    <div class="card-body">
                        <h5 class="card-title"><b><?=$data->ketua?></b></h5>
                        <h5 class="card-title"><b><?=$data->wakil?></b></h5>
                        <p class="card-text"><?=nl2br($data->desc)?></p>
                        <button type="button" class="btn  btn-success btn-block button-pilih" value="<?=$data->nomor_paslon?>-<?=($this->uri->segment(2)) ? $this->uri->segment(2) : 0?>">Pilih Paslon</button>
                    </div>
                    </div>
                    </div>
               <?php } ?>                   
            </div>
               <?php if($list==null){ ?>
                <button type="button" class="btn btn-primary btn-lg btn-block"><?=$message?></button>
              <?php }?>
              </div> 
            </div>
          </div>
          </div>
    </section>
    <!-- /.content -->
  </div>