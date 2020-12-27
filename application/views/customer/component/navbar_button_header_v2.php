<div class="nav-button-profile py-5" style="min-height:400px;background-color: #F4F3F7">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 mx-auto">
                <ul class="nav nav-tab-nguli nav-justified border-0">
                    
                    <a href="<?=site_url('customer/ongoing_bidding');?>" class="nav-item shadow d-flex justify-content-center align-items-center bg-white color-red rounded p-4 my-2 mx-3">
                        <img src="<?=base_url('asset/img/button-ongoing.png');?>" class="pr-3" style="width: 30%">
                        <?=$this->lang->line('o-bidding');?>
                    </a>
                    <a href="<?=site_url('customer/active_project');?>" class="nav-item shadow d-flex justify-content-center align-items-center bg-white color-red rounded p-4 my-2 mx-3">
                        <img src="<?=base_url('asset/img/button-ongoing.png');?>" class="pr-3" style="width: 30%">
                        <?=$this->lang->line('o-project');?>
                    </a>
                    <a href="<?=site_url('customer/history_project');?>" class="nav-item shadow d-flex justify-content-center align-items-center bg-white color-red rounded p-4 my-2 mx-3">
                        <img src="<?=base_url('asset/img/button-last.png');?>" class="pr-3" style="width: 30%">
                        <?=$this->lang->line('l-project');?>
                    </a>

                </ul>
            </div>
        </div>
    </div>
</div>