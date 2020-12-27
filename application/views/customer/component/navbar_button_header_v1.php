<div class="nav-button-profile mt-3 mb-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tab-nguli nav-justified border-0">
                    <!-- <a data-toggle="modal" href="#newProject" class="nav-item shadow d-flex justify-content-center align-items-center bg-white py-3 my-2 mx-3"> -->
                    <a href="<?=site_url('customer/form_project');?>" class="nav-item shadow d-flex justify-content-center align-items-center bg-white py-3 my-2 mx-3">
                        <?=$this->lang->line('n-project');?>
                    </a>
                    <a href="<?=base_url('customer/ongoing_project');?>" class="nav-item shadow d-flex justify-content-center align-items-center bg-white py-3 my-2 mx-3">
                        <?=$this->lang->line('o-project');?>
                    </a>
                    <a href="<?=site_url('customer/last_project');?>" class="nav-item shadow d-flex justify-content-center align-items-center bg-white py-3 my-2 mx-3">
                        <?=$this->lang->line('l-project');?>
                    </a>
                    <a href="<?=base_url('customer/ongoing_bidding');?>" class="nav-item shadow d-flex justify-content-center align-items-center bg-white py-3 my-2 mx-3">
                        <?=$this->lang->line('o-bidding');?>
                    </a>
                    <a href="<?=site_url('customer/transaction_project');?>" class="nav-item shadow d-flex justify-content-center align-items-center bg-white py-3 my-2 mx-3">
                        <?='Transaksi Project';?>
                    </a>
                    <a href="<?=site_url('customer/transaction_post');?>" class="nav-item shadow d-flex justify-content-center align-items-center bg-white py-3 my-2 mx-3">
                        <?='Transaksi Post';?>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</div>