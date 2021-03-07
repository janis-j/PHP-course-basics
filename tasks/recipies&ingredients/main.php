<?php

require_once 'Recipe.php';
require_once 'Ingredient.php';
require_once 'RecipeCollection.php';
require_once 'IngredientCollection.php';

$grapes = new Ingredient("grapes");
$tomato = new Ingredient("tomato");
$cheese = new Ingredient("cheese");
$chicken = new Ingredient("chicken");
$cucumber = new Ingredient("cucumber");
$sourCream = new Ingredient("sour cream");
$mayonnaise = new Ingredient("mayonnaise");
$pistachios = new Ingredient("pistachios");
$saladLeaves = new Ingredient("salad leaves");

$ingredientCollection = new IngredientCollection;
$ingredientCollection->addFewIngredients([$grapes, $tomato, $cheese, $chicken, $cucumber, $sourCream, $mayonnaise, $pistachios, $saladLeaves]);

$recipeCollection = new RecipeCollection;
$recipeCollection->addRecipe(new Recipe("Fast salad", [$tomato, $cucumber, $saladLeaves, $sourCream]));
$recipeCollection->addRecipe(new Recipe("Pistachio salad", [$chicken, $grapes, $pistachios, $mayonnaise]));
$recipeCollection->addRecipe(new Recipe("Chicken salad", [$chicken, $tomato, $saladLeaves, $mayonnaise, $cheese]));

foreach ($ingredientCollection->getIngredientCollection() as $key => $ingredient) {
    echo "[$key] " . $ingredient->getName() . PHP_EOL;
}

echo PHP_EOL;
$ingredientKeys = explode(' ', (string) readline("Choose witch ingredients you have already (number, space, number, space...): "));
$userIngredientsCollection = new IngredientCollection;
foreach ($ingredientKeys as $ingredientKey) {
    $userIngredientsCollection->addIngredient($ingredientCollection->getIngredientCollection()[$ingredientKey]);
}

echo PHP_EOL;
echo "Available recipes: " . PHP_EOL;
foreach ($recipeCollection->getRecipeCollection() as $recipe) {
    echo $recipe->getRecipeName() . ": " . implode(', ', $recipe->getRecipeIngredients());
    echo PHP_EOL . PHP_EOL;
}
echo "You have: ";
foreach ($userIngredientsCollection->getIngredientCollection() as $ingredient) {
    echo $ingredient->getName() . ', ';
}
echo PHP_EOL;

foreach ($recipeCollection->getRecipeCollection() as $recipe) {
    echo $userIngredientsCollection->getMissingIngredients($recipe) . PHP_EOL;
    echo PHP_EOL;
}



