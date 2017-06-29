<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Model\Menu;


class MenuController extends AdminBaseController
{
   private $view_path = 'admin.menu';

    public function index()
    {
        $menus = Menu::select('id','name','url')->orderBy('order','asc')->parent()->with('allChildren')->get();
        return view($this->view_path.'.index',compact('menus'));
    }

    public function create()
    {
        $dropDownMenus = $this->getDropDownMenus();
        return view($this->view_path.'.create', compact('dropDownMenus'));
    }

    public function save(Request $request)
    {
        Menu::create($request->all());
        return redirect()->route('admin.menu.index')->with($this->sessionMessage('create'));
    }

    public function edit($id)
    {
        $menu = Menu::findorFail($id);
        $dropDownMenus = $this->getDropDownMenus();
        return view($this->view_path.'.edit',compact('menu','dropDownMenus'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findorFail($id);
        $menu->name= $request->get('name');
        $menu->url= $request->get('url');
        $menu->status= $request->get('status');
        $menu->order= $request->get('order');
        $menu->parent_id= $request->get('parent_id');
        $menu->save();
        return redirect()->route('admin.menu.index')->with($this->sessionMessage('update'));
    }



    protected function getDropDownMenus()
    {
        $data = Menu::pluck('name','id');
        $data->prepend('None','');
        return $data;
    }
}
