<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Pemilih 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List Pemilih</li>
      </ol>
    </section>
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Generate Pemilih</h3> 
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            <form role="form" class="form-add">
              <div class="hasil"></div>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputName">NIM Awal</label>
                  <input type="text" class="form-control" name="awal" required="true" placeholder="NIM Awal">
                </div>
                <div class="form-group">
                  <label for="inputName">NIM Akhir</label>
                  <input type="text" class="form-control"  name="akhir" required="true" placeholder="NIM Akhir">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            <br/>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>link</th>
                  <th>Vote</th>
                  <th style="width: 85px;">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                if(is_numeric($page)){
                $no=$page;}else{
                  $no=0;
                }
                foreach ($list as $data) { $no++;?>
                <tr class="tb<?=$data->id?>">
                  <td><?=$no?></td>
                  <td><?=$data->nim?></td>
                  <td><a href="<?=base_url()?>vote/<?=$data->generate?>" ><?=base_url()?>vote/<?=$data->generate?></a></td>
                  <td><?php if($data->vote==True){ echo "Sudah"; }else{ echo "Belum";}?></td>
                  <td>
                    <button class="btn btn-warning button-del" value="<?=$data->id?>">Delete</button>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
              <?php if($list==null){ ?>
              <div class="alert alert-secondary" role="alert" style="text-align: center;">
                    -No data-
                    </div>
              <?php }?>
            </div>
            <div class="box-footer clearfix">
             <?php echo $pagination; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>