<?php view("site.partials.accountManageHeader") ?>
<div class="profile-content">
    <h1 class="profile__title">Cập nhật thông tin cá nhân
    </h1>
    <form action="http://localhost/poly_tro/site/account/saveProfile" class="profile-form" method="POST" enctype="multipart/form-data">
        <div class="form-group2">
            <label for="" class="form-label">Mã thành
                viên</label>
            <input type="text" class="form-control form-control_normal form-control_disabled" disabled value="<?= $user['id'] ?>">
        </div>
        <div class="form-group2">
            <label for="" class="form-label">Cơ sở</label>
            <?php foreach ($facilities as $facility) : ?>
                <?php if ($facility['id'] == $user['facility_id']) : ?>
                    <input type="text" class="form-control form-control_normal form-control_disabled" disabled 
                    value="<?= $facility['name'] ?>">
                <?php endif ?>
            <?php endforeach ?>
        </div>
        <div class="form-group2">
            <label for="" class="form-label">Số điện
                thoại</label>
            <input type="text" class="form-control form-control_normal form-control_disabled" disabled value="<?= $user['phone'] ?>">
        </div>
        <div class="form-group2">
            <label for="" class="form-label">Họ tên</label>
            <input type="text" name="fullname" class="form-control form-control_normal" value="<?= $user['fullname'] ?>">
        </div>
        <div class="form-group2">
            <label for="" class="form-label">Địa
                chỉ</label>
            <input type="text" name="address" class="form-control form-control_normal" value="<?= $user['address'] ?>">
        </div>
        <div class="form-group2">
            <label for="" class="form-label">Email</label>
            <input type="email" name="email" class="form-control form-control_normal" value="<?= $user['email'] ?>">
        </div>
        <div class="form-group2">
            <label for="" class="form-label">Mật
                khẩu</label>
            <a href="http://localhost/poly_tro/site/account/changePassword" style="font-size: 1.6rem; color: var(--secondaryColor)">Đổi
                mật khẩu</a>
        </div>
        <?php if ($user['role'] == 0) : ?>
            <div class="form-group2">
                <label for="" class="form-label"></label>
                <a href="http://localhost/poly_tro/site/account/permission" style="font-size: 1.6rem; color: var(--secondaryColor)">Đăng
                    ký quyền Chủ phòng trọ</a>
            </div>
        <?php endif ?>
        <div class="form-group2" style="align-items: start">
            <label for="" class="form-label">Ảnh đại
                diện</label>
            <div>
                <img src="http://localhost/poly_tro<?= $user['image'] ?>" alt="" class="avatar-preview">
                <output id="images-result">
                </output>
                <input type="file" id="files" accept="image/jpeg, image/png, image/jpg" name="image" style="font-size: 1.6rem; margin-bottom: 20px">
            </div>
        </div>
        <button class="btn btn-submit" type="submit">Lưu và cập
            nhật</button>
    </form>
</div>
<script src="http://localhost/poly_tro/public/js/showImageUpload.js">
</script>
<?php view("site.partials.accountManageFooter") ?>