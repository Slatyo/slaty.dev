<?php

namespace App\Http\Controllers;

use App\Services\SatisfactoryApiService;
use Illuminate\Http\Client\ConnectionException;
use Inertia\Inertia;
use Inertia\Response;

class SatisfactoryController extends Controller
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Satisfactory', [
            'servers' => ['pioneer', 'hogzilla']
        ]);
    }

    /**
     * @param string $satisfactory
     * @param SatisfactoryApiService $api
     *
     * @return Response
     * @throws ConnectionException
     */
    public function show(string $satisfactory, SatisfactoryApiService $api): Response
    {
        $queryState = $api->request('QueryServerState')['data']['serverGameState'] ?? [];
        $health = $api->request('HealthCheck')['data'] ?? [];
        $serverOptions = $api->request('GetServerOptions')['data'] ?? [];
        $advancedGameSettings = $api->request('GetAdvancedGameSettings')['data'] ?? [];

        $data = array_filter(
            array_merge($queryState, $health, $serverOptions, $advancedGameSettings),
            fn($v) => $v !== null && $v !== ''
        );

        return Inertia::render('Satisfactory/Server', ['name' => $satisfactory, 'server' => $data]);
    }
}
