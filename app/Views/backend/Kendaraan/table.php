<?=$this->extend('backend/template')?>

<?=$this->section('content')?>


            <div class="container">

            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Table Kendaraan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <button class="float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>
                <table id='table-kendaraan' class="datatable table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Jenis Kendaraan</th>
                            <th>No Polisi</th>
                            <th>Tahun</th>
                            <th>Warna Kendaraan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <div id="modalForm" class="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Kendaraan</h4>
                            <button class="close" data-dismiss="modal">x</button>
                        </div>
                        <div class="modal-body">
                            <form id="formkendaraan" method="post" action="<?=base_url('kendaraan') ?>">
                            <input type="hidden" name="id" />
                            <input type="hidden" name="_method" />
                            <div class="mb-3">
                                <label class="form-label">Pelanggan</label>
                                <select name="pelanggan_id" class="form-control">
                                    <?php
                                        use App\Models\PelangganModel;


                                        $r = (new PelangganModel())->findAll();
                                        
                                        foreach($r as $k){
                                            echo "<option value='{$k['id']}'>{$k['nama_depan']}</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kendaraan</label>
                                <input type="text" name="jeniskendaraan_id" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No Polisi</label>
                                <input type="text" name="no_pol" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun</label>
                                <input type="text" name="tahun" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Warna Kendaraan</label>
                                <select name="warnakendaraan_id" class="form-control">
                                    <?php
                                        use App\Models\WarnaKendaraanModel;


                                        $r = (new WarnaKendaraanModel())->findAll();
                                        
                                        foreach($r as $k){
                                            echo "<option value='{$k['id']}'>{$k['warna']}</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" id="btn-menambahkan" >Menambahkan</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>

            <?=$this->endSection()?>
<?=$this->section('script')?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js"
></script>
<link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet"> 
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        
        
        $('form#formkendaraan').submitAjax({
        pre:()=>{
            $('button#btn-menambahkan').hide();
            
        },
        pasca:()=>{
            $('button#btn-menambahkan').show();

        },

        success:(response, status)=>{
            $("#modalForm").modal('hide');
            $("table#table-kendaraan").DataTable().ajax.reload();
        },

        error:(xhr, status)=>{
            alert('Maaf data salah');
        }

        });


        $('button#btn-menambahkan').on('click' , function(){
            $('form#formkendaraan').submit();

        });


        $('button#btn-tambah').on('click' , function(){
            $('#modalForm').modal('show');
            $('form#formkendaraan').trigger('reset');
            $('input[name=_method]').val('');
        });

        $('table#table-kendaraan').on('click', '.btn-light', function (){
            let id = $(this).data('id');
            let baseurl = "<?=base_url()?>";
            $.get(`${baseurl}/kendaraan/${id}`).done((e)=>{
                $('input[name=id]').val(e.id);
                $('input[name=pelanggan_id]').val(e.pelanggan_id);
                $('input[name=jeniskendaraan_id]').val(e.jeniskendaraan_id);
                $('input[name=no_pol]').val(e.no_pol);
                $('input[name=tahun]').val(e.tahun);
                $('input[name=warnakendaraan_id]').val(e.warnakendaraan_id);
                $('#modalForm').modal('show');
                $('input[name=_method]').val('patch');

            });
        });

        $('table#table-kendaraan').on('click', '.btn-danger', function (){
            let konfirmasi = confirm ('yakin hapus data?');
            if(konfirmasi === true){
                let _id = $(this).data('id');
                let baseurl = "<?=base_url()?>";


                $.post(`${baseurl}/kendaraan`, {id:_id, _method:'delete'}).done(function(e){
                    $('table#table-kendaraan').DataTable().ajax.reload();
                });
            }
        });


        $('table#table-kendaraan').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('kendaraan/all')?>",
                method: 'GET'
            },
            columns:[
                {data: 'id',sortable:false, searchable:false,
                    render: (data,type,row,meta)=>{
                        return meta.settings._iDisplayStart + meta.row + 1;
                    }
                },
                {data: 'nama_depan', render:(data,type,row,meta)=>{
                    return `${data}`;
                }},
                {data: 'jeniskendaraan_id',},
                {data: 'no_pol',},
                {data: 'tahun',},
                {data: 'warna', render:(data,type,row,meta)=>{
                    return `${data}`;
                }},
                {data: 'id',
                    render: (data,type,meta,row)=>{
                        var btnEdit     = `<button class='btn btn-light' data-id='${data}'> Edit</button>`;
                        var btnHapus    = `<button class = 'btn btn-danger 'data-id='${data}'> Hapus </button>`;
                        return btnEdit + btnHapus;
                    }

                },
            ]
        });
    });
</script>


<?=$this->endSection()?>