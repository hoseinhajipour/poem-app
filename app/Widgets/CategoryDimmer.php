<?php

namespace App\Widgets;

use App\Models\Quiz;
use App\Models\QuizCategory;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;

class CategoryDimmer extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $categories = QuizCategory::all();
        $text = "";
        foreach ($categories as $cat) {
            $count_approve = Quiz::where("category_id", $cat->id)->where("status", "approve")->count();
            $count_pending = Quiz::where("category_id", $cat->id)->where("status", "pending")->count();
            $count_reject = Quiz::where("category_id", $cat->id)->where("status", "reject")->count();
            $text .= "<p><a href='/admin/quizzes?key=category_id&filter=equals&s=$cat->name' class='btn btn-primary'> ";
            $text .= $cat->name . " ( approve: $count_approve , pending: $count_pending , reject: $count_reject )";
            $text .= "</a></p>";
        }
        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-news',
            'title' => "categories",
            'text' => $text,
            'button' => [
                'text' => __('Go categories page'),
                'link' => route('voyager.quiz-categories.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('Post'));
    }
}
