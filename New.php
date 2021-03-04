<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskHub - Welcome!</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>
<body>

<div class="left-block-container">
    <div class="header-block-container">
        <div class="logo-container">
            <a href="index.html"><img src="images/TaskHub LOGO.svg" alt="TaskHub"></a>
        </div>
        <div class="search-container">
            <p>Find models <input type="text" id="searchBar"></p>
        </div>
    </div>
    <div class="content-block-container">
        <div class="navbar-container">
            <div class="svg-container">
                <li><a href="Tasks.php"><img src="images/clipboards.svg" alt="My tasks" style="width: 1.5em; height: auto;"></a></li>
                <li><a href="New.php"><img src="images/pen.svg" alt="Create a new Model" style="width: 1.5em; height: auto;"></a></li>
                <li><a href="Browse.php"><img src="images/search.svg" alt="Browse models" style="width: 1.5em; height: auto;"></a></li>
                <li><a href="Profile.php"><img src="images/user.svg" alt="My profile" style="width: 1.5em; height: auto;"></a></li>
            </div>
            <div class="list-container">
                <ul>
                    <li><a href="Tasks.php">My Tasks</a></li>
                    <li><a href="New.php" id="current">New Model</a></li>
                    <li><a href="Browse.php">Browse Models</a></li>
                    <li><a href="Profile.php">My Profile</a></li>
                </ul>
            </div>
        </div>
        <div class="middle-container" style="display: flex;">
            <div class="title-container">
                <p>Model's name</p>
                <p>Description</p>
                <p>Main goal</p>
                <p>Deadline</p>
                <a href="#">ADD NEW STEPS + </a>

                <p>Comments</p>
                <a href="jaj.php">patata</a>
            </div>
            <div class="text-area-container" style="display: grid;">

                <form name="steps-container" id="steps">
                    <table class="table table-bordered" id="dynamic_field">
                        <tr>
                            <td><input type="text" name="name[]" id="name" class="form-control name_list" placeholder="place your name"></td>
                            <td><button type="button" name="add" id="add">add moars</button></td>
                        </tr>
                    </table>
                    <input type="button" name="submit" id="submit" value="submit">
                </form>

                <!-- <input type="text" name="model-name" id="#">
                <input type="text" name="model-description" id="#">
                <input type="text" name="model-goal" id="#">
                <input type="date" name="model-deadline" id="#">
                <input type="text" name="model-comment" id="#"> -->
            </div>
        </div>
    </div>
</div>
<div class="right-block-container">
    <div class="user-info">
        <img src="images/user.svg" alt="User profile" style="width: 6em; height: auto;">
        <p>$username</p>
    </div>
</div>

</body>
</html>

<script>
    $(document).ready(function(){
        var i = 1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" id="name" class="form-control name_list" placeholder="place your name"></td><td><button name="remove" id="'+i+'">remov</button></td></tr>');
        });
        $(document).on('click', '.remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });

        $('#submit').click(function(){
            $.ajax({
                url:"name.php",
                method:"POST",
                data:$('#steps-container').serialize(),
                success:function(data)
                {
                    alert(data);
                    $('#steps-container')[0].reset();
                }
            });
        });

    });
</script>