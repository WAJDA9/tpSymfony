<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column]
    private string $name;
    #[ORM\Column]
    private float $duration;
    #[ORM\Column]
    private string $pre_requis;
    #[ORM\Column]
    private String $content;
    #[ORM\Column]
    private Bool $isSelected = false;
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
    public function getDuration(): ?float
    {
        return $this->duration;
    }
    public function setDuration(float $duration): self
    {
        $this->duration = $duration;
        return $this;
    }
    public function getPreRequis(): ?string
    {
        return $this->pre_requis;
    }
    public function setPreRequis(string $pre_requis): self
    {
        $this->pre_requis = $pre_requis;
        return $this;
    }
    public function getContent(): ?string
    {
        return $this->content;
    }
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }
    public function getIsSelected(): ?bool
    {
        return $this->isSelected;
    }
    public function setIsSelected(bool $isSelected): self
    {
        $this->isSelected = $isSelected;
        return $this;
    }

}
