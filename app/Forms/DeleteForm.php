<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class DeleteForm extends Form
{
    protected $formOptions = [
        'method' => 'DELETE',
        'class' => 'form-inline d-inline'
    ];

    public function buildForm()
    {
        $this->add('submit', 'submit', [
            'label' => '<i class="fa fa-trash"></i>',
            'attr' => [
                'class' => 'btn btn-danger delete-confirm',
                'title' => 'Supprimer',
                'onclick' => "return confirm('Etes vous sur de vouloir supprimer cet élément ?')"
            ],
        ]);
    }
}
