<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class ConsumerKafka extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consumer:kafka';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kafka';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //开始监听消息.
        app('kafkaService')->consumer($group=env('KAFKA_GROUP'), $topics =env('KAFKA_TOPIC'), $url=env('KAFKA_URL'));
        return $this;
    }
}