 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Surat Backup</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('/'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Surat Backup</li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $arr; ?></li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6>
                  <a href="/backup/add" class="btn btn-success pull-right"> Add Data</a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                      <th>No</th>
                      <th>Nomor Surat</th>
                      <th>Judul Surat </th>
                      <th>File </th>
                      <th>Disimpan Tanggal</th>
                      <th>Disimpan Oleh</th>
                      <!-- <th>Status Surat</th> -->
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      <th>No</th>
                      <th>Nomor Surat</th>
                      <th>Judul Surat </th>
                      <th>File </th>
                      <th>Disimpan Tanggal</th>
                      <th>Disimpan Oleh</th>
                      <!-- <th>Status Surat</th> -->
                      <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      
                      <?php 
                        $no = 1;
                        foreach($backup as $row) { ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['nomor']?></td>
                                <td><?php echo $row['judul']?></td>
                                <td><?php echo $row['file']?></td>
                                <!-- <td><?php //echo $row['user']?></td>-->
                               <td><?php echo str_replace('`', '',$row['waktu'])?></td>
                                <td><?php echo $row['disimpan_oleh']?></td>  
                                <!-- <td><?php
                                          // if ($row['status'] == 1) {
                                          //   echo "dikirim";
                                          // } else if($row['status']== 2) {
                                          //   echo "dibaca";
                                          // } else if ($row['status']== 3) {
                                          //   echo "Permintaan Surat Balasan";}?></td> -->
                                <td>
                                <a class="btn btn-success" 
                                href="<?php echo base_url().'/uploads/'.$row['file']?>"  data-toggle="tooltip" data-html="true" 
                                title="Tombol Download File" download>
                              <i class="fa fa-download"></i></a>  
                                <a class="btn btn-warning" href="/backup/edit/<?php echo $row['id'] ?>"
                                data-toggle="tooltip" data-html="true" title="Tombol Edit"
                                ><i class="fas fa-pen"></i></a>
                                    <a  class="btn btn-info" href="/backup/view/<?php echo $row['id'] ?>"
                                    data-toggle="tooltip" data-html="true" title="Tombol View"
                                    ><i class="fas fa-eye"></i></a>
                                  <button class="btn btn-danger remove" id="<?php echo $row['id']?>" type="submit" value="<?php echo $row['id']?>"
                                    data-toggle="tooltip" data-html="true" title="Tombol Hapus">
                                    <i class="fas fa-trash" tool></i> </button>
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

      

<script type="text/javascript">

$(".remove").click(function(){

    var id = $(this).val();

console.log(id);

   swal({ title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: true,
            closeOnCancel: true

  },

  function(isConfirm) {
    if (isConfirm) {
      window.location.href = '/backup/delete/'+id;
      // $.ajax({
      //   url: '/masuk/delete/'+id,
      //   type: 'POST',
      //   error: function() {
            
      //       alert('Something is wrong');

      //    },

      //    success: function(data) {
      //     // console.log(<?php //echo session()->getFlashData('error'); ?>);
      //     // window.location.href = '/masuk/delete/'+id;
          
      //         // swal({ title: "Deleted!", 
      //         // text: <?php //echo session()->getFlashData('error'); ?>,
      //         // timer: 1500,
      //         // showConfirmButton: false,
      //         //  type: "success" }, function(){ location.reload(); });
           
      //      alert(<?php // echo session()->getFlashData('error'); ?>)

      //    }});

    } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");

    }

  });

});



</script>


