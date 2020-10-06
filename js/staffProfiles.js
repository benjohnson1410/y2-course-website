// WINDOW ONE:
// Get modals.
var m1 = document.getElementById("modal1");
var m2 = document.getElementById("modal2");
var m3 = document.getElementById("modal3");
var m4 = document.getElementById("modal4");
var m5 = document.getElementById("modal5");

// Get open buttons.
var modBtn = document.getElementsByClassName("more");

// Get close buttons.
var closeBtn = document.getElementsByClassName("close");


// Listen for a click outside the modal.
window.addEventListener("click", clickOutside);

// Open one of five modals using this for loop.
for (var i = 0; i < modBtn.length; i++)
{
  // Assign a new variable, selectedBtn, to the value of the
  // selected button.
  var selectedBtn = modBtn[i];
  // Listen for click - when the user clicks, open the modal.
  selectedBtn.addEventListener("click", function()
  {
    // Get modals - each modal has an attached data-attribute.
    var modal = document.getElementById(this.dataset.modal);
    modal.style.display = "block";
  }, false);
}

// When the user clicks outside the modal, use this function
// to close the model.
function clickOutside(evt)
{
  if (evt.target == m1)
  {
    m1.style.display = "none";
  }
  if (evt.target == m2)
  {
    m2.style.display = "none";
  }
  if (evt.target == m3)
  {
    m3.style.display = "none";
  }
  if (evt.target == m4)
  {
    m4.style.display = "none";
  }
  if (evt.target == m5)
  {
    m5.style.display = "none";
  }
}
