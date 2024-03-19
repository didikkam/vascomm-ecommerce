<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.product');
    }

    public function datatable(Request $request)
    {
        $data = Product::query();
        if (!empty($request->search['value'])) {
            $searchValue = $request->search['value'];
            $data = $data->where('name', 'like', "%$searchValue%");
            $data = $data->orWhere('price', 'like', "%$searchValue%");
        }
        if (!$request->order[0]['column']) {
            $data = $data->latest();
        }
        return DataTables::of($data)
            ->make(true);
    }

    public function store(Request $request)
    {
        $dataValidate = [
            'name'      => 'required|string|max:255',
            'price'     => 'required|numeric',
            'status'     => 'required|numeric|in:1,0',
        ];
        if(!$request->id){
            $dataValidate['image'] = 'required|file|mimes:png,jpg,jpeg';
        }
        $validator = Validator::make($request->all(), $dataValidate);
        if ($validator->fails()) {
            return getValidatedMessage($validator);
        }

        try {
            $dataStore = [
                'name'     => $request->name,
                'price'     => $request->price,
                'status'     => $request->status,
            ];
            $folder = "products/";
            if ($file = saveFile($request, 'image', $folder, Str::slug($request->name))) {
                $dataStore['image'] = $file;
            }

            if (!empty($request->id)) {
                $data = Product::where('id', $request->id)->first();
                if (!$data) {
                    throw new Exception("Data tidak ditemukan", Response::HTTP_NOT_FOUND);
                }
                $data->update($dataStore);
            } else {
                $data = Product::create($dataStore);
            }
            return getSuccessMessage($data);
        } catch (\Throwable $th) {
            return getThrowMessage($th);
        }
    }

    public function show($id)
    {
        try {
            $data = Product::where("id", $id)->first();
            if (!$data) {
                throw new Exception("Data tidak ditemukan", Response::HTTP_NOT_FOUND);
            }
            return getSuccessMessage($data);
        } catch (\Throwable $th) {
            return getThrowMessage($th);
        }
    }
}
