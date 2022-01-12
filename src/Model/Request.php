<?php
namespace App\Model;
use Stringable;

#[\Symfony\Component\DependencyInjection\Attribute\Autoconfigure]
class Request
{
    #[Log]
    private string $request;

    #[Log]
    private string $response;

    #[Log]
    private string $requestHeaders;

    #[Log]
    private string $responseHeaders;

}