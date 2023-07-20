function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
      $('#imagePreview').hide();
      $('#imagePreview').fadeIn(650);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$(document).ready(function() {
  $('#settings').click(function(e) {
    e.preventDefault();
    $('.dropdown-menu').toggle();
});
  $("#imageUpload").change(function() {
    console.log(1);
    readURL(this);
  });
  $("#myTab a").click(function(e) {
    e.preventDefault();
    $(this).tab("show");
  });
});

// Get the search input element
const searchInput = document.querySelector("#search");
if (searchInput) {
  // Add event listener to search input for keyup event
  searchInput.addEventListener("keyup", function() {
    // Get the value of the search input
    const searchValue = searchInput.value.toLowerCase();

    // Get all rows of profiles
    const profilesmallRows = document.querySelectorAll(".profile-small");

    profilesmallRows.forEach(function(profile) {
      const name = profile.querySelector("#bold").textContent.toLowerCase();
      if (name.includes(searchValue)) {
        profile.style.display = "flex";
      } else {
        profile.style.display = "none";
      }
    });

    const profileRows = document.querySelectorAll(".row-profile");
    if (profileRows) {
      // Loop through each profile row
      profileRows.forEach(function(row) {
        // Get the name of the profile
        const name = row.querySelector(".col-3").textContent.toLowerCase();
        if (name) {
          // Check if the name contains the search value
          if (name.includes(searchValue)) {
            // If it does, show the profile row
            row.style.display = "flex";
          } else {
            // If it doesn't, hide the profile row
            row.style.display = "none";
          }
        }
      });
    }
  });
}

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

const formDel = document.querySelectorAll('.deleteForm');
if (formDel) {
  // Add form submit event listener
  formDel.forEach(formDel=>formDel.addEventListener('submit', function(event) {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Display the Bootstrap modal
    var confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
    confirmDeleteModal.show();
    const deleteButton = document.getElementById("delete");
    deleteButton.onclick = () => {
      formDel.submit();
    }
  }));
}

const formDel1 = document.querySelectorAll('.deleteForm1');
if (formDel1) {
  // Add form submit event listener
  formDel1.forEach(formDel1=>formDel1.addEventListener('submit', function(event) {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Display the Bootstrap modal
    var confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
    confirmDeleteModal.show();
    const deleteButton = document.getElementById("delete");
    deleteButton.onclick = () => {
      formDel.submit();
    }
  }));
}
function showTabContent(tabName) {
  // Hide all tab content
  const tabContents = document.querySelectorAll('.tab-content');
  tabContents.forEach(tab => tab.style.display = 'none');

  // Show the selected tab content and add active class to the button
  const selectedTab = document.getElementById(tabName);
  selectedTab.style.display = 'block';
}

function showText(text, tabName,date,id) {
  const originalURL = "http://localhost/First_Submit/patient.php?id="+id;

  // Reset the URL to the original URL
  window.history.replaceState({}, document.title, originalURL);
  const activeTabContent = document.getElementById(tabName).querySelector('.text-container');
  if (activeTabContent) {
      // Update the content inside the existing text container
      activeTabContent.textContent = text;
  } 

  let newURL = window.location.href +'&date='+date;
  window.location.href = newURL;

}

    





