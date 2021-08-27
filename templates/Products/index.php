<div class="text-right mb-4">
<?= $this->Html->link(
    __('商品新規登録'),
    ['action'=>'add'],
    ['class' => 'btn btn-primary']
); ?>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col"><?= __('商品コード') ?></th>
      <th scope="col"><?= __('商品名') ?></th>
      <th scope="col"><?= __('価格') ?></th>
      <th scope="col"><?= __('更新日') ?></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($products as $product): ?>
    <tr>
      <td><?= h($product->product_code) ?></th>
      <td><?= $this->Html->link(h($product->name),['action'=>'edit',h($product->product_code)]) ?></td>
      <td><?= number_format(h($product->price)) ?></td>
      <td><?= date('Y年m月d日',strtotime(h($product->modified))) ?></td>
      <td><?= $this->Form->postLink(__('削除'),['action'=>'delete',h($product->product_code)],['class'=>'btn btn-warning','confirm'=>__('本当に削除しますか')]) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>