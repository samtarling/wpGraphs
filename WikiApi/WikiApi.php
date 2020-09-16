<?php
declare(strict_types=1);

namespace WikiApi;

class WikiApi
{
    /**
     * Return the count of the pages in a given category
     *
     * @param String $categoryId The page ID of the category
     * @return String
     */
    public function getCategoryPageCount($categoryId) {
        $categoryId = urlencode($categoryId);
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://en.wikipedia.org/w/api.php?action=query&format=json&prop=categoryinfo&pageids='.$categoryId);

        $jsonResponse = json_decode($response->getBody()->getContents(), true);

        if (array_key_exists('categoryinfo', $jsonResponse['query']['pages'][$categoryId])) {

            $pageCount = $jsonResponse['query']['pages'][$categoryId]['categoryinfo']['pages'];

            return $pageCount;

        } else {

            return false;

        }
    }
}