<?= $this->Form->create($product) ?>
<fieldset>
    <legend><?= __('商品マスターの登録') ?></legend>
    <?php
        echo $this->Form->control('product_code',[
            'class'=>'form-control',
            'label'=>__('商品コード')
        ]);
        echo $this->Form->control('name',[
            'class'=>'form-control',
            'label'=>__('商品名')
        ]);
        echo $this->Form->control('price',[
            'class'=>'form-control',
            'label'=>__('価格')
        ]);
    ?>
</fieldset>
<?= $this->Form->button(__('保存')) ?>
<?= $this->Form->end() ?>