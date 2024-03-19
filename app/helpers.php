<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

function getSuccessMessage($data)
{
    return response([
        'code' => Response::HTTP_OK,
        'message'   => "Berhasil",
        'data'      => $data,
    ], Response::HTTP_OK);
}

function getThrowMessage($th)
{
    Log::error($th);
    $thCode = $th->getCode() ?? 500;
    $thCode = $thCode > 500 || $thCode < 100 ? 500 : $thCode;
    $message = $th->getMessage() ?? 'Terjadi kesalahan';
    $message = env('APP_DEBUG') ? $message : 'Terjadi kesalahan';

    return response()->json([
        'code'    => $thCode,
        'message' => $message,
        'data' => null,
    ], $thCode);
}

function getValidatedMessage($validator)
{
    $errorMessages = $validator->getMessageBag()->first();
    $errorCount = $validator->getMessageBag()->count();
    if($errorCount - 1){
        $errorMessages = $errorMessages . ' (and ' . ($errorCount - 1) . ' more error)';
    }
    return response()->json([
        'code'    => Response::HTTP_UNPROCESSABLE_ENTITY,
        'message' => $errorMessages,
        'data'    => ['errors' => $validator->errors()],
    ], Response::HTTP_UNPROCESSABLE_ENTITY);
}


function saveFileFaker($file, $folder, $fileName = "")
{
    if ($file) {
        if ($fileName) {
            $fileName = $fileName . "." . pathinfo($file, PATHINFO_EXTENSION);
        } else {
            $fileName = pathinfo($file, PATHINFO_BASENAME);
        }

        $path = $folder . time() . rand(1111, 9999) . '_' . $fileName;
        $content = File::get(public_path("{$file}")); // Mengambil isi file langsung

        // Simpan file ke storage (Anda dapat mengganti 'public' dengan disk yang sesuai)
        uploadPublicFile($content, $path);

        return $path;
    }

    return null;
}

function saveFile($request, $name, $folder, $fileName = "")
{
    if ($request->hasFile($name)) {
        $file = $request->file($name);
        if ($fileName) {
            $fileName = $fileName . "." . $file->getClientOriginalExtension();
        } else {
            $fileName = $file->getClientOriginalName();
        }
        $path = $folder . time() . rand(1111, 9999) . '_' . $fileName;
        $file = $file->getContent();
        uploadPublicFile($file, $path);
        // uploadFile($file, $path);
        return $path;
    }
    return null;
}


function uploadPublicFile($decode, $path)
{
    Storage::disk('public')->put($path, $decode, [
        'visibility' => 'public',
    ]);

    return true;
}


function globalShowFile($path)
{
    return showPublicFile($path);
}

function showPublicFile($path)
{
    return Storage::disk('public')->url($path);
}
