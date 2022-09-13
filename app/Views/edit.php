<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <style>
         .link{
            text-decoration: none !important;
            color: black;
           
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <div class="container">
            <form action="<?= base_url('users/list/update/'.esc($id)) ?>" id="frmUsers" method="post">
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" required name="fullname" value="<?= esc($name) ?>" id="exampleInputName1" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="exampleInputAddress1">Address</label>
                    <input type="text" class="form-control" required name="address" value="<?= esc($address) ?>" id="exampleInputAddress1" placeholder="Enter address">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" required name="email" value="<?= esc($email) ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
              
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-default"><a class="link" href="/">Cancel</href></button>
            </form>
        </div>
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
