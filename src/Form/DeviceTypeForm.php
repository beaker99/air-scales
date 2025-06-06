<?php

namespace App\Form;

use App\Entity\Device;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeviceTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('serialNumber', TextType::class, [
                'required' => false,
                'label' => 'Serial Number',
            ])
            ->add('macAddress', TextType::class, [
                'required' => false,
                'label' => 'MAC Address',
            ])
            ->add('entityType', TextType::class, [
                'required' => false,
                'label' => 'Microcontroller Type',
            ])
            ->add('firmwareVersion', TextType::class, [
                'required' => false,
                'label' => 'Firmware Version',
            ])
            ->add('notes', TextType::class, [
                'required' => false,
                'label' => 'Notes',
            ])
            ->add('orderDate', DateTimeType::class, [
                'required' => false,
                'widget' => 'single_text',
                'label' => 'Order Date',
            ])
            ->add('shipDate', DateTimeType::class, [
                'required' => false,
                'widget' => 'single_text',
                'label' => 'Ship Date',
            ])
            ->add('trackingId', TextType::class, [
                'required' => false,
                'label' => 'Tracking ID',
            ])
            ->add('soldTo', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email',
                'required' => false,
                'label' => 'Sold To (User)',
                'placeholder' => 'None',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Device::class,
        ]);
    }
}
