<?php
//echo phpinfo();
// php语法

/**
 * 变量作用域
 *  global
 *  static
 *  local
 *  parameter
 */
$p1=5;
function t1()
{
    global $p1;  // 操作全局变量
    $p1++;
    echo $p1;
}
t1();

function t2()
{
    static $p2=10;  // 保持局部变量不被释放
    echo $p2;
    $p2++;
    echo PHP_EOL;
}
t2();  // 10
t2();  // 11
t2();  // 12

function t3($x)  // 参数作用域，传值
{
    echo $x;
}
t3(10);

/**
 * echo与print
 *  echo可输出多个字符串
 *  print只能输出一个字符串，返回1
 * 
 */

 /**
  * PHP EOF(heredoc)
  *     定义长字符串
  */
  $p3=<<<EOF
    hello world
    nihao shijie
  EOF;
  echo $p3;

  /**
   * PHP数据类型
   *    String
   *    Integer
   *    Float
   *    Boolean
   *    Array
   *    Object
   *    NULL·
   */
    // 1.整型：十进制 十六进制 
    // var_dump() 返回数据类型与值
    var_dump(100);
    var_dump(100.01);
    var_dump(true);
    // 2.数组
    $p4=array(1, "2", 3);
    var_dump($p4);
    // 3.对象
    class Car
    {
        var $color;
        function __construct($color="green")
        {
            $this->color=$color;
        }
        function what_color(){
            return $this->color;
        }
    }
    // 实例化对象
    $car=new Car("white");
    // 打印属性
    foreach(get_object_vars($car) as $key => $val){
        echo "$key=$val\n";
    }
    echo null;

    /**
     * 类型比较
     *  == 松散比较
     *  === 严格比较
     *  gettype()获取类型
     *  empty()判断是否为空
     *  is_null()判断是否为null或undefined
     *  is_set()判断是否为集合
     *  boolean()判断真假
     */
    echo gettype("");
    echo gettype(false);

    /**
     * 常量： 全局
     */
    define ("HELLO", 1, true);  // true 表示大小写不敏感，默认是false
    echo hello;

    /**
     * 字符串操作
     */
    
?>