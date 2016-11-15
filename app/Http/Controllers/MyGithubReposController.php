<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class MyGithubReposController
 * @package App\Http\Controllers
 */
class MyGithubReposController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $githubrepos = [

            'repo1',
            'repo2',
            'repo3'




        ];



        return view('mygithubrepos', compact('githubrepos'));


    }

}
