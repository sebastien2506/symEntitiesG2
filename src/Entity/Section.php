<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionRepository::class)]
class Section
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(
        options: [
            'unsigned' => true,
        ]
    )]
    private ?int $id = null;

    #[ORM\Column(length: 120)]
    private ?string $sectionTitle = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $sectionDescription = null;

    /**
     * @var Collection<int, article>
     */
    #[ORM\ManyToMany(targetEntity: article::class, inversedBy: 'sections')]
    private Collection $sectionArticle;

    public function __construct()
    {
        $this->sectionArticle = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSectionTitle(): ?string
    {
        return $this->sectionTitle;
    }

    public function setSectionTitle(string $sectionTitle): static
    {
        $this->sectionTitle = $sectionTitle;

        return $this;
    }

    public function getSectionDescription(): ?string
    {
        return $this->sectionDescription;
    }

    public function setSectionDescription(?string $sectionDescription): static
    {
        $this->sectionDescription = $sectionDescription;

        return $this;
    }

    /**
     * @return Collection<int, article>
     */
    public function getSectionArticle(): Collection
    {
        return $this->sectionArticle;
    }

    public function addSectionArticle(article $sectionArticle): static
    {
        if (!$this->sectionArticle->contains($sectionArticle)) {
            $this->sectionArticle->add($sectionArticle);
        }

        return $this;
    }

    public function removeSectionArticle(article $sectionArticle): static
    {
        $this->sectionArticle->removeElement($sectionArticle);

        return $this;
    }
}
