<!-- Nav Bar Login Session -->
<?php
if ($this->session->userdata('data_session') == null) {
    $this->load->view('component/navbar');
} else {
    // $this->load->view('component/navbar_after_login');
    $this->load->view('mitra/component/navbar_after_login');
}
?>
<!-- End Nav Bar Login Session -->
<?php
/*
<!-- .................................. -->
<!-- ...........COPYRIGHT ............. -->
<!-- Authors : Hisyam Husein .......... -->
<!-- Email : hisyam.husein@gmail.com .. -->
<!-- About : hisyambsa.github.io ...... -->
<!-- Instagram : @hisyambsa............ -->
<!-- .................................. -->
*/
?>
<!-- library -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" /> -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/css/fileinput.min.css" integrity="sha512-8KeRJXvPns3KF9uGWdZW18Azo4c1SG8dy2IqiMBq8Il1wdj7EWtR3EGLwj+DnvznrRjn0oyBU+OEwJk7A79n7w==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/js/fileinput.min.js" integrity="sha512-vDrq7v1F/VUDuBTB+eILVfb9ErriIMW7Dn3JC/HOQLI8ZzTBTRRKrKJO3vfMmZFQpEGVpi+EYJFatPgVFxOKGA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/js/locales/id.min.js" integrity="sha512-jzCNGQc2Inz0st0pcHOFXbRuZSP6AoRDZk5gV++BA1v9T70FR612nsMmKZw+nuHP/UaZ/RdC5o5mkXQK3YOQVg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/themes/fas/theme.min.js" integrity="sha512-BeQMmfGMfVp5kEkEGxUtlT5R9+m7jDVr5LDFCG2EK9VR50cEhR0kKzD5bn3XtSit/qNoYQUtr405lf5aSCSF8A==" crossorigin="anonymous"></script>
<style>
    .file-drop-zone {
        min-height: 0px;
    }

    .file-drop-zone-title {
        padding: 0px;
        font-size: 16px;
    }
</style>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.1.2/css/rowGroup.dataTables.min.css">

