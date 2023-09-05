<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class FetchRank implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $url = "https://openpagerank.com/api/v1.0/getPageRank";
        $query = http_build_query(array(
            'domains' => array(
                'google.com',
                'apple.com',
                'unknowndomain.com'
            )
        ));

        $response = Http::withHeaders([
            "API-OPR" => "ws48csg0cow0w4kg0gck4oc8wo80kcg8w0g4s08k"
        ])->get($url, $query);

        dd($response->body());
    }
}