<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextButton extends Component
{

    /**
     * The text title.
     *
     * @var string
     */
    public $title;

    /**
     * The link message.
     *
     * @var string
     */
    public $link;

    /**
     * The link target.
     *
     * @var string
     */
    public $target;

    /**
     * The text style custom.
     *
     * @var string
     */
    public $textStyle;

    /**
     * The label style custom.
     *
     * @var string
     */
    public $labelStyle;

    /**
     * Create the component instance.
     *
     * @param string $title
     * @param string $link
     * @param string $target
     * @param string $textStyle
     * @param string $labelStyle
     */
    public function __construct(
        $title, $link, $target, $textStyle, $labelStyle
    ) {
        $this->title = $title;
        $this->link = $link;
        $this->target = $target;
        $this->textStyle = $textStyle;
        $this->labelStyle = $labelStyle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.auth.text-button');
    }
}
