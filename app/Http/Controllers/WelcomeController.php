<?php
/**
 * Created by PhpStorm.
 * User: SUN
 * Date: 2021/3/15
 * Time: 20:35
 */
namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Container\Container;
class WelcomeController
{
    public function index()
    {
       var_dump($_SESSION);
        var_dump($_COOKIE);
       $aaa ='ttt';
        echo "welcome";
//        return "<h1>控制器成功！！</h1>";
        $student = Student::first();
        exit();
        $data = $student->getAttributes();
        $app = Container::getInstance();
//        var_dump($data);exit;
    
        $factory = $app->make('view');
        return $factory->make('welcome')->with('data',$data);
    }
}