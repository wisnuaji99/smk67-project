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
                      <th>id</th>
                      <th>Nomor</th>
                      <th>Sifat </th>
                      <th>Lampiran </th>
                      <th>Hal </th>
                      <th>Tanggal Keluar</th>
                      <th>Jabatan Penulis</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      <th>id</th>
                      <th>Nomor</th>
                      <th>Sifat </th>
                      <th>Lampiran </th>
                      <th>Hal </th>
                      <th>Tanggal Keluar</th>
                      <th>Jabatan Penulis</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      
                      <?php 
                        $no = 1;
                        foreach($surats as $row) { ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['Nomor']?></td>
                                <td><?php echo $row['sifat']?></td>
                                <td><?php echo $row['lampiran']?></td>
                                <td><?php echo $row['hal']?></td>
                                <td><?php echo $row['tgl_keluar']?></td>
                                <td><?php echo $row['jabatan_penulis']?></td>
                                
                                <a class="btn btn-success" 
                                href="<?php echo base_url().'/uploads/'.$row['file_surat']?>"  data-toggle="tooltip" data-html="true" 
                                title="Tombol Download File" download>
                              <i class="fa fa-download"></i></a>  
                              <?php if (session('role_id') !== '2') { ?>
                                <a class="btn btn-warning" href="/template/edit/<?php echo $row['id'] ?>"
                                data-toggle="tooltip" data-html="true" title="Update Template"
                                ><i class="fas fa-pen"></i></a>
                                    <a  class="btn btn-info" href="/template/view/<?php echo $row['id'] ?>"
                                    data-toggle="tooltip" data-html="true" title="Tombol View Surat"
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
      



    


