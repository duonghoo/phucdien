<?php

namespace App\Http\ViewComposers\Web;

use App\Models\Menu;
use Illuminate\View\View;
use App\Models\Category;
use Cache;

class MenuComposer
{
    public function compose(View $view)
    {
        $data = [];
        if(Cache::has('mainMenuPc')){
            $mainMenuPc = Cache::get('mainMenuPc');
        }else{
            $mainMenuPc = Menu::find(1);
            Cache::set('mainMenuPc', $mainMenuPc, now()->addHours(24));
        }
        
        if (!empty($mainMenuPc)) {
            $data['mainMenuPc'] = json_decode($mainMenuPc->data, 1);
        }
        if(Cache::has('mainMenuMobile')){
            $mainMenuMobile = Cache::get('mainMenuMobile');
        }else{
            $mainMenuMobile = Menu::find(2);
            Cache::set('mainMenuMobile', $mainMenuMobile, now()->addHours(24));
        }
        if (!empty($mainMenuMobile)) {
            $data['mainMenuMobile'] = json_decode($mainMenuMobile->data, 1);
        }

        // if(Cache::has('menu_footer')){
        //     $menu_footer = Cache::get('menu_footer');
        // }else{
        //     $menu_footer = Menu::find(7);
        //     Cache::set('menu_footer', $menu_footer, now()->addHours(24));
        // }
        // if (!empty($menu_footer)) {
        //     $data['menu_footer'] = json_decode($menu_footer->data, 1);
        // }

        $view->with($data);
    }
}
