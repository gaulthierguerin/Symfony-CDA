<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
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
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank(
     *     message="Veuillez renseigner ce champ."
     * )
     * @Assert\Regex(
     *     pattern="/[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~\-
     *     ]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[az0-9])?/",
     *     message="Veuillez renseigner une adresse e-mail valide."
     * )
     */
    private $UserEmail;

    /**
     * @Assert\NotBlank(
     *     message="Veuillez renseigner ce champ"
     * )
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="string", length=64)

     */
    private $UserPassword;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $UserRole;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserEmail(): ?string
    {
        return $this->UserEmail;
    }

    public function setUserEmail(string $UserEmail): self
    {
        $this->UserEmail = $UserEmail;

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

    public function getUserPassword(): ?string
    {
        return $this->UserPassword;
    }

    public function setUserPassword(string $UserPassword): self
    {
        $this->UserPassword = $UserPassword;

        return $this;
    }

    public function getUserRole(): ?string
    {
        return $this->UserRole;
    }

    public function setUserRole(string $UserRole): self
    {
        $this->UserRole = $UserRole;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getRoles()
    {
        if ($this->UserRole == "administrateur")
            return ["ROLE_ADMIN"];
        if ($this->UserRole == "client")
            return ["ROLE_USER"];
        return [];
    }

    /**
     * @return string|null
     */
    public function getSalt()
    {
        return "";
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->getUserEmail();
    }

    /**
     * @return mixed
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return string|null
     */
    public function getPassword()
    {
        return $this->getUserPassword();
    }

}
