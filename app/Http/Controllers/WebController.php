<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WebController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
            ->where('count_product', '>', 0)
            ->orderByDesc('id')
            ->limit(5)
            ->get();
        return view('index', [
            'products' => $products,
        ]);
    }

    public function products()
    {
        return view("products");
    }

    public function product($id)
    {


        $products = DB::select("SELECT * FROM products WHERE id = ?;", [$id]);


        return view("product", [
            'product' => $products[0],
        ]);
    }

    public function admin()
    {
        if (auth()->user() && auth()->user()->isAdmin()) {
            $categories = DB::table('categories')->get();
            $products = DB::table('products')->get();
            return view("admin", ['categories' => $categories, 'products' => $products]);
        }
        return redirect(route('index'));
    }

    public function addCategory(Request $request)
    {
        $data = $request->all();
        DB::table('categories')->insert([
            'name_category' => $data['name_category']
        ]);


        return redirect(url()->previous())->with(['msgForCategory' => 'Категория добавлена']);
    }


    public function delCategory(Request $request)
    {
        $id_category = $request->id_category;
        $checkProduct = DB::table('products')
            ->where('id_category', $id_category)
            ->first();
        if ($checkProduct) {
            return redirect(url()->previous())
                ->with(['msgForCategory' => 'Категория уже используется в товаре с id - ' . $checkProduct->id]);
        }

        DB::table('categories')->where('id_category', $id_category)->delete();

        return redirect(url()->previous())->with(['msgForCategory' => 'Категория удалена']);
    }

    public function addProduct(Request $request)
    {

        $img = $request->file('image'); // получили картинку
        $typeImg = $img->extension(); // взяли расширение


        $uniqName = Str::random(); // уникальное название для нашего файла в файловой системе
        $nameImg = $uniqName . '.' . $typeImg; // соединили название и расширение
        $pathFolder = 'assets/img/products/'; // указали куда будем сохранять файлы в public

        $img->move(public_path($pathFolder), $nameImg);// сохраняем картинку в public/assets/img/products

        DB::table('products')->insert([
            'id_category' => $request->id_category,
            'name_product' => $request->name_product,
            'price_product' => $request->price_product,
            'country_product' => $request->country_product,
            'year_product' => $request->year_product,
            'model_product' => $request->model_product,
            'count_product' => $request->count_product,
            'path_product' => $pathFolder . $nameImg
        ]);

        return redirect(url()->previous())->with(['msgForProduct' => 'Товар успешно добавлен']);
    }


    public function AllProduct()
    {
        $products = DB::table('products')
            ->where('count_product', '>', 0)
            ->orderByDesc('id')
            ->get();
        return view("pageProduct", [
            'products' => $products,
        ]);
    }
    public function showBestProduct()
    {
        $bestProduct = DB::table('products')
            ->where('is_best', 1)
            ->inRandomOrder()
            ->first();

        return view('product.show', ['product' => $bestProduct]);
    }
    public function search(Request $request)
    {
        $s = $request->s;
        $products = Product::where('name_product', 'LIKE', '%' . $s . '%')->orderBy('name_product')->paginate(10);
        return view("pageProduct", compact('products'));
    }
    public function filterByPrice(Request $request)
    {
        $products = Product::when($request->input('s'), function ($query) use ($request) {
            $query->where('name_product', 'like', '%' . $request->input('s') . '%');
        })->when($request->input('min_price'), function ($query) use ($request) {
            $query->where('price_product', '>=', $request->input('min_price'));
        })->when($request->input('max_price'), function ($query) use ($request) {
            $query->where('price_product', '<=', $request->input('max_price'));
        })->get();

        return view('pageProduct', compact('products'));
    }
    public function delProduct(Request $request)
    {
        $id = $request->id;
        $checkProduct = DB::table('products')
            ->where('id', $id)
            ->first();


        DB::table('products')->where('id', $id)->delete();

        return redirect(url()->previous())->with(['msgForProduct' => 'Продукт удален']);
    }
    public function onas()
    {
        return view("onas");
    }

}

