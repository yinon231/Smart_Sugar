const divs = document.querySelectorAll('.profile-small');

// Add a click event listener to each div
divs.forEach(function(div) {
  div.addEventListener('click', function() {
    // Navigate to the desired page
    window.location.href = '2.html'; // Replace with your desired page URL
  });
});

function readURL(input) {
   
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function(){
    $("#imageUpload").change(function() {
        console.log(1);
        readURL(this);
    });
    $("#myTab a").click(function(e){
        e.preventDefault();
        $(this).tab("show");
    });
});


// search //
  // Wait for the DOM to load
  document.addEventListener("DOMContentLoaded", function() {

    // Get the search input element
    const searchInput = document.querySelector(".search");
    const footer=document.querySelector("footer");
    // Add event listener to search input for keyup event
    searchInput.addEventListener("keyup", function() {

      // Get the value of the search input
      const searchValue = searchInput.value.toLowerCase();

      // Get all rows of profiles
      const profilesmallRows=document.querySelectorAll(".profile-small");
  

      profilesmallRows.forEach(function(profile){
        const name=profile.querySelector("#bold").textContent.toLowerCase();
        if(name.includes(searchValue)){
          profile.style.display="flex";
          footer.style.position="relative";
          
        }
        else{ profile.style.display="none";
              footer.style.position="absolute";
              footer.style.bottom="0";

        } 

      });
      const profileRows = document.querySelectorAll(".row-profile");
      console.log(profilesmallRows);
      // Loop through each profile row
      profileRows.forEach(function(row) {

        // Get the name of the profile
        const name = row.querySelector(".col-3").textContent.toLowerCase();

        // Check if the name contains the search value
        if (name.includes(searchValue)) {
          // If it does, show the profile row
          row.style.display = "flex";
        } else {
          // If it doesn't, hide the profile row
          row.style.display = "none";
        }
      });
    });

  });


  // active //

  function toggleActive(element) {
    // get all the nav links
    let navLinks = $('.nav-link');
    
    // loop through all the nav links
    navLinks.each(function() {
      // check if the current nav link is the one that was clicked
      if ($(this)[0] === element) {
        // add the active class to the clicked element
        $(this).addClass('active');
        $(this).css('background-color', '#6495ED');
      } else {
        // remove the active class from all other nav links
        $(this).removeClass('active');
        $(this).css('background-color', '');
      }
    });
  }

  // form ensure //
  function submitForm() {
    const form = document.querySelector('.form-container form');
    const errorMessage = document.querySelector('.form-container .error-message');
  
    if (form.checkValidity()) {
      alert("The Profile Saved")
      form.submit();
    } else {
      errorMessage.style.display = 'block';
    }
  }
  
  