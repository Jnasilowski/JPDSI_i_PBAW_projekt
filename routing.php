<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('login'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions
App::getRouter()->setLoginRoute('login');
Utils::addRoute('adminlist',       'AdminCtrlList', ['admin']);
Utils::addRoute('adminree',       'AdminCtrlRee', ['admin']);
Utils::addRoute('adminadd',       'AdminCtrlAdd', ['admin']);
Utils::addRoute('admindel',       'AdminCtrlDel', ['admin']);
Utils::addRoute('adminedit',       'AdminCtrl', ['admin']);
Utils::addRoute('rejestrshow',       'RejestrCtrl');
Utils::addRoute('rejestr',       'RejestrCtrl');
Utils::addRoute('login',  'LoginCtrl');
Utils::addRoute('usercarlist',       'UserrCtrl');
Utils::addRoute('userrent',       'UserrCtrlRent');
Utils::addRoute('logout',      'LoginCtrl', ['user','admin']);
Utils::addRoute('adminuserlist',       'AdminCtrlUserList', ['admin']);

//Utils::addRoute('action_name', 'controller_class_name');