<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('login'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions
App::getRouter()->setLoginRoute('login');
Utils::addRoute('adminlist',       'AdminCtrl', ['admin']);
Utils::addRoute('adminree',       'AdminCtrl', ['admin']);
Utils::addRoute('adminadd',       'AdminCtrl', ['admin']);
Utils::addRoute('admindel',       'AdminCtrl', ['admin']);
Utils::addRoute('adminedit',       'AdminCtrl', ['admin']);
Utils::addRoute('rejestrshow',       'RejestrCtrl');
Utils::addRoute('rejestr',       'RejestrCtrl');
Utils::addRoute('login',  'LoginCtrl');
Utils::addRoute('usercarlist',       'UserrCtrl');
Utils::addRoute('userrent',       'UserrCtrl');
Utils::addRoute('logout',      'LoginCtrl', ['user','admin']);
Utils::addRoute('adminuserlist',       'AdminCtrl', ['admin']);

//Utils::addRoute('action_name', 'controller_class_name');