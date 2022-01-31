<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Questions Controller
 *
 * @property \App\Model\Table\QuestionsTable $Questions
 *
 * @method \App\Model\Entity\Question[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuestionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $query = $this->Questions->find('all', [
            'contain' => ['Users', 'Tags']
        ]);
        
        $questions = $this->paginate($query);

        $this->set(compact('questions'));
    }

    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => ['Users', 'Tags']
        ]);

        $this->set('question', $question);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $question = $this->Questions->newEntity();
        if ($this->request->is('post')) {
            $requestData = $this->request->getData();
            $requestData['user_id'] = $this->Auth->user('id');
            $this->create($question, $requestData);
        }
        $tags = $this->Questions->Tags->find('list', ['limit' => 200]);
        $this->set(compact('question', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->update($question, $this->request->getData());
        }
        $tags = $this->Questions->Tags->find('list', ['limit' => 200]);
        $this->set(compact('question', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Questions->get($id);
        if ($this->Questions->delete($question)) {
            $this->Flash->success(__('削除しました。'));
        } else {
            $this->Flash->error(__('削除に失敗しました。'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function mypage()
    {
        $userId = $this->Auth->user('id');
        $query = $this->Questions->find('all', [
            'contain' => ['Tags'],
            'conditions' => ['Questions.user_id' => $userId]
        ]);

        $questions = $this->paginate($query);

        $this->set(compact('questions'));
    }

    private function create($questionEntity, $inputs)
    {
        $question = $this->Questions->patchEntity($questionEntity, $inputs);
        if ($this->Questions->save($question)) {
            $this->Flash->success(__('作成しました。'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('作成できませんでした。'));
    }

    private function update($question, $inputs)
    {
        $question = $this->Questions->patchEntity($question, $inputs);
        if ($this->Questions->save($question)) {
            $this->Flash->success(__('更新しました。'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('更新できませんでした。'));
    }
}
