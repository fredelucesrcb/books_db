$(document).ready(function () {   
    const BASE_URL = 'books_db';

    $.ajax({
        type: "GET",
        url: `http://localhost/${BASE_URL}/controllers/BooksController.php?action=GET`,
        cache: false,
        success: function(data){
            $.each( data, function( key, value ) {
                $("#tbody").append(`
                    <tr id=book-${value['id']}>
                        <td>${value['title']}</td>
                        <td>${value['isbn']}</td>
                        <td>${value['author']}</td>
                        <td>${value['publisher']}</td>
                        <td>${value['year_published']}</td>
                        <td>${value['category']}</td>
                        <td>
                            <button type="button" class="btn btn-warning editModalBtn" >Edit</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger deleteModalBtn">Delete</button>
                        </td>

                    </tr>
                `);
              });
           
        }
      });

// Create New Book
     $('#createButton').on('click', function () {
        let title = $("#createTitle").val();
        let isbn = $("#createIsbn").val();
        let author = $("#createAuthor").val();
        let publisher = $("#createPublisher").val();
        let year_published = $("#createYearpublished").val();
        let category = $("#createCategory").val();

        $.ajax({
            type: "POST",
            url: `http://localhost/${BASE_URL}/controllers/BooksController.php?action=CREATE`,
            data: {
                title: title,
                isbn: isbn,
                author: author,
                publisher: publisher,
                year_published: year_published,
                category: category
            },
            dataType : 'json',
            success: function(data){
                let latest = data['latest']
                $("#tbody").append(`
                    <tr id=book-${latest['id']}>
                        <td>${latest['title']}</td>
                        <td>${latest['isbn']}</td>
                        <td>${latest['author']}</td>
                        <td>${latest['publisher']}</td>
                        <td>${latest['year_published']}</td>
                        <td>${latest['category']}</td>
                        <td>
                            <button type="button" class="btn btn-warning editModalBtn" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger deleteModalBtn">Delete</button>
                        </td>

                    </tr>
                `);

            $('#createModal').modal('toggle');
            }
        });
    });
//end Create Book    


//Edit Book
     $(document).on('click', '#editButton' ,function () {
        let title = $("#editTitle").val();
        let isbn = $("#editIsbn").val();
        let author = $("#editAuthor").val();
        let publisher = $("#editPublisher").val();
        let year_published = $("#editYearpublished").val();
        let category = $("#editCategory").val();
        let id = $("#editId").val();

        $.ajax({
            type: "POST",
            url: `http://localhost/${BASE_URL}/controllers/BooksController.php?action=EDIT`,
            data: {
                title: title,
                isbn: isbn,
                author: author,
                publisher: publisher,
                year_published: year_published,
                category: category,
                id: id
            },
            dataType : 'json',
            success: function(data){
                let updatedData = data['updated']
                

                let row = $(`#book-${updatedData['id']}`);

                row.find("td:eq(0)").text(updatedData['title']);
                row.find("td:eq(1)").text(updatedData['isbn']);
                row.find("td:eq(2)").text(updatedData['author']);
                row.find("td:eq(3)").text(updatedData['publisher']);
                row.find("td:eq(4)").text(updatedData['year_published']);
                row.find("td:eq(5)").text(updatedData['category']);

                $('#editModal').modal('toggle');

            }
        });
    });
//end Edit Book

// start delete book
    $(document).on('click', '#deleteButton' ,function () {
        let id = $('#deleteId').val();

        $.ajax({
            type: "POST",
            url: `http://localhost/${BASE_URL}/controllers/BooksController.php?action=DELETE`,
            data: {
                id: id
            },
            dataType : 'json',
            success: function(data){
                let deletedData = data['deleted'];

                let row = $(`#book-${deletedData['id']}`);

                row.remove();
                
                $('#deleteModal').modal('toggle');

            }
        });
    });
// end delete book

    $(document).on('click', '.editModalBtn', function () {

        let row = $(this).closest('tr');
        let id = row.attr('id').split('-')[1];

        $('#editingTitle').text((row.children()[0].innerHTML))

        $("#editTitle").val(row.children()[0].innerHTML);
        $("#editIsbn").val(row.children()[1].innerHTML);
        $("#editAuthor").val(row.children()[2].innerHTML);
        $("#editPublisher").val(row.children()[3].innerHTML);
        $("#editYearpublished").val(row.children()[4].innerHTML);
        $("#editCategory").val(row.children()[5].innerHTML);
        $("#editId").val(id);


        $('#editModal').modal('show'); 
    });

    $(document).on('click', '.deleteModalBtn' ,function () {
        let row = $(this).closest('tr');
        let id = row.attr('id').split('-')[1];
        let title = row.children()[0].innerHTML;

        $('#deleteTitle').text(title);
        $('#deleteId').val(id);

        $('#deleteModal').modal('show'); 
    });
});




