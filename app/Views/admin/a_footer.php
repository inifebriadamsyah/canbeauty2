<?= $this->extend('admin/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800" style="font-weight: 700;">
            Footer Area
        </h2>
    </div>
</div>
<div class="row">
    <div class="col-12 ">
        <div class="card my-2 mx-4">
            <div class="col-md-4">
                <a href="javascript:void(0);" type="button" data-toggle="modal" data-target="#createTugas" class="btn btn-success mb-3 my-3"> + Tambah Konten </a>
            </div>

            <div class="modal fade" id="createTugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="font-weight:700">Edit Footer Area</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Footer Text:</label>
                                    <textarea class="form-control" id="message-text"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Link Facebook:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Link Instagram:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <!--
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Format Pengumpulan
                                        File</label>
                                    <select name="ctl00$MainContent$ddltipe" id="MainContent_ddltipe" class="form-control form-control-rounded" required="required">
                                        <option value="Please Select">Please Select</option>
                                        <option value="LAPORAN">Dokumen (PDF/Doc/xlx)</option>
                                        <option value="LAPORAN">Gambar (PNG/JPG)</option>
                                        <option value="ABSENSI">Video</option>

                                    </select>
                                </div>
                                -->

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Footer Text</th>
                        <th scope="col">Link Facebook:</th>
                        <th scope="col">Link Instagram:</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($footer as $f) : ?>
                        <tr>
                            <th scope="row">
                                <?= $i++; ?>
                            </th>
                            <td><?= $f['footer_text']; ?></td>
                            <td><?= $f['facebook']; ?></td>
                            <td><?= $f['instagram']; ?></td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-warning"> Edit </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>