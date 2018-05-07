<?php

namespace WARP\Response;

use WARP\Exception\NotFoundResponseTypeException;
use WARP\Model\CategoryModel;
use WARP\Model\MediaModel;
use WARP\Model\PostModel;
use WARP\Model\TagModel;
use WARP\Model\TokenModel;

class ResponseParser
{
    const CREATE_POST = 1;
    const CREATE_TOKEN = 2;
    const READ_CATEGORIES = 3;
    const READ_MEDIA = 4;
    const READ_POSTS = 5;
    const READ_TAGS = 6;
    const UPDATE_POST = 7;

    /**
     * @param array $apiResponse The response from the API
     * @param int $type
     * @return mixed
     * @throws NotFoundResponseTypeException When the type is not allowed
     */
    public static function create(array $apiResponse, $type)
    {
        $models = [];
        switch ($type) {
            case self::CREATE_POST:
                return new CreatePostResponse(new PostModel($apiResponse));
            case self::READ_CATEGORIES:
                foreach ($apiResponse as $data) {
                    $models[] = new CategoryModel($data);
                }
                return new ReadCategoriesResponse($models);
            case self::READ_MEDIA:
                foreach ($apiResponse as $data) {
                    $models[] = new MediaModel($data);
                }
                return new ReadMediaResponse($models);
            case self::READ_POSTS:
                foreach ($apiResponse as $data) {
                    $postModel = new PostModel($data);
                    // FIXME Parser takes only into account the query string param `_embed` as set
                    $postModel->setCategories(ResponseParser::create($data['_embedded']['wp:term'][0], ResponseParser::READ_CATEGORIES)->getCategories());
                    $postModel->setMedia(ResponseParser::create($data['_embedded']['wp:featuredmedia'], ResponseParser::READ_MEDIA)->getMedia());
                    $postModel->setTags(ResponseParser::create($data['_embedded']['wp:term'][1], ResponseParser::READ_TAGS)->getTags());
                    $models[] = $postModel;
                }
                return new ReadPostsResponse($models);
            case self::READ_TAGS:
                foreach ($apiResponse as $data) {
                    $models[] = new TagModel($data);
                }
                return new ReadTagsResponse($models);
            case self::CREATE_TOKEN:
                return new CreateTokenResponse(new TokenModel($apiResponse));
            case self::UPDATE_POST:
                return new UpdatePostResponse(new PostModel($apiResponse));
            default:
                throw new NotFoundResponseTypeException('Response type not allowed');
        }
    }
}