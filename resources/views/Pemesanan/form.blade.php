<div class="modal fade" id="modalFormPemesanan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalFormPemesananLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormPemesananLabel">Tambah Pemesanan</h5>
                <button type="button" class="btn-close" style="font-size: 2rem;" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="pemesanan" enctype="multipart/form-data">
                    @csrf
                    <div id="method"></div>
                    <div class="mb-3">
                        <label for="meja_id" class="form-label">Meja Id</label>
                        <input type="text" class="form-control" id="meja_id" name="meja_id">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_pemesanan" class="form-label">Tanggal Pemesanan</label>
                        <input type="text" class="form-control" id="tanggal_pemesanan" name="tanggal_pemesanan">
                    </div>

                    <div class="mb-3">
                        <label for="jam_mulai" class="form-label">Jam Mulai</label>
                        <input type="text" class="form-control" id="jam_mulai" name="jam_mulai">
                    </div>

                    <div class="mb-3">
                        <label for="jam_selesai" class="form-label">Jam Selesai</label>
                        <input type="text" class="form-control" id="jam_Selesai" name="jam_Selesai">
                    </div>

                    <div class="mb-3">
                        <label for="nama_pemesan" class="form-label">Naama pemesan</label>
                        <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesanan">
                    </div>

                    <div class="mb-3">
                        <label for="jumlah_pelanggan" class="form-label">Jumlah pelanggan</label>
                        <input type="text" class="form-control" id="jumlah_pelanggan" name="jumlah_pelanggan">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>