<?php
/**
 * PHP面对对象编程
 *      方法前public可以省略，默认为public，属性前public不能删除
 *      public 共有的，类内部外部都能访问
 *      private 私有的，只能在类内部使用
 *      protected 受保护的，在整个继承链上访问
 */
class Student{
    private $sex;
    public $name;
    public $add='地址不详';
    // 构造函数
    public function __construct($name, $sex){
        // 初始化对象
        $this->name=$name;
        $this->sex=$sex;
    }
    public function show(){
        echo 'show';
    }
    public function setInfo($name,$sex){
        $this->name=$name;
        $this->sex=$sex;
    }
    public function getInfo(){
        echo '姓名:'.$this->name,'<br>';
        echo '性别:'.$this->sex,'<br>';
    }
    // 对象销毁时调用
    public function __destruct(){
        echo "{$this->name}销毁了<br>";
    }
}

// 继承,PHP不具备多重继承
class PrimaryStudent extends Student{
    // 子类有构造方法，则只调用子类的，不调用父类的
    public function __construct(){
        // 通过类名调用父类的构造函数
        // Student::__construct("a", "b");
        // 或者通过parent关键字来表示父类，降低耦合度
        parent::__construct("b", "c");
        echo "这是子类的构造方法<br>";
    }

    public function useParentMethod(){
        // $this调用父类方法
        $this->show();
    }
}

// 调用父类方法
$ps=new PrimaryStudent("mkl", "同性");
$ps->show();
$ps->useParentMethod();

$stu=new Student("mik", "女");
// 修改属性
$stu->name='mkl';
echo $stu->name, '<br>';
// 添加属性
$stu->age=12;
print_r($stu);
echo '<br>';
// 删除属性
unset($stu->age);
print_r($stu);

// 调用方法
$stu->show();
$stu->setInfo("tom", "男");
$stu->getInfo();

/**
 * 多态
 *      方法重写/方法重载(PHP不支持)
 *  注意：
 *      1.方法重写子类修饰不能比父类更加严格
 *      2.私有属性可以继承不能重写
 */
class Person{
    public function show(){
        echo '父类<br>';
    }
}
class Child extends Person{
    public function show(){
        echo '子类<br>';
    }
}
$c=new Child;
$c->show();

/**
 * 方法修饰符
 *  static final abstract
 *      static修饰的属性：静态属性；static修饰的方法：静态方法
 *          调用语法：类名::属性  类名::方法名() 
 *      final修饰的方法不能被重写 修饰的类不能被继承
 *      abstract 
 *          1.只有方法的声明，没有方法的实现
 *          2.抽象类不能被实例化
 *          3.类有一个抽象方向就必须是抽象类，但是抽象类可以没有抽象方法
 *          4.子类继承抽象类必须重新实现父类的所有抽象方法，否则不允许实例化
 *  self 表示所在类的类名
 *      通过self::$addr 查看类属性
 *      通过self::show() 调用类方法
 *  静态成员可被继承
 */
// static
class People{
    public static $addr='浙江';
    static public function show(){
        echo '静态方法<br>';
        echo self::$addr;
    }
}
echo People::$addr,'<br>';
People::show();

// abstract
abstract class Animal{
    public abstract function setInfo();
    public function getInfo(){
        echo '获取信息<br>';
    }
}
class Dog extends Animal{
    public function setInfo(){
        echo '重新实现父类的抽象方法<br>';
    }
}
$dog=new Dog;
$dog->setInfo();
$dog->getInfo();

/**
 * 类常量: 直接通过类调用，与static的区别在于无法修改
 *      define与const的区别
 *          const常量可以做类成员(php7.1以后const才支持访问修饰符)
 *          define常量不可以做类成员
 */
class Fruit{
    const ADDR='address';
}
echo Fruit::ADDR;

/**
 * 接口
 *      1.特殊的抽象类，只能有抽象方法和常量
 *      2.抽象方法只能是public修饰，可以省略
 *      3.通过implements关键字来实现接口
 *      4.接口允许多重实现
 */
// 声明接口
interface IPerson{
    const ADDR='China';
    function f1();
}
interface IPeople{
    function f2();
}
// 实现接口
class Stu implements IPerson, IPeople{
    public function f1(){

    }
    public function f2(){

    }
}
// 访问接口常量
echo IPerson::ADDR;

/**
 * 匿名类 PHP7.0才支持
 */
$p7=new class {
    public $name='mk';
};
echo $p7->name;

/**
 * 异常处理
 */
try{

}catch(Exception $e){

}
finally{

}

/**
 * 类的规则
 *      1.一个文件一个类
 *      2.文件名与类名相同
 *      3.以.class.php结尾(不是必须)
 */

 /**
  * 手动加载类
  */
require './Book.class.php';
require './SubBook.class.php';
$sb=new SubBook;
$sb->getSubName();

/**
 * 类自动加载
 *      缺少类的时候会自动调用__autoload()函数，传递类名参数
 */
function __autoload($class_name){  // PHP7.2以后就不支持了
    require "./{$class_name}.class.php";
}

/**
 * 类注册加载
 */
// 方式1
// function loadClass($class_name){
//     require "./{$class_name}.class.php";
// }
// spl_autoload_register('loadClass');

// 方法2
// spl_autoload_register(function($class_name){
//     require "./{$class_name}.class.php";
// });

// 注册多个自动加载函数
function load1($class){
    require "./{$class}.class.php";
}
function load2($class){
    require "./{$class}.php";
}
function load3($class){
    require "./{$class}.fun.php";
}
spl_autoload_register('load1');  // PHP5.1开始支持了
spl_autoload_register('load2');
spl_autoload_register('load3');

/**
 * 不规则存储位置加载
 */
// spl_autoload_register(function($class_name){
//     $map=array(
//         'Goods' => './aa/Goods.class.php',
//         'Book' => './bb/Book.class.php',
//         'Phone' => './cc/Phone.class.php'
//     );
//     if (isset($map[$class_name])){
//         require $map[$class_name];
//     }
// });

/**
 * 创建对象的方式
 *      1.实例化
 *      2.克隆
 *          执行clone时会自动调用类中的__clone()方法
 */
class CloneClass{
    public function __clone(){
        echo '正在克隆对象<br>';
    }
}
$cl1=new CloneClass;
$cl2=clone $cl1;
var_dump($cl1, $cl2);

?>