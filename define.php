<?php
// 游戏主程序调用入口

define ( 'PATH_ROOT', dirname ( __FILE__ ) . '/' ); // 根目录
define ( 'PATH_COMMAND', PATH_ROOT . 'command/' ); // 命令(逻辑)目录
define ( 'PATH_HANDLER', PATH_COMMAND . 'handler/' ); // 实例操作目录
define ( 'PATH_DATAOBJ', PATH_ROOT . 'dataobj/' ); // 数据对象目录
define ( 'PATH_CACHE', PATH_ROOT . 'dataobj/cache/' ); // mc层
define ( 'PATH_MODEL', PATH_ROOT . 'dataobj/model/' );
define ( 'PATH_SQL', PATH_ROOT . 'sql/' );
define ( 'FRAMEWORK', PATH_ROOT . 'framework/' ); // 主框架目录
define ( 'PATH_STATIC', PATH_ROOT . 'static/' ); // 静态文件夹

define ( 'PATH_CONTROL', PATH_ROOT . 'www/control/' ); // control
define ( 'PATH_VIEW', PATH_ROOT . 'www/view/' ); // control


date_default_timezone_set ( "Asia/Chongqing" );
include_once PATH_ROOT . 'config.inc.php'; // 全局配置文件
include_once PATH_COMMAND . 'BaseCommand.php';
// 加载framework中db操作类与cache操作类
require_once FRAMEWORK . '/cache/Cache.class.php';
require_once FRAMEWORK . '/database/DBHandler.class.php';
// 加载redies
require_once FRAMEWORK . '/redis/Rediska.php';
include_once FRAMEWORK . 'exception/GameException.php'; // 游戏内部异常处理
include_once PATH_COMMAND . 'BaseCommand.php';
include_once 'config.code.php'; // 常量处理类
include_once 'config.php'; // 常量处理类
?>