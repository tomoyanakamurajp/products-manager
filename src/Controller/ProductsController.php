<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;
/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->set('title',__('商品マスター'));
        $products = $this->Products->find()->select(['id','product_code','name','price','modified'])->order(['product_code'=>'ASC']);

        
        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('product'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->set('title',__('商品マスターの登録'));
        $product = $this->Products->newEmptyEntity();
        
        if ($this->request->is('post')) {
            //$data = $this->request->getData();
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('保存しました'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('保存に失敗しました'));
        }
        $this->set(compact('product'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $product = $this->Products->find()->where(['product_code'=>$id])->first();
        $this->set('title',$product->name);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('保存しました'));

                return $this->redirect(['action' => 'edit',$id]);
            }
            $this->Flash->error(__('保存に失敗しました'));
        }
        $this->set(compact('product'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        
        $product = $this->Products->find()->where(['product_code'=>$id])->first();
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('削除しました'));
        } else {
            $this->Flash->error(__('削除に失敗しました'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
