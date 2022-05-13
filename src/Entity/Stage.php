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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $requirements;

    /**
     * @ORM\OneToMany(targetEntity=Applicant::class, mappedBy="stage_id")
     */
    private $job_id;

    public function __construct()
    {
        $this->job_id = new ArrayCollection();
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

    public function getRequirements(): ?string
    {
        return $this->requirements;
    }

    public function setRequirements(?string $requirements): self
    {
        $this->requirements = $requirements;

        return $this;
    }

    /**
     * @return Collection<int, Applicant>
     */
    public function getJobId(): Collection
    {
        return $this->job_id;
    }

    public function addJobId(Applicant $jobId): self
    {
        if (!$this->job_id->contains($jobId)) {
            $this->job_id[] = $jobId;
            $jobId->setStageId($this);
        }

        return $this;
    }

    public function removeJobId(Applicant $jobId): self
    {
        if ($this->job_id->removeElement($jobId)) {
            // set the owning side to null (unless already changed)
            if ($jobId->getStageId() === $this) {
                $jobId->setStageId(null);
            }
        }

        return $this;
    }
}
