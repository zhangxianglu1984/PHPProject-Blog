<?php
return array(
	
	/**
	 * 自动开启Session
	 */
	'SESSION_AUTO_START' => TRUE,
	/**
	 * Session的数据库驱动
	 */
	'SESSION_OPTIONS' => array(
		'type' => 'Db',
	),
	'SESSION_TABLE' => 't_session',
	'SESSION_EXPIRE' => 5000,	
	
		
	/**
	 * URL伪静态后缀名
	 */
	'URL_HTML_SUFFIX' => '',
	
    /**
     * 模板常量重定义
     */
    'TMPL_PARSE_STRING' => array(
    	'__PUBLIC__' => __ROOT__ . '/Application/' . MODULE_NAME . '/View/Public',
    ),
    
    /**
     * 操作的后缀名
     */
    'ACTION_SUFFIX' => 'Action',
		
	/**
	 * 加载扩展配置文件
	 */
	'LOAD_EXT_CONFIG' => array(
		'verifyCode'
	),
	
);