<?php

class UserTest extends PHPUnit_Framework_TestCase
{

    public function testUserCreate()
    {
        $user = new app/Models/User;
        $this->assertEquals($user->create(), 'OK');

    }

}