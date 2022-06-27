<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $data = Post::paginate();
        return response([
            'success' => true,
            'message' => 'List All Article',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make(
            $request->all(),
            [
                'title'     => 'required',
                'content'   => 'required',
                'category_id'   => 'required',
            ],
            [
                'title.required' => 'Masukkan Title Artikel !',
                'content.required' => 'Masukkan Content Artikel !',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $data = Post::create([
                'title'     => $request->input('title'),
                'content'   => $request->input('content'),
                'image'   => $request->input('image'),
                'user_id'   => $request->user()->id,
                'category_id'   => $request->input('category_id')
            ]);

            if ($data) {
                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal Disimpan!',
                ], 401);
            }
        }
    }

    public function show(Request $request, $id)
    {
        $data = Post::whereId($id)->first();


        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Artikel!',
                'data'    => $data
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Artikel Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }

    public function update(Request $request, $id)
    {
        //validate data
        $validator = Validator::make(
            $request->all(),
            [
                'title'     => 'required',
                'content'   => 'required',
                'category_id'   => 'required',
            ],
            [
                'title.required' => 'Masukkan Title Artikel !',
                'content.required' => 'Masukkan Content Artikel !',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $data = Post::whereId($id)->update([
                'title'     => $request->input('title'),
                'content'   => $request->input('content'),
                'image'   => $request->input('image'),
                'category_id'   => $request->input('category_id')
            ]);

            if ($data) {
                return response()->json([
                    'success' => true,
                    'message' => 'Artikel Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Artikel Gagal Diupdate!',
                ], 401);
            }
        }
    }

    public function destroy($id)
    {
        $data = Post::findOrFail($id)->delete();

        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Artikel Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Artikel Gagal Dihapus!',
            ], 400);
        }
    }
}
