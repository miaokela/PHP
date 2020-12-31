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
    // 拼接运算符 . 
    echo "hello" . " " . "world";
    // 字符串长度
    echo strlen("你好"); // 返回字节数6
    // 查找字符 返回下标或者false
    echo strpos("hello world","world");

    /**
     * PHP数组
     *  数值数组
     *  关联数组
     *  多维数组
     */
    // 数值数组
    $p5=array(1,2,3);
    echo count($p5);
    $c=count($p5);
    // 遍历数组
    for ($i=0;$i<$c;$i++){
        echo $p5[$i];
        echo "<br>";
    }
    // 关联数组
    $dict=array("name"=>"mic","age"=>10);
    $dict["sex"]="male";
    echo $dict["sex"];  // male
    // 遍历关联数组
    foreach($dict as $dk=>$dv)
    {
        echo "key=".$dk.", value=".$dv;
    }
    /**
     * 数组排序
     * sort() 升序
     * rsort() 降序
     * asort() 关联数组值升序
     * ksort() 关联数组键升序
     * arsort() 关联数组值降序
     * krsort() 关联数组键降序
     */
    $p6=array(1,5,4,6);
    $p7=sort($p6);  // 返回1
    echo "</br>p6:".$p6."&p7:".$p7;
    /**
     * 超级全局变量
     * $GLOBALS: 一个包含全部变量的全局组合数组
     * $_SERVER: 头信息(header)、路径(path)、以及脚本位置(script locations)等等信息
     * $_REQUEST
     * $_POST
     * $_GET
     * $_FILES
     * $_ENV
     * $_COOKIE
     * $_SESSION
     */
    $p8=10;
    function change()
    {
        $GLOBALS["p9"] = $GLOBALS["p8"];
    }
    change();
    echo "</br>".$p9;  // p9直接存放在$GLOBALS全局变量组中

    echo "</br>";
    echo $_SERVER["PHP_SELF"];  // 执行脚本的名称
    echo "</br>";
    echo $_SERVER["GATEWAY_INTERFACE"];  // CGI规范版本
    echo "</br>";
    echo $_SERVER["SERVER_ADDR"];  // IP地址
    echo "</br>";
    echo $_SERVER["SERVER_NAME"];  // 主机名
    echo "</br>";
    echo $_SERVER["SERVER_SOFTWARE"];  // 服务器标识字符串
    echo "</br>";
    echo $_SERVER["SERVER_PROTOCOL"];  // 通信协议
    echo "</br>";
    echo $_SERVER["REQUEST_METHOD"];  // 请求方法
    echo "</br>";
    echo $_SERVER["REQUEST_TIME"];  // 请求开始时间戳
    echo "</br>";
    echo $_SERVER["QUERY_STRING"];  // 查询字符串
    echo "</br>";
    echo $_SERVER["HTTP_ACCEPT"];  // ACCEPT项内容
    echo "</br>";
    echo $_SERVER["HTTP_ACCEPT_CHARSET"];  // Accept-Charset: 项
    echo "</br>";
    echo $_SERVER["HTTP_HOST"];  // HOST项
    echo "</br>";
    echo $_SERVER["HTTP_REFERER"];  // 上次访问路径
    echo "</br>";
    echo $_SERVER["HTTPS"];  // 执行脚本的名称
    echo "</br>";
    echo $_SERVER["REMOTE_ADDR"];  // 用户IP地址
    echo "</br>";
    echo $_SERVER["REMOTE_HOST"];  // 用户主机名
    echo "</br>";
    echo $_SERVER["REMOTE_PORT"];  // 端口
    echo "</br>";
    echo $_SERVER["SCRIPT_FILENAME"];  // 脚本绝对路径
    echo "</br>";
    echo $_SERVER["SERVER_ADMIN"];  // apache配置参数 SERVER_ADMIN
    echo "</br>";
    echo $_SERVER["SERVER_PORT"];  // web服务器使用端口
    echo "</br>";
    echo $_SERVER["SERVER_SIGNATURE"];  // 服务器版本与虚拟主机字符串
    echo "</br>";
    echo $_SERVER["PATH_TRANSLATED"];  // 脚本基本路径
    echo "</br>";
    echo $_SERVER["SCRIPT_NAME"];  // 当前脚本名称
    echo "</br>";
    echo $_SERVER["SCRIPT_URI"];  // 访问URI
    echo "</br>";

    // 表单请求数据
    echo $_REQUEST["fname"];  // input框name值
    echo $_POST["fname"];  // POST请求input框name值
    echo $_GET["fname"];  // GET请求?后的参数

    /**
     * 循环
     * while
     * for
     */
    // while
    $i=1;
    while($i<5)
    {
        echo $i;
        $i++;
    }
    // do while(至少执行一次)
    do
    {
        echo $j;
        $j++;
    }
    while($j<5);
    // for
    for ($i=1;$i<=5;$i++)
    {
        echo $i;
    }
    // foreach
    // 值数组
    foreach (array(1,2,3,4) as $v)
    {
        echo $v;
    }
    // 关联数组
    foreach (array(1=>"a", 2=>"b") as $k=>$v){
        echo $k.": ".$v;
    }
    /**
     * 魔术常量
     * __LINE__ 当前行号
     * __FILE__ 文件完整路径和文件名
     * __DIR__ 文件所在目录
     * __FUNCTION__ 函数名称
     * __CLASS__ 类名称
     * __TRAIT__ 
     * __METHOD__ 方法名
     * __NAMESPACE__ 命名空间名
     */
    // __TRAIT__ trait关键字实现代码复用
    class Base{
        public function sayHello(){
            echo "hello";
        }
    }
    trait SayWorld{
        public function sayHello(){ 
            parent::sayHello();
            echo "world";
        }
    }
    class MyHelloWorld extends Base{
        use SayWorld;
    }
    $o = new MyHelloWorld();
    $o->sayHello();
?>