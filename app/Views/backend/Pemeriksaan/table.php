<?=$this->extend('backend/template')?>

<?=$this->section('content')?>

            <div class="container">
                <button class="float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>
                <table id='table-pemeriksaan' class="datatable table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kendaraan</th>
                            <th>Kilometer Sekarang</th>
                            <th>Catatan</th>
                            <th>Servie Advisor</th>
                            <th>Montir</th>
                            <th>Tagihan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <div id="modalForm" class="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Data Pemeriksaan</h4>
                            <button class="close" data-dismiss="modal">x</button>
                        </div>
                        <div class="modal-body">
                            <form id="formPemeriksaan" method="post" action="<?=base_url('pemeriksaan') ?>">
                            <input type="hidden" name="id" />
                            <input type="hidden" name="_method" />
                            <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" name="tgl" class="form-control">
                            </div> 
                            <div class="mb-3">
                                <label class="form-label">Kendaraan</label>
                                <input type="text" name="kendaraan_id" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kilometer Sekarang</label>
                                <input type="text" name="kilometer_skr" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Catatan</label>
                                <input type="text" name="catatan" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Servie Advisor</label>
                                <input type="text" name="sa_karyawan_id" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Montir</label>
                                <input type="text" name="mon_karyawan_id" class="form-control">
                            </div> 
                            <div class="mb-3">
                                <label class="form-label">Tagihan</label>
                                <input type="text" name="tagihan" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="statuspemeriksaan_id" class="form-control">
                                <?php
                                        use App\Models\StatuspemeriksaanModel;


                                        $r = (new StatuspemeriksaanModel())->findAll();
                                        
                                        foreach($r as $k){
                                            echo "<option value='{$k['id']}'>{$k['status']}</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" id="btn-menambahkan" >Menambahkan</button>
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
        
        
        $('form#formPemeriksaan').submitAjax({
        pre:()=>{
            $('button#btn-menambahkan').hide();
            
        },
        pasca:()=>{
            $('button#btn-menambahkan').show();

        },

        success:(response, status)=>{
            $("#modalForm").modal('hide');
            $("table#table-pemeriksaan").DataTable().ajax.reload();
        },

        error:(xhr, status)=>{
            alert('Maaf data salah');
        }

        });


        $('button#btn-menambahkan').on('click' , function(){
            $('form#formPemeriksaan').submit();

        });


        $('button#btn-tambah').on('click' , function(){
            $('#modalForm').modal('show');
            $('form#formPemeriksaan').trigger('reset');
            $('input[name=_method]').val('');
        });

        $('table#table-pemeriksaan').on('click', '.btn-light', function (){
            let id = $(this).data('id');
            let baseurl = "<?=base_url()?>";
            $.get(`${baseurl}/pemeriksaan/${id}`).done((e)=>{
                $('input[name=id]').val(e.id);
                $('input[name=tgl]').val(e.tgl);
                $('input[name=kendaraan_id]').val(e.kendaraan_id);
                $('input[name=kilometer_skr]').val(e.kilometer_skr);
                $('input[name=catatan]').val(e.catatan);
                $('input[name=sa_karyawan_id]').val(e.sa_karyawan_id);
                $('input[name=mon_karyawan_id]').val(e.mon_karyawan_id);
                $('input[name=tagihan]').val(e.tagihan);
                $('input[name=statuspemeriksaan_id]').val(e.statuspemeriksaan_id);
                $('#modalForm').modal('show');
                $('input[name=_method]').val('patch');

            });
        });

        $('table#table-pemeriksaan').on('click', '.btn-danger', function (){
            let konfirmasi = confirm ('yakin hapus data?');
            if(konfirmasi === true){
                let _id = $(this).data('id');
                let baseurl = "<?=base_url()?>";


                $.post(`${baseurl}/pemeriksaan`, {id:_id, _method:'delete'}).done(function(e){
                    $('table#table-pemeriksaan').DataTable().ajax.reload();
                });
            }
        });


        $('table#table-pemeriksaan').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('pemeriksaan/all')?>",
                method: 'GET'
            },
            columns:[
                {data: 'id',sortable:false, searchable:false,
                    render: (data,type,row,meta)=>{
                        return meta.settings._iDisplayStart + meta.row + 1;
                    }
                },
                {data: 'tgl',},
                {data: 'kendaraan_id',},
                {data: 'kilometer_skr',},
                {data: 'catatan',},
                {data: 'sa_karyawan_id',},
                {data: 'mon_karyawan_id',},
                {data: 'tagihan',},
                {data: 'status', render:(data,type,row,meta)=>{
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