<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Transition extends Component
{

    public $transition;
    public $delay;

    public $startClass;
    public $endClass;


    protected $transitions = [
        'left' => ['translate-x-1/2', 'translate-x-0'],
        'right' => ['-translate-x-1/2', 'translate-x-0'],
        'below' => ['translate-y-1/2', 'translate-y-0'],
        'above' => ['-translate-y-1/2', 'translate-y-0']
    ];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($transition = '', $delay = 500)
    {
        $this->transition = $transition;
        $this->delay = $delay;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $this->_setTransition();


        return view('components.Transition');
    }

    private function _setTransition()
    {
        if (empty($this->transition)) {
            return;
        }
        if (isset($this->transitions[$this->transition])) {
            $this->startClass = reset($this->transitions[$this->transition]);
            $this->endClass = end($this->transitions[$this->transition]);
        } else {
            $this->transition = '';
        }
    }
}
