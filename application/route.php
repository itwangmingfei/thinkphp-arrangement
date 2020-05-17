<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;

//模型操作
Route::get('Add','index/User/Add');
Route::get('Del/:id','index/User/Del');
Route::get('Update','index/User/Update');
Route::get('Info/:id','index/User/Info');
Route::get('List','index/User/List');
//原生操作

//参数validate
return [
  '__pattern__' => [
      'name' => '\w+',
      'id' => '\d+',
  ],
];

