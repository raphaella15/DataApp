<?php

namespace App\Entity;

use App\Repository\ExcelDataRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExcelDataRepository::class)]
class ExcelData
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $compteAffaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $compteEvenement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $compteDernierEvenement = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $numeroFiche = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $libelleCivilite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $proprietaireActuel = null;

    #[ORM\Column(length: 255,nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numEtNomDeVoie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $complementAdresse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codePostal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephoneDomicile = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephonePortable = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephoneJob = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDeMiseEnCirculation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateAchat = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDernierEvenement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $marque = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $modele = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $version = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $VIN = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $immatriculation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $typeDeProspect = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $kilometrage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $energie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vendeurVN = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vendeurVO = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commentaireDeFacturation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numeroDossier = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $intermediaireDeVente = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateEvenement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $origineEvenement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompteAffaire(): ?string
    {
        return $this->compteAffaire;
    }

    public function setCompteAffaire(string $compteAffaire): static
    {
        $this->compteAffaire = $compteAffaire;

        return $this;
    }

    public function getCompteEvenement(): ?string
    {
        return $this->compteEvenement;
    }

    public function setCompteEvenement(?string $compteEvenement): static
    {
        $this->compteEvenement = $compteEvenement;

        return $this;
    }

    public function getCompteDernierEvenement(): ?string
    {
        return $this->compteDernierEvenement;
    }

    public function setCompteDernierEvenement(?string $compteDernierEvenement): static
    {
        $this->compteDernierEvenement = $compteDernierEvenement;

        return $this;
    }

    public function getNumeroFiche(): ?string
    {
        return $this->numeroFiche;
    }

    public function setNumeroFiche(?string $numeroFiche): static
    {
        $this->numeroFiche = $numeroFiche;

        return $this;
    }

    public function getLibelleCivilite(): ?string
    {
        return $this->libelleCivilite;
    }

    public function setLibelleCivilite(?string $libelleCivilite): static
    {
        $this->libelleCivilite = $libelleCivilite;

        return $this;
    }

    public function getProprietaireActuel(): ?string
    {
        return $this->proprietaireActuel;
    }

    public function setProprietaireActuel(?string $proprietaireActuel): static
    {
        $this->proprietaireActuel = $proprietaireActuel;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumEtNomDeVoie(): ?string
    {
        return $this->numEtNomDeVoie;
    }

    public function setNumEtNomDeVoie(?string $numEtNomDeVoie): static
    {
        $this->numEtNomDeVoie = $numEtNomDeVoie;

        return $this;
    }

    public function getComplementAdresse(): ?string
    {
        return $this->complementAdresse;
    }

    public function setComplementAdresse(?string $complementAdresse): static
    {
        $this->complementAdresse = $complementAdresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTelephoneDomicile(): ?string
    {
        return $this->telephoneDomicile;
    }

    public function setTelephoneDomicile(?string $telephoneDomicile): static
    {
        $this->telephoneDomicile = $telephoneDomicile;

        return $this;
    }

    public function getTelephonePortable(): ?string
    {
        return $this->telephonePortable;
    }

    public function setTelephonePortable(?string $telephonePortable): static
    {
        $this->telephonePortable = $telephonePortable;

        return $this;
    }

    public function getTelephoneJob(): ?string
    {
        return $this->telephoneJob;
    }

    public function setTelephoneJob(?string $telephoneJob): static
    {
        $this->telephoneJob = $telephoneJob;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getDateDeMiseEnCirculation(): ?\DateTimeInterface
    {
        return $this->dateDeMiseEnCirculation;
    }

    public function setDateDeMiseEnCirculation(?\DateTimeInterface $dateDeMiseEnCirculation): static
    {
        $this->dateDeMiseEnCirculation = $dateDeMiseEnCirculation;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->dateAchat;
    }

    public function setDateAchat(?\DateTimeInterface $dateAchat): static
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    public function getDateDernierEvenement(): ?\DateTimeInterface
    {
        return $this->dateDernierEvenement;
    }

    public function setDateDernierEvenement(?\DateTimeInterface $dateDernierEvenement): static
    {
        $this->dateDernierEvenement = $dateDernierEvenement;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(?string $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(?string $modele): static
    {
        $this->modele = $modele;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): static
    {
        $this->version = $version;

        return $this;
    }

    public function getVIN(): ?string
    {
        return $this->VIN;
    }

    public function setVIN(?string $VIN): static
    {
        $this->VIN = $VIN;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(?string $immatriculation): static
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getTypeDeProspect(): ?string
    {
        return $this->typeDeProspect;
    }

    public function setTypeDeProspect(?string $typeDeProspect): static
    {
        $this->typeDeProspect = $typeDeProspect;

        return $this;
    }

    public function getKilometrage(): ?string
    {
        return $this->kilometrage;
    }

    public function setKilometrage(?string $kilometrage): static
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getEnergie(): ?string
    {
        return $this->energie;
    }

    public function setEnergie(?string $energie): static
    {
        $this->energie = $energie;

        return $this;
    }

    public function getVendeurVN(): ?string
    {
        return $this->vendeurVN;
    }

    public function setVendeurVN(?string $vendeurVN): static
    {
        $this->vendeurVN = $vendeurVN;

        return $this;
    }

    public function getVendeurVO(): ?string
    {
        return $this->vendeurVO;
    }

    public function setVendeurVO(?string $vendeurVO): static
    {
        $this->vendeurVO = $vendeurVO;

        return $this;
    }

    public function getCommentaireDeFacturation(): ?string
    {
        return $this->commentaireDeFacturation;
    }

    public function setCommentaireDeFacturation(?string $commentaireDeFacturation): static
    {
        $this->commentaireDeFacturation = $commentaireDeFacturation;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getNumeroDossier(): ?string
    {
        return $this->numeroDossier;
    }

    public function setNumeroDossier(?string $numeroDossier): static
    {
        $this->numeroDossier = $numeroDossier;

        return $this;
    }

    public function getIntermediaireDeVente(): ?string
    {
        return $this->intermediaireDeVente;
    }

    public function setIntermediaireDeVente(?string $intermediaireDeVente): static
    {
        $this->intermediaireDeVente = $intermediaireDeVente;

        return $this;
    }

    public function getDateEvenement(): ?\DateTimeInterface
    {
        return $this->dateEvenement;
    }

    public function setDateEvenement(?\DateTimeInterface $dateEvenement): static
    {
        $this->dateEvenement = $dateEvenement;

        return $this;
    }

    public function getOrigineEvenement(): ?string
    {
        return $this->origineEvenement;
    }

    public function setOrigineEvenement(?string $origineEvenement): static
    {
        $this->origineEvenement = $origineEvenement;

        return $this;
    }
}
