<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Menu;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function showProfile()
    {
        $merchant = auth()->user()->merchant;
        return view('merchant.profile', compact('merchant'));
    }

    public function updateProfile(Request $request)
    {
        $merchant = auth()->user()->merchant;
        $merchant->update($request->all());
        return back()->with('success', 'Profile updated!');
    }

    public function showMenus()
    {
        $menus = Menu::where('merchant_id', auth()->id())->get();
        return view('merchant.menus.index', compact('menus'));
    }

    public function createMenu(Request $request)
    {
        $menu = Menu::create($request->all());
        return redirect()->route('merchant.menus.index')->with('success', 'Menu created!');
    }

    public function deleteMenu($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return back()->with('success', 'Menu deleted!');
    }
}