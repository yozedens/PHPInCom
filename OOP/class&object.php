<?php
    class SportObject
    {
        const BOOK_TYPE = "计算机图书";
        public $name;
        public $height;
        public $avoirdupois;
        public $age;
        public $sex;

        public function __construct($name,$height,$avoirdupois,$age,$sex){
            $this->name = $name;
            $this->height = $height;
            $this->avoirdupois = $avoirdupois;
            $this->age = $age;
            $this->sex = $sex;
        }
        public function __destruct(){
            echo "调用析构函数，对象被销毁";
        }

        public function beatBasketball($name,$height,$avoirdupois,$age,$sex){
            echo "姓名：".$name."<br>";
            echo "身高：".$height."<br>";
            echo "年龄：".$age."<br>";
        }
        public function bootFootBall(){
            if($this->height<185 and $this->avoirdupois<85){
                return "$this->name 符合踢足球的要求！";
            }else{
                return "$this->name 不符合踢足球的要求！";
            }
        }
    }
    
    class Book{
         const NAME= "computer";
         function __construct(){
             echo "本月图书类冠军为：".Book::NAME.'';
         }

    }
    class I_book extends Book{
        static public $doi;
        const NAME = "foreign language";
        function __construct(){
            parent::__construct();
            echo parent::NAME;
            echo "本月图书类冠军为：".self::NAME.'';
        }
    }
    
    class A{
        private $name;
        function __construct($newName){
            $this->name = $newName;
        }
        public function setName($newName){
            $this->name = $newName;
        }
        public function getName(){
            return $this->name;
        }
        /* public function __clone(){
            $this->name = "liuxin";
        } */
    }

    $a = new A("yzd");
    $b = clone $a;
    $c = $a; 
    //$b->setName("yijun");
    echo $a->getName();
    if($b==$c){
        echo "两个对象的内容相等<br>";
    }
    if($b===$c){
        echo "两个对象的引用地址相等";
    }
?>