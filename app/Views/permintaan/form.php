<?php

$id = isset($surat) ? $surat->id : "";
$judul = isset($surat) ? $surat->judul_surat : "";
$file = isset($surat) ? $surat->file_surat : "";
$penerima = isset($surat) ? $surat->nama_penerima : "";
$waktu = isset($surat) ? $surat->waktu : "";
$pengirim = isset($surat) ? $surat->pengirim : "";
$status = isset($surat) ? $surat->status : "";
$v = isset($v) ? "readonly" : "";
$btn = isset($surat) ? "Ubah" : "Simpan";
?>
<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Request Letter</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('/hello'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Request Letter</li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $arr; ?></li>
            </ol>
          </div>
       
       <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6>
                </div>
                <div class="card-body">
                  <form action="<?php echo site_url($urlmethod) ?>" method="post"  enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                 
                  <div class="form-group">
                    <label for="select2Single">Judul Surat</label>
                  
                          <div style="padding:20px;">
                            <b><?php echo $judul; ?></b>&nbsp;
                            <a class="btn btn-success" 
                                href="<?php echo base_url().'/uploads/'.$judul?>"  data-toggle="tooltip" data-html="true" 
                                title="Tombol Download File" download>
                                <i class="fa fa-download"></i></a> 
                          </div>
        
                  </div>

                  <div class="form-group">

                  <?php if ($v == "") { ?>
                    
                    <label for="select2Single">Status Surat</label>
                  
                      <select class="select2-single form-control" name="status" id="select2Single">
                      <?php if (isset($surat)) { ?>

                        <option value="<?php echo $status; ?>">
                          <?php 
                          if ($status == 1) {
                            echo "Dikirim";
                          } elseif ($status == 2) {
                            echo "Dibaca";
                          } elseif ($status == 3) {
                            echo "Prmintaan Surat Balasan";
                          } 
                           
                          ?>
                        </option>
                          
                      <?php } else { ?>
                        
                        <option value="">Select Status</option>

                      <?php   } ?>
                     
                      <option value="1">Dikirim</option>
                      <option value="2">Dibaca</option>
                      <option value="3">Permintaan Surat Balasan</option>
                    </select>

                    <?php }?>

                  
                    </div>
        
                <?php  if ($v != "") { ?>
                  
                  <div>
                      <label>Status</label>
                      <p>
                      <?php
                          if ($status == 1) {
                                echo "Dikirim";
                             } else if($status == 2) {
                                echo "Telah dibaca";
                              } else if ($status == 3) {
                                echo "Permintaan Surat Balasan";}?>
                      </p>
                    </div>

                    <div>
                      <label>Pengirim</label>
                      <p><?php echo $pengirim; ?></p>
                    </div>

                    <div>
                      <label>Waktu Kirim</label>
                      <p><?php echo str_replace('`', '',$waktu);?></p>
                    </div>

                <?php }  ?>
                  
                    <?php if ($v == "") { ?>
                      <button type="submit" class="btn btn-primary"><?php echo $btn; ?></button>
                    <?php }?>
                    <a href="/permintaan" class="btn btn-primary" >Kembali</a>
                  </form>
                </div>
              </div>
            </div>
        </div>

   