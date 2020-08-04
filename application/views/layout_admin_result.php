<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Result 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Result</li>
      </ol>
    </section>
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">List Result</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">
            <?php if($list!=null){ ?>

            <div class="row">
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <br/>
              <h3><?=$jumlah_peserta?></h3>
              <br/>
              <p>Jumlah Pemilih</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer"></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <br/>
            <h3><?=number_format(($jumlah_vote/$jumlah_peserta)*100,2)?>%</h3>
            <br/>
              <p>Jumlah Vote <?=$jumlah_vote?></p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer"></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
              <?php 
$no =0;
foreach ($paslon as $data) { $no++;
    $filterBy = $data->nomor_paslon;
    $new[$no] = array_filter($list, function ($var) use ($filterBy) {return ($var->vote == $filterBy);});
    echo "P ".$data->nomor_paslon." : ".count($new[$no])." (".number_format(((count($new[$no])/$jumlah_vote)*100),2)."%) <br/>";
} ?>

              </h3>

              <p>Hasil Vote</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer"></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
<?php } ?>
            <br/>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Generate Vote</th>
                  <th>Date</th>
                  <th>Vote</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no =0;
                foreach ($list as $data) { $no++;?>
                <tr class="tb<?=$data->id?>">
                  <td><?=$no?></td>
                  <td><?=$data->generate_vote?></td>
                  <td><?=$data->create_date?></td>
                  <td>
                  <?=$data->vote?>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
              </table>     
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