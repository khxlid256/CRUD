<?php
require_once "conn.php";

if (!$func->isLoggedIn()) {
    header("Location: ./login.php");
}
$usr = $func->fetchUserInfo("username");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DataShop - ds.raihankhalid.my.id</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><!--  -->
    <link rel="stylesheet" href="assets/css/style.css"><!-- Custom CSS for this page  -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <nav class="navbar">
        <a class="navbar-brand text-white mt-1" href="./">
            <h4>TokyoLights | Home</h4>
        </a>
        <a href="logout.php" class="form-inline my-2 my-lg-0 btn btn-danger">Logout</a>
    </nav>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>DataShop - <b><?= $usr;?></b></h2>
                        </div>
                        <div class="col-sm-7">
                            <button type="button" data-toggle="modal" data-target="#formAdd" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Add New Data</span></button>
                            <a href="addAkun.php" type="button" class="btn btn-primary"><i class="material-icons">&#xe7fb;</i> <span>Add New Akun</span></a>

                            <!-- START FORM MODAL TAMBAH DATA -->
                            <div class="modal fade" id="formAdd" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content text-white bg-dark">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">New Data</h5>
                                            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST">
                                                <div class="form-group">
                                                    <input type="text" name="orderID" class="form-control inpt" placeholder="Order ID | #123456">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="alamatIP" class="form-control inpt" placeholder="Alamat IP | 127.0.0.1">
                                                    <p class="mt-1">Note: Jika lebih dari 1 IP, batasi dengan " , " (Koma)</p>
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control inpt mb-1" name="akun">
                                                        <option>akun@example.com</option>
                                                        <option>mydo91@example.com</option>
                                                    </select>
                                                    <a href="addAkun.php" style="text-decoration: none;" class="mt-1">
                                                        <p>+ Tambah akun</p>
                                                    </a>
                                                </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" name="saveData" class="btn btn-primary">Save</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- END FORM MODAL TAMBAH DATA -->

                        </div>
                    </div>
                </div>
                <table class="table form">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order ID</th>
                            <th>IP</th>
                            <th>Akun</th>
                            <th>Date Added</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="#">Michael Holz</a></td>
                            <td>142.93.127.95</td>
                            <td>savagearham3@gmail.com</td>
                            <td>04/10/2013</td>
                            <td><span class="status text-success">&bull;</span> Active</td>
                            <td>
                                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><a href="#">Paula Wilson</a></td>
                            <td>142.93.127.95</td>
                            <td>savagearham3@gmail.com</td>
                            <td>05/08/2014</td>
                            <td><span class="status text-success">&bull;</span> Active</td>
                            <td>
                                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><a href="#">Antonio Moreno</a></td>
                            <td>142.93.127.95</td>
                            <td>savagearham3@gmail.com</td>
                            <td>11/05/2015</td>
                            <td><span class="status text-danger">&bull;</span> Inactive</td>
                            <td>
                                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><a href="#">Mary Saveley</a></td>
                            <td>142.93.127.95</td>
                            <td>savagearham3@gmail.com</td>
                            <td>06/09/2016</td>
                            <td><span class="status text-success">&bull;</span> Active</td>
                            <td>
                                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><a href="#">Martin Sommer</a></td>
                            <td>142.93.127.95</td>
                            <td>savagearham3@gmail.com</td>
                            <td>12/08/2017</td>
                            <td><span class="status text-danger">&bull;</span> Inactive</td>
                            <td>
                                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td><a href="#">Fizy Hafezzy</a></td>
                            <td>142.93.127.95</td>
                            <td>savagearham3@gmail.com</td>
                            <td>12/08/2017</td>
                            <td><span class="status text-danger">&bull;</span> Inactive</td>
                            <td>
                                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text text-white">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>