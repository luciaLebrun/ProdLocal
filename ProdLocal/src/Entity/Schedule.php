<?php

namespace App\Entity;

use App\Repository\ScheduleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Les instances de cette classe représentent chacune, une horaire d'ouverture.
 * @ORM\Entity(repositoryClass=ScheduleRepository::class)
 */
class Schedule
{
    /**
     * L'identifiant de l'horaire d'ouverture
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * L'heure d'ouverture
     * @ORM\Column(type="string", length=5)
     */
    private $opening_hour;

    /**
     * L'heure de fermeture
     * @ORM\Column(type="string", length=5)
     */
    private $closing_hour;

    /**
     * Le point de vente concerné par cette horaire d'ouverture
     * @ORM\ManyToOne(targetEntity=Shop::class, inversedBy="schedule")
     */
    private $shop;

    /**
     * Le premier jour de semainde d'ouverture
     * @ORM\Column(type="integer")
     */
    private $opening_day;

    /**
     * Le dernier jour de semaine d'ouverture'
     * @ORM\Column(type="integer")
     */
    private $closing_day;

    /**
     * Méthode qui retourne l'identifiant de l'horaire d'ouverture
     * @return int|null l'identifiant ou rien
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Méthode qui retourne l'heure d'ouverture
     * @return string|null l'heure d'ouverture ou rien
     */
    public function getOpeningHour(): ?string
    {
        return $this->opening_hour;
    }

    /**
     * Méthode qui permet de modifier l'heure d'ouverture
     * @param string $opening_hour la nouvelle heure d'ouverture ou rien
     * @return Schedule
     */
    public function setOpeningHour(string $opening_hour): self
    {
        $this->opening_hour = $opening_hour;

        return $this;
    }

    /**
     * Méthode qui retourne l'heure de fermeture
     * @return string|null l'heure de fermeture ou rien
     */
    public function getClosingHour(): ?string
    {
        return $this->closing_hour;
    }

    /**
     * Méthode qui permet de modifier l'heure de fermeture
     * @param string $closing_hour la nouvelle heure de fermeture
     * @return Schedule
     */
    public function setClosingHour(string $closing_hour): self
    {
        $this->closing_hour = $closing_hour;

        return $this;
    }

    /**
     * Méthode qui permet de retourner le point de vente concerné
     * @return Shop|null une instance de point de vente ou rien
     */
    public function getShop(): ?Shop
    {
        return $this->shop;
    }

    /**
     * Méthode qui permet de modifier le point de vente concerné
     * @param Shop|null $shop la nouvelle instance de point de vente
     * @return $this
     */
    public function setShop(?Shop $shop): self
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * Méthode qui retourne le premier jour de semaine d'ouverture
     * @return int|null le premier jour de semaine d'ouverture ou rien
     */
    public function getOpeningDay(): ?int
    {
        return $this->opening_day;
    }

    /**
     * Méthode qui permet de modifier le premier jour de semaine d'ouverture
     * @param int $opening_day le nouveau premier jour de semaine d'ouverture
     * @return Schedule
     */
    public function setOpeningDay(int $opening_day): self
    {
        $this->opening_day = $opening_day;

        return $this;
    }

    /**
     * Méthode qui retourne le dernier jour de semaine d'ouverture
     * @return int|null le dernier jour de semaine d'ouverture ou rien
     */
    public function getClosingDay(): ?int
    {
        return $this->closing_day;
    }

    /**
     * Méthode qui retourne le dernier jour de semaine d'ouverture
     * @param int $closing_day le nouveau dernier jour de semaine d'ouverture
     * @return Schedule
     */
    public function setClosingDay(int $closing_day): self
    {
        $this->closing_day = $closing_day;

        return $this;
    }
}
