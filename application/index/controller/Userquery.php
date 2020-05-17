<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
/*
@原生语句
@构造器构造器语句
@构造器
// 数据库表达式
['eq' => '=', 'neq' => '<>', 'gt' => '>', 'egt' => '>=', 
'lt' => '<', 'elt' => '<=', 
'notlike' => 'NOT LIKE', 
'not like' => 'NOT LIKE', 'like' => 'LIKE', 'in' => 'IN', 'exp' => 'EXP', 
'notin' => 'NOT IN', 'not in' => 'NOT IN', 
'between' => 'BETWEEN', 'not between' => 'NOT BETWEEN', 
'notbetween' => 'NOT BETWEEN', 'exists' => 'EXISTS', 
'notexists' => 'NOT EXISTS', 'not exists' => 'NOT EXISTS', 'null' => 'NULL', 
'notnull' => 'NOT NULL', 'not null' => 'NOT NULL', '> time' => '> TIME', 
'< time' => '< TIME', '>= time' => '>= TIME', '<= time' => '<= TIME', 'between time' => 'BETWEEN TIME', 
'not between time' => 'NOT BETWEEN TIME', 'notbetween time' => 'NOT BETWEEN TIME'];
*/
class Userquery extends Controller{
  public function Add(){  
    /*原生sql */
    $sql = "insert into user (`name`,`email`,`message`) values('nginx','nginx@qq.com','nginx')";
    $res = Db::execute($sql);
    /*think 构造器 */
    $user = Db::name('user');
    $data = array("name"=>"php","email"=>"php@qq.com","message"=>"php");
    $res = $user->insert($data);

    return $res;
  }
  public function Update(){
    /*原生sql */
    $sql = "update user set `name`='GG' where `id` = 29";
    $res = Db::execute($sql);
    /*think 构造器 */
    $user = Db::name('user');
    $data = array("name"=>"php111","email"=>"php1@qq.com","message"=>"php1");
    $where = array("id"=>"29");
    $user->where($where)->update($data);
    return $res;
  }
  public function Del(){
    /*原生sql */
    $sql = "delete from  user where `id` = 28";
    //$res = Db::execute($sql);
    /*think 构造器 */
    $user = Db::name('user');
    $where = array("id"=>"18");
    $res = $user->where($where)->delete();

    return $res;
  }
  public function Info(){
    $sql = "select * from user  where `id` = 27";
    //$res = Db::query($sql);
    /*think 构造器 */
    $user = Db::name('user');
    $where = array("id"=>array("eq","27"));
    $res = $user->where($where)->find();
    dump($res);
  }
  public function List(){
    dump(Request()->isget());
    $sql = "select * from user order by id desc limit 0,10";
    //$res = Db::query($sql);
    /*think 构造器 */
    $user = Db::name('user');
    $where = array('id'=>array('egt','30'));
    $res = $user->where($where)->order("id desc")->limit(0,5)->select();
    dump($res);
  }
  /*@表连接  */
  public function JoinList(){
    dump(Request()->isget());
    $sql = "select a.id,p.id,a.name,a.email,p.profile from user as a join profile as p on a.id = p.uid order by a.id desc limit 0,10";
    //$res = Db::query($sql);
    /*think 构造器 */
    $user = Db::name('user as a');
    $where = array('a.id'=>array('egt','30'));
    $res = $user->join('profile as b','a.id=p.uid','left')->where($where)->order('a.id desc')->limit(0,5)->select();
    dump($res);
  }
}