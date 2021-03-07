<?php


class Recipe
{
    private string $name;
    private array $ingredients = [];

    public function __construct(string $name,array $ingredientsArray)
    {
        $this->name = $name;
        $this->addFewIngredients($ingredientsArray);
    }

    public function addIngredient(Ingredient $ingredients): void{
       $this->ingredients[] = $ingredients;
    }

    public function addFewIngredients(array $arrayOfIngredients): void
    {
        foreach($arrayOfIngredients as $ingredient){
            $this->addIngredient($ingredient);
        }
    }

    public function getRecipeName(): string
    {
        return $this->name;
    }

    public function getRecipeIngredients(): array
    {
        $tempArray = [];
        foreach($this->ingredients as $ingredient)
        {
            $tempArray[] = $ingredient->getName();
        }
        return $tempArray;
    }
}