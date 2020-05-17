<?php
namespace app\index\model;
use think\model\Merge;

class User extends Merge{
  // 设置主表名
  protected $table = 'user';
  // 定义关联模型列表
  protected $relationModel = [
      // 给关联模型设置数据表
      'Profile'   =>  'profile',
  ];
  // 定义关联外键
  protected $fk = 'uid';
  protected $mapFields = [
      // 为混淆字段定义映射
      'id'        =>  'User.id',
      'profile_id' =>  'Profile.id',
  ];
}