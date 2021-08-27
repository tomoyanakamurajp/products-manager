<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductLedger $productLedger
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product Ledger'), ['action' => 'edit', $productLedger->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product Ledger'), ['action' => 'delete', $productLedger->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productLedger->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Product Ledgers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product Ledger'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productLedgers view content">
            <h3><?= h($productLedger->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Product Code') ?></th>
                    <td><?= h($productLedger->product_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('In Out') ?></th>
                    <td><?= h($productLedger->in_out) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($productLedger->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($productLedger->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($productLedger->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($productLedger->date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($productLedger->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($productLedger->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
