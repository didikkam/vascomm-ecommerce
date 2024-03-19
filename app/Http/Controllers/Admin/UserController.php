<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.user');
    }

    public function datatable(Request $request)
    {
        $data = User::query();
        if (!empty($request->search['value'])) {
            $searchValue = $request->search['value'];
            $data = $data->where('name', 'like', "%$searchValue%");
            $data = $data->orWhere('email', 'like', "%$searchValue%");
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
            'email'   => 'required|string|max:255|email',
            'phone'     => 'required|numeric',
        ];
        $validator = Validator::make($request->all(), $dataValidate);
        if ($validator->fails()) {
            return getValidatedMessage($validator);
        }

        try {
            $dataStore = [
                'name'     => $request->name,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'status'     => $request->status,
                'password'  => Hash::make("secret123"),
            ];
            if (!empty($request->id)) {
                $data = User::where('id', $request->id)->first();
                if (!$data) {
                    throw new Exception("Data tidak ditemukan", Response::HTTP_NOT_FOUND);
                }
                $data->update($dataStore);
            } else {
                $data = User::create($dataStore);
            }
            return getSuccessMessage($data);
        } catch (\Throwable $th) {
            return getThrowMessage($th);
        }
    }

    public function show($id)
    {
        try {
            $data = User::where("id", $id)->first();
            if (!$data) {
                throw new Exception("Data tidak ditemukan", Response::HTTP_NOT_FOUND);
            }
            return getSuccessMessage($data);
        } catch (\Throwable $th) {
            return getThrowMessage($th);
        }
    }
}
