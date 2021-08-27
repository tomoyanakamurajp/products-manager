<?= $this->Form->create($productLedger,['type'=>'get']) ?>
<div class="row">
    <div class="col-md-3">
        <?= $this->Form->control('date',[
            'class'=>'form-control',
            'label'=>__('取引日'),
            'required'=>false
        ]); ?>
    </div>
    <div class="col-md-3">
        <?= $this->Form->control('product_code',[
            'label'=>__('商品コード'),
            'options'=>$products,
            'empty'=>__(' '),
            'required'=>false
        ]); ?>
    </div>
    <div class="col-md-3">
        <?= $this->Form->control('in_out',[
            'label'=>__('入出庫'),
            'options'=>$in_out,
            'empty'=>__(' '),
            'required'=>false
        ]); ?>
    </div>
</div>
<?= $this->Form->button(__('検索'),['class'=>'btn btn-primary mr-4']) ?>
<?= $this->Html->link(__('リセット'),['action'=>'resset'],['class'=>'btn btn-outline-primary']) ?>
<?= $this->Form->end() ?>
<div class="text-right mb-4">
<?= $this->Html->link(
    __('払い出し新規登録'),
    ['action'=>'add'],
    ['class' => 'btn btn-primary']
); ?>
</div>
<table>
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('取引日') ?></th>
            <th><?= $this->Paginator->sort('商品コード') ?></th>
            <th><?= $this->Paginator->sort('商品名') ?></th>
            <th><?= $this->Paginator->sort('入出庫') ?></th>
            <th><?= $this->Paginator->sort('数量') ?></th>
            <th><?= $this->Paginator->sort('金額') ?></th>
            <th><?= $this->Paginator->sort('登録日') ?></th>
            <th><?= $this->Paginator->sort('更新日') ?></th>
            <th class="actions"><?= __('操作') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productLedgers as $productLedger): ?>
        <tr>
            <td><?= date('Y年m月d日',strtotime(h($productLedger->date))) ?></td>
            <td><?= h($productLedger->product_code) ?></td>
            <td><?= h($productLedger->product->name) ?></td>
            <td><?= $in_out[h($productLedger->in_out)] ?></td>
            <td><?= $this->Number->format($productLedger->quantity) ?></td>
            <td><?= $this->Number->format($productLedger->amount) ?></td>
            <td><?= date('Y年m月d日',strtotime(h($productLedger->created))) ?></td>
            <td><?= date('Y年m月d日',strtotime(h($productLedger->modified))) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $productLedger->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productLedger->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productLedger->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productLedger->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('最初のページへ')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>