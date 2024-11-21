<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     description="Contoh API doc menggunakan OpenAPI/Swagger",
 *     version="0.0.1",
 *     title="Contoh API documentation",
 *     termsOfService="http://swagger.io/terms/",
 *     @OA\Contact(
 *         email="dwianggarans@gmail.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */

class GreetController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/greet",
     *     tags={"greeting"},
     *     summary="Returns a Sample API response",
     *     description="A sample greeting to test out the API",
     *     operationId="greet",
     *     @OA\Parameter(
     *         name="firstname",
     *         description="Nama depan",
     *         required=true,
     *         in="query",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="lastname",
     *         description="Nama belakang",
     *         required=true,
     *         in="query",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             example={
     *                 "success": true,
     *                 "message": "Berhasil memproses masukan user",
     *                 "data": {
     *                     "output": "Halo John Doe",
     *                     "firstname": "John",
     *                     "lastname": "Doe"
     *                 }
     *             }
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *         @OA\JsonContent(
     *             example={
     *                 "success": false,
     *                 "message": "Missing data: firstname and/or lastname are required."
     *             }
     *         )
     *     )
     * )
     */
    public function greet(Request $request)
    {
        $userData = $request->only(['firstname', 'lastname']);

        if (empty($userData['firstname']) || empty($userData['lastname'])) {
            return response()->json([
                'success' => false,
                'message' => 'Missing data: firstname and/or lastname are required.'
            ], 400);
        }

        return response()->json([
            'message' => 'Berhasil memproses masukan user',
            'success' => true,
            'data' => [
                'output' => 'Halo ' . $userData['firstname'] . ' ' . $userData['lastname'],
                'firstname' => $userData['firstname'],
                'lastname' => $userData['lastname']
            ]
        ], 200);
    }
}
