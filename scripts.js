/* JavaScript for TP9-PHP */

// AJAX function
function loadFileInto(recipeID, listName, whereTo) {

	// 1. creating a new XMLHttpRequest object
	ajax = new XMLHttpRequest();
	
	// 2. define the fromFile variable with the passed recipe name and list
	fromFile = "recipes.php?recipeID=" + recipeID + "&recipeList=" + listName;
	
	console.log("From URL: " + fromFile); // output the URL result to the browser's devtools console

	// 3. defines the GET/POST method, the source, and the async value of the AJAX object
	ajax.open("GET", fromFile, true);

	// 4. provides code to do something in response to the AJAX request
	ajax.onreadystatechange = function() {

		if ((this.readyState == 4) && (this.status == 200)) { // if .readyState is 4, the process is done; and if .status is 200, there were no HTTP errors

			console.log("AJAX response: " + this.responseText);
		
			if (this.responseText != 0) {
				// parse the JSON into an array
				responseArray = JSON.parse(this.responseText);

				// loop through the array to build up <li> tags for the list
				responseHTML = "";
				for (x=0; x < responseArray.length; x++) {
						responseHTML += "<li>" + responseArray[x] + "</li>";
				}

				// update the DOM with the responseHTML
				document.querySelector(whereTo).innerHTML = responseHTML;
				
			} else {
				console.log("Error: no recipe/list found.");	
			}

		} else if ((this.readyState == 4) && (this.status != 200)) { // if .readyState is 4, the process is done; and if .status is NOT 200, output the error into the console

			console.log("Error: " + this.responseText);

		}

	} // end ajax.onreadystatechange function

	// 5. let's go -- initiate request and process the responses
	ajax.send();

}

// write a generic recipe object constructor
function Recipe(recipeTitle, recipeImageSrc, recipeContributor, recipeID) {
	
  this.title = recipeTitle;
	this.imgSrc = recipeImageSrc;
  this.contributor = recipeContributor;
	this.id = recipeID;
	
	this.displayRecipe = function() {
		
		layoutTitle = document.querySelectorAll("#titleBanner h1");
		layoutTitle[0].innerHTML = this.title;
		
		layoutContributor = document.querySelectorAll("#titleBanner h3");
		layoutContributor[0].innerHTML = "Contributed by " + this.contributor;
		
		document.getElementById("titleBanner").style.backgroundImage = "url(" + this.imgSrc + ")";
		
		loadFileInto(this.id, "ingredients", "#ingredients ul");
		loadFileInto(this.id, "equipment", "#equipment ul");
		loadFileInto(this.id, "directions", "#directions ol");
		
	}
}

PeachCrisps = new Recipe(
  "Peach Crisps",
  "Zaire Moon",
  "https://images.unsplash.com/photo-1639588473831-dd9d014646ae?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80",
  "peachCrisps"
);

TwistyCookies = new Recipe(
  "Twisty Cookies",
  "Mark Filip",
  "https://images.unsplash.com/photo-1499636136210-6f4ee915583e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80",
  "twistyCookies"
);

FrenchToast = new Recipe(
  "French Toast",
  "Andrew Witsoe",
  "https://andrewwitsoe.reclaim.hosting/tp4/frenchtoast.jpg",
  "frenchToast"
);


window.onload = function() {

  document.querySelector("#firstRecipe").onclick = function() {
    PeachCrisps.displayRecipe();
  }

  document.querySelector("#secondRecipe").onclick = function() {
    TwistyCookies.displayRecipe();

    document.querySelector("#thirdRecipe").onclick = function() {
      FrenchToast.displayRecipe();
    }
    
  }
  
  
} // end window.onload