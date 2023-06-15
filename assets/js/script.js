document.addEventListener('DOMContentLoaded', function() {
  // Event handler for the "Check Content" button click
  // var admin_menu_bar_check_content_btn = document.getElementById("content-guardian-admin-menu-bar-check-content-btn")
  var admin_menu_bar_check_content_btn = document.getElementById("wp-admin-bar-content-guardian-dropdown")
  admin_menu_bar_check_content_btn.addEventListener('click', function() {
    // Make a request to the WordPress REST API to get the post content
    fetch('/dino/wp-json/wp/v2/posts/30')
      .then(response => response.json())
      .then(data => {
        if(data) {
          const postContent = data.content.rendered;
          callApi(postContent)
        } else {
          console.error('Post not found.');
        }
      })
      .catch(error => {
        // Handle any errors that occurred during the request
        console.error('Error:', error);
      });
  });
  
  var editor_setting_check_content_btn = document.getElementById('editor-setting-check-content-button')
  editor_setting_check_content_btn.addEventListener('click', function() {
    var content = wp.data.select('core/editor').getEditedPostContent();
    callApi(content)
  });
});

function callApi(content) {
  // Make an AJAX request to send the content to the 3rd party API
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'http://localhost:3000/check-content', true);
  xhr.setRequestHeader('Content-Type', 'application/json');
  xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
              // Handle the API response here
              console.log(xhr.responseText);
          } else {
              // Handle errors here
              console.error(xhr.statusText);
          }
      }
  };
  xhr.send(JSON.stringify({ content: content }));
}

