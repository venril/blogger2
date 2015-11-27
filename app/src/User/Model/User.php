<?php

namespace User\Model;

class User {
    private $id;
    private $email;
    private $username;
    private $password;
    private $firstname;
    private $lastname;
    private $birthdate;
    private $isActive;
    
    
    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function getIsActive()
    {
        return $this->isActive;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = (string) $email;
        return $this;
    }

    public function setUsername($username)
    {
        $this->username = (string) $username;
        return $this;
    }

    public function setPassword($password)
    {
        $this->password = (string) $password;
        return $this;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = (string) $firstname;
        return $this;
    }

    public function setLastname($lastname)
    {
        $this->lastname = (string) $lastname;
        return $this;
    }

    public function setBirthdate(\Datetime $birthdate)
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function setIsActive($isActive)
    {
        $this->isActive = (bool) $isActive;
        return $this;
    }


}
