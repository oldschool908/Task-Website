<?php
require './utilities/connection.php';
require 'setenv.php';

if(!isset($_SESSION['loggedIn'])){
    header('Location: login.php');
    exit;
} ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
     <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

<nav class="navbar is-light">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="login.html">
                    <span class="icon is-large">
                <i class="fas fa-home"></i>
              </span>
                    <span>Home</span>
                </a>
                <div class="navbar-burger burger" data-target="navMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div id="navMenu" class="navbar-menu">
                <div class="navbar-start">
                    <!-- navbar link go here -->
                </div>
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                        <a href="task-insert.php" class="button is-success">
                                <span class="icon"><i class="fas fa-user"></i></span>
                                <span>Add New Task</span>
                            </a>
                            <a href="login.php" class="button is-danger">
                                <span class="icon"><i class="fas fa-user"></i></span>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>




    <main role="main" class="container">
        <h1>To-Do List</h1>


    </main>


    <footer class="footer">
  <div class="container">
    <div class="content has-text-left">
      <p><i class="far fa-copyright"></i>
        Footer
      </p>
    </div>
  </div>
</footer>