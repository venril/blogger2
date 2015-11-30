<?php

// blogger/public/index.php

require '../app/init.php';
$home = new Aston\View\Template('home.phtml');
$home->prenom = 'Harry';


$layout = new Aston\View\Template('layout.phtml');
$layout->content = $home->render();

echo $layout->render();
$user = new User\Model\User();
$user2 = new User\Model\User();
$user->setEmail('toto@gmail.com')
        ->setFirstname('toto')
        ->setLastname('zero')
        ->setPassword('0000')
        ->setIsActive(false)
        ->setBirthdate(new DateTime());

$user2->setEmail('toto@gmail.com')
        ->setFirstname('toto')
        ->setLastname('zero')
        ->setPassword('0000')
        ->setIsActive(false)
        ->setBirthdate(new DateTime());

$userDb = new User\Model\Db\Mysql\User($db);
//$userDb->insert($user);
$userDb->find(array('id'=> 2));
$criteria = '';
$u = $userDb->findAll("LIMIT 3");
$home->users = $userDb->findAll(null);

//var_dump($u);