<!-- ./ library -->
<div class="form-project my-4 py-3">
    <div class="container">
        <div class="row">

            <div class="col-md-12 border p-5" style="background-color: rgba(204,227,250,0.50)">
                <div class="row border-bottom mb-5">
                    <div class="col-md-6">
                        <div class="d-flex flex-row">
                            <img src="<?= base_url('asset/img/project-list.png'); ?>" class="img-fluid mr-3" style="height:1.5rem">
                            <div class="d-flex flex-column">
                                <h6 class="poppins-bold mt-0">
                                    <?=
                                        $dataBid->post_name;
                                    // empty($val->category_id) ? $val->category_en : $val->category_id;
                                    ?>
                                </h6>
                                <p class=""><?= $dataBid->name; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 pb-3">
                        <div class="d-flex flex-column text-right">
                            <h6 class="poppins-bold mt-0">IDR <?= number_format($dataBid->budget_min, 0, '', '.'); ?>-<?= number_format($dataBid->budget_max, 0, '', '.'); ?> </h6>
                            <h6>Jenis Proyek : <?= empty($dataBid->category_id) ? $dataBid->category_en : $dataBid->category_id; ?></h6>
                            <h6>Luas Tanah : <?= $dataBid->area; ?> m2</h6>
                            <h6><i class="far fa-clock" style="font-size:1.3rem"></i> <span class="color-red mx-1">Tutup Tender</span> <?= $dataBid->selisih . ' hari lagi'; ?></h6>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?= form_open_multipart('bid_project/savebid', 'class="needs-validation" novalidate'); ?>

                        <div class="form-group row pb-4">
                            <label for="valueProject" class="col-md-12 poppins-extra-bold h6 pb-2">Harga Penawaran</label>
                            <div class="input-group col-md-6">
                                <div class="input-group-prepend">
                                    <button class="btn border border-danger bg-white color-gray" type="button" id="button-addon1">IDR</button>
                                </div>
                                <input type="text" name="project_value" class="money form-control border border-danger text-center" id="valueProject" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row pb-4">
                            <label for="duration" class="col-md-12 poppins-extra-bold h6 pb-2">Durasi Proyek</label>
                            <div class="col-md-3">
                                <input type="number" name="duration" class="form-control border border-danger" id="duration" placeholder="" autocomplete="off" required>
                            </div>
                            <span class="col-md-4 align-self-center">Hari Kalender</span>
                        </div>
                        <!-- <div class="form-group row"> -->
                        <label for="list_pekerjaan_konstruksi" class="col-md-12 poppins-extra-bold h6 pb-2">List Pekerjaan</label>
                        <div class="row">
                            <div class="col-md-6 table-responsive">
                                <table class="table dataTableRun" width="100%">
                                    <thead class="d-none head_table_list_pekerjaan_konstruksi">
                                        <tr>
                                            <th>Item</th>
                                            <th>Item Pekerjaan </th>
                                        </tr>
                                    </thead>
                                    <tbody class="isi_table_list_pekerjaan_konstruksi">
                                        <!-- <td colspan="2" class="init_isi_table">Belum ada list Pekerjaan</td> -->
                                        <!-- <td>test</td> -->
                                        <!-- <td>te</td> -->
                                    </tbody>
                                    <!-- <tfoot>
                                    <th>
                                        <td colspan="3"></td>
                                    </th>
                                </tfoot> -->
                                </table>
                            </div>
                        </div>
                        <!-- </div> -->
                        <div class="pb-5 pt-3">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah_item">+ Tambah List Pekerjaan</button>
                        </div>

                        <label for="dokumen_administrasi_konstruksi" class="col-md-12 poppins-extra-bold h6 pb-2">Dokumen Administrasi Penanggung Jawab</label>
                        <table class="table">
                            <thead class="d-none head_table_dokumen_administrasi_konstruksi">
                                <th>DESKRIPSI</th>
                                <th>DOKUMEN</th>
                            </thead>
                            <tbody class="isi_table_dokumen_administrasi_penanggung_jawab">
                                <td colspan="2" class="init_isi_table">Belum ada Data Administrasi Penanggung Jawab</td>
                            </tbody>
                            <tfoot>
                                <th colspan="3"><button type="button" class="tombol_tambah_dokumen_administrasi_penanggung_jawab btn btn-success">Tambah Dokumen</button></th>
                            </tfoot>
                        </table>


                        <label for="dokumen_administrasi_konstruksi" class="col-md-12 poppins-extra-bold h6 pb-2">Dokumen Administrasi Konsturksi</label>
                        <table class="table">
                            <thead class="d-none head_table_dokumen_administrasi_konstruksi">
                                <th>DESKRIPSI</th>
                                <th>DOKUMEN</th>
                            </thead>
                            <tbody class="isi_table_dokumen_administrasi_konstruksi">
                                <td colspan="2" class="init_isi_table">Belum ada Dokumen Administrasi Konstruksi</td>
                            </tbody>
                            <tfoot>
                                <th colspan="3"><button type="button" class="tombol_tambah_dokumen_administrasi_konstruksi btn btn-success">Tambah Dokumen</button></th>
                            </tfoot>
                        </table>

                        <label for="dokumen_administrasi_teknis" class="col-md-12 poppins-extra-bold h6 pb-2">Dokumen Administrasi Konsturksi</label>
                        <table class="table">
                            <thead class="d-none head_table_dokumen_administrasi_teknis">
                                <th>DESKRIPSI</th>
                                <th>DOKUMEN</th>
                            </thead>
                            <tbody class="isi_table_dokumen_administrasi_teknis">
                                <td colspan="2" class="init_isi_table">Belum ada Dokumen Administrasi Teknis</td>
                            </tbody>
                            <tfoot>
                                <th colspan="3"><button type="button" class="tombol_tambah_dokumen_administrasi_teknis btn btn-success">Tambah Dokumen</button></th>
                            </tfoot>
                        </table>


                        <!-- <div class="form-group row pb-4">
                            <div class="col-md-12">
                                <div class="input_fields_wrap">
                                    <div>
                                        <input class="my-2" type="file" name="images[]" accept="image/*" required="required">
                                    </div>
                                </div>
                                <button class="add_field_button btn bg-red text-white px-3 mt-3"><i class="fa fa-plus"></i> Tambah File</button>
                            </div>
                        </div> -->

                        <input type="hidden" name="id_post" value="<?= $dataBid->id_post; ?>">
                        <input type="hidden" name="customer_id" value="<?= $dataBid->customer_id; ?>">
                        <button class="btn btn-md bg-red text-white float-right" type="submit">POSTING</button>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>

            <!-- <div class="col-md-4">
                <div class="row px-3 d-flex align-items-stretch h-100">
                    <div class="col-md-12">
                        <div class="px-3 py-2" style="background:#F9F9F9;">
                            <h5 class="h4 poppins-medium border-bottom py-2 color-red" style="border-color:#990000!important"><i class="fa fa-info-circle mr-3" style="font-size:2.5rem"></i> <span class="align-self-center">PRO TIPS</span> </h5>
                            <p>Upload gambar berupa 3D atau 2D, denah.</p>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_item" tabindex="-1" role="dialog" aria-labelledby="tambah_itemLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_itemLabel">Item Pekerjaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <p class="text-muted">- Pengisian Item <br>- Sub Item-Pekerjaan <br> dimenu profile </p>
                    <div class="form-group">
                        <!-- <label for="deskripsi_pekerjaan">Item Pekerjaan</label> -->
                        <!-- <input type="text" class="form-control" id="deskripsi_pekerjaan" aria-describedby="textHelp" placeholder="Deskripsi Pekerjaan"> -->

                        <label class="bg-white" for="int">Item Pekerjaan</label>
                        <br>
                        <select required searchable="Search here..." class="browser-default custom-select custom-select-lg" name="id_deskripsi_pekerjaan_item_pekerjaan" id="id_id_deskripsi_pekerjaan_item_pekerjaan">
                            <option value=""> Silahkan Pilih Item Pekerjaan</option>
                            <?php
                            foreach ($m_deskripsi_pekerjaan_data as $rows) { ?>
                                <option <?php echo set_select('id_deskripsi_pekerjaan_item_pekerjaan', $rows->nama_deskripsi_pekerjaan, $select_nama_id_deskripsi_pekerjaan_item_pekerjaan = ($id_deskripsi_pekerjaan_item_pekerjaan == $rows->nama_deskripsi_pekerjaan) ? TRUE : FALSE) ?> value="<?php echo $rows->id_deskripsi_pekerjaan ?>"> <?php echo $rows->nama_deskripsi_pekerjaan ?></option>
                            <?php } ?>
                        </select>


                        <td class="td_item_pekerjaan"></td>
                        <td class="td_sub_item_pekerjaan"></td>
                        <td class="td_bobot_pekerjaan_konstruksi"></td>
                    </div>
                    <label class="bg-white" for="int">Sub-Item Pekerjaan</label>
                    <br>
                    <select disabled required searchable="Search here..." class="browser-default custom-select custom-select-lg" name="id_pekerjaan_item_pekerjaan" id="id_id_pekerjaan_item_pekerjaan">
                        <option value="">Sub-Item Pekerjaan</option>

                    </select>
                    <small id="textHelp" class="form-text text-muted"><sup>*</sup>Persiapan</small>
                    <!-- <div class="form-group">
                        <label for="item_pekerjaan">Sub Item Pekerjaan</label>
                        <input type="text" class="form-control" id="item_pekerjaan" placeholder="Item Pekerjaan">
                        <small id="textHelp" class="form-text text-muted"><sup>*</sup>Konsep Ruang Tamu</small>
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="bobot_pekerjaan">Bobot pekerjaan_konstruksi</label>
                        <input type="number" class="form-control" id="bobot_pekerjaan" placeholder="Bobot dalam Persen">
                        <small id="textHelp" class="form-text text-muted"><sup>*</sup>15%</small>
                    </div> -->
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-primary" id="tombol_tambah_item_pekerjaan_konstruksi">Tambah Item</button>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<?php $this->load->view('component/footer'); ?>
<!-- End Footer -->

