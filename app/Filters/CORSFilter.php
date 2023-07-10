<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CORSFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Add headers to allow cross-origin requests
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

        // If it's a preflight request, return the response immediately
        if ($request->getMethod() === 'options') {
            return;
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No implementation needed
    }
}
