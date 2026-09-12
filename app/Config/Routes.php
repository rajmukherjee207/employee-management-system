<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Login::index');

$routes->get('login', 'Login::index');

$routes->post('login', 'Login::authenticate');

$routes->get('logout', 'Login::logout');


$routes->group('', ['filter' => 'auth'], function($routes) {

    // Dashboard
    $routes->get('dashboard', 'Dashboard::index');

    // Departments
    $routes->get('departments', 'Department::index');
    $routes->get('departments/create', 'Department::create');
    $routes->post('departments/store', 'Department::store');
    $routes->get('departments/edit/(:num)', 'Department::edit/$1');
    $routes->post('departments/update/(:num)', 'Department::update/$1');
    $routes->get('departments/delete/(:num)', 'Department::delete/$1');

    // Employees
    $routes->get('employees', 'Employee::index');
    $routes->get('employees/create', 'Employee::create');
    $routes->post('employees/store', 'Employee::store');
    $routes->get('employees/edit/(:num)', 'Employee::edit/$1');
    $routes->post('employees/update/(:num)', 'Employee::update/$1');
    $routes->get('employees/delete/(:num)', 'Employee::delete/$1');

});