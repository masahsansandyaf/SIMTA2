<?= $this->extend('layouts/admin') ?>
<?php $this->section('styles') ?>
<!-- Custom styles for this page -->
<link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?> " rel="stylesheet">
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <?php
        if(session()->getFlashData('success')){
        ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
        }
        ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
            Add Mahasiswa
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NRP</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Mahasiswa as $key => $Mahasiswa) : ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $Mahasiswa['nrp'] ?></td>
                            <td><?= $Mahasiswa['name_MHS'] ?></td>
                            <td><?= $Mahasiswa['email_MHS'] ?></td>
                            <td><?= $Mahasiswa['phone_MHS'] ?></td>
                            <td><?= $Mahasiswa['address_MHS'] ?></td>
                            <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal-<?= $Mahasiswa['nrp'] ?>"><i class="fas fa-exclamation-triangle"></i></button>
                            <a href="<?= base_url('Mahasiswa/delete/'.$Mahasiswa['nrp']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash"></i></a>
                            
                            </td>
                        </tr>
<!-- Edit Mahasiswa Modal -->
<div class="modal fade" id="editModal-<?= $Mahasiswa['nrp'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Mahasiswa/edit/'.$Mahasiswa['nrp']) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name_MHS" class="form-control" id="name" value="<?= $Mahasiswa['name_MHS'] ?>" placeholder="Mahasiswa Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email_MHS" class="form-control" id="email" value="<?= $Mahasiswa['email_MHS'] ?>"  placeholder="Mahasiswa Email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone_MHS" class="form-control" id="phone" value="<?= $Mahasiswa['phone_MHS'] ?>"  placeholder="Mahasiswa Number" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address_MHS" class="form-control" id="address" value="<?= $Mahasiswa['address_MHS'] ?>"  placeholder="Mahasiswa Address" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Add Mahasiswa Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Mahasiswa') ?>" method="post">
            <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">NRP</label>
                        <input type="text" name="nrp" class="form-control" id="nrp" placeholder="Mahasiswa NRP" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name_MHS" class="form-control" id="name_MHS" placeholder="Mahasiswa Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email_MHS" class="form-control" id="email_MHS" placeholder="Mahasiswa Email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone_MHS" class="form-control" id="phone_MHS" placeholder="Mahasiswa Number" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address_MHS" class="form-control" id="address_MHS" placeholder="Mahasiswa Address" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?php $this->section('scripts')?>
<!-- Page level plugins -->
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Page level custom scripts -->
<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
</script>
<?php $this->endSection()?>