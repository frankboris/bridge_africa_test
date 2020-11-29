<?php

namespace App\Forms;

use App\Models\Product;
use Kris\LaravelFormBuilder\Form;

class ProductForm extends Form
{
    protected $formOptions = [
        'method' => 'POST',
        'route' => 'account.products.store'
    ];

    public function buildForm()
    {
        $model = $this->getModel();

        $nameRules = 'required|max:150|unique:products,name';
        if ($model) {
            $nameRules = $nameRules.','.$model->id;
        }

        $this
            ->add('name', 'text', [
                'label' => 'Nom',
                'rules' => $nameRules,
            ])
            ->add('price', 'number', [
                'label' => 'Prix',
                'rules' => 'required|min:0'
            ])
            ->add('published', 'checkbox', [
                'label' => 'Visible par tous',
            ])
            ->add('description', 'textarea', [
                'label' => 'Description',
                'rules' => 'max:5000',
                'attr' => ['rows' => '3']
            ])
            ->add('image', 'file', [
                'label' => 'Image',
                'rules' => 'mimes:jpeg,png,gif,jpg|max:10240',
                'attr' => [
                    'class' => 'dropify',
                    'data-default-file' => $this->getImagePath($model)
                ]
            ]);
    }

    public function getImagePath($model)
    {
        $path = config('constants.images.default_product');
        if ($model instanceof Product) {
            $path = $model->getImage();
        }
        return asset_app($path);
    }
}
