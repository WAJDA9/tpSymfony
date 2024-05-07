<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Title',
            ])
            ->add('duration', TextType::class, [
                'label' => 'Duration',
            ])
            ->add('pre_requis', TextType::class, [
                'label' => 'Pre-requisites',
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Content',
            ])
            ->add('isSelected', CheckboxType::class, [
                'label' => 'Is Selected',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
