<?php

namespace Tests\Response;

use PHPUnit\Framework\TestCase;
use WARP\Exception\NotFoundResponseTypeException;
use WARP\Response\CreatePostResponse;
use WARP\Response\CreateTagResponse;
use WARP\Response\CreateTokenResponse;
use WARP\Response\ReadCategoriesResponse;
use WARP\Response\ReadMediaResponse;
use WARP\Response\ReadPostsResponse;
use WARP\Response\ReadTagsResponse;
use WARP\Response\ResponseParser;
use WARP\Response\UpdatePostResponse;

class ResponseParserTest extends TestCase
{
    public function dataProvider()
    {
        return [
          [[], ResponseParser::CREATE_POST, CreatePostResponse::class],
          [[], ResponseParser::CREATE_TAG, CreateTagResponse::class],
          [[], ResponseParser::CREATE_TOKEN, CreateTokenResponse::class],
          [[[], []], ResponseParser::READ_CATEGORIES, ReadCategoriesResponse::class],
          [[[], []], ResponseParser::READ_MEDIA, ReadMediaResponse::class],
          [
            [
              [
                '_embedded' => [
                  'wp:term' => [[['id' => 1]], [['id' => 2]]],
                  'wp:featuredmedia' => [[]]
                ]
              ]
            ],
            ResponseParser::READ_POSTS,
            ReadPostsResponse::class
          ],
          [
            [
              [
                '_embedded' => [
                  'wp:term' => [[], []],
                  'wp:featuredmedia' => []
                ]
              ]
            ],
            ResponseParser::READ_POSTS,
            ReadPostsResponse::class
          ],
          [[[], []], ResponseParser::READ_TAGS, ReadTagsResponse::class],
          [[], ResponseParser::UPDATE_POST, UpdatePostResponse::class],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param array $apiResponse
     * @param int $type
     * @param string $expectedClass
     * @throws NotFoundResponseTypeException
     */
    public function testGetResponse($apiResponse, $type, $expectedClass)
    {
        $response = ResponseParser::create($apiResponse, $type);
        $this->assertSame($expectedClass, get_class($response));
    }

    /**
     * @throws NotFoundResponseTypeException
     */
    public function testException()
    {
        $this->expectException("WARP\Exception\NotFoundResponseTypeException");
        ResponseParser::create([], -1);
    }
}
