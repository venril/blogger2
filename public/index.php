<?php

// blogger/public/index.php


require '../app/init.php';

$user = new User\Model\User();
$userDb = new User\Model\Db\Mysql\User($db);
echo $view->render('home.phtml', array(
    'users' => $userDb->findAll(null),
    'prenom' =>
));
