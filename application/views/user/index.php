<!-- Begin Page Content -->
<div class="container-fluid ">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <?= $this->session->flashdata('message'); ?>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="container testimonial-group ">
                <div class="row text-center">
                    <h1 class="h3 mb-0 text-gray-800">Profile Picture</h1>
                    <img src="<?= base_url() . 'assets/profile/' . $edit[0]['foto'] ?>"></img>
                </div>
                <br> <br>
                <?php echo form_open_multipart('User/Edit'); ?>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="firstname" name="firstname" placeholder="First Name" value="<?= $edit[0]['firstname']; ?>">
                        <?= form_error('firstname', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" id="lastname" name="lastname" placeholder="Last Name" value="<?= $edit[0]['lastname']; ?>">
                        <?= form_error('lastname', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= $edit[0]['email']; ?>" readonly>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="bdate"><b>Tanggal Lahir</b></label>
                        <input type="date" name="bdate" class="form-control" id="bdate" value="<?= $edit[0]['bdate']; ?>">
                        <?= form_error('bdate', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0 ">
                        <label for="no_telp"><b>Nomor Telepon</b></label>
                        <input type="number" class="form-control " id="no_telp" name="no_telp" placeholder="Nomor Telepon" value="<?= $edit[0]['no_telp']; ?>">
                        <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="photoprofile">Photo Profile</label>
                    <input type="file" class="form-control" id="profilePhoto" name="profilePhoto" placeholder="Foto Menu" value="<?= $edit[0]['foto'] ?>">
                </div>
                <input type="hidden" class="form-control" id="OldProfilePhoto" name="OldProfilePhoto" placeholder="Nama Menu" value="<?= $edit[0]['foto'] ?>" readonly>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Change Profile
                </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->