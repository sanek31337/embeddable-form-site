<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormWidget extends Component
{
    /**
     * @var string
     */
    public $pageUid;

    /**
     * Create a new component instance.
     *
     */
    public function __construct(string $pageUid)
    {
        $this->pageUid = $pageUid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.form-widget', );
    }
}
