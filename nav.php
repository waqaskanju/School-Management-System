<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="index.php">
    <img src="images/logo.svg" width="30" height="30" alt="">
  GHSS Chitor</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="add_student.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Student
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="add_student.php">Add</a>
          <a class="dropdown-item" href="edit_student.php">Edit</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="delete_student.php">Delete</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Marks
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="add_mark">Add</a>
          <a class="dropdown-item" href="update_marks">Edit</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="calculate_position.php">Calculate Position</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="class_result.php"> Class Result</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="print_dmc"> Print DMC</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>