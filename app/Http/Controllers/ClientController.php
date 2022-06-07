<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aws\Ec2\Ec2Client;
use Atymic\Twitter\Facade\Twitter;
use File;
use Illuminate\Support\Str;


class ClientController extends Controller
{
    
    public function collectTweets()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.twitter.com/2/tweets/search/recent?query=bursa&max_results=50',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
                'Authorization: *********',
                'Cookie: guest_id=*********; guest_id_ads=*********; guest_id_marketing=*********; personalization_id="*********"'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $tweets = array();

        $da = json_decode($response);
        foreach ($da->{'data'} as $key) {
            array_push($tweets, 
                    [
                        'tweetId' => $key->id,
                        'text' => $key->text
                    ]            
                );
        }


        $data = json_encode($tweets);
        $file = 'tweets.json';
        $destinationPath = public_path()."/tweets/";
        if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
        File::put($destinationPath.$file,$data);
      

        return view('welcome')->with('tweets', $tweets);
    }


    public function readTweets()
    {
        $url = public_path().'/tweets/tweets.json';
        $tweets = file_get_contents($url);

        return response()->json([
            'tweets' => $tweets
        ]);
        
    }


    public function getTweetsFromClient()
    {
        $url = public_path().'/tweets/tweets.json';
        $response = file_get_contents($url);

        $tweets = array();

        $da = json_decode($response);

        foreach ($da as $key) {
            array_push($tweets,
                    [
                        'tweetId' => $key->tweetId,
                        'text' => $key->text
                    ]
                );
        }
        
        return $tweets;
    }
}
