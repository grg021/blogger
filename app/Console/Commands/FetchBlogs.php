<?php

namespace App\Console\Commands;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchBlogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blogs:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch blogs from 3rd party API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $links = [
            'https://sq1-api-test.herokuapp.com/posts',
        ];

        foreach ($links as $link) {
            $response = Http::get($link);
            if($response->ok()) {
                $data = $response->json();
                BlogPost::createFromData($data);
            }
        }

        return 0;
    }

}
