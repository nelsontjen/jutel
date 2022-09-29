<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Booking List</h1>
        <h1 class="h3 mb-0 text-gray-800"><?= $this->session->flashdata('message'); ?></h1>
    </div>


    <table id="order" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No. </th>
                <th>Order ID </th>
                <th>Nama Hotel</th>
                <th>Tanggal Check In</th>
                <th>Tanggal Check Out</th>
                <th>Tanggal Order</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $number = 1 ?>
            <?php foreach ($hotel as $hotel) : ?>
                <tr>
                    <td><?= $number ?></td>
                    <td>
                        <?= $hotel['order_id']; ?>
                    </td>
                    <td><?= $hotel['nama'] ?></td>
                    <td>
                        <?= $hotel['tgl_checkIn'] ?>
                    </td>
                    <td><?= $hotel['tgl_checkOut'] ?></td>
                    <td><?= $hotel['tgl_order'] ?></td>
                    <td>
                        <button type="submit" class="btn btn-success " data-toggle="modal" data-target="#myModal<?php echo $hotel['order_id']; ?>">Detail</button>
                        </form>
                    </td>
                    <?php $number++ ?>
                </tr>
                <div class=" modal fade" id="myModal<?php echo $hotel['order_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Invoice Booking</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="" name="" placeholder="Nama" value="<?= $hotel['firstname'] . ' ' . $hotel['lastname']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="" name="" placeholder="Email Address" value="<?= $hotel['email']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="" name="" placeholder="Nomor telepon" value="<?= $hotel['no_telp']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="bdate"><b>Nama Hotel</b></label>
                                    <input type="text" class="form-control form-control-user" id="namaHotel" name="namaHotel" placeholder="First Name" value="<?= $hotel['nama']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="bdate"><b>Lokasi Hotel</b></label>
                                    <input type="text" class="form-control form-control-user" id="kotaHotel" name="kotaHotel" placeholder="Email Address" value="<?= $hotel['kota']; ?>" readonly>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="bdate"><b>Tanggal Check-In</b></label>
                                        <input type="date" name="tanggal_checkIn" class="form-control" id="tanggal_checkIn" value="<?= $hotel['tgl_checkIn'] ?>" readonly>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0 ">
                                        <label for="no_telp"><b>Tanggal Check-Out</b></label>
                                        <input type="date" class="form-control " id="tanggal_checkOut" name="tanggal_checkOut" placeholder="" value="<?= $hotel['tgl_checkOut'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="bdate"><b>Jumlah Kamar yang mau dipesan</b></label>
                                        <input type="number" name="jumKamar" class="form-control" id="jumKamar" value="<?= $hotel['kamar'] ?>" readonly min="1">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0 ">
                                        <label for="no_telp"><b>Total Harga</b></label>
                                        <input type="text" class="form-control " id="totHarga" name="totHarga" placeholder="" value="<?= $hotel['totalHarga'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bdate"><b>Tanggal Booking</b></label>
                                    <input type="text" class="form-control form-control-user" id="tanggalOrder" name="tanggalOrder" placeholder="Email Address" value="<?= $hotel['tgl_order']; ?>" readonly>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No. </th>
                <th>Order ID </th>
                <th>Nama Hotel</th>
                <th>Tanggal Check In</th>
                <th>Tanggal Check Out</th>
                <th>Tanggal Order</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>