<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Group;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $groups     = Group::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $types      = Type::orderBy('name')->get();
        $brands     = Brand::orderBy('name')->get();
        $genders    = ['muž' => 'Muž', 'žena' => 'Žena'];


        $query = Product::with(['mainPhoto','type','brand','group','category']);

        if ($id = $request->input('group'))
            $query->where('group_id', $id);

        if ($id = $request->input('category_id'))
            $query->where('category_id', $id);

        if ($id = $request->input('type'))
            $query->where('type_id',  $id);

        if ($id = $request->input('brand'))
            $query->where('brand_id', $id);

        if ($g  = $request->input('gender'))
            $query->where('pohlavie', $g);


        $products = $query->orderBy('created_at','desc')
            ->paginate(12)
            ->appends($request->except('page'));


        return view('pages.admin_adding', [
            'products'        => $products,
            'groups'          => $groups,
            'categories'      => $categories,
            'types'           => $types,
            'brands'          => $brands,
            'genders'         => $genders,


            'selectedGroup'     => $request->input('group',''),
            'selectedCategory'  => $request->input('category_id',''),
            'selectedType'      => $request->input('type',''),
            'selectedBrand'     => $request->input('brand',''),
            'selectedGender'    => $request->input('gender',''),
        ]);
    }


    public function showADD()
    {
        // načítame dáta pre všetky selecty (číselníky)
        $groups     = Group::orderBy('name')->pluck('name','id');
        $categories = Category::orderBy('name')->pluck('name','id');
        $types      = Type::orderBy('name')->pluck('name','id');
        $brands     = Brand::orderBy('name')->pluck('name','id');
        $genders    = [
            'muž'  => 'Muž',
            'žena' => 'Žena',
        ];

        // pošleme do view
        return view('pages.product_add', compact(
            'groups',
            'categories',
            'types',
            'brands',
            'genders'
        ));
    }

    public function store(Request $request){

        $data = $request->validate([
            'title'           => 'required|string|max:255',
            'lil_description' => 'nullable|string|max:500',
            'description'     => 'nullable|string',
            'group_id'        => 'required|exists:groups,id',
            'category_id'     => 'required|exists:categories,id',
            'type_id'         => 'required|exists:types,id',
            'brand_id'        => 'required|exists:brands,id',
            'gender'          => 'required|in:muž,žena',
            'price'           => 'required|numeric|min:0',
            'qty_s'           => 'required|integer|min:0',
            'qty_m'           => 'required|integer|min:0',
            'qty_l'           => 'required|integer|min:0',
            'qty_xl'          => 'required|integer|min:0',
            'main_image'      => 'required|image|mimes:jpeg,png,jpg,gif',
            'images'          => 'nullable|array',
            'images.*'        => 'image|mimes:jpeg,png,jpg,gif',
        ]);





        $product = Product::create([
            'title'        => $data['title'],
            'short_descr'  => $data['lil_description'],
            'long_descr' => $data['description'],
            'group_id'    => $data['group_id'],
            'category_id' => $data['category_id'],
            'type_id'     => $data['type_id'],
            'brand_id'    => $data['brand_id'],
            'pohlavie'    => $data['gender'],
            'price'       => $data['price'],
            'has_s'       => $data['qty_s'],
            'has_m'       => $data['qty_m'],
            'has_l'       => $data['qty_l'],
            'has_xl'      => $data['qty_xl'],
        ]);



        $mainDir    = public_path('item/main');
        $galleryDir = public_path('item/gallery');

        if ($file = $request->file('main_image')) {
            $mainName = time().'_main_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($mainDir, $mainName);

            $product->photos()->create([
                'image_URL' => "item/main/{$mainName}",
                'main'      => true,
            ]);
        }


        foreach ($request->file('images', []) as $file) {
            $name = time().'_gal_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($galleryDir, $name);

            $product->photos()->create([
                'image_URL' => "item/gallery/{$name}",
                'main'      => false,
            ]);
        }


        return redirect()->route('admin.show.add')
            ->with('success', 'Produkt bol úspešne pridaný.');
    }
}
