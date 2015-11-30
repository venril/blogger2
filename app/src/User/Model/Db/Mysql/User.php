<?php

// User/Model/Db/Mysql

namespace User\Model\Db\Mysql;

use Aston\Db\Connection;
use User\Model\User as UserModel;
use User\Model\UserHandler;

class User implements UserHandler {  
    
    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }
    // return pdo
    public function getDb() 
    {
        return $this->db->getPdo();
    }
    
    public function delete(UserModel $user)
    {
        $query2 = "DELETE FROM `blogger`.`user` WHERE `user`.`id` = '%s' LIMIT 1";
         $query = sprintf("DELETE FROM `blogger`.`user` WHERE `user`.`id` = '%s LIMIT 1",
                mysql_real_escape_string($user->getId()));
         echo $query;
        $this->getDb()->exec($query);
       
    }

    public function update(UserModel $user)
    {

         $query = sprintf(" UPDATE `user` "
               . "SET "
               . "`email`='%s',"
               . "`username`='%s',"
               . "`password`='%s',"
               . "`firstname`='%s',"
               . "`lastname`='%s',"
               . "`birthday`='%s',"
               . "`isActive`='%s'"
               . " WHERE user 'id' = ".$user->getId(),
                mysql_real_escape_string($user->getEmail()),
                mysql_real_escape_string($user->getUsername()),
                mysql_real_escape_string($user->getPassword()),
                mysql_real_escape_string($user->getFirstname()),
               mysql_real_escape_string($user->getLastname(),
               mysql_real_escape_string($user->getBirthdate()),
               mysql_real_escape_string($user->getIsActive())
                        ));
         echo $query;
        $this->getDb()->exec($query);
    }
    public function find($criteria)
    {
       if (isset($criteria['id']) ) {
           $id = (int) $criteria['id'];
       }
       $sql = "SELECT * FROM user WHERE id=?";
       $stmt = $this->getDb()->prepare($sql);
       $stmt->execute(array($id));
       $result = $stmt->fetch(\PDO::FETCH_ASSOC);
       return $this-> rowToObject($result);
    }    
    public function findAll($criteria)
    {
       if (isset($criteria['id']) ) {
           $id = (int) $criteria['id'];
       }
       $sql = "SELECT * FROM user ".$criteria;
       $stmt = $this->getDb()->prepare($sql);
       $stmt->execute();
       //$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
       $result = $stmt->fetchAll();
       foreach ($result as $key => $value) {
          $userList[] = $this->rowToObject($value);
       }
     //  var_dump($userList);

       return $userList;
    }
   
    public function findByEmail($email)
    {
        
    }
    public function insert(UserModel $user)
    {
        
        
        $sql = 'INSERT INTO user VALUES ('.
               'NULL, '.
               "'".$user->getEmail()    . "',".
               "'".$user->getUsername() . "',".
               "'".$user->getPassword() . "',".
               "'".$user->getFirstname(). "',".
               "'".$user->getLastname() . "',".
               "'".$user->getBirthdate()->format('Y-m-d')."',".
               "'". (int) $user->getIsActive()."'".
                ")";
        echo $sql;
        $this->getDb()->exec($sql);

    }
    public function rowToObject($result)
    {
       $user = new UserModel();
       $user->setId($result['id'])
            ->setEmail($result['email'])
            ->setFirstname($result['firstname'])
            ->setLastname($result['lastname'])       
            ->setIsActive($result['isActive'])
            ->setBirthdate(new \DateTime($result['birthdate']))
            ->setUsername($result['username'])
            ->setPassword($result['password']);
       return $user;
    }
}

