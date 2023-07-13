<?= $this->extend('components/layout') ?>

<?= $this->section('content') ?>
<?php helper('form') ?>
<div class="row" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="col-md-6 offset-md-3 align-self-center">
    <div class="card">
        <div class="card-header bg-info">
            <strong>Add Comment</strong>
        </div>
        <div class="card-body">
            <?= form_open('/edituser') ?>
            <?= form_hidden('id', $tweet->id) ?>
            <div class="mb-3">
                <label for="username" class="form-label">Comment</label>
                <textarea name="username" id="username" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Change fullname</label>
                <textarea name="fullname" id="fullname" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Tambah Tweet">
                <a href="<?=previous_url()?>" class="btn btn-warning">Kembali</a>
            </div>
            <?= form_close() ?>
        </div>
    </div>
    </div>
</div>

<?= $this->endSection('content') ?>