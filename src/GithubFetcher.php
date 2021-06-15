<?php

namespace Peeperklip\GitConnector;

use GuzzleHttp\Client;

class GithubFetcher
{
    private $fetchFrom;
    private $gists;

    public function __construct()
    {
        //https://api.github.com/
        $this->fetchFrom = 'https://api.github.com/users/peeperklip/repos';
        $this->gists = 'https://api.github.com/users/peeperklip/gists';
    }

    public function fetchListOfRepos()
    {
        return $this->fetch($this->fetchFrom, 'repo');
    }

    public function fetchGists()
    {
        return $this->fetch($this->gists, 'gists');
    }

    private function fetch($fetchFrom, $type)
    {
        $client = new Client();

        try {
            if (file_exists(__DIR__ . 'GithubFetcher.php/' . $type)) {
                return file_get_contents(__DIR__ . 'GithubFetcher.php/' .$type);
            }

            $response = $client->request("GET", $fetchFrom);
            $content = $response->getBody()->getContents();

            file_put_contents(__DIR__ . 'GithubFetcher.php/' . $type, $content);
            return $content;
        } catch (\Throwable $exception) {
            return '{}';
        }
    }
}
