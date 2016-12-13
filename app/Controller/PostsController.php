<?php
App::uses('Controller','Controller');
class PostsController extends AppController{
    public $helpers = array('Html','Form');
    public $uses = array('User','Post');
    public $components = array('Auth');

    public function mypage(){
        //ログイン状態を取得
        $user = $this->Auth->user('id');
        //ツイートを表示
        $option = array(
            'conditions' => array('user_id' => $user),
            'order' => array('Post.id' => 'desc')
            );
        $comments = $this->Post->find('all',$option);
        $this->set('comments',$comments);
            //投稿されたツイートを保存
        if($this->request->is('post')){
            $data = array(
                'body' => $this->request->data['Post']['body'],
                'user_id' => $this->request->data['Post']['user_id'] = $user
                );
            if($this->Post->save($data)){
            //メッセージを表示
            $this->Flash->set('ツイートされました');
            $this->redirect(array('controller' => 'posts','action' => 'mypage'));
            }else{
            $this->Flash->set('ツイートに失敗しました');
            }
        }
    }

    public function search(){
        
    }

    public function delete($id){
        if($this->request->is('get')){
            throw new MethodNotAllowedException();
        }
        if($this->Post->delete($id)){
            $this->Flash->set('削除しました');
            $this->redirect(array('controller' => 'posts','action' => 'mypage'));
        }
    }
}