<?php

namespace App\Http\Controllers;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;


class FirebaseController extends Controller
{
    public function index()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://bureau-ordre.firebaseio.com/')
        ->create();
        $database = $firebase->getDatabase();
        $newPost = $database
        ->getReference('bureau-ordre/posts')
        ->push([
        'title' => 'Post title',
        'body' => 'This should probably be longer.'
        ]);

        echo"<pre>";
        print_r($newPost->getvalue());
    }    
}
