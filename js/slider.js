let bannerImages = document.querySelectorAll(".slide"),
    leftArrow = document.querySelector("#left"),
  	rightArrow = document.querySelector("#right"),
	  current = 0;

// This function will clear all images from the banner.
function reset()
{
	for (let i = 0; i < bannerImages.length; i++)
	{
		bannerImages[i].style.display = "none";
	}
}

// Although the American spelling of 'initialise' is used here,
// this particular spelling is also generally accepted in Oxford
// English.
// Starts the slider
function initialize()
{
	reset();
	bannerImages[0].style.display = "block";
}

// Show previous slide.
function goLeft()
{
	reset();
	bannerImages[current - 1].style.display = "block";
	current--;
}

// Show next slide.
function goRight()
{
	reset();
	bannerImages[current + 1].style.display = "block";
	current++;
}

// When the left arrow is clicked, show the previous image.
leftArrow.addEventListener("click", function()
{
	// If the first image is displayed, go straight to
	// the last image.
	if (current === 0)
	{
		current = bannerImages.length;
	}
	goLeft();
});

// When the right arrow is clicked, show the next image.
rightArrow.addEventListener("click", function()
{
	// If the first image is displayed, go straight to
	// the last image.
	if (current === bannerImages.length - 1)
	{
		current = -1;
	}
	goRight();
});

initialize();
