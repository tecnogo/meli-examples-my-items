<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Tecnogo\LaravelMeliSdk\Facade;
use Tecnogo\MeliSdk\Entity\LoggedUser\ItemSearchResult;

class HomeController extends Controller
{
    const PAGE_SIZE = 10;

    public function index()
    {
        if (!session()->has('access_token')) {
            return $this->login();
        } else {
            return redirect('activas');
        }
    }

    public function logout()
    {
        request()->session()->flush();
        return redirect('/');
    }

    private function login()
    {
        return view('login', [
            'auth_url' => \MeliSdk::getAuthUrl()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \Tecnogo\MeliSdk\Exception\ContainerException
     * @throws \Tecnogo\MeliSdk\Exception\MissingConfigurationException
     * @throws \Tecnogo\MeliSdk\Request\Exception\RequestException
     */
    public function all()
    {
        try {
            $items = $this->createItemSearch()->get();
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
        }

        return $this->table($items);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \Tecnogo\MeliSdk\Exception\ContainerException
     * @throws \Tecnogo\MeliSdk\Exception\MissingConfigurationException
     * @throws \Tecnogo\MeliSdk\Request\Exception\RequestException
     */
    public function active()
    {
        try {
            $items = $this->createItemSearch()->active()->get();
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }

        return $this->table($items);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \Tecnogo\MeliSdk\Exception\ContainerException
     * @throws \Tecnogo\MeliSdk\Exception\MissingConfigurationException
     * @throws \Tecnogo\MeliSdk\Request\Exception\RequestException
     */
    public function paused()
    {
        try {
            $items = $this->createItemSearch()->paused()->get();
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }

        return $this->table($items);
    }

    /**
     * @param $items
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \Tecnogo\MeliSdk\Exception\ContainerException
     * @throws \Tecnogo\MeliSdk\Exception\MissingConfigurationException
     * @throws \Tecnogo\MeliSdk\Request\Exception\RequestException
     */
    private function table($items)
    {
        return view('dashboard', [
            'username' => $this->getMeliSdkClient()->loggedUser()->nickname(),
            'items' => $this->paginate($items),
            'active_count' => $this->countActiveItems(),
            'paused_count' => $this->countPausedItems(),
            'all_count' => $this->countAllItems(),
        ]);
    }

    /**
     * @param ItemSearchResult $searchResult
     * @return LengthAwarePaginator
     */
    private function paginate(ItemSearchResult $searchResult)
    {
        $page = request('page', 1);

        return new LengthAwarePaginator(
            collect($searchResult->items()),
            $searchResult->count(),
            static::PAGE_SIZE,
            $page,
            [
                'path' => Paginator::resolveCurrentPath()
            ]
        );
    }

    /**
     * @param $id
     * @return array
     */
    public function item($id)
    {
        $item = $this->getMeliSdkClient()->item($id);

        return [
            'title' => $item->title(),
            'permalink' => $item->permalink(),
            'sold_quantity' => $item->soldQuantity(),
            'thumbnail' => $item->thumbnail()
        ];
    }

    /**
     * @return Facade
     */
    private function getMeliSdkClient()
    {
        return \MeliSdk::withToken(session()->get('access_token'));
    }

    /**
     * @return int
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \Tecnogo\MeliSdk\Exception\ContainerException
     * @throws \Tecnogo\MeliSdk\Exception\MissingConfigurationException
     * @throws \Tecnogo\MeliSdk\Request\Exception\RequestException
     */
    private function countActiveItems()
    {
        return $this->createItemSearch()
            ->active()
            ->get()
            ->count();
    }

    /**
     * @return int
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \Tecnogo\MeliSdk\Exception\ContainerException
     * @throws \Tecnogo\MeliSdk\Exception\MissingConfigurationException
     * @throws \Tecnogo\MeliSdk\Request\Exception\RequestException
     */
    private function countPausedItems()
    {
        return $this->createItemSearch()
            ->paused()
            ->get()
            ->count();
    }

    /**
     * @return int
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \Tecnogo\MeliSdk\Exception\ContainerException
     * @throws \Tecnogo\MeliSdk\Exception\MissingConfigurationException
     * @throws \Tecnogo\MeliSdk\Request\Exception\RequestException
     */
    private function countAllItems()
    {
        return $this->createItemSearch()
            ->get()
            ->count();
    }

    /**
     * @return \Tecnogo\MeliSdk\Entity\LoggedUser\ItemSearch
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \Tecnogo\MeliSdk\Exception\ContainerException
     * @throws \Tecnogo\MeliSdk\Exception\MissingConfigurationException
     * @throws \Tecnogo\MeliSdk\Request\Exception\RequestException
     */
    private function createItemSearch()
    {
        return $this->getMeliSdkClient()
            ->loggedUser()
            ->items()
            ->orderBy('sold_quantity_desc')
            ->pageSize(static::PAGE_SIZE)
            ->page(request('page', 1));

    }
}
