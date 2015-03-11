<?php
return array(
	//'配置项'=>'配置值'
    'TMPL_TEMPLATE_SUFFIX'=>'.phtml',
    'URL_CASE_INSENSITIVE' =>true,//不区分URL大小写的解决方案
    'TMPL_FILE_DEPR'=>'_',
    'VIEW_IN'=>'./Application/Home/View/ads.phtml',
    'TMPL_PARSE_STRING'  =>array(
        '__PUBLIC__' => 'Public/default/',
    ),
);