<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Datasource\SystemsSource;
/**
 * Systems Controller
 *
 * @property \App\Model\Table\SystemsTable $Systems
 */
class SystemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
      $this->viewBuilder()->layout('evecraft');
        $systemsSource = new SystemsSource();
        $jsonData = $systemsSource->getSystemData();
        $this->log($jsonData,'debug');
        $this->set('systems', $jsonData->items);
        $this->set('_serialize', ['systems']);
    }

    /**
     * View method
     *
     * @param string|null $id System id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
      $this->viewBuilder()->layout('evecraft');
      $this->log('view('.$id.')','debug');
      $systemsSource = new SystemsSource();
      $jsonData = $systemsSource->getSingleSystem($id);
      $this->log($jsonData,'debug');
      $this->set('system', $jsonData);
      $this->set('_serialize', ['system']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $system = $this->Systems->newEntity();
        if ($this->request->is('post')) {
            $system = $this->Systems->patchEntity($system, $this->request->data);
            if ($this->Systems->save($system)) {
                $this->Flash->success(__('The system has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The system could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('system'));
        $this->set('_serialize', ['system']);
    }

    /**
     * Edit method
     *
     * @param string|null $id System id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $system = $this->Systems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $system = $this->Systems->patchEntity($system, $this->request->data);
            if ($this->Systems->save($system)) {
                $this->Flash->success(__('The system has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The system could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('system'));
        $this->set('_serialize', ['system']);
    }

    /**
     * Delete method
     *
     * @param string|null $id System id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $system = $this->Systems->get($id);
        if ($this->Systems->delete($system)) {
            $this->Flash->success(__('The system has been deleted.'));
        } else {
            $this->Flash->error(__('The system could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
