<?= $this->extend('components/layout') ?>

<?= $this->section('content') ?>
<div class="row" style="margin: 30px 0px;">
		<!-- Awal tambahan bagian notifikasi -->
    <?php
         $sess = session();
         $addstatus = $sess->get('addtweet');
         if($addstatus == 'success'){
             echo '<div class="alert alert-success" role="alert">
                     Tweet baru berhasil diposting
                 </div>';}
    // ... koding notifikasi tweet baru dan edit yang dibuat sebelumnya
		
		$delstatus = $sess->get('deltweet');
    if($delstatus == 'success'){
        echo '<div class="alert alert-warning" role="alert">
            Tweet berhasil dihapus.
            </div>';
    }
    if($delstatus == 'error'){
        echo '<div class="alert alert-danger" role="alert">
            Kesalahan penghapusan tweet.
            </div>';
    }
    ?>
    <!-- Akhir tambahan bagian notifikasi -->		
    <!-- Awal tambahan bagian notifikasi -->
    <?php
    // ... koding notifikasi tweet baru yang telah dibuat sebelumnya
		
		$editstatus = $sess->get('edittweet');
    if($editstatus == 'success'){
        echo '<div class="alert alert-success" role="alert">
            Tweet berhasil diedit / diperbaharui.
            </div>';
    }
    if($editstatus == 'error'){
        echo '<div class="alert alert-danger" role="alert">
            Kesalahan pengeditan / pembaruan tweet.
            </div>';
    }
    ?>
    <!-- Akhir tambahan bagian notifikasi -->		
    <div class="col-md-4">
    <div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
...
<div class="row" style="margin: 30px 0px;">
    <div class="col-md-4">
    <div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
        <?= img(['src'=>'images/no-avatar.jpg', 'class'=>'img-fluid rounded-start']) ?>
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <p>
            <strong class="card-title"><?="Fullname User"?></strong>
            <small class="text-muted">@<?="username"?></small>
            </p>
            <p class="card-text">
                <a class="btn btn-info btn-sm" 
				style="padding: 0.25rem 0.5rem; font-size: 0.7rem;" 
				href="<?=base_url('/add')?>">Tweet Baru</a>
                <a class="btn btn-danger btn-sm" 
				style="padding: 0.25rem 0.5rem; font-size: 0.7rem;" 
				href="<?=base_url('/logout')?>">Logout</a>
                <a class="btn btn-primary btn-sm" 
				style="padding: 0.25rem 0.5rem; font-size: 0.7rem;" 
				href="<?=base_url('/edituser')?>">Edit Profile</a>
            </p>
        </div>
        </div>
    </div>
    </div>

    <div class="list-group">
        <div class="list-group-item list-group-item-action active" aria-current="true">
            <strong>Kategori Tweet</strong>
        </div>
        <?php foreach($categories as $key => $val): ?>
        <a href="<?=base_url('/category//'.$key)?>" 
            class="list-group-item list-group-item-action">
            <?=$val?>
        </a>
        <?php endforeach; ?>
    </div>
    </div>
    <div class="col-md-8">
        <h2><?=$judul?></h2>

        <?php foreach ($tweets as $tweet){ ?>
        <div class="row" 
			style="border-top: 1px solid #eee; padding-top: 10px; margin-bottom: 10px;">
            <div class="col-sm-2">
                <?= img(['src'=>'images/no-avatar.jpg', 'class'=>'img-thumbnail']) ?>
            </div>
            <div class="col-sm-10">
                <h4><?=$tweet->fullname?> <small>@<?=$tweet->username?></small></h4>
                <div class="mb-3">
                    <?=$tweet->content?>
                </div>
                <div class="container-fluid">
                    <span>
                    <a href="<?=base_url('/category//'.$tweet->category)?>">#<?=$tweet->category?></a>
                    <small><?=$tweet->getCreatedAt() ?></small>
                    </span>
                    <?php 
                    $sess = session();
                    $curUser = $sess->get('currentuser');
                    if($curUser['userid'] == $tweet->user_id): 
                    ?>
                    <span>
                        <a href="<?=base_url('/edit//'.$tweet->id)?>" class="btn btn-sm btn-warning">E</a>
                        <a href="<?=base_url('/delete//'.$tweet->id)?>" class="btn btn-sm btn-danger">D</a>
                    </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?= $this->endSection() ?>