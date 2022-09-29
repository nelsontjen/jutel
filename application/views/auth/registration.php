<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="firstname" name="firstname" placeholder="First Name" value="<?= set_value('firstname'); ?>">
                                    <?= form_error('firstname', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="lastname" name="lastname" placeholder="Last Name" value="<?= set_value('lastname'); ?>">
                                    <?= form_error('lastname', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="bdate"><b>Tanggal Lahir</b></label>
                                    <input type="date" name="bdate" class="form-control" id="bdate">
                                    <?= form_error('bdate', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0 ">
                                    <label for="no_telp"><b>Nomor Telepon</b></label>
                                    <input type="number" class="form-control " id="no_telp" name="no_telp" placeholder="Nomor Telepon" value="<?= set_value('no_telp'); ?>">
                                    <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="photoprofile">Photo Profile</label>
                                <input type="file" class="form-control" id="profilePhoto" name="profilePhoto" placeholder="Foto Menu" value="">
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                            <hr>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>