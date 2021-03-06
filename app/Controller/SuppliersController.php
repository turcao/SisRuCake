<?php
App::uses('AppController', 'Controller');
/**
 * Suppliers Controller
 *
 * @property Supplier $Supplier
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SuppliersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

    public $paginate = array(
        'SuppliesProduct' => array(
            'limit' => 4,
            'fields' => array('SuppliesProduct.quantity', 'SuppliesProduct.price', 'SuppliesProduct.date_of_entry'),
            'contain' => array(
                'Product' => array(
                    'MeasureUnit' => array(
                        'fields' => array('MeasureUnit.id', 'MeasureUnit.name'
                        )
                    ),
                    'fields' => array('Product.id', 'Product.name','Product.code')
                )
            )
        ),
        'Supplier' => array(
            'limit' => 5,
        )
    );

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Supplier->recursive = 0;
        $this->Paginator->settings = $this->paginate['Supplier'];
		$this->set('suppliers', $this->Paginator->paginate('Supplier',  array('Supplier.status' => true, 'Supplier.restaurant_id' => $this->Auth->user('restaurant_id'))));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Supplier->create();
            $this->request->data['Supplier']['business_name'] = ucfirst($this->request->data['Supplier']['business_name']);
            $this->request->data['Supplier']['name'] = ucfirst($this->request->data['Supplier']['name']);
            $this->request->data['Supplier']['code'] = strtoupper($this->request->data['Supplier']['code']);
            $this->request->data['Supplier']['status'] = 1;
            $this->request->data['Supplier']['restaurant_id'] = $this->Auth->user('restaurant_id');
			if ($this->Supplier->save($this->request->data)) {
                $supplier = $this->Supplier->findById($this->Supplier->getLastInsertID());
				$this->Session->setFlash("O fornecedor foi salvo com sucesso.", 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Ocorreu um erro ao salvar o fornecedor, tente novamente.', 'fail');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Supplier->exists($id)) {
			throw new NotFoundException(__('Invalid supplier'));
		}
		if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Supplier']['business_name'] = ucfirst($this->request->data['Supplier']['business_name']);
            $this->request->data['Supplier']['name'] = ucfirst($this->request->data['Supplier']['name']);
            $this->request->data['Supplier']['code'] = strtoupper($this->request->data['Supplier']['code']);
			if ($this->Supplier->save($this->request->data)) {
				$this->Session->setFlash('Este fornecedor foi editado com sucesso.', 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('O fornecedor não pode ser editado, tente novamente.', 'fail');
			}
		} else {
			$options = array('conditions' => array('Supplier.' . $this->Supplier->primaryKey => $id));
			$this->request->data = $this->Supplier->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Supplier->id = $id;
		if (!$this->Supplier->exists()) {
			throw new NotFoundException(__('Invalid supplier'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Supplier->delete()) {
			$this->Session->setFlash(__('The supplier has been deleted.'));
		} else {
			$this->Session->setFlash(__('The supplier could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * logical_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function logical_delete($id = null) {
        $this->Supplier->id = $id;
        if (!$this->Supplier->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->request->onlyAllow('post', 'logical_delete');
        if ($this->Supplier->updateStatus($id)) {
            $this->Session->setFlash('O fornecedor foi desativado.', 'warning');
            return $this->redirect(array('action' => 'deleted_index'));
        } else {
            $this->Session->setFlash('O fornecedor foi restaurado.', 'success');
            return $this->redirect(array('action' => 'index'));
        }
    }

/**
 * deleted_index method
 *
 * @return void
 */
    public function deleted_index() {
        $this->Supplier->recursive = 0;
        $this->set('suppliers', $this->Paginator->paginate('Supplier', array('Supplier.status' => false, 'Supplier.restaurant_id' => $this->Auth->user('restaurant_id'))));
    }

/**
 * qualify method
 *
 * @return void
 */
    public function qualify() {
        if ($this->request->is(array('post', 'put'))) {
            $this->Supplier->create();
            $this->Supplier->set('id', $this->request->data['Supplier']['supplier_id']);
            if ($this->Supplier->save($this->request->data)) {
                $this->Session->setFlash('Este fornecedor foi avaliado com sucesso.', 'success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('O fornecedor não pode ser avaliado, tente novamente', 'fail');
            }
        }
        $this->set('suppliers', $this->Supplier->find('list'));
    }
}
