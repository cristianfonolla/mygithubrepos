<?php

namespace App\Services;

/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 15/11/16
 * Time: 19:52
 */
use GuzzleHttp\Client;

/**
 * Class GithubService
 * @package App\Services
 */
class GithubService
{

    /**
     * @var mixed
     */
    protected $token;

    protected $guzzle;

    protected $github_api_url = 'https://api.github.com';

    protected $uri = '/user/repos';


    /**
     * GithubService constructor.
     */
    public function __construct(Client $guzzle)
    {

        $this->token = env('GITHUB_TOKEN');
        $this->guzzle = $guzzle;

    }


    /**
     * @return array
     */
    public function obtainRepos()
    {


        $res = $this->guzzle->request('GET',$this->gitHubReposUrl(),

        [


            "auth" => $this->credentials()


        ]);



        return collect(\GuzzleHttp\json_decode($res->getBody()))->pluck('name');


    }

    /**
     * @return string
     */
    private function gitHubReposUrl()
    {

        return $this->github_api_url . $this->uri;

    }

    /**
     *
     */
    private function credentials()
    {

        return ['cristianfonolla', $this->token];

    }
}