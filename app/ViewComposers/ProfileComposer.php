<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\User;

class ProfileComposer
{
    /**
     * The user repository implementation.
     *
     * @var  UserRepository
     */
    protected $users;

    /**
     * Create a new profile composer.
     *
     * @param    UserRepository  $users
     * @return  void
     */
    public function __construct($users)
    {
        // Dependencies automatically resolved by service container...
        $this->users = $users;
    }

    /**
     * Bind data to the view.
     *
     * @param    View  $view
     * @return  void
     */
    public function compose(View $view)
    {
        $data = User::all();
        $view->with('count', $this->users->count());
    }
}
