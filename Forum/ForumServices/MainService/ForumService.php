<?php


namespace ForumServices\MainService;


use ForumAdapter\DatabaseInterface;
use ForumData\Users\User;
use ForumServices\EncryptionServices\EncryptionServiceInterface;
use ForumServices\SessionServices\SessionService;
use ForumServices\SessionServices\SessionServiceInterface;

class ForumService implements ForumServiceInterface
{

    /* @var DatabaseInterface*/
    private $db;
    /* @var $encryptionService EncryptionServiceInterface*/
    private $encryptionService;
    /* @var SessionServiceInterface*/
    private $sessionService;

    public function __construct(DatabaseInterface $db, EncryptionServiceInterface $encryptionService, SessionServiceInterface $sessionService)
    {
        $this->db=$db;
        $this->encryptionService=$encryptionService;
        $this->sessionService=$sessionService;
    }

    public function register(string $username, string $email, string $password, string $confirm)
    {
        if($password!=$confirm){
            throw new \Exception("Passwords mismatch!");
        }

        $hashPassword=$this->encryptionService->encrypt($password);

        $registerQuery="
                        INSERT INTO 
                        users 
                            (
                              username,
                              email,
                              password
                            )
                        VALUES 
                        (?,?,?);";

        $stmt=$this->db->prepare($registerQuery);
        $result=$stmt->execute([$username,$email,$hashPassword]);

        if($result===false){
            //TODO check what caused failure ->username taken or password taken
            throw new \Exception("Couldn't register!");
        }

    }

    public function login(string $username, string $password)
    {
        $loginQuery="SELECT id,password,username FROM users WHERE username=?";
        $stmt=$this->db->prepare($loginQuery);
        $stmt->execute([$username]);
        $user=$stmt->fetchObject(User::class);

        if(!$user){
            throw new \Exception("User does not exist!");
        }

        /* @var $user User*/
        $passwordHash=$user->getPassword();
        $passwordMatch=$this->encryptionService->isValid($passwordHash,$password);

        if(!$passwordMatch){
            throw new \Exception("Incorrect password!");
        }

        //Adding userId and username to session
        $this->sessionService->setUser($user->getId(),$user->getUsername());
    }



}