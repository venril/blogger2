<?php

namespace User\Model;

interface UserHandler
{
    public function find($criteria);
    public function findAll($criteria);
    public function findByEmail($email);
    public function insert(User $user);
    public function update(User $user);
    public function delete(User $user);
}
