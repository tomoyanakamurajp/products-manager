<?= __('ご担当者様') ?>

商品の入出庫の登録が行われました。登録された入出庫記録は以下の通りです。
<?php foreach($products as $product): ?>

<?= h($product->product_code).'/'.h($product->amount).'個/'.h($product->in_out) ?>

<?php endforeach; ?>