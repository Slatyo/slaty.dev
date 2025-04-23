<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class SatisfactoryApiService
{
    /**
     * @var string|null
     */
    protected string|null $host;

    /**
     * @var string
     */
    protected string $password;

    /**
     * @var string|null
     */
    protected string|null $token = null;

    public function __construct()
    {
        $resolvedHost = match (request()->route('satisfactory')) {
            'pioneer' => config('services.satisfactory.pioneer'),
            'hogzilla' => config('services.satisfactory.hogzilla'),
            default => null,
        };

        $this->host = $resolvedHost;
        $this->password = config('services.satisfactory.password');
    }

    /**
     * @return bool
     */
    public function authenticate(): bool
    {
        $response = Http::post("$this->host/api/v1", [
            'function' => 'PasswordLogin',
            'data' => [
                'password' => $this->password,
                'clientCustomData' => '',
                'minimumPrivilegeLevel' => 'Administrator'
            ]
        ]);

        if ($response->successful() && $response->json('data.authenticationToken')) {
            $this->token = $response->json('data.authenticationToken');
            return true;
        }

        return false;
    }

    /**
     * @param string $function
     * @param array $data
     *
     * @return array|mixed
     * @throws ConnectionException
     */
    public function request(string $function, array $data = []): mixed
    {
        if (!$this->authenticate()) {
            throw new RuntimeException('Failed to authenticate with Satisfactory API');
        }

        $payload = [
            'function' => $function,
            'data' => array_merge([
                'clientCustomData' => ''
            ], $data),
        ];

        $response = Http::withToken($this->token)->post("$this->host/api/v1", $payload);

        if ($response->failed()) {
            throw new RuntimeException("API request failed: " . $response->body());
        }

        return $response->json();
    }
}
