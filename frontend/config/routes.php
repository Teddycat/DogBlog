<?php
return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        '<action>' => 'site/<action>',
        '/article/<id:\w+>' => 'site/article',
        '/entry/article' => 'site/addarticle',
        '/entry/comment' => 'site/addcomment'
    ]
];