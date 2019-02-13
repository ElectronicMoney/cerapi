<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


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
        //Check if request expects json
        if ($request->expectsJson()) {
            //Check for ModelNotFoundException
            if ($exception instanceof ModelNotFoundException) {
                return response()->json([
                    'errors' => 'Product Model Not Found!'
                ], Response::HTTP_NOT_FOUND);
            }
        }

        //Check for NotFoundHttpException
        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'errors' => 'Incorrect route!'
            ], Response::HTTP_NOT_FOUND);
        }

       // dd($exception);
        //return parent::render($request, $exception);
    }
}
