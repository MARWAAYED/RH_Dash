<?php

namespace App\Entity;

use App\Repository\CondidatsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CondidatsRepository::class)
 */
class Condidats
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
    private $appliacants_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mobile;

    /**
     * @ORM\Column(type="string", length=255,  nullable=true)
     */
    private $subject_application_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $applied_job;

    /**
     * @ORM\Column(type="date")
     */
    private $creation_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tags;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $appreciation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $recruiter;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAppliacantsName(): ?string
    {
        return $this->appliacants_name;
    }

    public function setAppliacantsName(string $appliacants_name): self
    {
        $this->appliacants_name = $appliacants_name;

        return $this;
    }

    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    public function setMobile(string $mobile): self
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function getSubjectApplicationName(): ?string
    {
        return $this->subject_application_name;
    }

    public function setSubjectApplicationName(string $subject_application_name): self
    {
        $this->subject_application_name = $subject_application_name;

        return $this;
    }

    public function getAppliedJob(): ?string
    {
        return $this->applied_job;
    }

    public function setAppliedJob(string $applied_job): self
    {
        $this->applied_job = $applied_job;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(\DateTimeInterface $creation_date): self
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getTags(): ?string
    {
        return $this->tags;
    }

    public function setTags(string $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function getAppreciation(): ?string
    {
        return $this->appreciation;
    }

    public function setAppreciation(string $appreciation): self
    {
        $this->appreciation = $appreciation;

        return $this;
    }

    public function getRecruiter(): ?string
    {
        return $this->recruiter;
    }

    public function setRecruiter(string $recruiter): self
    {
        $this->recruiter = $recruiter;

        return $this;
    }

    public function getStage(): ?string
    {
        return $this->stage;
    }

    public function setStage(string $stage): self
    {
        $this->stage = $stage;

        return $this;
    }
}
