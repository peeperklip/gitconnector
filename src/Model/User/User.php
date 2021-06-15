<?php

declare(strict_types=1);

namespace Peeperklip\GitConnector\Model\User;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

final class User
{
    private $response;

    public function __construct(string $user)
    {
        $url = "https://api.github.com/users/{$user}";
        $client = new Client();
        try {
            $rawResponse = $client->request('GET', $url)->getBody()->getContents();
            $this->response = json_decode($rawResponse);
        } catch (GuzzleException $e) {
            //maybe log
        }
    }

    public function getlogin()
    {
        return $this->getProperty('login');
    }

    public function getid()
    {
        return $this->getProperty('id');
    }

    public function getnode_id()
    {
        return $this->getProperty('node_id');
    }

    public function getavatar_url()
    {
        return $this->getProperty('avatar_url');
    }

    public function getgravatar_id()
    {
        return $this->getProperty('gravatar_id');
    }

    public function geturl()
    {
        return $this->getProperty('url');
    }

    public function gethtml_url()
    {
        return $this->getProperty('html_url');
    }
    public function gettype()
    {
        return $this->getProperty('type');
    }

    public function getsite_admin()
    {
        return $this->getProperty('site_admin');
    }

    public function getname()
    {
        return $this->getProperty('name');
    }

    public function getcompany()
    {
        return $this->getProperty('company');
    }

    public function getblog()
    {
        return $this->getProperty('blog');
    }

    public function getlocation()
    {
        return $this->getProperty('location');
    }

    public function getemail()
    {
        return $this->getProperty('email');
    }

    public function gethireable()
    {
        return $this->getProperty('hireable');
    }

    public function getbio()
    {
        return $this->getProperty('bio');
    }

    public function gettwitter_username()
    {
        return $this->getProperty('twitter_username');
    }
    public function getpublic_repos()
    {
        return $this->getProperty('public_repos');
    }
    public function getpublic_gists()
    {
        return $this->getProperty('public_gists');
    }
    public function getfollowers()
    {
        return $this->getProperty('followers');
    }
    public function getfollowing()
    {
        return $this->getProperty('following');
    }
    public function getcreated_at()
    {
        return $this->getProperty('created_at');
    }

    public function getupdated_at()
    {
        return $this->getProperty('updated_at');
    }

    private function getProperty($key)
    {
        return $this->response[$key];
    }
}
