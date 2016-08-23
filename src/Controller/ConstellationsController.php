<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Datasource\ConstellationsSource;


/**
 * Constellations Controller
 *
 * @property \App\Model\Table\ConstellationsTable $Constellations
 */
class ConstellationsController extends AppController
{


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
      $this->viewBuilder()->layout('evecraft');
        $constellationsSource = new ConstellationsSource();
        $jsonData = $constellationsSource->getConstellationData();
        $this->log($jsonData,'debug');
        $this->set('constellations', $jsonData->items);
        $this->set('_serialize', ['constellations']);
    }

    /**
     * View method
     *
     * @param string|null $id Constellation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
     public function view($id = null)
     {
       $this->viewBuilder()->layout('evecraft');

       $this->log('view('.$id.')','debug');
       $constellationsSource = new ConstellationsSource();
       $jsonData = $constellationsSource->getSingleConstellation($id);
       $this->log($jsonData,'debug');
       $this->set('constellation', $jsonData);
       $this->set('_serialize', ['constellation']);
     }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $constellation = $this->Constellations->newEntity();
        if ($this->request->is('post')) {
            $constellation = $this->Constellations->patchEntity($constellation, $this->request->data);
            if ($this->Constellations->save($constellation)) {
                $this->Flash->success(__('The constellation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The constellation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('constellation'));
        $this->set('_serialize', ['constellation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Constellation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $constellation = $this->Constellations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $constellation = $this->Constellations->patchEntity($constellation, $this->request->data);
            if ($this->Constellations->save($constellation)) {
                $this->Flash->success(__('The constellation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The constellation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('constellation'));
        $this->set('_serialize', ['constellation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Constellation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $constellation = $this->Constellations->get($id);
        if ($this->Constellations->delete($constellation)) {
            $this->Flash->success(__('The constellation has been deleted.'));
        } else {
            $this->Flash->error(__('The constellation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
