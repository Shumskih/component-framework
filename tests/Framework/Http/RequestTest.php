<?php

namespace Tests\Framework\Http;

use Zend\Diactoros\ServerRequest;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    public function testEmpty(): void
    {
        $request = (new ServerRequest())
            ->withQueryParams([]);

        self::assertEquals([], $request->getQueryParams());
        self::assertNull($request->getParsedBody());
    }

    public function testQueryParams(): void
    {
        $request = (new ServerRequest())
            ->withQueryParams($data = [
                'name' => 'John',
                'age' => 28
            ]);

        self::assertEquals($data, $request->getQueryParams());
        self::assertNull($request->getParsedBody());
    }

    public function testParsedBody(): void
    {
        $request = (new ServerRequest())
            ->withQueryParams([])
            ->withParsedBody($data = ['title' => 'Title']);

        self::assertEquals([], $request->getQueryParams());
        self::assertEquals($data, $request->getParsedBody());
    }
}
