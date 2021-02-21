<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
    






<!-- eview.min.css" /> -->
</head>
<body>

<div class="container">
<h1>
N level Category
</h1>
<div class="row">
<div class="col-md-6">
<form method="post" id="add_frm" class="form-control">
<lable for="parent_id">SELECT PARENT CATEGORY</label>
<select id="parent_id" name="parent_id" class="form-group">
</select></br></br>
<lable for="category_id">Category Name</label>
<input type="text" name="category_name" id="category_id" class="form-group"/></br></br></br>
<input type="submit" name="action" value="add" class="btn btn-primary"></br>
</form>
</div>
<div class="row">
<div class="col-md-6">
<div id="treeview">
</div>
</div>
</div>
</div>
    <script>
    $(document).ready(function(){
        get_parent();
        get_tree();

        function get_parent()
        {
            $.ajax({
                url:'parent.php',
                success:function(data)
                 {
                    $('#parent_id').html(data);
                    }
                     });
        }
        function get_tree()
        {
            $.ajax({
                url:'fetch.php',
                dataType:'json',
              
                success:function(data)
                 {
                    $('#treeview').treeview(
                        {
                            data:data

                        }
                    );
                    }
                     });
        }
        // add
        $('#add_frm').on('submit', function (event) {

event.preventDefault();

$.ajax({
  type: 'post',
  url: 'add.php',
  data: $(this).serialize(),
  success: function (data) {
    get_parent();
        get_tree();
$('#add_frm')[0].reset();
    alert(data)
  }
});

});



    });
    </script>
</body>
</html>
