<?php

namespace App\Http\Controllers;

use App\Forms\DeleteForm;
use App\Forms\ProductForm;
use App\Models\Product;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Yajra\DataTables\DataTables;

class ProductController extends AuthController
{
    const IMAGE_PATH = 'products';

    use FormBuilderTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::query()->where('user_id', $this->getUser()->id);
            return Datatables::of($products)
                ->addColumn('image', function ($data) {
                    return '<img src="' . asset_app($data->getImage()) . '" alt="' . $data->name . '" />';
                })
                ->addColumn('price', function ($data) {
                    return format_price($data->price);
                })
                ->addColumn('published', function ($data) {
                    $status = '<span class="badge badge-warning">Privé</span>';
                    if ($data->published) {
                        $status = '<span class="badge badge-success">Public</span>';
                    }
                    return $status;
                })
                ->addColumn('actions', function ($data) {
                    return view('helpers.table_actions', [
                        'show' => route('account.products.show', $data->id),
                        'edit' => route('account.products.edit', $data->id),
                        'deleteForm' => $this->form(DeleteForm::class, [
                            'url' => route('account.products.destroy', $data->id)
                        ]),
                    ])->render();
                })
                ->rawColumns(['actions', 'image', 'published'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('account.products.index');
    }

    public function create()
    {
        $form = $this->form(ProductForm::class);
        return view('account.products.create', compact('form'));
    }

    public function store(Request $request)
    {
        $form = $this->form(ProductForm::class);
        if (!$form->isValid()) {
            return back()->withErrors($form->getErrors())->withInput();
        }
        $inputs = array_filter($form->getFieldValues());
        if ($request->hasFile('image')) {
            $inputs['image_path'] = $this->uploader($request->file('image'), self::IMAGE_PATH);
        }
        $inputs['user_id'] = $this->getUser()->id;
        Product::query()->create($inputs);
        return redirect()->route('account.products')->with('success', 'Marque de téléphone ajoutée avec succès !');
    }

    public function show(Product $product)
    {
        return view('account.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $form = $this->form(ProductForm::class, [
            'url' => route('account.products.update', $product->id),
            'method' => 'PUT',
            'model' => $product
        ]);
        return view('account.products.edit', compact('product', 'form'));
    }

    public function update(Request $request, Product $product)
    {
        $form = $this->form(ProductForm::class);
        if (!$form->isValid()) {
            return back()->withErrors($form->getErrors())->withInput();
        }
        $inputs = array_filter($form->getFieldValues());
        if ($request->hasFile('image')) {
            $inputs['image_path'] = $this->uploader($request->file('image'), self::IMAGE_PATH);
        }
        $inputs['published'] = key_exists('published', $inputs);
        $product->fill($inputs)->save();
        return redirect()->route('account.products')->with('success', 'Marque de téléphone mise à jour avec succès !');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('account.products')->with('success', 'Marque de téléphone restaurée avec succès !');
    }
}
