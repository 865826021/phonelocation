### 手机归属地查询 PHP 版

安装

```
composer require easthing\phonelocation:dev-master
```


使用

```
$location = \Easthing\PhoneLocation::find(13800138000);

var_dump($location);

array(7) {
  [0]=>
  string(5) "80011"
  [1]=>
  string(7) "1380013"
  [2]=>
  string(6) "北京"
  [3]=>
  string(6) "北京"
  [4]=>
  string(12) "中国移动"
  [5]=>
  string(3) "010"
  [6]=>
  string(8) "100000
"
}
```
