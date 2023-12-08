<?php view("admin.partials.header") ?>
<div class="app-content">
    <div class="app-content-header">
        <h1 class="app-content-headerText">Quản lý thuê
            phòng</h1>
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
                    action="http://localhost/poly_tro/admin/order/filter"
                    class="filter-menu ">
                    <input type="hidden" name="id"
                        value="<?= $_GET["id"] ?>">
                    <label>Danh mục</label>
                    <select name="category"
                        class="category">
                        <option value="">Tất cả</option>
                        <?php foreach ($categories as $category) : ?>
                        <option
                            value="<?= $category['id'] ?>">
                            <?= $category['name'] ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                    <label>Trạng thái</label>
                    <select name="status" class="status">
                        <option value="">Tất cả</option>
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
                style="min-width: 300px">Tiêu đề và mô tả
            </div>
            <div class="product-cell address"
                style="min-width: 300px">Địa chỉ</div>
            <div class="product-cell price"
                style="max-width: 120px">Giá</div>
            <div class="product-cell ">Thời gian tạo</div>
            <div class="product-cell status-cell"
                style="max-width: 150px">Trạng thái</div>
            <div class="product-cell status-cell"
                style="max-width: 120px">Thao tác</div>    
            <div class="product-cell status-cell"
                style="max-width: 120px">Hành động</div>
        </div>
        <?php foreach ($orders_item as $order_item) : ?>
        <div class=" products-row">
            <div class="product-cell id">
                <?= $order_item['order_item_id'] ?>
            </div>
            <div class="product-cell image">
                <img src="http://localhost/poly_tro/<?= handleImage($order_item['image'])[0] ?>"
                    alt="">
                <span
                    class="table-short_title"><?= $order_item['title'] ?></span>
            </div>
            <div
                class="product-cell address table-short_title">
                <span class="table-short_title">
                    <?= $order_item['address'] ?>
                </span>
            </div>
            <div class="product-cell price">
                <?= price_format($order_item['price']) ?>
            </div>
            <div class="product-cell created_at">
                <?= $order_item['order_created_at'] ?></div>
            <div class="product-cell status-cell">
                <span
                    class="status <?= $order_item['status'] == 1 ? "active" : "disabled" ?>">
                    <?= $order_item['status'] == 0 ? "Chưa duyệt" : ($order_item['status'] == 1 ? "Đã duyệt" : "Đã thanh toán" )?>
                </span>
            </div>
            <div class="product-cell"
                style="max-width: 120px">
                <?php if ($order_item['status'] == 0) : ?>
                <a href="http://localhost/poly_tro/admin/order/accept?id=<?= $order_item['order_item_id'] ?>"
                    class="admin-action_btn">Duyệt</a>
                <?php endif ?>
            </div>
            <div class="product-cell"
                style="max-width: 120px">
            <td>
                    <span class="btn-remover" onclick="confirmDelete('<?= $order_item['order_item_id'] ?>')">Xóa</span>
                </td>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>
<script>
const filterForm = document.querySelector('.filter-menu');
const resetBtn = document.querySelector('.reset');
const category = document.querySelector(
    '.category');
const status = document.querySelector(
    '.status');
const url = new URLSearchParams(window.location.search)
const id = url.get("id");

filterForm.addEventListener("submit", (e) => {
    if (category.value == "" && status.value ==
        "") {
        e.preventDefault();
        window.location =
            `http://localhost/poly_tro/admin/order/detail?id=${id}`;
    }
})
resetBtn.onclick = (e) => {
    filterForm.reset();
    e.preventDefault();
}
function confirmDelete(orderId) {
        var result = confirm("Bạn có chắc chắn muốn xóa không?");
        if (result) {
            // Nếu người dùng xác nhận xóa, chuyển hướng đến trang xóa
            window.location.href = "http://localhost/poly_tro/admin/order/deleteOrder?id=" + orderId;
        }
    }
</script>
<?php view("admin.partials.footer") ?>