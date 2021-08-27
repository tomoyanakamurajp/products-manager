<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductLedger Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $date
 * @property string $product_code
 * @property string $in_out
 * @property int $quantity
 * @property int $amount
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class ProductLedger extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'date' => true,
        'product_code' => true,
        'in_out' => true,
        'quantity' => true,
        'amount' => true,
        'created' => true,
        'modified' => true,
    ];
}
