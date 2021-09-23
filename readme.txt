Trang Web bao gồm những trang chính là: Login.php, home.php, admin.php, upgrade.php

Đối với login, sau khi người dùng đăng kí từ trang Register.php mặc định ID sẽ là 1 (tức là người dùng thường),
khi đăng nhập bằng username và password thành công sẽ redirect vào trang chủ để xem và mua app
Tài khoản Admin chỉ có 1 tài khoản là admin/admin

Người dùng vào trang chủ click vào "Upgrade your account." sẽ được đưa tới trang upgrade tài khoản lên Lập trình viên.
Khi người dùng click button "Upgrade now", hệ thống sẽ check số dư tài khoản người dùng, nếu số dư nhỏ hơn 2000, hệ thống
sẽ báo tài khoản không đủ, cho phép quay lại hoặc nạp thêm tiền vào tài khoản.
Nếu số dư đủ 2000, hệ thống thông báo upgrade tài khoản thành công, khi người dùng đăng nhập lại sẽ chuyển vào trang dành
cho Lập trình viên.

Người dùng có thể click vào "add unit to your balance." để nạp thêm vào tài khoản.
Ở trang nạp tiền, người dùng nhập vào code được cung cấp, sau khi nhấn submit, hệ thống sẽ check nếu code nhập vào hợp lệ
sẽ cộng thêm vào tài khoản người dùng đó số tiền tương ứng với mã code đó và thông báo số tiền hiện có.

Chức năng Download: được sử dụng ở trang chủ và trang detail của mỗi app, khi click Download app, hệ thống sẽ check app đó
là app miễn phí hay có phí, nếu app miễn phí sẽ cho phép người dùng tải về ngay. Nếu app có phí, hệ thống sẽ check số dư
tài khoản người dùng, nếu tài khoản không đủ sẽ báo Tài khoản không đủ tiền, gợi ý nạp thêm; nếu tài khoản đủ tiền sẽ cho
phép tải app về ngay.