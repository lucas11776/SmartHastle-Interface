<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    /**
     * Search for a user in database.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $search = $request->get('q') ?? '';
        $users = $this->userSearchQuery($search)
            ->paginate(20);

        return view('dashboard.user.users', ['users' => $users]);
    }

    /**
     * Builder search user query.
     *
     * @param string $search
     * @return Builder
     */
    private function userSearchQuery(string $search): Builder
    {
        return $users = User::query()
            ->where(function (Builder $query) use($search) {
                $query->where('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('first_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('cellphone_number', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('id', $search);
                foreach (explode(' ', $search) as $term)
                    $query->orWhere('first_name', 'LIKE', '%' . $term . '%')
                        ->orWhere('last_name', '%' . $term . '%');
            });
    }
}
