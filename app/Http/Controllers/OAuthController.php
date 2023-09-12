<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateOAuthRequest;
use App\Services\OAuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class OAuthController extends Controller
{
    public function __construct(private readonly OAuthService $service)
    {
    }

    public function getRedirectEndpoint(): RedirectResponse
    {
        $request = [
            'scope' => config('oauth.twitter.scopes'),
            'response_type' => 'code',
            'client_id' => config('oauth.twitter.client_id'),
            'redirect_uri' => config('oauth.twitter.redirect_uri'),
            'state' => md5(time()),
            'code_challenge' => 'fodase1',
            'code_challenge_method' => 'plain'
        ];

        $endpoint = 'https://twitter.com/i/oauth2/authorize?' . http_build_query($request);

        return response()->redirectTo($endpoint);
    }

    public function getAuthenticationToken(
        ValidateOAuthRequest $request,
        string $provider,
    ): JsonResponse
    {
        $response = $this->service->authenticate($request->input('code'));

        return response()->json($response);
    }
}
