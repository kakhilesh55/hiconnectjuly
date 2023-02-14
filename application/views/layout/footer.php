 <footer class="main-footer">
        <div class="footer-left">
          <a href="https://weblyconnect.com/">Webly Connect</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>

          </div>
  </div>
<script>
   function copylink() {
        /* Get the text field */
        var copyText = document.getElementById("card_link");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);
        
        /* Alert the copied text */
         swal('Copied the text: ' , copyText.value, 'success');
      }
      
      //Messagebox hide after 3 seconds
      $(".alert-success").show().delay(5000).fadeOut();
      
      </script>
  <!-- JS Libraies -->
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="<?php echo base_url(); ?>assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>assets/js/page/index.js"></script>
  <script src="<?php echo base_url(); ?>assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
   <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>assets/js/page/create-post.js"></script>
    <!-- JS Libraies -->
  <script src="<?php echo base_url(); ?>assets/bundles/dropzonejs/min/dropzone.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bundles/sweetalert/sweetalert.min.js"></script>
  <!-- Template JS File -->
  <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
   <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>assets/js/page/multiple-upload.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
            <!-- JS Libraies -->
  <script src="<?php echo base_url();?>assets/bundles/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url();?>assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url();?>assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url();?>assets/js/page/datatables.js"></script>
</body>

</html>