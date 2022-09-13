<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <style>
        .link{
            text-decoration: none !important;
            color: black;
            font-size: 13px;
        }
        .trash:hover{
            color: red !important;
        }
        .edit:hover{
            color: blue !important;
        }
        .header-title{
            display: flex;
        }
        
    </style>


</head>
<body>
    <div class="container">
        <div class="header-title">
            <h2>Users List</h2>
            <div style="margin:25px 5px;">
                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#add-users">Add <i class='fas fa-plus'></i></button>
            </div>
        </div>
      
       
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th />
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <th scope="row"><?= $user['id'] ?></th>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['address'] ?></td>
                            <td>
                            <a href="/users/list/edit/<?= $user['id'] ?>" class="link edit" ><i class='fas fa-edit'></i></a> |
                            <a href="/users/list/delete/<?= $user['id'] ?>" class="link trash"><i class='fas fa-trash'></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
 

<!-- Create User Modal -->
    <div class="modal fade" id="add-users" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add User</h4>
                </div>
            
                <form action="<?= base_url('users/store') ?>" id="frmUsers" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" name="fullname" required id="exampleInputName1" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAddress1">Address</label>
                            <input type="text" class="form-control" name="address" required id="exampleInputAddress1" placeholder="Enter address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- End Modal -->
</div>

</body>
<script type="text/javascript">


<?php if(session()->getFlashdata('success')){ ?>
    toastr.success("<?php echo session()->getFlashdata('success'); ?>");
<?php }else if(session()->getFlashdata('error')){  ?>
    toastr.error("<?php echo session()->getFlashdata('error'); ?>");
<?php } ?>



</script>
</html>
