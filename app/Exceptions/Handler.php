<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * @param $request
     * @param  Throwable  $e
     *
     * @return \Illuminate\Http\Response|JsonResponse|Response|RedirectResponse
     * @throws Throwable
     */
    public function render($request, Throwable $e): \Illuminate\Http\Response|JsonResponse|Response|RedirectResponse
    {
        $response = parent::render($request, $e);
        $status = $response->status();

        return match ($status) {
            404 => Inertia::render('Error/404')->toResponse($request)->setStatusCode($status),
            500, 503 => Inertia::render('Error/500')->toResponse($request)->setStatusCode($status),
            419 => redirect()->back()->withErrors(['status' => __('The page expired, please try again.')]),
            default => $response
        };
    }
}
