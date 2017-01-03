<?php

namespace MyApp\FilmothequeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class ActeurForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choices = array('Féminin' => 'F', 'Masculin' => 'M');

        $builder
            ->add('nom',TextType::class,['label' => 'Nom', 'required' => true])
            ->add('prenom',TextType::class,['label' => 'Prénom', 'required' => true])
            ->add('dateNaissance', BirthdayType::class,['label' => 'Date de naissance', 'required' => true])
            ->add('sexe', ChoiceType::class, ['label' => 'Sexe', 'required' => true,'choices' => $choices,'choices_as_values' => true]);
    }

    public function getBlockPrefix()
    {
        return 'acteur';
    }

}