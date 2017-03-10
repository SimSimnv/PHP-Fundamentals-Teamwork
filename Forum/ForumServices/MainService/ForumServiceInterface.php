<?php


namespace ForumServices\MainService;


use ForumData\Users\User;

interface ForumServiceInterface
{
    public function register(string $username, string $email, string $password, string $confirm);
    public function login(string $username, string $password);
    public function editProfile (int $id, string $username, string $email);
    public function changePassword (int $id, string $newpassword, string $confirm);
    public function getUserInfo(string $userId):User;
}
