<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductLedgers Model
 *
 * @method \App\Model\Entity\ProductLedger newEmptyEntity()
 * @method \App\Model\Entity\ProductLedger newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ProductLedger[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductLedger get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductLedger findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ProductLedger patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductLedger[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductLedger|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductLedger saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductLedger[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductLedger[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductLedger[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductLedger[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductLedgersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('product_ledgers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->belongsTo('Products',[
            'foreignKey'=>'product_code',
            'bindingKey'=>'product_code',
        ]);
        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date',__('日付は必ず入力してください'));

        $validator
            ->scalar('product_code')
            ->maxLength('product_code', 20)
            ->requirePresence('product_code', 'create')
            ->notEmptyString('product_code');

        $validator
            ->scalar('in_out')
            ->maxLength('in_out', 3)
            ->requirePresence('in_out', 'create')
            ->notEmptyString('in_out');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->integer('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        return $validator;
    }
}
