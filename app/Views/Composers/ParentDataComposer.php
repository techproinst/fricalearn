<?php

namespace App\Views\Composers;

use App\Helpers\AppHelper;
use Illuminate\View\View;

class ParentDataComposer
{
    /**
     * Create a new class instance.
     */
    public function __construct(private AppHelper $appHelper)
    {
        
    }

    public function compose(View $view)
    {
       $parent = $this->appHelper->getAuthParent();

       $view->with('parentInfo', $parent);
    }
}
