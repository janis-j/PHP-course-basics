<?php

class IngredientCollection
{
    private array $collection;

    public function addIngredient(Ingredient $ingredient): void
    {
        $this->collection[] = $ingredient;
    }

    public function addFewIngredients(array $ingredients): void
    {
        foreach ($ingredients as $ingredient) {
            $this->addIngredient($ingredient);
        }
    }

    public function getIngredientCollection(): array
    {
        return $this->collection;
    }

    public function getIngredientCollectionNames(): array
    {
        $tempArray = [];
        foreach ($this->collection as $ingredient) {
            $tempArray[] = $ingredient->getName();
        }
        return $tempArray;
    }

    public function getMissingIngredients(Recipe $recipe): string
    {
        $missingIngredients = [];
        foreach ($recipe->getRecipeIngredients() as $ingredient) {
            if (!in_array($ingredient, $this->getIngredientCollectionNames()))
                $missingIngredients[] = $ingredient;
        }
        if (count($missingIngredients) === 0) {
            return "Great!!! You have all necessary ingredients for " . $recipe->getRecipeName() . ".";
        } else {
            return "For " . $recipe->getRecipeName() . " you are still missing: " . implode(', ', $missingIngredients);
        }
    }
}