<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events\RemainingTimeChanged;
use App\Events\WinnerNumberGenerated;

class GameExecutor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:execute';

    private int $time = 15;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bắt đầu chạy game';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        while(true){
            broadcast(new RemainingTimeChanged($this->time.'s'));
            $this->time--;
            sleep(1);

            if($this->time === 0){
                broadcast(new RemainingTimeChanged('Chờ để bắt đầu!'));
                broadcast(new WinnerNumberGenerated(mt_rand(1,12)));

                sleep(5);
                $this->time = 15;
            }
        }
    }
}
