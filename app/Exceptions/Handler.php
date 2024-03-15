<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use SudhanshuMittal\LaravelApiResponse\Concerns\ConvertsExceptionToApiResponse;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ConvertsExceptionToApiResponse;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        // $this->reportable(function (Throwable $e) {
        //     //
        // });
        if (request()->is('*api*')) {
            $this->renderable(function (Throwable $e, $request) {
                return $this->renderApiResponse($e, $request);
            });
        }
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        // $class = get_class($exception);
        // dd($exception->guards());
        return $request->expectsJson()
            ? response()->json(['message' => $exception->getMessage()], 401)
            : redirect()->guest(route('admin.login'));
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException && request()->is('*api/*')) {
            return response()->json([
                'status' => false,
                'type' => 'validation',
                'errors' => $exception->validator->errors()
            ], 422);
        } else if ($exception instanceof UnauthorizedHttpException) {
            // detect previous instance
            if ($exception->getPrevious() instanceof TokenExpiredException) {
                return response()->json([
                    'status' => false,
                    'errors' => 'token_expired'
                ], $exception->getStatusCode());
            } else if ($exception->getPrevious() instanceof TokenInvalidException) {
                return response()->json([
                    'status' => false,
                    'errors' => 'token_invalid'
                ], $exception->getStatusCode());
            } else if ($exception->getPrevious() instanceof TokenBlacklistedException) {
                return response()->json([
                    'status' => false,
                    'errors' => 'token_blacklisted'
                ], $exception->getStatusCode());
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => 'Token not found'
                ], $exception->getStatusCode());
            }
        }
        return parent::render($request, $exception);
    }
}
