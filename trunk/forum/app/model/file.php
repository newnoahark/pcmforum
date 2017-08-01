<?php
// $Id$

/**
 * File 封装来自 filetype 数据表的记录及领域逻辑
 */
class File extends QDB_ActiveRecord_Abstract
{

    //文件上传错误代码
    public $error_code ;

      //  重写构造函数 上传文件时在模型侧判断是否是否允许文件上传并保存
    function __construct(){
        parent::__construct();
        $this->error_code = 0;
        $this->judgefiletype();

    }
    //判断文件上传类型
    function judgefiletype(){
        //
        if($_FILES["file"]['error'] > 0){
            $this->error_code = $_FILES["file"]['error'] ;
        } 
        else {
                $this->file_name = $_FILES["file"]["name"];
                $this->file_type =  $_FILES["file"]["type"];
                /**服务器上使用的是gb2312的编码格式，而本地使用的是utf8所以放在本地的话
                *需要从新编码 iconv()
                **/
                $filename = iconv("utf-8","gb2312",$_FILES["file"]["name"]);
            
                //移动文件至本地
                if (file_exists("E:\\downfile\\" . $filename)) {
                    $this->error_code = "1001";
                } else
                {

                     move_uploaded_file($_FILES["file"]["tmp_name"],"E:\\downfile\\". $filename);
                     $this->complete_code = "E:\\downfile\\". $filename;
                    
                }
         }



    }

   // $this->file_name = "hello"；
    /**
     * 返回对象的定义
     *
     * @static
     *
     * @return array
     */
    static function __define()
    {
        return array
        (
            // 指定该 ActiveRecord 要使用的行为插件
            'behaviors' => '',

            // 指定行为插件的配置
            'behaviors_settings' => array
            (
                # '插件名' => array('选项' => 设置),
            ),

            // 用什么数据表保存对象
            'table_name' => 'filetype',

            // 指定数据表记录字段与对象属性之间的映射关系
            // 没有在此处指定的属性，QeePHP 会自动设置将属性映射为对象的可读写属性
            'props' => array
            (
                // 主键应该是只读，确保领域对象的“不变量”
                'fileid' => array('readonly' => true),

                /**
                 *  可以在此添加其他属性的设置
                 */
                # 'other_prop' => array('readonly' => true),

                /**
                 * 添加对象间的关联
                 */
                # 'other' => array('has_one' => 'Class'),

            ),

            /**
             * 允许使用 mass-assignment 方式赋值的属性
             *
             * 如果指定了 attr_accessible，则忽略 attr_protected 的设置。
             */
            'attr_accessible' => '',

            /**
             * 拒绝使用 mass-assignment 方式赋值的属性
             */
            'attr_protected' => 'fileid',

            /**
             * 指定在数据库中创建对象时，哪些属性的值不允许由外部提供
             *
             * 这里指定的属性会在创建记录时被过滤掉，从而让数据库自行填充值。
             */
            'create_reject' => '',

            /**
             * 指定更新数据库中的对象时，哪些属性的值不允许由外部提供
             */
            'update_reject' => '',

            /**
             * 指定在数据库中创建对象时，哪些属性的值由下面指定的内容进行覆盖
             *
             * 如果填充值为 self::AUTOFILL_TIMESTAMP 或 self::AUTOFILL_DATETIME，
             * 则会根据属性的类型来自动填充当前时间（整数或字符串）。
             *
             * 如果填充值为一个数组，则假定为 callback 方法。
             */
            'create_autofill' => array
            (
                # 属性名 => 填充值
                # 'is_locked' => 0,
            ),

            /**
             * 指定更新数据库中的对象时，哪些属性的值由下面指定的内容进行覆盖
             *
             * 填充值的指定规则同 create_autofill
             */
            'update_autofill' => array
            (
            ),

            /**
             * 在保存对象时，会按照下面指定的验证规则进行验证。验证失败会抛出异常。
             *
             * 除了在保存时自动验证，还可以通过对象的 ::meta()->validate() 方法对数组数据进行验证。
             *
             * 如果需要添加一个自定义验证，应该写成
             *
             * 'title' => array(
             *        array(array(__CLASS__, 'checkTitle'), '标题不能为空'),
             * )
             *
             * 然后在该类中添加 checkTitle() 方法。函数原型如下：
             *
             * static function checkTitle($title)
             *
             * 该方法返回 true 表示通过验证。
             */
            'validations' => array
            (
                'file_name' => array
                (
                    array('max_length', 128, '文件名称不能超过 128 个字符'),

                ),

                'code' => array
                (
                    array('max_length', 128, '唯一代码不能超过 128 个字符'),

                ),

                'file_type' => array
                (
                    array('max_length', 128, '文件类型不能超过 128 个字符'),

                ),

                'iimit_format' => array
                (
                    array('max_length', 128, '限制格式不能超过 128 个字符'),

                ),

                'iimit_size' => array
                (
                    array('max_length', 128, '限制大小不能超过 128 个字符'),

                ),

                'complete_code' => array
                (
                    array('max_length', 250, '实现代码不能超过 250 个字符'),

                ),

                'sort' => array
                (
                    array('is_int', '排序必须是一个整数'),

                ),

                'status' => array
                (
                    array('is_int', '状态必须是一个整数'),

                ),

                'recycle' => array
                (
                    array('is_int', '回收站必须是一个整数'),

                ),


            ),
        );
    }


/* ------------------ 以下是自动生成的代码，不能修改 ------------------ */

    /**
     * 开启一个查询，查找符合条件的对象或对象集合
     *
     * @static
     *
     * @return QDB_Select
     */
    static function find()
    {
        $args = func_get_args();
        return QDB_ActiveRecord_Meta::instance(__CLASS__)->findByArgs($args);
    }

    /**
     * 返回当前 ActiveRecord 类的元数据对象
     *
     * @static
     *
     * @return QDB_ActiveRecord_Meta
     */
    static function meta()
    {
        return QDB_ActiveRecord_Meta::instance(__CLASS__);
    }


/* ------------------ 以上是自动生成的代码，不能修改 ------------------ */

}

