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

    #[ORM\Column(length: 255)]
    private ?string $Compte_Affaire = null;

    #[ORM\Column(length: 255)]
    private ?string $Compte_evenement = null;

    #[ORM\Column(length: 255)]
    private ?string $Compte_dernier_evenement = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $Numero_fiche = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $libelle_civilite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $proprietaire_actuel = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $num_et_nom_de_voie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Complement_adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $Code_postal = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone_domicile = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephone_portable = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephone_job = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_de_mise_en_circulation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_achat = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_dernier_evenement = null;

    #[ORM\Column(length: 255)]
    private ?string $marque = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $modele = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $version = null;

    #[ORM\Column(length: 255)]
    private ?string $VIN = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $immatriculation = null;

    #[ORM\Column(length: 255)]
    private ?string $type_de_prospect = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $kilometrage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $energie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vendeur_VN = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vendeur_VO = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commentaire_de_facturation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type_VN_VO = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numero_dossier = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $intermediaire_de_vente = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_evenement = null;

    #[ORM\Column(length: 255)]
    private ?string $origine_evenement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompteAffaire(): ?string
    {
        return $this->Compte_Affaire;
    }

    public function setCompteAffaire(string $Compte_Affaire): static
    {
        $this->Compte_Affaire = $Compte_Affaire;

        return $this;
    }

    public function getCompteEvenement(): ?string
    {
        return $this->Compte_evenement;
    }

    public function setCompteEvenement(string $Compte_evenement): static
    {
        $this->Compte_evenement = $Compte_evenement;

        return $this;
    }

    public function getCompteDernierEvenement(): ?string
    {
        return $this->Compte_dernier_evenement;
    }

    public function setCompteDernierEvenement(string $Compte_dernier_evenement): static
    {
        $this->Compte_dernier_evenement = $Compte_dernier_evenement;

        return $this;
    }

    public function getNumeroFiche(): ?string
    {
        return $this->Numero_fiche;
    }

    public function setNumeroFiche(string $Numero_fiche): static
    {
        $this->Numero_fiche = $Numero_fiche;

        return $this;
    }

    public function getLibelleCivilite(): ?string
    {
        return $this->libelle_civilite;
    }

    public function setLibelleCivilite(?string $libelle_civilite): static
    {
        $this->libelle_civilite = $libelle_civilite;

        return $this;
    }

    public function getProprietaireActuel(): ?string
    {
        return $this->proprietaire_actuel;
    }

    public function setProprietaireActuel(?string $proprietaire_actuel): static
    {
        $this->proprietaire_actuel = $proprietaire_actuel;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(?string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getNumEtNomDeVoie(): ?string
    {
        return $this->num_et_nom_de_voie;
    }

    public function setNumEtNomDeVoie(string $num_et_nom_de_voie): static
    {
        $this->num_et_nom_de_voie = $num_et_nom_de_voie;

        return $this;
    }

    public function getComplementAdresse(): ?string
    {
        return $this->Complement_adresse;
    }

    public function setComplementAdresse(?string $Complement_adresse): static
    {
        $this->Complement_adresse = $Complement_adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->Code_postal;
    }

    public function setCodePostal(string $Code_postal): static
    {
        $this->Code_postal = $Code_postal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTelephoneDomicile(): ?string
    {
        return $this->telephone_domicile;
    }

    public function setTelephoneDomicile(string $telephone_domicile): static
    {
        $this->telephone_domicile = $telephone_domicile;

        return $this;
    }

    public function getTelephonePortable(): ?string
    {
        return $this->telephone_portable;
    }

    public function setTelephonePortable(?string $telephone_portable): static
    {
        $this->telephone_portable = $telephone_portable;

        return $this;
    }

    public function getTelephoneJob(): ?string
    {
        return $this->telephone_job;
    }

    public function setTelephoneJob(?string $telephone_job): static
    {
        $this->telephone_job = $telephone_job;

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
        return $this->date_de_mise_en_circulation;
    }

    public function setDateDeMiseEnCirculation(?\DateTimeInterface $date_de_mise_en_circulation): static
    {
        $this->date_de_mise_en_circulation = $date_de_mise_en_circulation;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->date_achat;
    }

    public function setDateAchat(?\DateTimeInterface $date_achat): static
    {
        $this->date_achat = $date_achat;

        return $this;
    }

    public function getDateDernierEvenement(): ?\DateTimeInterface
    {
        return $this->date_dernier_evenement;
    }

    public function setDateDernierEvenement(\DateTimeInterface $date_dernier_evenement): static
    {
        $this->date_dernier_evenement = $date_dernier_evenement;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): static
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

    public function setVIN(string $VIN): static
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
        return $this->type_de_prospect;
    }

    public function setTypeDeProspect(string $type_de_prospect): static
    {
        $this->type_de_prospect = $type_de_prospect;

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
        return $this->vendeur_VN;
    }

    public function setVendeurVN(?string $vendeur_VN): static
    {
        $this->vendeur_VN = $vendeur_VN;

        return $this;
    }

    public function getVendeurVO(): ?string
    {
        return $this->vendeur_VO;
    }

    public function setVendeurVO(?string $vendeur_VO): static
    {
        $this->vendeur_VO = $vendeur_VO;

        return $this;
    }

    public function getCommentaireDeFacturation(): ?string
    {
        return $this->commentaire_de_facturation;
    }

    public function setCommentaireDeFacturation(?string $commentaire_de_facturation): static
    {
        $this->commentaire_de_facturation = $commentaire_de_facturation;

        return $this;
    }

    public function getTypeVNVO(): ?string
    {
        return $this->type_VN_VO;
    }

    public function setTypeVNVO(?string $type_VN_VO): static
    {
        $this->type_VN_VO = $type_VN_VO;

        return $this;
    }

    public function getNumeroDossier(): ?string
    {
        return $this->numero_dossier;
    }

    public function setNumeroDossier(?string $numero_dossier): static
    {
        $this->numero_dossier = $numero_dossier;

        return $this;
    }

    public function getIntermediaireDeVente(): ?string
    {
        return $this->intermediaire_de_vente;
    }

    public function setIntermediaireDeVente(?string $intermediaire_de_vente): static
    {
        $this->intermediaire_de_vente = $intermediaire_de_vente;

        return $this;
    }

    public function getDateEvenement(): ?\DateTimeInterface
    {
        return $this->date_evenement;
    }

    public function setDateEvenement(\DateTimeInterface $date_evenement): static
    {
        $this->date_evenement = $date_evenement;

        return $this;
    }

    public function getOrigineEvenement(): ?string
    {
        return $this->origine_evenement;
    }

    public function setOrigineEvenement(string $origine_evenement): static
    {
        $this->origine_evenement = $origine_evenement;

        return $this;
    }
}
