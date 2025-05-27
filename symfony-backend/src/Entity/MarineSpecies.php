<?php

namespace App\Entity;

use App\Repository\MarineSpeciesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MarineSpeciesRepository::class)]
class MarineSpecies
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $image = null;

    #[ORM\Column]
    private ?float $avarage_weight = null;

    #[ORM\Column(length: 100)]
    private ?string $measurements = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 50)]
    private ?string $category = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'marineSpecies')]
    private Collection $users;

    #[ORM\ManyToOne(inversedBy: 'marineSpecies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Diary $diary = null;

    public function __construct()
    {
        $this->users = new ArrayCollection();
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getAvarageWeight(): ?float
    {
        return $this->avarage_weight;
    }

    public function setAvarageWeight(float $avarage_weight): static
    {
        $this->avarage_weight = $avarage_weight;

        return $this;
    }

    public function getMeasurements(): ?string
    {
        return $this->measurements;
    }

    public function setMeasurements(string $measurements): static
    {
        $this->measurements = $measurements;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        $this->users->removeElement($user);

        return $this;
    }

    public function getDiary(): ?Diary
    {
        return $this->diary;
    }

    public function setDiary(?Diary $diary): static
    {
        $this->diary = $diary;

        return $this;
    }
}
