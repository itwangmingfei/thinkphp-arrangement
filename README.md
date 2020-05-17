#### 整理下

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