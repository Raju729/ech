<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;


Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {

    $routes->connect('/', ['controller' => 'Home', 'action' => 'home']);
    $routes->connect('/test', ['controller' => 'Pages', 'action' => 'display', 'test']);
    $routes->connect('/contact', ['controller' => 'Pages', 'action' => 'contact']);
    $routes->connect('/about', ['controller' => 'Pages', 'action' => 'about']);
    $routes->connect('/gallery', ['controller' => 'Pages', 'action' => 'gallery']);
    $routes->connect('/upload', ['controller' => 'Upload', 'action' => 'save']);
    $routes->connect('/testupload', ['controller' => 'Upload', 'action' => 'test']);
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);


    $routes->connect('/doctors', ['controller' => 'Doctors', 'action' => 'doctorList']);
    $routes->connect('/home', ['controller' => 'Home', 'action' => 'home']);
    
    $routes->connect('/getadoctor/:id', ['controller' => 'Doctors', 'action' => 'getadoctor'],['pass'=>['id']]);


    $routes->connect('/patients/ajax', ['controller' => 'Patients', 'action' => 'ajax']);


    $routes->connect('/pay/ajax', ['controller' => 'Payment', 'action' => 'ajax']);
    $routes->connect('/pay/bkash', ['controller' => 'Payment', 'action' => 'bkash']);
    $routes->connect('/pay/dbbl', ['controller' => 'Payment', 'action' => 'dbbl']);
    $routes->connect('/pay/free', ['controller' => 'Payment', 'action' => 'free']);
    $routes->connect('/pay/processing', ['controller' => 'Transactions', 'action' => 'store']);
    $routes->connect('/pay/thanku', ['controller' => 'Transactions', 'action' => 'thankyou']);


    $routes->connect('/prescriptions', ['controller' => 'Prescriptions', 'action' => 'prescriptionList']);
    $routes->connect('/prescriptions/ajax', ['controller' => 'Prescriptions', 'action' => 'ajax']);
    $routes->connect('/prescriptions/prescribe/:id', ['controller' => 'Prescriptions', 'action' => 'prescribe'],['pass'=>['id']]);
    $routes->connect('/prescriptions/view/:id', ['controller' => 'Prescriptions', 'action' => 'view'],['pass'=>['id']]);
    $routes->connect('/prescriptions/pdf/:id', ['controller' => 'Prescriptions', 'action' => 'pdf'],['pass'=>['id']]);


    $routes->connect('/statements', ['controller' => 'Statements', 'action' => 'statements']);

    $routes->connect('/transactions', ['controller' => 'Transactions', 'action' => 'transactions']);


    $routes->connect('/messages', ['controller' => 'Messages', 'action' => 'showconv']);
    $routes->connect('/messages/ajax', ['controller' => 'Messages', 'action' => 'ajax']);

    $routes->connect('/dashboard', ['controller' => 'Profile', 'action' => 'dashboard']);
    $routes->connect('/profile', ['controller' => 'Profile', 'action' => 'profile']);
    $routes->connect('/profile/update', ['controller' => 'Profile', 'action' => 'update']);
    $routes->connect('/pupdatep', ['controller' => 'Profile', 'action' => 'resetpassword']);

    $routes->connect('/login',['controller'=>'Authexs','action'=>'login']);
    $routes->connect('/logout',['controller'=>'Authexs','action'=>'logout']);
    $routes->connect('/register',['controller'=>'Authexs','action'=>'register']);
    $routes->connect('/register/:type',['controller'=>'Authexs','action'=>'register'],['pass'=>['type']]);

    $routes->fallbacks(DashedRoute::class);
});

Router::prefix('Admin', function ($routes) {

    $routes->connect('/', ['controller' => 'Home', 'action' => 'home']);
    $routes->connect('/users', ['controller' => 'Users', 'action' => 'users']);
    $routes->connect('/users/add', ['controller' => 'Users', 'action' => 'add']);
    $routes->connect('/users/ajax', ['controller' => 'Users', 'action' => 'ajax']);
    $routes->connect('/users/update/:id',['controller'=>'Users','action'=>'update'],['pass'=>['id']]);

    $routes->connect('/doctors', ['controller' => 'Doctors', 'action' => 'doctors']);

    $routes->connect('/doctors/add', ['controller' => 'Doctors', 'action' => 'add']);
    $routes->connect('/doctors/ajax', ['controller' => 'Doctors', 'action' => 'ajax']);

    $routes->connect('/patients', ['controller' => 'Patients', 'action' => 'patients']);
    $routes->connect('/patients/add', ['controller' => 'Patients', 'action' => 'add']);
    $routes->connect('/patients/ajax', ['controller' => 'Patients', 'action' => 'ajax']);


    $routes->connect('/transactions', ['controller' => 'Transactions', 'action' => 'alltrx']);
    $routes->connect('/transactions/refund', ['controller' => 'Transactions', 'action' => 'refund']);
    $routes->connect('/transactions/ajax', ['controller' => 'Transactions', 'action' => 'ajax']);

    $routes->connect('/prescriptions', ['controller' => 'Prescriptions', 'action' => 'prescription']);
    $routes->connect('/prescriptions/updatestatus', ['controller' => 'Prescriptions', 'action' => 'updateStatus']);



    $routes->fallbacks(DashedRoute::class);
});



Plugin::routes();
