<?

// Recipe response PHP file for TP9-PHP

$recipes = array ();

$recipes["peachCrisps"] = array();
$recipes["peachCrisps"]["ingredients"] = array();
$recipes["peachCrisps"]["equipment"] = array();
$recipes["peachCrisps"]["directions"] = array();

$recipes["peachCrisps"]["ingredients"][] = "4 cups sliced peaches";
$recipes["peachCrisps"]["ingredients"][] = "1/2 cup all-purpose flour";
$recipes["peachCrisps"]["ingredients"][] = "1/2 cup brown sugar";
$recipes["peachCrisps"]["ingredients"][] = "1/2 cup cold butter";
$recipes["peachCrisps"]["ingredients"][] = "1 teaspoon ground cinnamon";
$recipes["peachCrisps"]["ingredients"][] = "1/4 teaspoon salt";
$recipes["peachCrisps"]["ingredients"][] = "1 cup rolled oats";
  
$recipes["peachCrisps"]["equipment"][] = "Oven";
$recipes["peachCrisps"]["equipment"][] = "8 x 8 baking dish";
$recipes["peachCrisps"]["equipment"][] = "Measuring cups";
$recipes["peachCrisps"]["equipment"][] = "Measuring spoons";
$recipes["peachCrisps"]["equipment"][] = "Bowl";
$recipes["peachCrisps"]["equipment"][] = "Mixing Spoon";
$recipes["peachCrisps"]["equipment"][] = "Knife";
  
$recipes["peachCrisps"]["directions"][] = "Heat oven to 350 degrees F (175 degrees C).";
$recipes["peachCrisps"]["directions"][] = "Arrange sliced peaches evenly in an 8 x 8 baking dish.";
$recipes["peachCrisps"]["directions"][] = "Mix flour, brown sugar, butter, cinnamon, and salt in a bowl until crumbly. Fold oats into flour mixture then sprinkle mixture evenly over peaches, pressing down lightly.";
$recipes["peachCrisps"]["directions"][] = "Bake in the preheated oven (about 30 minutes) until crispy and golden brown on top.";
$recipes["peachCrisps"]["directions"][] = "Let cool and enjoy!"; 


$recipes["twistyCookies"] = array();
$recipes["twistyCookies"]["ingredients"] = array();
$recipes["twistyCookies"]["equipment"] = array();
$recipes["twistyCookies"]["directions"] = array();

$recipes["twistyCookies"]["ingredients"][] = "½ cup white sugar";
$recipes["twistyCookies"]["ingredients"][] = "1 cup packed brown sugar";
$recipes["twistyCookies"]["ingredients"][] = "½ cup butter, softened";
$recipes["twistyCookies"]["ingredients"][] = "2 eggs";
$recipes["twistyCookies"]["ingredients"][] = "2 cups all purpose flower";
$recipes["twistyCookies"]["ingredients"][] = "1 teaspoon baking soda";
$recipes["twistyCookies"]["ingredients"][] = "½ teaspoon salt";
$recipes["twistyCookies"]["ingredients"][] = "1 cup chopped almonds";
$recipes["twistyCookies"]["ingredients"][] = "3 cups semi-sweet chocolate chips";
$recipes["twistyCookies"]["ingredients"][] = "2 teaspoons rum";
$recipes["twistyCookies"]["ingredients"][] = "½ teaspoon whisky";

$recipes["twistyCookies"]["equipment"][] = "Oven";
$recipes["twistyCookies"]["equipment"][] = "13 x 9 pan";
$recipes["twistyCookies"]["equipment"][] = "Measuring cups";
$recipes["twistyCookies"]["equipment"][] = "Can opener, probably";
$recipes["twistyCookies"]["equipment"][] = "Knife";

$recipes["twistyCookies"]["directions"][] = "Preheat oven to 375 degrees(190 degrees C).";
$recipes["twistyCookies"]["directions"][] = "Combine white and brown sugar, butter and eggs. Stir in flour, baking soda and salt. The dough will be stiff.";
$recipes["twistyCookies"]["directions"][] = "Stir in nuts, chocolate chips, rum and whiskey. Drop dough by tablespoonful onto cookie sheet. Bake 8 to 10 minutes.";


$recipes["frenchToast"] = array();
$recipes["frenchToast"]["ingredients"] = array();
$recipes["frenchToast"]["equipment"] = array();
$recipes["frenchToast"]["directions"] = array();

$recipes["frenchToast"]["ingredients"][] = "⅔ cup milk";
$recipes["frenchToast"]["ingredients"][] = "2 large eggs";
$recipes["frenchToast"]["ingredients"][] = "1 teaspoon vanilla extract (Optional)";
$recipes["frenchToast"]["ingredients"][] = "¼ teaspoon ground cinnamon (Optional)";
$recipes["frenchToast"]["ingredients"][] = "salt to taste";
$recipes["frenchToast"]["ingredients"][] = "6 thick slices bread";
$recipes["frenchToast"]["ingredients"][] = "1 tablespoon unsalted butter, or more as needed";

$recipes["frenchToast"]["equipment"][] = "Stove Top";
$recipes["frenchToast"]["equipment"][] = "Skillet";
$recipes["frenchToast"]["equipment"][] = "Measuring cups";
$recipes["frenchToast"]["equipment"][] = "Knife";

$recipes["frenchToast"]["directions"][] = "Whisk milk, eggs, vanilla, cinnamon, and salt together in a shallow bowl.";
$recipes["frenchToast"]["directions"][] = "Lightly butter a griddle and heat over medium-high heat.";
$recipes["frenchToast"]["directions"][] = "Dunk bread in the egg mixture, soaking both sides. Transfer to the hot skillet and cook until golden, 3 to 4 minutes per side. Serve hot.";

$requestedID = $_GET["recipeID"];
$requestedID = htmlspecialchars($requestedID);
$requestedID = filter_var($requestedID, FILTER_SANITIZE_STRING);
// could do one line: $requestedID = filter_var( htmlspecialchars( $_GET["id"] ), FILTER_SANITIZE_STRING);

$requestedList = $_GET["recipeList"];
$requestedList = htmlspecialchars($requestedList);
$requestedList = filter_var($requestedList, FILTER_SANITIZE_STRING);
// could do one line: $requestedID = filter_var( htmlspecialchars( $_GET["list"] ), FILTER_SANITIZE_STRING);

// use $requestedID and $requestedList in the multidimensional array and save it to $requestedOutput
$requestedOutput = $recipes[$requestedID][$requestedList];

// by default, the output JSON will be a 0 for no output
$requestedJSON = "0";

// if $requestedOutput is not nothing, then encode it as JSON into $requestedJSON
if ($requestedOutput != null) {
	$requestedJSON = json_encode($requestedOutput);
}

// output the JSON back to the AJAX request
echo $requestedJSON;

