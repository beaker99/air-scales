<?php

namespace App\Entity;

use App\Entity\User;
use App\Repository\DeviceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeviceRepository::class)]
class Device
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 64, nullable: true)]
    private ?string $entity_type = null;
    
    #[ORM\Column(length: 32, nullable: true)]
    private ?string $serial_number = null;

    #[ORM\Column(length: 17, nullable: true)]
    private ?string $mac_address = null;

    #[ORM\Column(length: 64, nullable: true)]
    private ?string $firmware_version = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $notes = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'devices')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $sold_to = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $order_date = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $ship_date = null;

    #[ORM\Column(length: 64, nullable: true)]
    private ?string $tracking_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSerialNumber(): ?string
    {
        return $this->serial_number;
    }

    public function setSerialNumber(?string $serial_number): static
    {
        $this->serial_number = $serial_number;

        return $this;
    }

    public function getMacAddress(): ?string
    {
        return $this->mac_address;
    }

    public function setMacAddress(?string $mac_address): static
    {
        $this->mac_address = $mac_address;

        return $this;
    }

    public function getEntityType(): ?string
    {
        return $this->entity_type;
    }

    public function setEntityType(?string $entity_type): static
    {
        $this->entity_type = $entity_type;

        return $this;
    }

    public function getFirmwareVersion(): ?string
    {
        return $this->firmware_version;
    }

    public function setFirmwareVersion(?string $firmware_version): static
    {
        $this->firmware_version = $firmware_version;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): static
    {
        $this->notes = $notes;

        return $this;
    }

    public function getSoldTo(): ?User
    {
        return $this->sold_to;
    }

    public function setSoldTo(?User $sold_to): static
    {
        $this->sold_to = $sold_to;

        return $this;
    }

    public function getOrderDate(): ?\DateTime
    {
        return $this->order_date;
    }

    public function setOrderDate(?\DateTime $order_date): static
    {
        $this->order_date = $order_date;

        return $this;
    }

    public function getShipDate(): ?\DateTime
    {
        return $this->ship_date;
    }

    public function setShipDate(?\DateTime $ship_date): static
    {
        $this->ship_date = $ship_date;

        return $this;
    }

    public function getTrackingId(): ?string
    {
        return $this->tracking_id;
    }

    public function setTrackingId(?string $tracking_id): static
    {
        $this->tracking_id = $tracking_id;

        return $this;
    }
}
