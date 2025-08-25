<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class)
            ->add('name', null, ['label' => 'Nome'])
            ->add('nickname', null, ['label' => 'Apelido'])
            ->add('phone', null, [
                'label'=> 'Celular',
                    'attr' => ['placeholder' => '(99) 99999-9999'],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^\(\d{2}\) \d{5}-\d{4}$/',
                        'message' => 'Telefone deve estar no formato (99) 99999-9999',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
