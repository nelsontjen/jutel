  <!-- Footer -->
  <footer class="sticky-footer bg-white">
      <div class="container my-auto">
          <div class="copyright text-center my-auto">
              <span>Copyright &copy; Jutel UAS IF430</span>
          </div>
          <div class="copyright text-center mt-3">
              <span>Contact Us : </span>
          </div>
          <div class="copyright text-center mt-1">
              <span>nelson1@student.umn.ac.id </span>
          </div>
          <div class="copyright text-center mt-1">
              <span>hindra.pangadi@student.umn.ac.id </span>
          </div>
          <div class="copyright text-center mt-1">
              <span>juan.tanandi@student.umn.ac.id </span>
          </div>
          <div class="copyright text-center mt-1">
              <span>kevin.hindra@student.umn.ac.id </span>
          </div>
      </div>
  </footer>
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Mau Keluar ?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Terima kasih sudah mengunjungi website kami !!!</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
              </div>
          </div>
      </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>
  <script>
      AOS.init();
  </script>
  <?php foreach ($crud['js_files'] as $file) : ?>
      <script src="<?php echo $file; ?>"></script>
  <?php endforeach; ?>

  </body>

  </html>