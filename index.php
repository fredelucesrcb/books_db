<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <div class="container my-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            Create New Book
        </button>
        <table class="table">
            <thead>
                <td>
                    Title
                </td>
                <td>
                    ISBN
                </td>
                <td>
                    Author
                </td>
                <td>
                    Publisher
                </td>
                <td>
                    Year Published
                </td>
                <td>
                    Category
                </td>
                <td colspan="2">
                    Action
                </td>
            </thead>
            <tbody id="tbody">
                
            </tbody>
        </table>

    </div>

<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="mb-3">
                <label for="createTitle" class="form-label">
                    Title
                </label>
                <input type="text" class="form-control" id="createTitle">

                <label for="createIsbn" class="form-label">
                    ISBN
                </label>
                <input type="text" class="form-control" id="createIsbn">

                <label for="createAuthor" class="form-label">
                    Author
                </label>
                <input type="text" class="form-control" id="createAuthor">

                <label for="createPublisher" class="form-label">
                    Publisher
                </label>
                <input type="text" class="form-control" id="createPublisher">

                <label for="createYearpublished" class="form-label">
                    Year Published
                </label>
                <input type="number" class="form-control" id="createYearpublished">

                <label for="createCategory" class="form-label">
                    Category
                </label>
                <input type="text" class="form-control" id="createCategory">  
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="createButton" class="btn btn-primary">CreateBook</button>
      </div>
    </div>
  </div>
</div>




<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit <strong id="editingTitle"></strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
            <div class="mb-3">
                <label for="editTitle" class="form-label">
                    Title
                </label>
                <input type="text" class="form-control" id="editTitle">

                <label for="editIsbn" class="form-label">
                    ISBN
                </label>
                <input type="text" class="form-control" id="editIsbn">

                <label for="editAuthor" class="form-label">
                    Author
                </label>
                <input type="text" class="form-control" id="editAuthor">

                <label for="editPublisher" class="form-label">
                    Publisher
                </label>
                <input type="text" class="form-control" id="editPublisher">

                <label for="editYearpublished" class="form-label">
                    Year Published
                </label>
                <input type="number" class="form-control" id="editYearpublished">

                <label for="editCategory" class="form-label">
                    Category
                </label>
                <input type="text" class="form-control" id="editCategory">  
            </div>
            <input type="hidden" name="id" id="editId">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="editButton">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- delete confirmation modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete <strong id="deleteTitle"></strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you Sure?
        <input type="hidden" name="id" id="deleteId">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
      </div>
    </div>
  </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="script.js">


</script>
</body>
</html>