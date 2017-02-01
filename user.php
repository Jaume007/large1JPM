<?php

/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 13/01/17
 * Time: 20:05
 */
class user
{
private $user;
private $pwd;
private $name;

    /**
     * user constructor.
     * @param $user
     * @param $pwd
     * @param $name
     */
    public function __construct($user, $pwd, $name)
    {
        $this->user = $user;
        $this->pwd = $pwd;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    private function getPwd()
    {
        return $this->pwd;
    }

    /**
     * @param mixed $pwd
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

}