<?php

namespace App\Http\Controllers;

use App\Models\EducationContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EducationContentController extends Controller
{
    public function index()
    {
        return response()->json(EducationContent::all());
    }

    public function show($id)
    {
        $content = EducationContent::find($id);
        if (!$content) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }
        return response()->json($content);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:poster,video,mitos-fakta,text',
            'content' => 'required|string',
            'file_url' => 'nullable|string',
            'category' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Terjadi kesalahan pada data yang Anda kirimkan. Mohon periksa kembali.',
                'errors' => $validator->errors()
            ], 422);
        }

        $content = EducationContent::create($validator->validated());
        return response()->json($content, 201);
    }

    public function destroy($id)
    {
        $content = EducationContent::find($id);
        if (!$content) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }
        $content->delete();
        return response()->json(['message' => 'Konten edukasi berhasil dihapus.']);
    }
}
