  
          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="<?php  echo base_url('login/logout'); ?>" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
  
  <!-- Footer -->
  <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://github.com/wisnuaji99/smk67-project" target="_blank">WisnuAji</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

   <!-- Page level plugins -->
   <script src="<?php echo base_url().'/template/vendor/datatables/jquery.dataTables.min.js' ?>"></script>
  <script src="<?php echo base_url().'/template/vendor/datatables/dataTables.bootstrap4.min.js' ?>"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
 
  <script src="<?php echo base_url().'/template/vendor/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
  <script src="<?php echo base_url().'/template/vendor/jquery-easing/jquery.easing.min.js'?>"></script>
  <script src="<?php echo base_url().'/template/js/ruang-admin.min.js'?>"></script>
  <!-- <script src="<?php// echo base_url().'/template/vendor/chart.js/Chart.min.js'?>"></script>
  <script src="<?php// echo base_url().'/template/js/demo/chart-area-demo.js'?>"></script>   -->
  <script src="<?php echo base_url().'/template/vendor/toast/js/toastr.min.js ' ?>"></script>  
   <!-- Select2 -->
   <script src="<?php echo base_url().'/template/vendor/select2/dist/js/select2.min.js' ?>"></script>
   <script>
         $('.select2-single').select2();

        // Select2 Single  with Placeholder
        $('.select2-single-placeholder').select2({
          placeholder: "Pilih Surat",
          allowClear: true
        });      

        // Select2 Multiple
        $('.select2-multiple').select2({
          placeholder: "Pilih Penerima",
          allowClear: true
        });
   </script>

    <script>
          toastr.options = {
            "debug": false,
            "positionClass": "toast-top-full-width",
            "onclick": null,
            "fadeIn": 300,
            "fadeOut": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000
          }
          <?php if (session()->getFlashData('success')) {?>
              toastr.success("<?php echo session()->getFlashData('success'); ?>");
          <?php } else if (session()->getFlashData('error')) {?>
              toastr.error("<?php echo session()->getFlashData('error'); ?>");
          <?php } else if (session()->getFlashData('warning')) {?>
              toastr.warning("<?php echo session()->getFlashData('warning'); ?>");
          <?php } else if (session()->getFlashData('info')) {?>
              toastr.info("<?php echo session()->getFlashData('info'); ?>");
          <?php } else if (session()->keepFlashdata('error')){ ?>
              toastr.error("<?php echo session()->keepFlashData('error'); ?>");
          <?php } ?>



    </script>

</body>

</html>