<!-- <script src="<?= base_url('asset/js/jquery.inputmask.bundle-3.2.6.min.js'); ?>"></script> -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.money').mask('000.000.000.000', {
            reverse: true
        });

        let jumlah_list_pekerjaan_konstruksi = 0;
        $('#id_id_deskripsi_pekerjaan_item_pekerjaan').change(function() {

            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url('ajax/get_item_pekerjaan'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_item_pekerjaan + '>' + data[i].nama_item_pekerjaan + '</option>';
                    }
                    if (id != '') {
                        $('#id_id_pekerjaan_item_pekerjaan').html(html);
                        $("#id_id_pekerjaan_item_pekerjaan").prop('disabled', false);
                    } else {
                        $("#id_id_pekerjaan_item_pekerjaan").prop('disabled', true);
                        $('#id_id_pekerjaan_item_pekerjaan').html('<option value="">Sub-Item Pekerjaan</option>');
                    }

                }
            });
            return false;
        });

        var table = $('.dataTableRun').DataTable({
            dom: 't',
            "columns": [{
                    className: "d-none"
                },
                {
                    className: "text-center"
                },
            ],
            responsive: true,
            // order: [
            //     [0, 'asc']
            // ],
            rowGroup: {
                dataSrc: 0
            }
        });



        $('#tombol_tambah_item_pekerjaan_konstruksi').click(function(e) {
            e.preventDefault();

            // init 
            if (jumlah_list_pekerjaan_konstruksi == 0) {
                $('.head_table_list_pekerjaan_konstruksi').addClass('d-none');
                $('.isi_table_list_pekerjaan_konstruksi').html('');
            } else {
                // $('.isi_table_list_pekerjaan_konstruksi').html('');
            }
            $('#tambah_item').modal('hide');

            // untuk db
            var id_item = $('#id_id_deskripsi_pekerjaan_item_pekerjaan').val();
            var id_sub_item = $('#id_id_pekerjaan_item_pekerjaan').val();

            // untuk view
            var view_item = $('#id_id_deskripsi_pekerjaan_item_pekerjaan option:selected').text();
            var view_sub_item = $('#id_id_pekerjaan_item_pekerjaan option:selected').text();


            $('.head_table_list_pekerjaan_konstruksi').removeClass('d-none');
            $('.isi_table_list_pekerjaan_konstruksi').append('<tr><td class="td_item_pekerjaan">' + view_item + '</td><td class="td_sub_item_pekerjaan">' + view_sub_item + '</td></tr>');
            var trDOM = table.row.add([
                view_item,
                view_sub_item,
            ]).draw();

            jumlah_list_pekerjaan_konstruksi++;
            console.log('jumlah : ' + jumlah_list_pekerjaan_konstruksi);

        });


        let jumlah_dokumen_administrasi_penanggung_jawab = 0;
        $('.tombol_tambah_dokumen_administrasi_penanggung_jawab').on('click', function() {
            $('.isi_table_dokumen_administrasi_penanggung_jawab').append('');
            $('.isi_table_dokumen_administrasi_penanggung_jawab').append('<div class="row py-3 align-middle"><div class="col-md-8">Deskrpsi Dokumen <input placeholder="Deskripsi" class="form-control" type="text" name="description[]"></div><div class="col-md-4"><input class="my-2 config_file_input" data-height="1500" type="file" name="konsep_desain[]" accept="image/*"></div></div>');
            $(".config_file_input").fileinput({
                theme: "fas",
                language: "id",
                showUpload: false,
                allowedFileExtensions: ['jpg', 'jpeg', 'pdf', 'png'],
                maxFileCount: 10,
                maxFilePreviewSize: 2048, // 1MB
                maxFileSize: 2048, // 1MB
                showPreview: true,
                showCaption: false,


                previewFileIconSettings: { // configure your icon file extensions
                    'doc': '<i class="fas fa-file-word text-primary"></i>',
                    'xls': '<i class="fas fa-file-excel text-success"></i>',
                    'ppt': '<i class="fas fa-file-powerpoint text-danger"></i>',
                    'pdf': '<i class="fas fa-file-pdf text-danger"></i>',
                    'zip': '<i class="fas fa-file-archive text-muted"></i>',
                    'htm': '<i class="fas fa-file-code text-info"></i>',
                    'txt': '<i class="fas fa-file-alt text-info"></i>',
                    'mov': '<i class="fas fa-file-video text-warning"></i>',
                    'mp3': '<i class="fas fa-file-audio text-warning"></i>',
                    // note for these file types below no extension determination logic 
                    // has been configured (the keys itself will be used as extensions)
                    'jpg': '<i class="fas fa-file-image text-danger"></i>',
                    'gif': '<i class="fas fa-file-image text-muted"></i>',
                    'png': '<i class="fas fa-file-image text-primary"></i>'
                },

            });
        });


        let jumlah_dokumen_administrasi_teknis = 0;
        $('.tombol_tambah_dokumen_administrasi_teknis').on('click', function() {
            $('.isi_table_dokumen_administrasi_teknis').append('');
            $('.isi_table_dokumen_administrasi_teknis').append('<div class="row py-3 align-middle"><div class="col-md-8">Deskrpsi Dokumen <input placeholder="Deskripsi" class="form-control" type="text" name="description[]"></div><div class="col-md-4"><input class="my-2 config_file_input" data-height="1500" type="file" name="konsep_desain[]" accept="image/*"></div></div>');
            $(".config_file_input").fileinput({
                theme: "fas",
                language: "id",
                showUpload: false,
                allowedFileExtensions: ['jpg', 'jpeg', 'pdf', 'png'],
                maxFileCount: 10,
                maxFilePreviewSize: 2048, // 1MB
                maxFileSize: 2048, // 1MB
                showPreview: true,
                showCaption: false,


                previewFileIconSettings: { // configure your icon file extensions
                    'doc': '<i class="fas fa-file-word text-primary"></i>',
                    'xls': '<i class="fas fa-file-excel text-success"></i>',
                    'ppt': '<i class="fas fa-file-powerpoint text-danger"></i>',
                    'pdf': '<i class="fas fa-file-pdf text-danger"></i>',
                    'zip': '<i class="fas fa-file-archive text-muted"></i>',
                    'htm': '<i class="fas fa-file-code text-info"></i>',
                    'txt': '<i class="fas fa-file-alt text-info"></i>',
                    'mov': '<i class="fas fa-file-video text-warning"></i>',
                    'mp3': '<i class="fas fa-file-audio text-warning"></i>',
                    // note for these file types below no extension determination logic 
                    // has been configured (the keys itself will be used as extensions)
                    'jpg': '<i class="fas fa-file-image text-danger"></i>',
                    'gif': '<i class="fas fa-file-image text-muted"></i>',
                    'png': '<i class="fas fa-file-image text-primary"></i>'
                },

            });
        });



        let jumlah_dokumen_administrasi_konstruksi = 0;
        $('.tombol_tambah_dokumen_administrasi_konstruksi').on('click', function() {
            $('.isi_table_dokumen_administrasi_konstruksi').append('');
            $('.isi_table_dokumen_administrasi_konstruksi').append('<div class="row py-3 align-middle"><div class="col-md-8">Deskrpsi Dokumen <input placeholder="Deskripsi" class="form-control" type="text" name="description[]"></div><div class="col-md-4"><input class="my-2 config_file_input" data-height="1500" type="file" name="konsep_desain[]" accept="image/*"></div></div>');
            $(".config_file_input").fileinput({
                theme: "fas",
                language: "id",
                showUpload: false,
                allowedFileExtensions: ['jpg', 'jpeg', 'pdf', 'png'],
                maxFileCount: 10,
                maxFilePreviewSize: 2048, // 1MB
                maxFileSize: 2048, // 1MB
                showPreview: true,
                showCaption: false,


                previewFileIconSettings: { // configure your icon file extensions
                    'doc': '<i class="fas fa-file-word text-primary"></i>',
                    'xls': '<i class="fas fa-file-excel text-success"></i>',
                    'ppt': '<i class="fas fa-file-powerpoint text-danger"></i>',
                    'pdf': '<i class="fas fa-file-pdf text-danger"></i>',
                    'zip': '<i class="fas fa-file-archive text-muted"></i>',
                    'htm': '<i class="fas fa-file-code text-info"></i>',
                    'txt': '<i class="fas fa-file-alt text-info"></i>',
                    'mov': '<i class="fas fa-file-video text-warning"></i>',
                    'mp3': '<i class="fas fa-file-audio text-warning"></i>',
                    // note for these file types below no extension determination logic 
                    // has been configured (the keys itself will be used as extensions)
                    'jpg': '<i class="fas fa-file-image text-danger"></i>',
                    'gif': '<i class="fas fa-file-image text-muted"></i>',
                    'png': '<i class="fas fa-file-image text-primary"></i>'
                },

            });
        });



    });

    // $(".input-mask").inputmask('decimal', {
    //     radixPoint: ",",
    //     groupSeparator: ".",
    //     digits: 0,
    //     autoGroup: true,
    //     prefix: '',
    //     rightAlignNumerics: false
    // });

    if (window.File && window.FileList && window.FileReader) {
        $("#images").on("change", function(e) {
            var files = e.target.files,
                filesLength = files.length;
            for (var i = 0;
                (i < 4 && i < filesLength); i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<div class=\"col-md-6 pip\">" +
                        "<img class=\"img-fluid\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                        "<br/><span class=\"remove\">Remove image</span>" +
                        "</div>").insertAfter("#upload-image");
                    $(".remove").click(function() {
                        $(this).parent(".pip").remove();
                    });

                });
                fileReader.readAsDataURL(f);
            }
        });
    } else {
        alert("Your browser doesn't support to File API")
    }
</script>