<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bootstrap Web Design</title>
    <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
    <?php require 'utils/scripts.php'; ?><!--js links. file found in utils folder-->
</head>
<body>
    <?php require 'utils/header.php'; ?><!--header content. file found in utils folder-->
    <div class="content"><!--body content holder-->
        <div class="container">
            <div class="col-md-12"><!--body content title holder with 12 grid columns-->
                <h1>Contact Us</h1><!--body content title-->
            </div>
        </div>

        <div class="container">
            <div class="col-md-12">
                <hr>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-4 contacts">
                    <h1><span class="glyphicon glyphicon-user"></span> Amith P</h1>
                    <p>
                        <span class="glyphicon glyphicon-envelope"></span> Email: Amith2002@gmail.com<br>
                        <span class="glyphicon glyphicon-phone"></span> Mobile: 8593815480
                    </p>
                </div>

                <div class="col-md-4 contacts">
                    <h1><span class="glyphicon glyphicon-user"></span> Aysha Nazrin</h1>
                    <p>
                        <span class="glyphicon glyphicon-envelope"></span> Email: Aysha2002@gmail.com<br>
                        <span class="glyphicon glyphicon-phone"></span> Mobile: 9593845480
                    </p>
                </div>

                <div class="col-md-4 contacts">
                    <h1><span class="glyphicon glyphicon-user"></span> Arun K S</h1>
                    <p>
                        <span class="glyphicon glyphicon-envelope"></span> Email: Arun2002@gmail.com<br>
                        <span class="glyphicon glyphicon-phone"></span> Mobile: 9583561254
                    </p>
                </div>
            </div>
        </div>
    </div><!--body content div-->
    <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
</body>
</html>
