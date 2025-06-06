<?php

namespace App\Entity;

use App\Repository\CalibrationPointRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CalibrationPointRepository::class)]
class CalibrationPoint
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'float')]
    private float $airPressure;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $temperature = null;

    #[ORM\Column(type: 'float')]
    private float $axleWeight;

    #[ORM\ManyToOne(inversedBy: 'calibrationPoints')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Device $device = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAirPressure(): float
    {
        return $this->airPressure;
    }

    public function setAirPressure(float $airPressure): static
    {
        $this->airPressure = $airPressure;
        return $this;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function setTemperature(?float $temperature): static
    {
        $this->temperature = $temperature;
        return $this;
    }
    
    public function getAxleWeight(): float
    {
        return $this->axleWeight;
    }

    public function setAxleWeight(float $axleWeight): static
    {
        $this->axleWeight = $axleWeight;
        return $this;
    }

    public function getDevice(): ?Device
    {
        return $this->device;
    }

    public function setDevice(?Device $device): static
    {
        $this->device = $device;
        return $this;
    }
}
