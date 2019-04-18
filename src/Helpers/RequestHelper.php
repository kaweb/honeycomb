<?php

namespace Kaweb\Honeycomb\Helpers;

trait RequestHelper
{
    /**
     * decode json from body
     *
     * @param object $response
     * @return array
     */
    private function getJsonResponse($response)
    {
        return json_decode($response->getBody()->getContents());
    }

}