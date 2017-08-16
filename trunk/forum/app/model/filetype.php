<?php
// $Id$

/**
 * Filetype 封装来自 filetype 数据表的记录及领域逻辑
 */
class Filetype extends QDB_ActiveRecord_Abstract
{
    /**
     * 判断上传的文件是否满足规定的格式，大小
     * 
     */
    public function judefiletype($filepost) {
        //如果传进来的是一个数组则将数组转为为对象
        if(is_array($filepost)) {
            $filepost = (object)$filepost;
        }
        //获取文件类型
        preg_match("/\w+/",$filepost->type,$filetype);

        //对其类型进行判断
        switch ($filetype[0]) {
            case 'image':
            return $this->judeimg($filepost);
            break;
            case 'vidio':
            return $this->judedoc($filepost);
            break;
            case 'word':
            return $this->judevideo($filepost);
            break;           
            default:
            return "上传内容不在规定范围内";
            break;
        }

    }
    // 图片类型的判断
    private function judeimg($imgtype) {
        //判断图片格式
        //取获取上传文件的格式（浏览器提供不一定准确，兼容性需要测试）
        preg_match("/\S+\/(\S+)/",$imgtype->type,$_all);
        try {
            $temp = $this->find("limit_format like ?","%".$_all[1]."%")->getOne();
            if(empty($temp->file_name)) {
                throw new Exception("图片文件格式不支持");

            }
            
        } catch (Exception $e) {
            return $e->getMessage();            
        }
        //判断大小是否满足
        try {
                if(intval($imgtype->size)/1024>intval($temp->limit_size)) {
                    throw new Exception("文件太大了，不能超过".$temp->limit_size."k");                
                }
        } catch (Exception $e) {
                return $e->getMessage();       
        }
        return "ok";
    }


    //文档文件类型判断
    private function judedoc($imgtype) {
        //判断文本格式
        //取获取上传文件的格式（浏览器提供不一定准确，兼容性需要测试）
        preg_match("/\S+\/(\S+)/",$imgtype->type,$_all);
        try {

           $temp = $this->find("limit_format like ?","%".$_all[1]."%")->getOne();

           if(empty($temp->file_name)) {
               throw new Exception("文本文件格式不支持，仅支持");          
           }           

       } catch (Exception $e) {

        return $e->getMessage();            
    }

        //判断大小是否满足
        try {
                if(intval($imgtype->size)/1024>intval($temp->limit_size)) {
                    throw new Exception("文件太大了，不能超过".$temp->limit_size."k");                
                }
        } catch (Exception $e) {
                return $e->getMessage();       
        }
        return "ok";
   }   

   //判断视频类型文件
    private function judevideo($imgtype) {

        //判断视频格式
        //取获取上传文件的格式（浏览器提供不一定准确，兼容性需要测试）

        preg_match("/\S+\/(\S+)/",$imgtype->type,$_all);

        try {

             $temp = $this->find("limit_format like ?","%".$_all[1]."%")->getOne();

             if(empty($temp->file_name)) {
                throw new Exception("视频文件格式不支持，仅支持");          
             }           

        } catch (Exception $e) {

             return $e->getMessage();            
        }

        //判断大小是否满足
        try {
                if(intval($imgtype->size)/1024>intval($temp->limit_size)) {
                    throw new Exception("文件太大了，不能超过".$temp->limit_size."k");                
                }
        } catch (Exception $e) {
                return $e->getMessage();       
        }
        return "ok";
}   



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
                    array('max_length', 64, 'file_name不能超过 64 个字符'),

                    ),

                'file_type' => array
                (
                    array('max_length', 64, 'file_type不能超过 64 个字符'),

                    ),

                'limit_format' => array
                (
                    array('max_length', 128, 'limt_format不能超过 128 个字符'),

                    ),

                'limit_size' => array
                (
                    array('max_length', 64, 'limit_size不能超过 64 个字符'),

                    ),

                'complete_code' => array
                (
                    array('max_length', 255, 'complete_code不能超过 255 个字符'),

                    ),

                'status' => array
                (
                    array('is_int', 'status必须是一个整数'),

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

