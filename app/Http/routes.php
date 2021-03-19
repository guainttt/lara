<?php
use App\Http\Controllers\WelcomeController;
$app['router']->get('/',function (){
/*    echo  'bbb';
    $a = 'aa';
    echo "<h1>路由成功！！</h1>";
    phpinfo();
    exit;*/
    phpinfo();
    echo "<h1>路由成功！！</h1>";
    return;
});
$app['router']->get('welcome',"App\Http\Controllers\WelcomeController@index");

$app['router']->get('aa',function (){
    return "<h1>路由成功！</h1>";
});



