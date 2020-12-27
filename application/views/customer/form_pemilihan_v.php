<!-- Navbar -->
<?php $this->load->view('customer/component/navbar_after_login'); ?>
<!-- End Navbar -->

<!-- Main -->
<div class="form-project my-4 py-3">
    <div class="container">
        <div class="row">

            <div class="col-md-8 p-5" style="background-color: rgba(204,227,250,35%);">
                <div class="row border-bottom mb-5">
                    <div class="col-md-6">
                        <div class="d-flex flex-row">
                            <img src="<?= base_url('asset/img/project-list.png'); ?>" class="img-fluid mr-3" style="height:1.5rem">
                            <div class="d-flex flex-column">
                                <h6 class="poppins-bold mt-0">
                                    <?=
                                        $dataBidMitra->post_name;
                                    // empty($val->category_id) ? $val->category_en : $val->category_id;
                                    ?>
                                </h6>
                                <p class=""><?= $dataBidMitra->mitra_name; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 pb-3">
                        <div class="d-flex flex-column text-right">
                            <h6 class="poppins-bold mt-0">IDR <?= number_format($dataBidMitra->proposed_price, 0, '', '.'); ?></h6>
                            <h6>Jenis Proyek : <?= $dataBidMitra->category_name; ?></h6>
                            <h6>Luas Tanah : <?= $dataBidMitra->area; ?> m2</h6>
                            <h6><i class="fa fa-clock-o" style="font-size:1.3rem"></i> <span class="color-red mx-1">Tutup Tender</span> <?= $dataBidMitra->selisih . ' hari lagi'; ?></h6>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?= form_open('Appoint_project/save', 'id="submit-post"'); ?>

                        <input type="hidden" name="customer_id" value="<?= $dataBidMitra->customer_id; ?>">
                        <input type="hidden" name="post_name" value="<?= $dataBidMitra->post_name; ?>">
                        <input type="hidden" name="mitra_id" value="<?= $dataBidMitra->mitra_id; ?>">
                        <input type="hidden" name="category" value="<?= $dataBidMitra->category; ?>">
                        <input type="hidden" name="post_bid_id" value="<?= $dataBidMitra->id; ?>">
                        <input type="hidden" name="post_id" value="<?= $dataBidMitra->post_id; ?>">
                        <input type="hidden" name="area" value="<?= $dataBidMitra->area; ?>">

                        <!--  <div class="form-group row field-luas pb-3">
                                <label for="area" class="poppins-extra-bold col-md-12 align-self-center fz-1">Luas Bangunan</label>
                                <div class="col-md-4">
                                    <input type="text" name="area" class="form-control border border-danger" id="area" placeholder="2" required>
                                </div>
                                <span class="col-md-4 align-self-center">m2</span>
                            </div> -->

                        <div class="form-group row field-luas pb-3">
                            <label for="budget" class="poppins-extra-bold col-md-12 align-self-center fz-1">Nilai Proyek</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="btn border border-danger bg-white color-gray">IDR</span>
                                    </div>
                                    <input type="text" name="budget" class="input-mask form-control border border-danger text-center" id="budget" placeholder="" required>
                                </div>
                            </div>
                        </div>

                        <?php if ($dataBidMitra->category == $this->config->item('design')) { ?>
                            <div class="form-group row pb-3">
                                <label for="document" class="poppins-extra-bold col-md-12 fz-1 mb-3">Dokumen yang akan diperoleh</label>

                                <div id="document-field" class="col-md-12">
                                    <div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <input type="text" name="document[]" class="form-control border border-danger" placeholder="Tampak Depan, Samping, Atas" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="document-field-other"></div>
                                <div class="col-md-12 form text-center">
                                    <a href="javascript:void(0);" id="add-field" class="btn btn-danger">Add Other</a>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group row field-duration pb-3">
                            <label for="duration" class="poppins-extra-bold col-md-12 align-self-center fz-1">Durasi Proyek</label>
                            <div class="col-md-3">
                                <input type="text" name="duration" class="form-control border border-danger" id="duration" placeholder="" required>
                            </div>
                            <span class="col-md-4 align-self-center">Hari Kalender</span>
                        </div>

                        <div class="form-group row field-daily-worker pb-3">
                            <div class="col-md-4 pb-2">
                                <label for="start" class="poppins-extra-bold fz-1 pb-2">Mulai Pengerjaan</label>
                                <input type="text" name="start_project" class="form-control datepicker  border border-danger" id="start" placeholder="" autocomplete="off" required>
                            </div>
                            <div class="col-md-4 pb-2">
                                <label for="finish" class="poppins-extra-bold fz-1 pb-2">Selesai Pengerjaan</label>
                                <input type="text" name="finish_project" class="form-control border border-danger" id="finish" placeholder="" autocomplete="off" required readonly="readonly">
                            </div>
                        </div>

                        <?php if ($dataBidMitra->category == $this->config->item('construction')) { ?>
                            <div class="form-group row field-daily-worker pb-3">
                                <div class="col-md-12">
                                    <label for="handover" class="poppins-extra-bold fz-1 pb-2">Serah Terima Proyek</label>
                                </div>
                                <div class="col-md-4 pb-2">
                                    <input type="text" name="handover_project" class="form-control border border-danger" id="handover" placeholder="" autocomplete="off" required>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="form-group py-3">
                            <button type="submit" id="btn-submit" class="btn bg-red text-white float-right px-4 py-2" style="font-size:1.1rem">POSTING</button>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Main -->

<!-- Footer -->
<?php $this->load->view('component/footer'); ?>
<!-- End Footer -->

<script src="<?= base_url('asset/js/jquery.inputmask.bundle-3.2.6.min.js'); ?>"></script>
<script>
    $("#start").on("change", function() {
        var start = new Date($("#start").val());
        var duration = $('#duration').val();
        var nextDay = new Date(start);
        nextDay.setDate(start.getDate() + parseInt(duration));
        var dateString = new Date(nextDay.getTime() - (nextDay.getTimezoneOffset() * 60000))
            .toISOString().split("T")[0];
        $('#finish').attr("value", dateString);

        // Handover
        var handover = 7;
        nextDay.setDate(start.getDate() + parseInt(handover));
        var dateString = new Date(nextDay.getTime() - (nextDay.getTimezoneOffset() * 60000))
            .toISOString().split("T")[0];
        $('#handover').attr("value", dateString);
    });

    $("#duration").on("change", function() {
        var start = new Date($("#start").val());
        var duration = $('#duration').val();
        var nextDay = new Date(start);
        nextDay.setDate(start.getDate() + parseInt(duration));
        var dateString = new Date(nextDay.getTime() - (nextDay.getTimezoneOffset() * 60000))
            .toISOString().split("T")[0];
        $('#finish').attr("value", dateString);

        // Handover
        var handover = 7;
        nextDay.setDate(start.getDate() + parseInt(handover));
        var dateString = new Date(nextDay.getTime() - (nextDay.getTimezoneOffset() * 60000))
            .toISOString().split("T")[0];
        $('#handover').attr("value", dateString);
    });

    $(document).ready(function() {
        // Date Picker
        $(".datepicker").datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: new Date(),
        });

        $(".input-mask").inputmask('decimal', {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 0,
            autoGroup: true,
            prefix: '',
            rightAlignNumerics: false
        });
    });

    $(document).ready(function() {
        var max_fields = 10;
        var wrapperForm = $("#document-field");
        var wrapper = $("#document-field-other");
        var add_button = $("#add-field");

        var i = 1;
        var x = 1;
        $(add_button).click(function(e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapperForm).append(`
                    <div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input type="text" name="document[]" class="form-control" placeholder="Tampak Depan, Samping, Atas" required>
                                <a href="javascript:void(0);" id="remove_field" class="remove_field float-right">Remove</a>
                            </div>
                        <div>
                    </div>
                `);
            }
        });

        // $(wrapper).on("click",".remove_field", function(e){
        //     e.preventDefault(); $(this).parent('div').remove(); x--;
        // });
        $(wrapperForm).on("click", ".remove_field", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
    });
</script>