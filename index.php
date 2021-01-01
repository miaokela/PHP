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
?>