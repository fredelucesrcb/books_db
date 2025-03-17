<?php
header('Content-type: application/json');

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'books_db_fredeluces';

$method = $_REQUEST['action'];
$conn = mysqli_connect($server, $user, $password, $db);


switch ($method) {
    case 'GET':
        $array = [];
        $sql = "SELECT * FROM books";

        $results = $conn->query($sql);

        while($row = $results->fetch_assoc()){
            $array[] = $row;
        }

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($array);

        break;
    case 'CREATE':

        $title = $_POST['title'];
        $isbn = $_POST['isbn'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];
        $year_published = $_POST['year_published'];
        $category = $_POST['category'];
        

        $sql = "INSERT INTO books (title, isbn, author, publisher, year_published, category) VALUES ('$title', '$isbn', '$author', '$publisher', '$year_published', '$category')";

        header('Content-Type: application/json; charset=utf-8');

        if ($conn->query($sql) === TRUE) {

            $sql2 = "SELECT * FROM books ORDER BY id DESC limit 1";

            $latest = $conn->query($sql2)->fetch_assoc();

            echo json_encode([
                "latest" => $latest, "message" => "New record created successfully"
            ]
            );
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

        break;

    case 'EDIT':

            $title = $_POST['title'];
            $isbn = $_POST['isbn'];
            $author = $_POST['author'];
            $publisher = $_POST['publisher'];
            $year_published = $_POST['year_published'];
            $category = $_POST['category'];
            $id = $_POST['id'];
            
    
            $sql = "INSERT INTO books (title, isbn, author, publisher, year_published, category) VALUES ('$title', '$isbn', '$author', '$publisher', '$year_published', '$category')";

            $sql = "UPDATE books SET title='$title', isbn='$isbn', author='$author', publisher='$publisher', year_published='$year_published', category='$category' WHERE id = $id";
    
            header('Content-Type: application/json; charset=utf-8');
    
            if ($conn->query($sql) === TRUE) {
    
                $sql2 = "SELECT * FROM books WHERE id=$id";
    
                $updated = $conn->query($sql2)->fetch_assoc();
    
                echo json_encode([
                    "updated" => $updated, "message" => "Edited Successfully"
                ]
                );
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
    
            break;
    case 'DELETE':
            $id = $_POST['id'];

            $sql = "DELETE FROM books WHERE id = $id";
    
            header('Content-Type: application/json; charset=utf-8');
    
            if ($conn->query($sql) === TRUE) {
        
                echo json_encode([
                    "deleted" => ["id" => $id], "message" => "Edited Successfully"
                ]
                );
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
    
        break;          
    default:
        header('Content-Type: application/json; charset=utf-8');

        echo json_encode([
            "message" => "Invalid Method"
        ]);
        break;
}


 