<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 15/05/2018
 * Time: 15:27
 */

namespace App\Repository;


use App\Entity\Menu;
use App\Libs\Database;

class MenuRepository
{
    const TABLE_NAME_FR = 'menu_fr';
    const TABLE_NAME_EN = 'menu_en';

    const COL_NAME_MENU = 'menu_name';
    const COL_NAME_STARTER = 'starter';
    const COL_NAME_STARTER_DESCRIPTION = 'starter_description';
    const COL_NAME_DISH = 'dish';
    const COL_NAME_DISH_DESCRIPTION = 'dish_description';
    const COL_NAME_DESSERT = 'dessert';
    const COL_NAME_DESSERT_DESCRIPTION = 'dessert_description';

    private $pdo;

    public function __construct()
    {
        $this->pdo = new Database();
    }

    public function getMenu(string $language) :Menu
    {
        $languageMenu = $language === 'fr' ? self::TABLE_NAME_FR : self::TABLE_NAME_EN;

        $query = sprintf('select * from %s', $languageMenu);
        $menu = $this->pdo->query($query, true);

        if (!$menu) {
            return null;
        }
        return new Menu($menu['id'], $menu['menu_name'], $menu['starter'], $menu['starter_description'], $menu['dish'], $menu['dish_description'], $menu['dessert'], $menu['dessert_description']);
    }

    public function updateMenu(Menu $menu, string $language)
    {
        $languageMenu = $language === 'fr' ? self::TABLE_NAME_FR : self::TABLE_NAME_EN;

        $attributes = [
            $menu->getMenuName(),
            $menu->getStarterDescription(),
            $menu->getMenuName(),
            $menu->getDish(),
            $menu->getDishDescription(),
            $menu->getDessert(),
            $menu->getDessertDescription()
        ];

        $query  = sprintf(
            'UPDATE %s 
                    SET %s = ?, %s = ?, %s = ?, %s = ?, %s = ?, %s = ?, %s = ?
                    WHERE id = %s
                    ',
            $languageMenu,
            self::COL_NAME_MENU,
            self::COL_NAME_STARTER,
            self::COL_NAME_STARTER_DESCRIPTION,
            self::COL_NAME_DISH,
            self::COL_NAME_DISH_DESCRIPTION,
            self::COL_NAME_DESSERT,
            self::COL_NAME_DESSERT_DESCRIPTION,
            $menu->getId()
        );

        $this->pdo->update($query, $attributes);
    }
}
