<?php

namespace AppBundle\Form;

use AppBundle\Entity\Materials;
use AppBundle\Entity\Museum;
use AppBundle\Entity\Paint;
use AppBundle\Entity\Room;
use AppBundle\Entity\Tech;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtWorkType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('artist')
            ->add('description')
            ->add('long_description')
            ->add('coordX')
            ->add('coordY')
            ->add('date', DateType::class, [
                'required' => true,
                'widget' => 'single_text',
                'html5' => true])
            ->add('enigma')
            ->add('answer')
            ->add('type', EntityType::class, array(
                'class' => \AppBundle\Entity\Type::class,
                'choice_label' => 'name'))
            ->add('tech', EntityType::class, array(
                'class' => Tech::class,
                'choice_label' => 'name'))
            ->add('materials', EntityType::class, array(
                'class' => Materials::class,
                'choice_label' => 'name'))
            ->add('museum', EntityType::class, array(
                'class' => Museum::class,
                'choice_label' => 'name'))
            ->add('room', EntityType::class, array(
                'class' => Room::class,
                'choice_label' => 'name'))
            ->add('paint', EntityType::class, array(
                'class' => Paint::class,
                'choice_label' => 'name'))
            ->add('sizeH')
            ->add('sizeW');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ArtWork'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_artwork';
    }


}
