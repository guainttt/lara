<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2021/3/15
 * Time: 18:49
 */
use Illuminate\Database\Capsule\Manager;
use Illuminate\Support\Fluent;
require __DIR__."/../vendor/autoload.php";
$app = new Illuminate\Container\Container;
Illuminate\Container\Container::setInstance($app);

with(new Illuminate\Events\EventServiceProvider($app))->register();
with(new Illuminate\Routing\RoutingServiceProvider($app))->register();

$manager = new Manager();
$manager->addConnection(require '../config/database.php');
$manager->bootEloquent();

$app->instance('config', new Fluent);

$app['config']['view.compiled'] = dirname(__DIR__).'/storage/framework/views/';//视图编译文件路径
$app['config']['view.paths'] = [dirname(__DIR__).'/resources/views/' ];//视图文件储存路径


with(new Illuminate\View\ViewServiceProvider($app))->register();
with(new Illuminate\Filesystem\FilesystemServiceProvider($app))->register();


require __DIR__.'/../app/Http/routes.php';

$request = Illuminate\Http\Request::createFromGlobals();

$response = $app['router']->dispatch($request);

$response->send();
