<?php

namespace App\Form;

use App\Entity\Device;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class DeviceTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('entity_type')
            ->add('serial_number')
            ->add('mac_address')
            ->add('firmware_version')
            ->add('notes')
            ->add('orderDate', DateTimeType::class, [
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('shipDate', DateTimeType::class, [
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('tracking_id')
            ->add('sold_to', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Device::class,
        ]);
    }
}
