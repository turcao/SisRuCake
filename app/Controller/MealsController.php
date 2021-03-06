<?php
App::uses('AppController', 'Controller');
/**
 * Meals Controller
 *
 * @property Meal $Meal
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MealsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Meal->recursive = 0;
		$this->set('meals', $this->Paginator->paginate('Meal', array('Meal.status' => true, 'Meal.restaurant_id' => $this->Auth->user('restaurant_id'))));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->Meal->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        $meal = $this->Meal->findByMealId($id, array('recursive' => 1));
        $related = $this->Meal->RecipesForMeal->findByMealId($id);

        $this->set(array('meal' => $meal, 'related' => $related));
        $this->Paginator->paginate();

    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Meal->exists($id)) {
			throw new NotFoundException(__('Invalid meal'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Meal->save($this->request->data)) {
				$this->Session->setFlash(__('The meal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meal could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Meal.' . $this->Meal->primaryKey => $id));
			$this->request->data = $this->Meal->find('first', $options);
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
		$this->Meal->id = $id;
		if (!$this->Meal->exists()) {
			throw new NotFoundException(__('Invalid meal'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Meal->delete()) {
			$this->Session->setFlash(__('The meal has been deleted.'));
		} else {
			$this->Session->setFlash(__('The meal could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * deleted_index method
 *
 * @return void
 */
    public function deleted_index() {
        $this->Meal->recursive = 0;
        $this->set('meals', $this->Paginator->paginate('Meal', array('Meal.status' => 0, 'Meal.restaurant_id' => $this->Auth->user('restaurant_id'))));
    }

/**
 * logical_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function logical_delete($id = null) {
        $this->Meal->id = $id;
        if (!$this->Meal->exists()) {
            throw new NotFoundException(__('Invalid Recipe'));
        }
        $this->request->onlyAllow('post', 'logical_delete');
        if ($this->Meal->updateStatus($id)) {
            $this->Session->setFlash(__('A refeição foi desativada com sucesso.'));
            return $this->redirect(array('action' => 'deleted_index'));
        } else {
            $this->Session->setFlash(__('A refeição foi restaurada com sucesso.'));
            return $this->redirect(array('action' => 'index'));
        }

    }
}
