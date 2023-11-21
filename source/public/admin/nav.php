<!DOCTYPE html>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" >ADMIN PANEL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="view_user.php">USER</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="view_comment.php">COMMENT</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ACTION
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="add_recipe.php">ADD RECIPES</a></li>
                                <li><a class="dropdown-item" href="view_recipes.php">VIEW RECIPES</a></li>
                            </ul>
                        </li>
                        <li class="nav-item position-absolute top-25 end-0">
                            <a class="nav-link active" href="logout.php" class="btn btn-danger" role="button">logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>