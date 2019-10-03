<?php 

ini_set('display_errors', 1);
ini_set('display_starup_error', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::create(__DIR__ . '/..');
$dotenv->load();

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;
use Zend\Diactoros\Response\RedirectResponse;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv('DB_USER'),
    'password'  => getenv('DB_PASS'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]); 
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();
$map->get('index', '/practicasPHP/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexAction'
]);
$map->get('addJobs', '/practicasPHP/jobs/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction',
    'auth' => true 
]);
$map->post('saveJobs', '/practicasPHP/jobs/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);
$map->get('addProjects', '/practicasPHP/project/add', [
    'controller' => 'App\Controllers\ProjectController',
    'action' => 'getAddProjectAction',
    'auth' => true 
]); 
$map->post('saveProjects', '/practicasPHP/project/add', [
    'controller' => 'App\Controllers\ProjectController',
    'action' => 'getAddProjectAction'
]); 
$map->get('addUsers','/practicasPHP/users/add', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'getAddUsersAction',
    'auth' => true  
]);
$map->post('saveUsers', '/practicasPHP/users/add', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'getAddUsersAction'
]);
$map->get('loginForm','/practicasPHP/login', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogin' 
]);
$map->get('logout','/practicasPHP/logout', [ 
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogout' 
]);
$map->post('auth','/practicasPHP/auth', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'postLogin' 
]);
$map->get('admin','/practicasPHP/admin', [
    'controller' => 'App\Controllers\AdminController',
    'action' => 'getIndex',
    'auth' => true 
]);
$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

function printElement($job){
    // if($job->visible == false){
    //   return;
    // }
    
    echo '<li class="work-position">';
        echo '<h5>'.$job->title.'</h5>';
        echo '<p>'.$job->description.'</p>'; 
        echo '<p>'.$job->getDurationAsString().'</p>';
        echo '<strong>Archievements:</strong>';
        echo '<ul>';
            echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit</li>';
            echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit</li>';
            echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit</li>';
        echo '</ul>';
    echo '</li>';
    }//fin de la funcion para jobs

    function printElementProject($project){

        echo '<li class="work-position">';
            echo '<h5>'.$project->title.'</h5>';
            echo '<p>'.$project->description.'</p>'; 
            echo '<p>'.$project->getDurationAsString().'</p>';
            echo '<strong>Archievements:</strong>';
            echo '<ul>';
                echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit</li>';
                echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit</li>';
                echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit</li>';
            echo '</ul>';
        echo '</li>';
    }//fin de la funcion para project

if(!$route){
    echo 'No route';
}else{
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];
    $needsAuth = $handlerData['auth'] ?? false;

    $sessionUserId = $_SESSION['userId'] ?? null;
    if($needsAuth && !$sessionUserId){
        //echo 'Protected route';
        return new RedirectResponse('/practicasPHP/login');
        die;
    }

    $controller = new $controllerName;
    $response = $controller->$actionName($request);  
    foreach($response->getHeaders() as $name => $values){
        foreach($values as $value){
            header(sprintf('%s: %s', $name, $value),false);
        }
    }
    http_response_code($response->getStatusCode());
    echo $response->getBody();
}
?>