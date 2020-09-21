<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Repositories\UserRepository;
use App\Http\Requests\CartRequest;
use App\Http\Requests\ItemInCartRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * CartController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get user cart page.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $cart = $this->userRepository->cart($request->user())->paginate(12);

        return view('cart.items', ['items' => $cart]);
    }

    /**
     * Store new item in cart.
     *
     * @param Request $request
     * @param CartRequest $cartRequest
     * @return RedirectResponse
     */
    public function store(Request $request, CartRequest $cartRequest)
    {
        $model = $cartRequest->get('cartable_type')::findOrFail($cartRequest->get('cartable_id'));

        $this->userRepository->addToCart($request->user(), $model, $cartRequest->get('size'));

        return redirect()->back()->with('success', 'Item has been added to cart.');
    }

    /**
     * Update item in cart.
     *
     * @param Request $request
     * @param ItemInCartRequest $inCartRequest
     * @param CartRequest $cartRequest
     * @return RedirectResponse
     */
    public function update(Request $request, ItemInCartRequest $inCartRequest, CartRequest $cartRequest)
    {
        $user = $request->user();
        $cart = Cart::query()->findOrFail($inCartRequest->get('id'));

        $this->userRepository->updateCart($user, $cart, $cartRequest->get('size'));

        return redirect()->back()->with('success', 'Item has been updated in cart.');
    }

    /**
     * Clear user cart and redirect.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function clear(Request $request)
    {
        $this->userRepository->clearCart($request->user());

        return redirect()->back()->with('info', 'Cart has been clear successfully.');
    }

    /**
     * Delete item in cart.
     *
     * @param Request $request
     * @param ItemInCartRequest $inCartRequest
     * @return RedirectResponse
     */
    public function destroy(Request $request, ItemInCartRequest $inCartRequest)
    {
        $user = $request->user();
        $cart = Cart::query()->findOrFail($inCartRequest->get('id'));

        $this->userRepository->removeCart($user, $cart);

        return redirect()->back()->with('success', 'Item has been deleted in your cart.');
    }
}
