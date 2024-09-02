<?php
include("connection.php");
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <div class="container">
            <h1>user detail</h1>
            <form action="" method="post">

            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input
                    type="text"
                    name="uname"
                    id=""
                    class="form-control"
                    placeholder=""
                    aria-describedby="helpId"
                />
           
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    id=""
                    class="form-control"
                    placeholder=""
                    aria-describedby="helpId"
                />
    
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input
                    type="text"
                    name="password"
                    id=""
                    class="form-control"
                    placeholder="dskjfhkjsdhg"
                    aria-describedby="helpId"
                />
      
            </div>
            <button
                type="submit"
                class="btn btn-primary"
                name="userDetail"
            >
                submit
            </button>
            
            </form>
        </div>
        <?php
        if(isset($_POST['userDetail'])){
      $name= $_POST['uname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $query = $pdo->prepare("insert into userdetails(name,email,password)values(:pn,:pe,:pp)");
      $query->bindParam('pn',$name);
      $query->bindParam('pe',$email);
      $query->bindParam('pp',$password);
      $query->execute();
      echo "<script>alert('data insert')</script>";
        }
        ?>
    </body>
</html>

