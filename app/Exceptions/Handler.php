<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        /**
        * Proceso para redirigir al formulario de login en caso de querer acceder a vistas protegidas
        * mediante autenticación con un mensaje de error.
        */
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        if ($exception instanceof \Illuminate\Auth\AuthenticationException)
        {
            $guard = array_get($exception->guards(), 0);

            switch ($guard) {
                case 'web':
                    $login = 'auth.index';
                    break;
                default:
                    $login = 'auth.index';
                    break;
            }
            return redirect()->route($login)->with('flash', 'Por favor inicia sesión');
        }

        return parent::render($request, $exception);
    }
}
