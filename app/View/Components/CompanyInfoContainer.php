<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CompanyInfoContainer extends Component
{
    public $title;
    public $show_payments;

    public function __construct($title = '', $show_payments = false)
    {
        $this->title = $title;
        $this->show_payments = $show_payments;
    }

    public function render()
    {
        return view('components.company_info_container');
    }
}
