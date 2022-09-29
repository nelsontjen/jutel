<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
       <div class="input-group">
           <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
           <div class="input-group-append">
               <button class="btn btn-primary" type="button">
                   <i class="fas fa-search fa-sm"></i>
               </button>
           </div>
       </div>
   </form> -->

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Nav Item - Alerts -->

                <!-- Nav Item - Messages -->


                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="<?= base_url('auth/'); ?>" id="userDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span>Log In</span>
                        <i class="fas fa-fw fa-sign-in-alt"></i>
                    </a>
                </li>

            </ul>

        </nav>
        <!-- Content Wrapper -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">List Items</h1>
                <h1 class="h3 mb-0 text-gray-800"><?= $this->session->flashdata('message'); ?></h1>
            </div>

            <div class="form-inline">
                <?php echo form_open_multipart('noname/filter_search'); ?>
                <select class="form-control" name="filter">
                    <option selected="selected" disabled="disabled" value="">Filter By</option>
                    <option value="nama">Nama Hotel</option>
                    <option value="bintang">Bintang</option>
                    <option value="hargaMore">Harga lebih besar dari</option>
                    <option value="hargaLess">Harga lebih kecil dari</option>
                    <option value="kota">Lokasi (per Kota)</option>
                </select>
                <input class="form-control" type="text" name="search" value="" placeholder="Search...">
                <button class="btn btn-primary" type="submit" name="" value="Go">Go </button>
                </form>
            </div>
            <br>

            <table id="order" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Gambar Hotel</th>
                        <th>Nama Hotel</th>
                        <th>Bintang</th>
                        <th>Fasilitas</th>
                        <th>Lokasi</th>
                        <th>Harga per Hari</th>
                        <th>Kamar Tersedia</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $number = 1 ?>
                    <?php foreach ($hotel as $hotel) : ?>
                        <tr>
                            <td><?= $number ?></td>
                            <td>
                                <img src="<?= base_url() . 'assets/Hotel/' . $hotel['foto'] ?>" class="" style="width: 50%; height:auto">
                            </td>
                            <td><?= $hotel['nama'] ?></td>
                            <td>
                                <?php for ($i = 0; $i < $hotel['bintang']; $i++) {
                                    echo '<i class="fa fa-star"></i>';
                                } ?>
                            </td>
                            <td><?= $hotel['fasilitas'] ?></td>
                            <td><?= $hotel['kota'] ?></td>
                            <td>Rp. <?= $hotel['harga'] ?></td>
                            <td><?= $hotel['jumlah_kamar'] ?></td>
                            <td>
                                <a type="button" class="btn btn-success " href="<?= base_url('auth') ?>">booking</a>
                            </td>
                            <?php $number++ ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No. </th>
                        <th>Gambar Hotel</th>
                        <th>Nama Hotel</th>
                        <th>Bintang</th>
                        <th>Fasilitas</th>
                        <th>Lokasi</th>
                        <th>Harga per Hari</th>
                        <th>Kamar Tersedia</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- End of Main Content -->
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Restoran UTS IF430</span>
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
</body>

</html>