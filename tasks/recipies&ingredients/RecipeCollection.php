<?php

class RecipeCollection
{
    private array $collection;

    public function addRecipe(Recipe $recipe)
    {
        $this->collection[] = $recipe;
    }

    public function getRecipeCollection(): array
    {
        return $this->collection;
    }
}