<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class EnsureTokenValid
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User tidak ditemukan'
                ], 404);
            }

        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return response()->json(['success' => false, 'message' => 'Token tidak valid'], 401);
            } else if ($e instanceof TokenExpiredException) {
                return response()->json(['success' => false, 'message' => 'Token sudah kedaluwarsa'], 401);
            } else {
                return response()->json(['success' => false, 'message' => 'Otorisasi token diperlukan'], 401);
            }
        }

        return $next($request);
    }
}