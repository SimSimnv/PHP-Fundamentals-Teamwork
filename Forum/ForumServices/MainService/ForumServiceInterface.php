<?php


namespace ForumServices\MainService;


interface ForumServiceInterface
{
    public function register(string $username, string $email, string $password, string $confirm);
    public function login(string $username, string $password);
    public function editProfile (int $id, string $username, string $email, string $password);
    public function changePassword (int $id, string $oldpassword, string $newpassword, string $confirm);
}
