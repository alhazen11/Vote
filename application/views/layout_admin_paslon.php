<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Paslon 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Paslon</li>
      </ol>
    </section>
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Data Paslon</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            <form role="form" class="form-add" method="post">
              <div class="hasil"></div>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputName">Nama Paslon</label>
                  <input type="text" class="form-control" id="inputName" name="name" required="true" placeholder="Nama">
                </div>
                <div class="form-group">
                  <label for="inputNomor">Nomor Paslon</label>
                  <input type="number" class="form-control" id="inputNomor" name="nomor" required="true" placeholder="Nomor">
                </div>
                <div class="form-group">
                  <label for="inputKetua">Ketua</label>
                  <input type="text" class="form-control" id="inputKetua" name="ketua" required="true" placeholder="Ketua">
                </div>
                <div class="form-group">
                  <label for="inputWakil">Wakil</label>
                  <input type="text" class="form-control" id="inputWakil" name="wakil" required="true" placeholder="Wakil">
                </div>
                <div class="form-group">
                  <label for="inputDescription">Keterangan</label>
                   <textarea name="desc" required="true" class="form-control" id="inputDescription" placeholder="Keterangan"></textarea> 
                </div>
                <div class="form-group">
                  <label for="inputFile" >File Photo</label>
                  <input type="file" required="true" name="image" id="inputFile">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            
            </div>
            <div class="box-header with-border">
              <h3 class="box-title">List Paslon</h3>
            </div>
            <div class="row" style="padding-bottom:20px; ">
              <?php          
               foreach ($list as $data) { ?>
                    <div class="tb<?=$data->id?> col-md-6" >
                    <div class="card" style="border:1px dashed; margin-top:25px; padding:10px;">
                    <h4 class="card-title text-center"><b><?=$data->nomor_paslon?> - <?=$data->nama?></b></h5>
                    <img src="<?=base_url().$data->foto?>" class="card-img-top" style="width:100%; " >
                    <div class="card-body">
                        <h5 class="card-title"><b><?=$data->ketua?></b></h5>
                        <h5 class="card-title"><b><?=$data->wakil?></b></h5>
                        <p class="card-text"><?=nl2br($data->desc)?></p>
                        <button type="button" class="btn  btn-warning btn-block button-del" value="<?=$data->id?>">Delete Paslon</button>
                    </div>
                    </div>
                    </div>
               <?php } ?>                   
  </div>
               <?php if($list==null){ ?>
              <div class="alert alert-secondary" role="alert" style="text-align: center;">
                    -No data-
                    </div>
              <?php }?>
              </div> 
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>