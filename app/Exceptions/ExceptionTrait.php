<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

Trait ExceptionTrait {

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */

    public function apiException($request, $e) {
        //Check for ModelNotFoundException
        if ( $this->isModelNotFoundException($e) ) {
            return $this->modelNotFoundExceptionResponse();
        }

        //Check for NotFoundHttpException
        if ( $this->isNotFoundHttpException($e) ) {
            return $this->notFoundHttpExceptionResponse();
        }

    }

    /**
     * ModelNotFoundException
     *
     * @param  $e
     * @return instanceof ModelNotFoundException
     */

    private function isModelNotFoundException($e) {
        return $e instanceof ModelNotFoundException;
    }

    /**
     * ModelNotFoundException
     *
     * @param  $e
     * @return instanceof ModelNotFoundException
     */

    private function modelNotFoundExceptionResponse()
    {
        return response()->json([
            'errors' => 'Product Model Not Found!'
        ], Response::HTTP_NOT_FOUND);
    }

    /**
     * NotFoundHttpException
     *
     * @param  $e
     * @return instanceof NotFoundHttpException
     */

    private function isNotFoundHttpException($e)
    {
        return $e instanceof NotFoundHttpException;
    }

    /**
     * ModelNotFoundException
     *
     * @param  $e
     * @return instanceof ModelNotFoundException
     */

    private function notFoundHttpExceptionResponse()
    {
        return response()->json([
            'errors' => 'Incorrect route!'
        ], Response::HTTP_NOT_FOUND);
    }

}
