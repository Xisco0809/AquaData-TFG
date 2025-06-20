<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 50)]
    private ?string $role = null;

    /**
     * @var Collection<int, Curiosities>
     */
    #[ORM\OneToMany(targetEntity: Curiosities::class, mappedBy: 'users')]
    private Collection $curiosities;

    /**
     * @var Collection<int, News>
     */
    #[ORM\OneToMany(targetEntity: News::class, mappedBy: 'users')]
    private Collection $news;

    /**
     * @var Collection<int, MarineSpecies>
     */
    #[ORM\OneToMany(targetEntity: MarineSpecies::class, mappedBy: 'users')]
    private Collection $marineSpecies;


    public function __construct()
    {
        $this->marineSpecies = new ArrayCollection();
        $this->curiosities = new ArrayCollection();
        $this->news = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection<int, MarineSpecies>
     */
    public function getMarineSpecies(): Collection
    {
        return $this->marineSpecies;
    }

    public function addMarineSpecies(MarineSpecies $marineSpecies): static
    {
        if (!$this->marineSpecies->contains($marineSpecies)) {
            $this->marineSpecies->add($marineSpecies);
            $marineSpecies->addUser($this);
        }

        return $this;
    }

    public function removeMarineSpecies(MarineSpecies $marineSpecies): static
    {
        if ($this->marineSpecies->removeElement($marineSpecies)) {
            $marineSpecies->removeUser($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Curiosities>
     */
    public function getCuriosities(): Collection
    {
        return $this->curiosities;
    }

    public function addCuriosity(Curiosities $curiosity): static
    {
        if (!$this->curiosities->contains($curiosity)) {
            $this->curiosities->add($curiosity);
            $curiosity->addUser($this);
        }

        return $this;
    }

    public function removeCuriosity(Curiosities $curiosity): static
    {
        if ($this->curiosities->removeElement($curiosity)) {
            $curiosity->removeUser($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, News>
     */
    public function getNews(): Collection
    {
        return $this->news;
    }

    public function addNews(News $news): static
    {
        if (!$this->news->contains($news)) {
            $this->news->add($news);
            $news->addUser($this);
        }

        return $this;
    }

    public function removeNews(News $news): static
    {
        if ($this->news->removeElement($news)) {
            $news->removeUser($this);
        }

        return $this;
    }
}
