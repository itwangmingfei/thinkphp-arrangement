<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\User as UserModel;
use app\index\validate\User as validateuser;

class User extends Controller{
  /*@validate验证 */
  public function Validatetext(){
    
    $data = array(
      'name' =>"Seefly",
      'email' =>"qqqqqqqq@qq.com",
      'phone' =>"17353953434",
      'number' =>"4545",
      'nums' =>22,
    );
    $validate = new validateuser;
    if(!$validate->check($data)){
      dump($validate->getError());
    }else{
      echo "验证通过";
    }
   
    return ;
  }
  /*
  @添加
  @聚合模型
  */
  public function Add(){
    $usermodel = new UserModel;
    $usermodel->name ="我的世界";
    $usermodel->password ="123123";
    $usermodel->email ="qq@qq.com";
    $usermodel->message ="我的世界";
    //关联表字段profile
    $usermodel->profile="text";
    $usermodel->save();
    echo $usermodel->id;
     
  }
  /*@删除ID*/
  public function Del(){
    
    $id = input('id');
    if(empty($id)){
      return "参数异常！";
    }
    $usermodel = UserModel::get($id);
    if(!empty($usermodel)){
      dump($usermodel->delete());
    }else{
      return "数据以删除";
    }    
  }
  /*@修改 */
  public function Update(){
    $id = 2;
    $usermodel = UserModel::get($id);
    $usermodel->name ="Seefly";
    $usermodel->password ="123123";
    $usermodel->email ="Seefly@qq.com";
    $usermodel->message ="Seefly";
    //关联表字段profile
    $usermodel->profile ="Seefly";
    $usermodel->save();
    return $usermodel->id;
  }
  /*@一条数据 */
  public function Info(){
    $id = input('id');
    $usermodel = UserModel::get($id);
    //$usermodel = UserModel::get(["name"=>"Seefly"]);
    return $usermodel;
  }
  /*@获取数据 */
  public function List(){
    dump(Request()->isget());
    $page = 1;
    $pagesize = 3;
    $offset = ($page-1)*$page;
    $usermodel = new UserModel;
    $where = "";

    $list = $usermodel->where($where)->limit($offset,$pagesize)->select();
    
    foreach($list as $key=>$val){
      dump($key.$val);
    }
    
  }

}