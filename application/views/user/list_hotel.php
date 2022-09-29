<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Items</h1>
        <h1 class="h3 mb-0 text-gray-800"><?= $this->session->flashdata('message'); ?></h1>
    </div>

    <div class="form-inline">
        <?php echo form_open_multipart('User/filter_search'); ?>
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
                        <?php echo form_open_multipart('User/booking_awal'); ?>
                        <input type="hidden" id="idHotel" name="idHotel" value="<?= $hotel['id']; ?>" readonly>
                        <button type="submit" class="btn btn-success ">booking</button>
                        </form>
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