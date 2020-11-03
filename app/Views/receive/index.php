 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Letters</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('/'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Letters</li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $arr; ?></li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                      <th>No</th>
                      <th>Judul Surat </th>
                      <th>File Surat </th>
                      <th>Nama Penerima </th>
                      <th>Pengirim</th>
                      <th>Tanggal Kirim</th>
                      <th>Status Surat</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      <th>No</th>
                      <th>Judul Surat </th>
                      <th>File Surat </th>
                      <th>Nama Penerima </th>
                      <th>Pengirim</th>
                      <th>Tanggal Kirim</th>
                      <th>Status Surat</th>
                      <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      
                      <?php 
                        $no = 1;
                        foreach($surats as $row) { ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['judul_surat']?></td>
                                <td><?php echo $row['file_surat']?></td>
                                <td><?php echo $row['nama_penerima']?></td>
                                <td><?php echo $row['pengirim']?></td>
                                <td><?php echo str_replace('`', '',$row['waktu'])?></td> 
                                <td><?php
                                          if ($row['status'] == 1) {
                                               echo "Dikirim";
                                          } else if($row['status']== 2) {
                                               echo "Telah dibaca";
                                          } else if ($row['status']== 3) {
                                               echo "Permintaan Surat Balasan";}?></td> 
                                <td>
                                <a class="btn btn-success" 
                                href="<?php echo base_url().'/uploads/'.$row['file_surat']?>"  data-toggle="tooltip" data-html="true" 
                                title="Tombol Download File" download>
                              <i class="fa fa-download"></i></a>  
                              <?php if (session('role_id') !== '2') { ?>
                                <a class="btn btn-warning" href="/receive/edit/<?php echo $row['id'] ?>"
                                data-toggle="tooltip" data-html="true" title="Update Status"
                                ><i class="fas fa-pen"></i></a>
                                    <a  class="btn btn-info" href="/receive/view/<?php echo $row['id'] ?>"
                                    data-toggle="tooltip" data-html="true" title="Tombol View"
                                    ><i class="fas fa-eye"></i></a>
                                   
                              <?php }?>
                               
                                </td>
                            </tr>
                        <?php }?>
                      
                   
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

        </div>
        <!---Container Fluid-->
      </div>
      



    


