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
                      <th>Nomor Surat</th>
                      <th>Sifat </th>
                      <th>Lampiran </th>
                      <th>Hal </th>
                      <th>Tanggal Keluar</th>
                      <th>Ditujukkan Kepada</th>
                      <th>Nama Pemohon </th>
                      <th>Pembuat Surat </th>
                      <th>Action </th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      <th>No</th>
                      <th>Nomor Surat</th>
                      <th>Sifat </th>
                      <th>Lampiran </th>
                      <th>Hal </th>
                      <th>Tanggal Keluar</th>
                      <th>Ditujukkan Kepada</th>
                      <th>Nama Pemohon </th>
                      <th>Pembuat Surat </th>
                      <th>Action </th>
                      </tr>
                    </tfoot>
                    <tbody>
                      
                      <?php 
                        $no = 1;
                        foreach($surats as $row) { ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['nomor']?></td>
                                <td><?php echo $row['sifat']?></td>
                                <td><?php echo $row['lampiran']?></td>
                                <td><?php echo $row['hal']?></td>
                                <td><?php echo $row['tgl_keluar']?></td>
                                <td><?php echo $row['jabatan_penulis']?></td>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['created_by']?></td>
                                <td>
                                <a class="btn btn-warning" href="/kerangka/edit/<?php echo $row['id'] ?>"
                                data-toggle="tooltip" data-html="true" title="Update Template"
                                ><i class="fas fa-pen"></i></a>
                                <button  class="btn btn-danger remove" id="<?php echo $row['id']?>" type="submit" value="<?php echo $row['id']?>"
                                    data-toggle="tooltip" data-html="true" title="Tombol Hapus">
                                    <i class="fas fa-trash" tool></i> </button>

                                    <a  class="btn btn-info" href="/kerangka/view/<?php echo $row['id'] ?>"
                                    data-toggle="tooltip" data-html="true" title="Tombol Print Surat"
                                    ><i class="fas fa-print"></i></a>
                                </td>
                              
                             
                                   
                              <?php }?>
                               
                                </td>
                            </tr>
                       
                   
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
      window.location.href = '/kerangka/delete/' +id;

      // $.ajax({
      //   url: '/user/delete/'+id,
      //   type: 'POST',
      //   error: function() {

      //       alert('Something is wrong');

      //    },

      //    success: function(data) {

      //       console.log(data);
      //       swal({ title: "Deleted!", text: "Your data has been deleted.", type: "success" }, function(){ location.reload(); });

      //    }});

    } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");

    }

  });

});



</script>



    


