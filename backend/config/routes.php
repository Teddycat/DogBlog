<?php
return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    //'class'           => 'yii\web\UrlManager',
    //'allowedIPs' => ['127.0.0.1', '::1', '192.168.1.*', 'XXX.XXX.XXX.XXX'],
   // 'scriptUrl'=>'/admin/index.php',
    'rules' => [
        '' => 'site/index',
        //'site/admin' => 'site/index',
        '<action>'=>'site/<action>',
        'newpartners/<prid:\d+>' => 'site/newone',
    ]
];