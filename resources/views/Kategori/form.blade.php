<div class="modal fade" id="modalFormKategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalFormKategoriLabel" aria-hidden="true">  <div class="modal-dialog" role="document">
        <div class="modal-content"> 
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormKategoriLabel">Tambah Data</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Class">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="kategori">
                @csrf
                <div class="modal-body">
                    <div id="method"></div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-submit">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>



{{-- Modal Import --}}
<div class="modal fade" id="formImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="mdoal-title" id="exampleModalLabel">Import Data  Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('import-kategori') }}" enctype="multipart/form-data">
            <div class="modal-body">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="jenis" class="form-label">File Excel</label>
                            <input type="file" name="import" id="import">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                <button type="submit" class="btn btn-primary" id="btn-submit">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>