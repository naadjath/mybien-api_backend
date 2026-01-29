<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $mois = null;

    #[ORM\Column]
    private ?int $année = null;

    #[ORM\Column]
    private ?float $montantLoyer = null;

    #[ORM\Column]
    private ?float $chargesLogement = null;

    #[ORM\Column]
    private ?float $TotalLoyer = null;

    #[ORM\Column(length: 255)]
    private ?string $Status = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PdfPath = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'factures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?biens $bien = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $locataire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMois(): ?int
    {
        return $this->mois;
    }

    public function setMois(int $mois): static
    {
        $this->mois = $mois;

        return $this;
    }

    public function getAnnée(): ?int
    {
        return $this->année;
    }

    public function setAnnée(int $année): static
    {
        $this->année = $année;

        return $this;
    }

    public function getMontantLoyer(): ?float
    {
        return $this->montantLoyer;
    }

    public function setMontantLoyer(float $montantLoyer): static
    {
        $this->montantLoyer = $montantLoyer;

        return $this;
    }

    public function getChargesLogement(): ?float
    {
        return $this->chargesLogement;
    }

    public function setChargesLogement(float $chargesLogement): static
    {
        $this->chargesLogement = $chargesLogement;

        return $this;
    }

    public function getTotalLoyer(): ?float
    {
        return $this->TotalLoyer;
    }

    public function setTotalLoyer(float $TotalLoyer): static
    {
        $this->TotalLoyer = $TotalLoyer;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): static
    {
        $this->Status = $Status;

        return $this;
    }

    public function getPdfPath(): ?string
    {
        return $this->PdfPath;
    }

    public function setPdfPath(?string $PdfPath): static
    {
        $this->PdfPath = $PdfPath;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getBien(): ?biens
    {
        return $this->bien;
    }

    public function setBien(?biens $bien): static
    {
        $this->bien = $bien;

        return $this;
    }

    public function getLocataire(): ?User
    {
        return $this->locataire;
    }

    public function setLocataire(?User $locataire): static
    {
        $this->locataire = $locataire;

        return $this;
    }
}
