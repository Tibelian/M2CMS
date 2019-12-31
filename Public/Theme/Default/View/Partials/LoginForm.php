
<form method="post" action="<?= BASE_URL ?>/user/login">

    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <label class="input-group-text" for="username">
                <i class="fas fa-user"></i>
            </label>
        </div>
        <input class="form-control form-control-sm" type="text" name="username" id="username" placeholder="<?= Language::translate('username') ?>">
    </div>

    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <label class="input-group-text" for="password">
                <i class="fas fa-key"></i>
            </label>
        </div>
        <input class="form-control form-control-sm" type="password" name="password" id="password" placeholder="<?= Language::translate('password') ?>">
    </div>

    <button type="submit" class="btn btn-sm btn-primary w-100"><?= Language::translate('login') ?></button>
    
    <div class="btn-group w-100 mt-2">
        <a class="w-50 btn btn-sm btn-dark" href="<?= BASE_URL ?>/user/register"> <?= Language::translate('register-now') ?></a>
        <a class="w-50 btn btn-sm btn-dark" href="<?= BASE_URL ?>/user/lost"> <?= Language::translate('lost-pw') ?></a>
    </div>

</form>

