<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class APIPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *     path="/api/gallery",
     *     tags={"gallery"},
     *     summary="Returns a Sample API gallery response",
     *     description="A sample gallery to test out the API",
     *     operationId="gallery",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent
     *           (example={
     *               "success": true,
     *               "message": "Successfully retrieved the gallery",
     *               "galleries": {
     *                  {
     *                      "id": 1,
     *                      "title": "galllery 1",
     *                      "description": "desc galllery 1",
     *                      "picture": "672ad27a5fe841730859642.jpeg",
     *                      "created_at": "2024-11-06T02:20:42.000000Z",
     *                      "updated_at": "2024-11-06T02:20:42.000000Z"
     *                  }
     *              }
     *          }),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Post not found",
     *         @OA\JsonContent
     *           (example={
     *               "detail": "strings"
     *          }),
     *     )
     * )
     */
    public function index()
    {
        $data = array(
            'message' => 'Berhasil memproses galleries',
            'success' => true,
            'galleries' => Post::where('picture', '!=', '')->whereNotNull('picture')->orderBy('created_at', 'desc')->get()
        );
        return response()->json($data);
    }
}
