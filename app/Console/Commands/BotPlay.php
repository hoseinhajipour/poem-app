<?php

namespace App\Console\Commands;

use App\Models\Quiz;
use App\Models\QuizCategory;
use App\Models\Tournament;
use App\Models\TournamentBoard as TournamentBoardModel;
use App\Models\TournamentQuiz;
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
            $Currenttournament = $Board->getAttribute('tournament_0' . $Board->current_turn);
            if ($Currenttournament->bot_user_id == $Currenttournament->first_user_id) {
                if (!isset($Currenttournament->first_user_true_answer)) {
                    //answer question
                    $true_answer = random_int(0, 3);
                    $Currenttournament->first_user_true_answer = $true_answer;
                    $Currenttournament->save();
                    //new Tournament
                    $this->CreateNewTournament($Board);
                }
            } else {
                if (!isset($Currenttournament->second_user_true_answer)) {
                    //answer question
                    $true_answer = random_int(0, 3);
                    $Currenttournament->second_user_true_answer = $true_answer;
                    $Currenttournament->save();
                    //checkWinner

                    //new Tournament
                    $this->CreateNewTournament($Board);
                }
            }
        }
        return 0;
    }

    function CreateNewTournament($Board)
    {
        if ($Board->current_turn <= 5) {
            $category = QuizCategory::where('status', 'active')
                ->inRandomOrder()
                ->get()
                ->take(1);

            $Tournament = new  Tournament();
            $Tournament->first_user_id = $Board->first_user_id;
            $Tournament->second_user_id = $Board->second_user_id;
            $Tournament->category_id = $category[0]->id;
            $Tournament->status = "play";

            $questions = Quiz::where("category_id", $category[0]->id)
                ->where('status', 'approve')
                ->inRandomOrder()
                ->get()
                ->take(setting('gamesetting.quiz_count_per_tournament'));

            foreach ($questions as $quest) {
                $appendQuizz = new TournamentQuiz();
                $appendQuizz->tournament_id = $Tournament->id;
                $appendQuizz->quiz_id = $quest->id;
                $appendQuizz->save();
            }

            $Board->current_turn++;
            $Board->setAttribute('tournament_0' . $Board->current_turn, $Tournament->id);
            //change next user_category_selector
            if ($Board->user_category_selector == $Board->bot_user_id) {
                if ($Board->user_category_selector == $Board->first_user_id) {
                    $Board->user_category_selector = $Board->second_user_id;
                } else {
                    $Board->user_category_selector = $Board->first_user_id;
                }
            }
            $Board->save();
        } else {
            //end game
        }

    }
}
