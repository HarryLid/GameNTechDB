<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include 'config/conn.php';
include 'adminCheck/navbarCheck.php';
$varMemberID = $_SESSION['fldMemberID'];
?> 
<head>
    <title>Create a Forum</title>
    <style>
      /* Add some styling to make the form look better */
      body {
        background-color: #eee;
        font-family: sans-serif;
        text-align: center;
      }

      form {
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
        margin: 50px auto;
        max-width: 500px;
        padding: 20px;
      }

      label {
        color: #333;
        display: block;
        margin-bottom: 10px;
      }

      input[type="text"],
      input[type="file"] {
        background-color: #f5f5f5;
        border: 1px solid #ccc;
        box-sizing: border-box;
        display: block;
        font-size: 16px;
        margin: 0 0 20px 0;
        padding: 8px;
        width: 100%;
      }

      input[type="submit"] {
        background-color: #333;
        border: none;
        color: #fff;
        cursor: pointer;
        font-size: 16px;
        padding: 12px 20px;
      }

      input[type="submit"]:hover {
        background-color: #444;
      }

      .error {
        color: red;
      }
    </style>
  </head>
  <body>

  <h2> Create Forum Post </h2>

  <form action="process_create_forum_post.php" method="post" enctype="multipart/form-data" onsubmit="return false;">
    <label for="title">Post Title:</label>
    <input type="text" name="title" id="title">
    <div id="titleError" class="error"></div> <!-- Error message placeholder -->
    <br><br>
    <label for="content">Post Content:</label>
    <textarea name="content" id="content" rows="4" cols="50"></textarea>
    <div id="contentError" class="error"></div> <!-- Error message placeholder -->
    <br><br>
    <input type="submit" value="Submit Post" name="submit" onclick="validateForm()">
  </form>

  <script>
    function validateForm() {
      var title = document.getElementById("title").value;
      var content = document.getElementById("content").value;
      var titleError = document.getElementById("titleError");
      var contentError = document.getElementById("contentError");

      if (title.trim() === "") {
        titleError.textContent = "Title cannot be blank";
      } else {
        titleError.textContent = "";
      }

      if (content.trim() === "") {
        contentError.textContent = "Content cannot be blank";
      } else {
        contentError.textContent = "";
      }

      if (title.trim() === "" || content.trim() === "") {
        return false; // Prevent form submission if title or content is blank
      } else {
        return true; // Allow form submission if both title and content are not blank
      }
    }
  </script>

  </body>
</html>
