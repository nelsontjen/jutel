<!-- Begin Page Content -->
<div class="container-fluid ">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Booking</h1>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <?= $this->session->flashdata('message'); ?>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="container testimonial-group ">
                <div class="row text-center">
                    <h1 class="h3 mb-0 text-gray-800">Hotel Preview</h1>
                    <img src="<?= base_url() . 'assets/Hotel/' . $hotel[0]['foto'] ?>" style="width: 50%; height:auto"></img>
                </div>
                <br> <br>
                <?php echo form_open_multipart('User/booking_awal'); ?>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="" name="" placeholder="Email Address" value="<?= $user['firstname'] . ' ' . $user['lastname']; ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="" name="" placeholder="Email Address" value="<?= $user['email']; ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="" name="" placeholder="Email Address" value="<?= $user['no_telp']; ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="namaHotel" name="namaHotel" placeholder="First Name" value="<?= $hotel[0]['nama']; ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="kotaHotel" name="kotaHotel" placeholder="Email Address" value="<?= $hotel[0]['kota']; ?>" readonly>
                </div>
                <div class="form-group">
                    <div class="form-control form-control-user" id="bintangHotel" name="bintangHotel" aria-readonly="true">
                        <?php for ($i = 0; $i < $hotel[0]['bintang']; $i++) {
                            echo "<i class='fa fa-star'></i>";
                        } ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="bdate"><b>Tanggal Check-In</b></label>
                        <input type="date" name="tanggal_checkIn" class="form-control" id="tanggal_checkIn" value="">
                        <?= form_error('tanggal_checkIn', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0 ">
                        <label for="no_telp"><b>Tanggal Check-Out</b></label>
                        <input type="date" class="form-control " id="tanggal_checkOut" name="tanggal_checkOut" placeholder="" value="">
                        <?= form_error('tanggal_checkOut', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="bdate"><b>Jumlah Kamar yang mau dipesan</b></label>
                        <input type="number" name="jumKamar" class="form-control" id="jumKamar" value="1" min="1">
                        <?= form_error('jumKamar', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0 ">
                        <label for="no_telp"><b>Harga per kamar dan per hari</b></label>
                        <input type="text" class="form-control " id="" name="" placeholder="" value="<?= $hotel[0]['harga'] ?>" readonly>
                    </div>
                </div>
                <input type="hidden" id="idHotel" name="idHotel" value="<?= $hotel[0]['id']; ?>" readonly>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Book
                </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->