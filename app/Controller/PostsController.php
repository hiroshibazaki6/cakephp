<?php
App::uses('Controller','Controller');
class PostsController extends AppController{
    public $helpers = ['Html','Form'];
    public $uses = ['User','Post','Follow'];
    public $components = ['Auth'];

    public function mypage(){
        //ログイン状態を取得
        $user = $this->Auth->user();
        //ツイートを表示
        $options = [
            'conditions' =>[
                'Follow.user_id' => $user['id']
            ]
        ];
        $follow = $this->Follow->find('all',$options);
        $followids = [];
        foreach ($follow as $key => $value) {
            $followids[]=$value['Follow']['follower_id'];
        }
        $followids[]=$user['id'];
        $option = ['conditions' => ['user_id' => $followids],
            'order' => ['Post.id' => 'desc']
        ];
        $comments = $this->Post->find('all',$option);
        $this->set('comments',$comments);
        //投稿されたツイートを保存
        if($this->request->is('post')){
            $data = ['body' => $this->request->data['Post']['body'],
                'user_id' => $this->request->data['Post']['user_id'] = $user['id']
                ];
            if($this->Post->save($data)){
            //メッセージを表示
            $this->Flash->set('ツイートされました');
            $this->redirect(['controller' => 'posts','action' => 'mypage']);
            }else{
            $this->Flash->set('ツイートに失敗しました');
            }
        }
    }

    public function search(){
        if($this->request->is('post')){
            $username = ['username' => $this->request->data['User']['username']];
            //検索の条件を指定（曖昧検索）
            $option = ['conditions' => ['username like' => '%'.$username['username'].'%']];
            $data = $this->User->find('all',$option);
            //検索結果が何件あったかを検索
            $count = $this->User->find('count',$option);
            $this->Flash->set($count.'件ヒットしました');
            $this->set('data',$data);
        }else{
            $data = $this->User->find('all');
            $this->set('data',$data);
        }
    }

    public function followlist(){
        $user = $this->Auth->user();
        $option = [
            'conditions' => [
                'Follow.user_id' => $user['id'],
            ]
        ];
        $follow = $this->Follow->find('all',$option);
        $followids = [];
        foreach ($follow as $key => $value) {
            $followids[]=$value['Follow']['follower_id'];
        }
        $options = [
            'conditions' => [
                'User.id' => $followids
            ]
        ];
        $data = $this->User->find('all',$options);
        $this->set('data',$data);
    }

    public function follow($id){
        if($this->request->is('post')){
            $user = $this->Auth->user('id');
            $follow = ['user_id' => $user,
                       'follower_id' => $id];
            if($this->Follow->save($follow)){
                $this->Flash->set('フォローしました');
                $this->redirect(['controller' => 'posts','action' => 'mypage']);
            }
        }
    }

    public function delete($id){
        if($this->request->is('get')){
            throw new MethodNotAllowedException();
        }
        if($this->Post->delete($id)){
            $this->Flash->set('削除しました');
            $this->redirect(['controller' => 'posts','action' => 'mypage']);
        }
    }
}