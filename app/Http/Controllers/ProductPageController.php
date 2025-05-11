<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Type;

class ProductPageController extends Controller
{
    public function index(Request $request, $category_id = null)
    {

        $baseQuery = Product::query();
        if ($category_id) {
            $baseQuery->where('category_id', $category_id);
        }
        $baseProducts = $baseQuery->get();


        $allTypeIds  = $baseProducts->pluck('type_id')->unique()->toArray();
        $allBrandIds = $baseProducts->pluck('brand_id')->unique()->toArray();


        $allTypes  = Type::whereIn('id', $allTypeIds)->get();
        $allBrands = Brand::whereIn('id', $allBrandIds)->get();



        $query = Product::with('mainPhoto');
        if ($category_id) {
            $query->where('category_id', $category_id);
        }
        if ($request->filled('types')) {
            $query->whereIn('type_id', $request->input('types'));
        }
        if ($request->filled('brands')) {
            $query->whereIn('brand_id', $request->input('brands'));
        }
        if ($request->filled('gender')) {
            $query->whereIn('pohlavie', $request->input('gender'));
        }



        $min = $request->input('price_min');
        $max = $request->input('price_max');

        if ($min !== null && $max !== null) {
            $query->whereBetween('price', [(float)$min, (float)$max]);
        } elseif ($min !== null) {
            $query->where('price', '>=', (float)$min);
        } elseif ($max !== null) {
            $query->where('price', '<=', (float)$max);
        }


        if ($request->filled('sortSelect')) {
            switch ($request->input('sortSelect')) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                default:
                    break;
            }
        }

        $perPage = 8;

        $products = $query->orderBy('created_at', 'desc')->paginate($perPage)->appends($request->except('page'));



        return view('pages.products', [
            'products'    => $products,
            'types'       => $allTypes,
            'brands'      => $allBrands,
            'category_id' => $category_id,
            'sortSelect'  => $request->input('sortSelect'),
        ]);
    }


    public function index_group(Request $request, $group_id = null)
    {
        $baseQuery = Product::query();
        if ($group_id) {
            $baseQuery->where('group_id', $group_id);
        }
        $baseProducts = $baseQuery->get();


        $allTypeIds  = $baseProducts->pluck('type_id')->unique()->toArray();
        $allBrandIds = $baseProducts->pluck('brand_id')->unique()->toArray();


        $allTypes  = Type::whereIn('id', $allTypeIds)->get();
        $allBrands = Brand::whereIn('id', $allBrandIds)->get();



        $query = Product::with('mainPhoto');
        if ($group_id) {
            $query->where('group_id', $group_id);
        }
        if ($request->filled('types')) {
            $query->whereIn('type_id', $request->input('types'));
        }
        if ($request->filled('brands')) {
            $query->whereIn('brand_id', $request->input('brands'));
        }
        if ($request->filled('gender')) {
            $query->whereIn('pohlavie', $request->input('gender'));
        }



        $min = $request->input('price_min');
        $max = $request->input('price_max');

        if ($min !== null && $max !== null) {
            $query->whereBetween('price', [(float)$min, (float)$max]);
        } elseif ($min !== null) {
            $query->where('price', '>=', (float)$min);
        } elseif ($max !== null) {
            $query->where('price', '<=', (float)$max);
        }


        if ($request->filled('sortSelect')) {
            switch ($request->input('sortSelect')) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                default:
                    break;
            }
        }

        $perPage = 8;

        $products = $query->orderBy('created_at', 'desc')->paginate($perPage)->appends($request->except('page'));




        return view('pages.products_group', [
            'products'    => $products,
            'types'       => $allTypes,
            'brands'      => $allBrands,
            'group_id' => $group_id,
            'sortSelect'  => $request->input('sortSelect'),
        ]);
    }


    public function index_search(Request $request)
    {
        $searchTerm = $request->input('find');

        $baseQuery = Product::where('title', 'ILIKE', "%{$searchTerm}%");

        $baseProducts = $baseQuery->get();


        $allTypeIds  = $baseProducts->pluck('type_id')->unique()->toArray();
        $allBrandIds = $baseProducts->pluck('brand_id')->unique()->toArray();


        $allTypes  = Type::whereIn('id', $allTypeIds)->get();
        $allBrands = Brand::whereIn('id', $allBrandIds)->get();



        $query = Product::with('mainPhoto');

        if ($searchTerm) {
            $query->where('title', 'ILIKE', "%{$searchTerm}%");
        }

        if ($request->filled('types')) {
            $query->whereIn('type_id', $request->input('types'));
        }
        if ($request->filled('brands')) {
            $query->whereIn('brand_id', $request->input('brands'));
        }
        if ($request->filled('gender')) {
            $query->whereIn('pohlavie', $request->input('gender'));
        }



        $min = $request->input('price_min');
        $max = $request->input('price_max');

        if ($min !== null && $max !== null) {
            $query->whereBetween('price', [(float)$min, (float)$max]);
        } elseif ($min !== null) {
            $query->where('price', '>=', (float)$min);
        } elseif ($max !== null) {
            $query->where('price', '<=', (float)$max);
        }


        if ($request->filled('sortSelect')) {
            switch ($request->input('sortSelect')) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                default:
                    break;
            }
        }

        $perPage = 8;

        $products = $query->orderBy('created_at', 'desc')->paginate($perPage)->appends($request->except('page'));


        return view('pages.products_search', [
            'query'       => $searchTerm,
            'products'    => $products,     // filtrované
            'types'       => $allTypes,     // na checkboxy – celý zoznam pre kategóriu
            'brands'      => $allBrands,    // na checkboxy
            'sortSelect'  => $request->input('sortSelect'),
        ]);
    }


}
