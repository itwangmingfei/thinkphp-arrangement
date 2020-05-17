#### 整理下
```bash
thinkphp5.0
composer 安装
composer create-project topthink/think=5.0.* tp5  --prefer-dist

git安装
git clone https://github.com/top-think/think tp5
然后切换到tp5目录下面，再克隆核心框架仓库：
git clone https://github.com/top-think/framework thinkphp
git checkout master
更新
git pull https://github.com/top-think/framework
```
```bash
//Thinkphp5.0 路由以及数据库操作
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

$where = array("id"=>array("eq","10"));
```


```bash
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

/*控制器*/
use app\index\validate\User as validateuser;

class User extends Controller{
  /*@validate验证 */
  public function Validatetext(){
    
    $data = array(
      'name' =>"Seefly",
      'email' =>"qqqqqqqq@qq.com",
      'phone' =>"152121212121",
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
  ...
```