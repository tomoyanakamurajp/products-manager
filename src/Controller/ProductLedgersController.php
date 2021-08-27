<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Mailer\Mailer;
/**
 * ProductLedgers Controller
 *
 * @property \App\Model\Table\ProductLedgersTable $ProductLedgers
 * @method \App\Model\Entity\ProductLedger[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductLedgersController extends AppController
{
    public $paginate = [
        'limit' => 10,
    ];
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function initialize() : void{
        parent:: initialize();
        $in_out = [
            'in'=>__('入庫'),
            'out'=>__('出庫')
        ];
        $this->loadModel('Products');
        $products = $this->Products->find('list',[
            'keyField'=>'product_code',
            'valueField'=>'product_code'])->toArray();
        $this->set(compact('in_out','products'));
    }
    public function index()
    {
        $this->set('title',__('商品台帳'));
        $productLedger = $this->ProductLedgers->newEmptyEntity();
        $queryParam = $this->request->getQuery();
        if(!empty($queryParam)){
            //検索条件の指定がない場合は条件から除く
            foreach($queryParam as $key => $value){
                if(empty($value)){
                    //値が空欄の場合、何もしない
                }else{
                    //値が入っている場合は条件を生成
                    $conditions['ProductLedgers.'.$key]=$value; 
                }
            }
            //検索条件がある場合の処理
            $data = $this->ProductLedgers->find('all',['contain'=>'Products'])->where([
                $conditions
            ])->order(['date'=>'ASC']);
            $productLedgers = $this->paginate($data);
            $productLedger->date = $queryParam['date'];
            $productLedger->product_code = $queryParam['product_code'];
            $productLedger->in_out = $queryParam['in_out'];
        }else{
            $productLedgers = $this->paginate($this->ProductLedgers->find('all',['contain'=>'Products'])->order(['date'=>'ASC']));
        }
        /*$session = $this->getRequest()->getSession();
        $session->write('Auth.User', [
            'name'=>__('商品太郎'),
            'division'=>__('購買部')
        ]);
        $session->destroy();*/
        $this->set(compact('productLedgers','productLedger'));
    }
    public function resset(){
        return $this->redirect(['action' => 'index']);
    }
    /**
     * View method
     *
     * @param string|null $id Product Ledger id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productLedger = $this->ProductLedgers->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('productLedger'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productLedger = $this->ProductLedgers->newEmptyEntity();
        if ($this->request->is('post')) {
            $entities = $this->ProductLedgers->newEntities($this->request->getData());
            if ($result = $this->ProductLedgers->saveMany($entities)) {
                //メール送信処理
                $mailer = new Mailer('default');
                $mailer->setFrom(['support_not_reply@qure-technologies.co.jp' => '商品管理システム'])
                    ->setTo('tomoya.nakamura@qure-technologies.co.jp')
                    ->setEmailFormat('text')
                    ->setSubject('商品の入出庫通知')
                    ->setViewVars(['products' => $result])
                    ->viewBuilder()
                        ->setTemplate('in_out_alert')
                        ->setLayout('default');
                $mailer->deliver();
                $this->Flash->success(__('The product ledger has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product ledger could not be saved. Please, try again.'));
        }
        $this->set(compact('productLedger'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Ledger id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productLedger = $this->ProductLedgers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productLedger = $this->ProductLedgers->patchEntity($productLedger, $this->request->getData());
            if ($this->ProductLedgers->save($productLedger)) {
                $this->Flash->success(__('The product ledger has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product ledger could not be saved. Please, try again.'));
        }
        $this->set(compact('productLedger'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Ledger id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productLedger = $this->ProductLedgers->get($id);
        if ($this->ProductLedgers->delete($productLedger)) {
            $this->Flash->success(__('The product ledger has been deleted.'));
        } else {
            $this->Flash->error(__('The product ledger could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
