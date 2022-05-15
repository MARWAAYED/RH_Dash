<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StageRepository::class)
 */
class Stage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Applicant::class, mappedBy="stage")
     */
    private $stage;

    /**
     * @ORM\OneToMany(targetEntity=Applicant::class, mappedBy="stage")
     */
    private $applicants;

    public function __construct()
    {
        $this->stage = new ArrayCollection();
        $this->applicants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Applicant>
     */
    public function getStage(): Collection
    {
        return $this->stage;
    }

    public function addStage(Applicant $stage): self
    {
        if (!$this->stage->contains($stage)) {
            $this->stage[] = $stage;
            $stage->setStage($this);
        }

        return $this;
    }

    public function removeStage(Applicant $stage): self
    {
        if ($this->stage->removeElement($stage)) {
            // set the owning side to null (unless already changed)
            if ($stage->getStage() === $this) {
                $stage->setStage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Applicant>
     */
    public function getApplicants(): Collection
    {
        return $this->applicants;
    }

    public function addApplicant(Applicant $applicant): self
    {
        if (!$this->applicants->contains($applicant)) {
            $this->applicants[] = $applicant;
            $applicant->setStage($this);
        }

        return $this;
    }

    public function removeApplicant(Applicant $applicant): self
    {
        if ($this->applicants->removeElement($applicant)) {
            // set the owning side to null (unless already changed)
            if ($applicant->getStage() === $this) {
                $applicant->setStage(null);
            }
        }

        return $this;
    }
}
