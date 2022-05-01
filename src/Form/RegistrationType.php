<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationType extends AbstractType
{
    /**
     * configuration du base 
     *
     * @param string $label
     * @param string $placeholder
     * @param array $options
     * @return array
     */
    public function getConfiguration($label,$placeholder,$options=[]){
        return array_merge([
            'label' => $label,
            'attr' =>[
                'placeholder' => $placeholder
            ]
            ],$options);

    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class, $this->getConfiguration("Nom","Votre Nom SVP"))
            ->add('email',EmailType::class, $this->getConfiguration("Email","Votre adresse email SVP"))
            ->add('hash',PasswordType::class, $this->getConfiguration("Mot de passe",
            "Votre Mot de passe SVP"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
