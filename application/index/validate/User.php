<?php
namespace app\index\validate;
use think\Validate;
use think\Db;
/*@validate校验规则*/
class User extends Validate{

  protected $rule = [
    ['name','require|max:25|boolName','姓名不能为空|姓名最大长度不能超过25|名称已存在'],
    ['email','email','邮箱格式错误'],
    ['phone','isMobile','手机格式错误'],
    ['number','require|number|max:25','number不能为空|数字类型|最大长度25'],
    ['nums','isNums','不是22'],
  ];
  /*
  @自定义校验规则
   */
  
  /*校验这个nums只能是22的 */
  protected function isNums($val){
    if($val==22){
      return true;
    }
    return false;
  }
  
  /*校验手机号 */
  protected function isMobile($val)
  {
      $rule = '^1(3|4|5|7|8)[0-9]\d{8}$^';
      $result = preg_match($rule, $val);
      if ($result) {
          return true;
      } else {
          return false;
      }
  }
  /*@校验数据库中是否存在 */
  protected function boolName($val){
    $total = Db::name('user')->where("name",$val)->count();
    if ($total>0){
      return false;
    }
    return true;
  }

}