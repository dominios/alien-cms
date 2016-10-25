<?php

namespace Application\Controllers\Rest;

use Alien\Mvc\AbstractController;
use Alien\Mvc\Response;

class RestController extends AbstractController
{

    protected function errorResponse($code, $message, $description, $errors = [])
    {
        return new Response([
            'response' => [
                'status' => $code,
                'message' => $message,
                'description' => $description,
            ],
            'errors' => [
                $errors
            ]
        ], $code, Response::MIME_JSON);
    }

    public function listAction()
    {
        $errors = [
            'code' => Response::STATUS_BAD_REQUEST,
            'description' => "Method list is not defined or accessible."
        ];
        return $this->errorResponse(Response::STATUS_BAD_REQUEST, 'Invalid method', 'Server cannot fulfill your request due to unsupported or malformed method name given.', $errors);
    }

    public function getAction()
    {
        $errors = [
            'code' => Response::STATUS_BAD_REQUEST,
            'description' => "Method get is not defined or accessible."
        ];
        return $this->errorResponse(Response::STATUS_BAD_REQUEST, 'Invalid method', 'Server cannot fulfill your request due to unsupported or malformed method name given.', $errors);
    }

    public function patchAction()
    {
        $errors = [
            'code' => Response::STATUS_BAD_REQUEST,
            'description' => "Method patch is not defined or accessible."
        ];
        return $this->errorResponse(Response::STATUS_BAD_REQUEST, 'Invalid method', 'Server cannot fulfill your request due to unsupported or malformed method name given.', $errors);
    }

    protected function dataResponse($data = [], $code = Response::STATUS_OK)
    {
        $response = $this->getResponse();
        $response->setContent([
            'response' => [
                'status' => $code,
            ],
            'data' => $data
        ]);
        return $response;
    }

    protected function prepareResponse()
    {
        return new Response([], Response::STATUS_OK, Response::MIME_JSON);
    }

    protected function successResponse()
    {
        $response = $this->prepareResponse();
        $response->setContent([
            'response' => [
                'status' => Response::STATUS_OK
            ]
        ]);
        return $response;
    }

    protected function authorizationFailedResponse($message)
    {
        $errors = [
            'code' => Response::STATUS_UNAUTHORIZED,
            'message' => $message
        ];
        return $this->errorResponse(Response::STATUS_UNAUTHORIZED, 'Authorization failed', $errors);
    }

    protected function authorize()
    {
        // example usage
        if (false) {
            throw new \BadMethodCallException('None or invalid authorization token given.');
        }
    }
}