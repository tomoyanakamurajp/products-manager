

<table class="table">
  <thead>
    <tr>
      <th scope="col"><?= __('商品コード') ?></th>
      <th scope="col"><?= __('商品名') ?></th>
      <th scope="col"><?= __('数量') ?></th>
      <th scope="col"><?= __('金額') ?></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($product_balances as $product_balance): ?>
    <tr>
      <td><?= h($product_balance->product_code) ?></th>
      <td><?= h($product_balance->name) ?></td>
      <td><?= number_format(h($product_balance->quantity)) ?></td>
      <td><?= number_format(h($product_balance->amount)) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>