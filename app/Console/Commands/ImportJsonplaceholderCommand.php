<?php

namespace App\Console\Commands;

use App\Components\ImportDataHttpClient;
use App\Models\Post;
use Illuminate\Console\Command;

class ImportJsonplaceholderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:jsonplaceholder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from jsonplaceholder.typicode.com';

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
        $import = new ImportDataHttpClient();
        $response = $import->client->request('GET', 'posts');
        $data = json_decode($response->getBody()->getContents());

        foreach ($data as $item) {
            Post::firstOrCreate(
                ['title' => $item->title],
                [
                    'user_id' => $item->userId,
                    'title' => $item->title,
                    'content' => $item->body,
                    'category_id' => 1,
                ]
            );
        }
    }
}
