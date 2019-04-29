<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserReviewRepository")
 */
class UserReview
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $e_mail;

    /**
     * @ORM\Column(type="string", length=255,)
     */
    private $user_homepage;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $user_review;

    /**
     * @ORM\Column(type="time")
     */
    private $pub_date;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    private $user_ip;
    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    private $user_browser;

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

    public function getEMail(): ?string
    {
        return $this->e_mail;
    }

    public function setEMail(string $e_mail): self
    {
        $this->e_mail = $e_mail;

        return $this;
    }

    public function getUserHomepage(): ?string
    {
        return $this->user_homepage;
    }

    public function setUserHomepage(?string $user_homepage): self
    {
        $this->user_homepage = $user_homepage;

        return $this;
    }

    public function getUserReview(): ?string
    {
        return $this->user_review;
    }

    public function setUserReview(string $user_review): self
    {
        $this->user_review = $user_review;

        return $this;
    }

    public function getPubDate(): ?\DateTimeInterface
    {
        return $this->pub_date;
    }

    public function setPubDate(\DateTimeInterface $pub_date): self
    {
        $this->pub_date = $pub_date;

        return $this;
    }
    public function getUser_ip(): ?string
    {
        return $this->user_ip;
    }

    public function setUser_ip(string $user_ip): self
    {
        $this->user_ip = $user_ip;

        return $this;
    }public function getUser_browser(): ?string
    {
        return $this->user_browser;
    }

    public function setUser_browser(string $user_browser): self
    {
        $this->user_browser = $user_browser;

        return $this;
    }
}
