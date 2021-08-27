<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProductsBalances Controller
 *
 * @method \App\Model\Entity\ProductsBalance[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsBalancesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->set('title',__('商品残高明細'));

        //select A.product_code, B.name, SUM(A.quantity), SUM(A.amount) from product_ledgers as A left join products as B on A.product_code = B.product_code group by b.product_code;
        //データの取得
        $this->loadModel('ProductLedgers');
        $product_balances = $this->ProductLedgers->find()->join([
            'b' => [
                'table' => 'products',
                'type' => 'LEFT',
                'conditions' => 'b.product_code = ProductLedgers.product_code',
            ]])
            ->select([
                'product_code'=>'b.product_code',
                'name'=>'b.name',
                'quantity'=>$this->ProductLedgers->find()->func()->sum('ProductLedgers.quantity'),
                'amount'=>$this->ProductLedgers->find()->func()->sum('ProductLedgers.amount'),
            ])
            ->group('b.product_code')
            ->order(['b.product_code'=>'ASC']);
        $this->set(compact('product_balances'));
    }
}
