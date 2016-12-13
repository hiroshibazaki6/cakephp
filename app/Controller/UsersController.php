<?php
App::uses('Controller','Controller');
class UsersController extends AppController{
    public $helpers = array('Html','Form');
    public $uses = array('User');
    public $components = array(
            'Flash',
            'Session',
            'Auth' => array(
                'loginRedirect' => array('controller' => 'posts','action' => 'mypage'),
                'logoutRedirect' => array('controller' => 'users','action' => 'index'),
                'loginAction' => array('controller' => 'users','action' => 'login'),
                'allowedActions' => array('index','login','create')
                    )
        );

    public function index(){
    }

    public function create(){
        if($this->request->is('post')){
            $data = array(
                    'name' => $this->request->data['User']['name'],
                    'username' => $this->request->data['User']['username'],
                    'password' => $this->request->data['User']['password'],
                    'password_Confirm' => $this->request->data['User']['password_Confirm'],
                    'mail' => $this->request->data['User']['mail']
                );
            //データを保存
            $id = $this->User->save($data);
            //入力したデータに誤りがあった場合の処理
            if($id === false){
                $this->Flash->set('登録に失敗しました');
                $this->render('create');
                return;
            }
            //done.ctpに登録したユーザー名を渡す
            $user = $this->User->find('first',array('order' => array('User.id' => 'desc')));
            $this->set('id',$user);
            //メッセージを表示
            $this->Flash->set('ついったーに参加しました');
            $this->render('done');
        }
    }

    public function done(){

    }

    public function login(){
        if($this->request->is('post')){
            if($this->Auth->login()){
                $this->Flash->set('ログインしました');
                $this->redirect($this->Auth->redirect());
            }else{
                $this->Flash->set('ログインに失敗しました');
            }
        }
    }

    public function logout(){
        $this->Flash->set('ログアウトしました');
        $this->redirect($this->Auth->logout());
    }
}
