<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=110)
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * Нижеуказанная длина зависит от "алгоритма", который вы используете для шифрования
     * пароля, но это также хорошо работает с bcrypt.
     *
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(name="role", length=255)
     */
    private $role = 'ROLE_USER' ;



//            public function __construct()
//            {
//                $this->isActive = true;
//                // может не понадобиться, см. раздел о соли ниже
//                // $this->salt = md5(uniqid('', true));
//            }

            public function getRoles()
            {
                return array('ROLE_USER');
            }

//            public function serialize()
//            {
//                return serialize(array(
//                    $this->id,
//                    $this->username,
//                    $this->password,
//                    // см. раздел о соли ниже
//                    // $this->salt,
//                ));
//            }
//
//            /** @see \Serializable::unserialize() */
//            public function unserialize($serialized)
//            {
//                list (
//                    $this->id,
//                    $this->username,
//                    $this->password,
//                    // см. раздел о соли ниже
//                    // $this->salt
//                    ) = unserialize($serialized);
//            }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }
    public function getSalt()
    {
        // Алгоритмы bcrypt и argon2i не требуют отдельной соли.
        // Вам *может* понадобиться настоящая соль, если вы выберете другой кодировшик.
        return null;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
