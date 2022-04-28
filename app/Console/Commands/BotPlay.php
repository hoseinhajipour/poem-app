<?php

namespace App\Console\Commands;

use App\Models\TournamentBoard as TournamentBoardModel;
use Illuminate\Console\Command;

class BotPlay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bot:play';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'all bot play';

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

        $TournamentBoards = TournamentBoardModel::where("bot_user_id", "!=", null)
            ->where('status', "play")
            ->get();

        foreach ($TournamentBoards as $Board) {
            //check bot turn

            //answer question

            //new Tournament

        }

         return 0;
    }
}
