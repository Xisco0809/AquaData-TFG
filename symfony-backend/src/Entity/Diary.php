<?php

namespace App\Entity;

use App\Repository\DiaryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiaryRepository::class)]
class Diary
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 50)]
    private ?string $species = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $notes = null;



    /**
     * @var Collection<int, MarineSpecies>
     */
    #[ORM\OneToMany(targetEntity: MarineSpecies::class, mappedBy: 'diary')]
    private Collection $marineSpecies;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $users = null;

    public function __construct()
    {
        $this->marineSpecies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getSpecies(): ?string
    {
        return $this->species;
    }

    public function setSpecies(string $species): static
    {
        $this->species = $species;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): static
    {
        $this->notes = $notes;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): static
    {
        $this->users = $users;

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
            $marineSpecies->setDiary($this);
        }

        return $this;
    }

    public function removeMarineSpecies(MarineSpecies $marineSpecies): static
    {
        if ($this->marineSpecies->removeElement($marineSpecies)) {
            // set the owning side to null (unless already changed)
            if ($marineSpecies->getDiary() === $this) {
                $marineSpecies->setDiary(null);
            }
        }

        return $this;
    }
}
