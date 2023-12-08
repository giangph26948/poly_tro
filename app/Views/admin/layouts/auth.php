<?php view("admin.partials.header") ?>
<div class="app-content">
    <div class="app-content-header">
        <h1 class="app-content-headerText">Quản lý người
            dùng</h1>
        <button class="mode-switch" title="Switch Theme">
            <svg class="moon" fill="none"
                stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2"
                width="24" height="24" viewBox="0 0 24 24">
                <defs></defs>
                <path
                    d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z">
                </path>
            </svg>
        </button>
    </div>
    <div class="app-content-actions">
        <input class="search-bar"
            placeholder="Tìm kiếm..." type="text">
        <div class="app-content-actions-wrapper">
            <div class="filter-button-wrapper">
                <button
                    class="action-button filter jsFilter"><span>Lọc</span><svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16"
                        viewBox="0 0 24 24" fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-filter">
                        <polygon
                            points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                    </svg></button>
                <form
                    action="http://localhost/poly_tro/admin/auth/filter"
                    class="filter-menu ">
                    <label>Trạng thái</label>
                    <select name="role">
                        <option value="">Tất cả
                        </option>
                        <option value="active">Chủ phòng
                            trọ
                        </option>
                        <option value="disable">Khách
                        </option>
                    </select>
                    <div class="filter-menu-buttons">
                        <button class="filter-button reset">
                            Reset
                        </button>
                        <button class="filter-button apply"
                            type="submit">
                            Apply
                        </button>
                    </div>
                </form>
            </div>
            <button class="action-button list active"
                title="List View">
                <svg xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16"
                    viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-list">
                    <line x1="8" y1="6" x2="21" y2="6" />
                    <line x1="8" y1="12" x2="21" y2="12" />
                    <line x1="8" y1="18" x2="21" y2="18" />
                    <line x1="3" y1="6" x2="3.01" y2="6" />
                    <line x1="3" y1="12" x2="3.01"
                        y2="12" />
                    <line x1="3" y1="18" x2="3.01"
                        y2="18" />
                </svg>
            </button>
            <button class="action-button grid"
                title="Grid View">
                <svg xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16"
                    viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-grid">
                    <rect x="3" y="3" width="7"
                        height="7" />
                    <rect x="14" y="3" width="7"
                        height="7" />
                    <rect x="14" y="14" width="7"
                        height="7" />
                    <rect x="3" y="14" width="7"
                        height="7" />
                </svg>
            </button>
        </div>
    </div>
    <div class="products-area-wrapper tableView">
        <div class="products-header">
            <div class="product-cell id"
                style="max-width: 80px">Mã</div>
            <div class="product-cell image"
                style="max-width: 250px">Tên hiển thị
            </div>
            <div class="product-cell address"
                style="max-width: 200px">Địa chỉ</div>
            <div class="product-cell price"
                style="max-width: 120px">Số điện thoại
            </div>
            <div class="product-cell"
                style="min-width: 280px">Email</div>
            <div class="product-cell status-cell"
                style="max-width: 120px">Vai trò</div>
            <div class="product-cell status-cell"
                style="max-width: 230px">Hành động</div>
                <dv class="product-cell status-cell"
                style="max-width: 250px"></dv>
        </div>
        <?php foreach ($users as $user) : ?>
        <div class=" products-row">
            <div class="product-cell id"><?= $user['id'] ?>
            </div>
            <div class="product-cell image"
                style="max-width: 250px; min-width: 0px !important;">
                <img src="http://localhost/poly_tro/<?= handleImage($user['image'])[0] ?>"
                    alt="">
                <span
                    class="table-short_title"><?= $user['fullname'] ?></span>
            </div>
            <div class="product-cell address table-short_title"
                style="max-width: 200px;
                min-width: 0 !important;">
                <span class="table-short_title">
                    <?= $user['address'] ?>
                </span>
            </div>
            <div class="product-cell price">
                <?= $user['phone'] ?></div>
            <div class="product-cell created_at"
                style="min-width:280px">
                <?= $user['email'] ?></div>
            <div class="product-cell status-cell">
                <span
                    class="status <?= $user['role'] == 1 ? "active" : "disabled" ?>">
                    <?= $user['role'] == 1 ? "Chủ phòng trọ" : "Khách" ?>
                </span>
            </div>
            <div class="product-cell"
                style=" display: flex; gap: 0 40px;">
                <?php if ($user['role'] == 0) : ?>
                <a href="http://localhost/poly_tro/admin/permission/acceptPermission?user_id=<?= $user['id'] ?>"
                    class="admin-action_btn">Cấp quyền</a>
                <a href="http://localhost/poly_tro/admin/auth/deleteUser?id=<?= $user['id'] ?>" class="admin-action_btn">Xóa user</a>    
                <?php else :  ?>
                <a href="http://localhost/poly_tro/admin/permission/denialPermission?id=<?= $user['id'] ?>"
                    class="admin-action_btn">Xóa quyền</a>
                <?php endif ?>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>
<?php view("admin.partials.footer") ?>