<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 15/05/2018
 * Time: 14:14
 */

namespace App\Entity;


class Menu
{

    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $menuName;
    /**
     * @var string
     */
    private $starter;
    /**
     * @var string
     */
    private $starterDescription;
    /**
     * @var string
     */
    private $dish;
    /**
     * @var string
     */
    private $dishDescription;
    /**
     * @var string
     */
    private $dessert;
    /**
     * @var string
     */
    private $dessertDescription;

    public function __construct(
        int $id,
        string $menuName,
        string $starter,
        string $starterDescription = null,
        string $dish,
        string $dishDescription = null,
        string $dessert,
        string $dessertDescription = null
    )
    {
        $this->id = $id;
        $this->menuName = $menuName;
        $this->starter = $starter;
        $this->starterDescription = $starterDescription;
        $this->dish = $dish;
        $this->dishDescription = $dishDescription;
        $this->dessert = $dessert;
        $this->dessertDescription = $dessertDescription;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getMenuName(): string
    {
        return $this->menuName;
    }

    /**
     * @param string $menuName
     */
    public function setMenuName(string $menuName): void
    {
        $this->menuName = $menuName;
    }

    /**
     * @return string
     */
    public function getStarter(): string
    {
        return $this->starter;
    }

    /**
     * @param string $starter
     */
    public function setStarter(string $starter): void
    {
        $this->starter = $starter;
    }

    /**
     * @return string
     */
    public function getStarterDescription(): ?string
    {
        return $this->starterDescription;
    }

    /**
     * @param string $starterDescription
     */
    public function setStarterDescription(string $starterDescription): void
    {
        $this->starterDescription = $starterDescription;
    }

    /**
     * @return string
     */
    public function getDish(): string
    {
        return $this->dish;
    }

    /**
     * @param string $dish
     */
    public function setDish(string $dish): void
    {
        $this->dish = $dish;
    }

    /**
     * @return string
     */
    public function getDishDescription(): ?string
    {
        return $this->dishDescription;
    }

    /**
     * @param string $dishDescription
     */
    public function setDishDescription(string $dishDescription): void
    {
        $this->dishDescription = $dishDescription;
    }

    /**
     * @return string
     */
    public function getDessert(): string
    {
        return $this->dessert;
    }

    /**
     * @param string $dessert
     */
    public function setDessert(string $dessert): void
    {
        $this->dessert = $dessert;
    }

    /**
     * @return string
     */
    public function getDessertDescription(): ?string
    {
        return $this->dessertDescription;
    }

    /**
     * @param string $dessertDescription
     */
    public function setDessertDescription(string $dessertDescription): void
    {
        $this->dessertDescription = $dessertDescription;
    }
}
