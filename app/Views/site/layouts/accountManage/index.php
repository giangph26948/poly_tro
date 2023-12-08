<?php view("site.partials.accountManageHeader") ?>
<div class="manage-news_title">
    <p>Quản lý tin đăng</p>
    <a href="http://localhost/poly_tro/site/account/postNew"
        class="action-btn postNew">Đăng tin mới</a>
</div>
<div class="manage-news_table">
    <table cellspacing="0">
        <thead>
            <tr>
                <th>Mã tin</th>
                <th width="300">Tiêu đề và mô tả</th>
                <th>Giá</th>
                <th>Ngày tạo</th>
                <!-- <th>Ngày hết hạn</th> -->
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($news as $new) : ?>
            <tr>
                <td><?= $new['id'] ?></td>
                <td>
                    <a href="http://localhost/poly_tro/site/account/updateNew?id=<?= $new['id'] ?>"
                        class="table-short_title"
                        style="color: var(--secondaryColor)"><?= $new['title'] ?></a>
                    <p class="table-short_title"><b>Địa
                            chỉ:</b> <?= $new['address'] ?>
                    </p>
                </td>
                <td><?= price_format($new['price']) ?></td>
                <td><?= $new['updated_at'] ?></td>
                <!-- <td>
                    <?php $newdate = strtotime('+7 day', strtotime($new['updated_at']));
                    $newdate = date("Y-m-d H:i:s", $newdate);
                    echo $newdate;
                    ?>
                </td> -->
                <td><?= $new['status'] == 0 ? "Chưa duyệt" : ($new['status'] == 1 ? "Đã duyệt" : "Đã thanh toán" ) ?>
                </td>
                <td><a href="http://localhost/poly_tro/site/account/deleteNew?id=<?= $new['id'] ?>"
                        class="btn-remover">Xóa</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php view("site.partials.accountManageFooter") ?>