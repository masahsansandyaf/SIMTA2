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
            Add Revisi
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID REVISI</th>
                            <th>NRP</th>
                            <th>NIP</th>
                            <th>ID TA</th>
                            <th>Status</th>
                            <th>KETERANGAN </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Revision as $key => $Revision) : ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $Revision['id_Revisi'] ?></td>
                            <td><?= $Revision['MHS_nrp'] ?></td>
                            <td><?= $Revision['dosen_nip'] ?></td>
                            <td><?= $Revision['TA_id'] ?></td>
                            <td><?= $Revision['Status'] ?></td>
                            <td><?= $Revision['Ket_revisi'] ?></td>
                            <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal-<?= $Revision['id_Revisi'] ?>"><i class="fas fa-exclamation-triangle"></i></button>
                            <a href="<?= base_url('Revision/delete/'.$Revision['id_Revisi']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash"></i></a>
                            
                            </td>
                        </tr>
<!-- Edit Mahasiswa Modal -->
<div class="modal fade" id="editModal-<?= $Revision['id_Revisi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Revisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Revision/edit/'.$Revision['id_Revisi']) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Status</label>
                        <input type="text" name="Status" class="form-control" id="Status" value="<?= $Revision['Status'] ?>" placeholder="Status" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Keterangan Revisi</label>
                        <input type="text" name="Ket_revisi" class="form-control" id="Ket_revisi" value="<?= $Revision['Ket_revisi'] ?>" placeholder="Keterangan" required>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Revisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Revision') ?>" method="post">
            <?= csrf_field(); ?>
                <div class="modal-body">
                <div class="form-group">
                    <div class="form-group">
                        <label for="name">ID REVISI</label>
                        <input type="text" name="id_Revisi" class="form-control" id="id_Revisi"  placeholder="ID" required>
                    </div>
                    <div class="form-group">
                        <label for="name">NRP MAHASISWA</label>
                        <input type="text" name="MHS_nrp" class="form-control" id="MHS_nrp"  placeholder="NRP" required>
                    </div>
                    <div class="form-group">
                        <label for="name">NIP DOSEN</label>
                        <input type="text" name="dosen_nip" class="form-control" id="dosen_nip"  placeholder="NIP" required>
                    </div>
                    <div class="form-group">
                        <label for="name">ID Tugas AKhir</label>
                        <input type="text" name="TA_id" class="form-control" id="TA_id"  placeholder="ID Tugas Akhir" required>
                    </div>
                        <label for="name">Status</label>
                        <input type="text" name="Status" class="form-control" id="Status"  placeholder="Status" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Keterangan Revisi</label>
                        <input type="text" name="Ket_revisi" class="form-control" id="Ket_revisi"  placeholder="Keterangan" required>
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