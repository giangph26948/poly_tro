<?php view("admin.partials.header") ?>
<div class="app-content">
    <div class="app-content-header">
        <h1 class="app-content-headerText">Quản lý cấp
            quyền</h1>
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
        <input class="search-bar" placeholder="Search..."
            type="text">
        <div class="app-content-actions-wrapper">
            <div class="filter-button-wrapper">
                <button
                    class="action-button filter jsFilter"><span>Filter</span><svg
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
                    action="http://localhost/poly_tro/admin/permission/filter"
                    class="filter-menu ">
                    <label>Trạng thái</label>
                    <select name="status">
                        <option value="">Tất cả
                        </option>
                        <option value="active">Đã duyệt
                        </option>
                        <option value="disable">Chưa duyệt
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
                style="max-width: 250px">Họ và tên</div>
            <div class="product-cell sales"
                style="max-width: 250px">Số điện thoại
            </div>
            <div class="product-cell address"
                style="max-width: 250px">CCCD</div>
            <div class="product-cell price"
                style="min-width: 350px">Địa chỉ</div>
            <div class="product-cell status-cell"
                style="max-width: 150px">Trạng thái</div>
            <div class="product-cell status-cell"
                style="max-width: 120px"></div>
        </div>
        <?php foreach ($permissions as $permission) : ?>
        <div class=" products-row">
            <div class="product-cell id">
                <?= $permission['id'] ?>
            </div>
            <div class="product-cell"
                style="max-width: 250px">
                <span
                    class="table-short_title"><?= $permission['fullname'] ?></span>
            </div>
            <div class="product-cell table-short_title"
                style="max-width: 250px">
                <span class="table-short_title">
                    <?= $permission['phone_number'] ?>
                </span>
            </div>
            <div class="product-cell"
                style="max-width: 250px">
                <img src="http://localhost/poly_tro/<?= handleImage($permission['image_cccd'])[0] ?>"
                    alt="product">
                <span><?= $permission['cccd'] ?></span>
            </div>
            <div class="product-cell "
                style="min-width: 350px">
                <?= $permission['address'] ?></div>
            <div class="product-cell status-cell">
                <span
                    class="status <?= $permission['status'] == 1 ? "active" : "disabled" ?>">
                    <?= $permission['status'] == 1 ? "Đã đăng ký" : "Chưa đăng ký" ?>
                </span>
            </div>
            <div class="product-cell"
                style="max-width: 120px">
                
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>
<?php view("admin.partials.footer") ?>