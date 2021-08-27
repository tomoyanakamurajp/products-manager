<?= $this->Form->create($productLedger) ?>
<fieldset>
    <legend><?= __('商品払い出し登録') ?></legend>
    <div class="row">
        <div class="col-md-2">
            <label><?= __('取引日') ?></label>
        </div>
        <div class="col-md-2">
            <label><?= __('商品コード') ?></label>
        </div>
        <div class="col-md-2">
            <label><?= __('入出庫') ?></label>
        </div>
        <div class="col-md-2">
            <label><?= __('数量') ?></label>
        </div>
        <div class="col-md-2">
            <label><?= __('金額') ?></label>
        </div>
    </div>
    <?php for($i=0; $i<2; $i++): ?>
    <div class="row">
        <div class="col-md-2">
            <?= $this->Form->control($i.'.date',[
                'class'=>'form-control',
                'label'=>false,
                'required'=>true
            ]); ?>
        </div>
        <div class="col-md-2">
            <?= $this->Form->control($i.'.product_code',[
                'label'=>false,
                'options'=>$products
            ]); ?>
        </div>
        <div class="col-md-2">
            <?= $this->Form->control($i.'.in_out',[
                'label'=>false,
                'options'=>$in_out
            ]); ?>
        </div>
        <div class="col-md-2">
            <?= $this->Form->control($i.'.quantity',[
                'class'=>'form-control',
                'label'=>false
            ]); ?>
        </div>
        <div class="col-md-2">
            <?= $this->Form->control($i.'.amount',[
                'class'=>'form-control',
                'label'=>false
            ]); ?>
        </div>
    </div>
    <?php endfor ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>