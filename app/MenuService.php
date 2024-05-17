<?php

class MenuService
{
    public function getMenuData()
    {
        return Menu::with('children')->orderBy('lft')->get()->toTree();
    }

    public function createMenu(array $data)
    {
        $validator = Menu::validateMenu($data);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return Menu::create($data);
    }

    public function updateMenu(Menu $menu, array $data)
    {
        $validator = Menu::validateMenu($data);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $menu->update($data);
        return $menu;
    }
}