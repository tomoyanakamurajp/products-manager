<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-warning" onclick="this.classList.add('hidden')" role="alert">
<button type="button" class="close" data-dismiss="alert">&times;</button>
    <?= $message ?>
</div>