<?php view("site.partials.accountManageHeader") ?>
<div class="post-new_content">
    <h1 class="post-new__title">Đăng ký quyền Chủ phòng trọ
    </h1>
    <form
        action="http://localhost/poly_tro/site/account/savePermission"
        class="post-new_form" method="POST"
        enctype="multipart/form-data">
        <h2 class="post-new_form--title">Thông tin cá nhân
        </h2>
        <div class="form-group">
            <label for="" class="form-label ">Họ và
                tên</label>
            <input type="text"
                class="form-control form-control_normal input-normal"
                name="fullname" required>
        </div>
        <div class="form-group">
            <label for="" class="form-label">Số điện
                thoại</label>
            <input type="text"
                class="form-control form-control_normal input-normal"
                name="phone_number" required>
        </div>
        <div class="form-group">
            <label for="" class="form-label">Căn cước công
                dân</label>
            <input type="text"
                class="form-control form-control_normal input-normal"
                name="cccd" required>
        </div>
        <div class="form-group">
            <label for="" class="form-label">Mặt trước và
                mặt sau CCCD</label>
            <input type="file" id="files"
                multiple="multiple"
                accept="image/jpeg, image/png, image/jpg"
                name="images[]"
                style="font-size: 1.6rem; margin-bottom: 20px"
                required>
            <output id="images-result">
        </div>
        <h2 class="post-new_form--title">Thông tin nhà trọ
        </h2>
        <div class="form-group">
            <label for="" class="form-label">Địa chỉ
                chính xác</label>
            <input type="text"
                class="form-control form-control_normal"
                name="address" required>
        </div>
        <button class="btn btn-submit">Đăng ký</button>
    </form>
</div>
<script
    src="http://localhost/poly_tro/public/js/showImageUpload.js">
</script>
<?php view("site.partials.accountManageFooter") ?>