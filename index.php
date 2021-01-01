<?php
/**
 * 魔术方法
 * __construct()    构造函数
 * __destruct()     对象清除时调用
 * __clone()        对象克隆时调用
 * __tostring()     将对象当成字符串使用时自动调用
 * __invoke()       将对象当成函数时自动调用
 * __set()          给无法访问的属性赋值时自动调用
 * __get()          获取无法访问的属性值的时候自动调用
 * __isset()        判断无法访问的属性是否存在时自动调用
 * __unset()        销毁无法访问的属性时自动调用
 * __call()         调用无法访问的方法时自动调用
 * __callstatic()   调用无法访问的静态方法时自动执行
 * __sleep()        当序列化时自动调用
 * __wakeup()       当反序列化时自动调用
 */
class Stu{
    public function __tostring()
    {
        return '对象字符串<br>';
    }
    public function __invoke()
    {
        echo '对象作为函数调用<br>';
    }
}
$s=new Stu;
echo $s;
$s();

class Person
{
    private $name;
    public function __set($k, $v) // 无法访问的赋值
    {
        $this->$k=$v;
    }
    public function __get($k){  // 无法访问的获取
        return $this->$k;
    }
    public function __isset($k){    // 无法访问的存在判断
        return isset($this->$k);
    }
    public function __unset($k){    // 无法访问的销毁
        unset($this->$k);
    }
}
$p=new Person;
// 以上魔术方法的调用使得原本失败的操作成功
// $p->name="mkl";
// echo $p->name.'<br>';
// var_dump(isset($p->name).'<br>');
// unset($p->name);
// print_r($p.'<br>');

class People
{
    public function __call($fn_name, $fn_args){  // 参数为方法名称、方法参数
        echo "{$fn_name}不存在<br>";
    }
    public static function __callstatic($fn_name, $fn_args){  // 参数为方法名称、方法参数
        echo $fn_name, $fn_args, '<br>';
    }
}
$pp=new People;
$pp->show(10,20);
People::show();

class Student {
	private $name;
	private $sex;
	private $add='中国';
	public function __construct($name,$sex) {
		$this->name=$name;
		$this->sex=$sex;
	}
	/**
	*序列化的时候自动调用
	*@return array 序列化的属性名
	*/
	public function __sleep() {
		return array('name','sex');
	}
	//反序列化的时候自动调用
	public function __wakeup() {
		$this->type='学生';
	}
}
//测试
$stu=new Student('tom','男');
$str=serialize($stu);	//序列化
$stu=unserialize($str);	//反序列化
print_r($stu);

?>