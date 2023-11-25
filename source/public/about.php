<?php

session_start();
require_once __DIR__ . '/../db/db_connection.php';


?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . '/../framework.php';?>
    </head>
    <body>
        <?php require_once __DIR__ . '/../UI/header.php';?>
        <main class="container">
            <h1 class="text-center pb-5">LET ME COOK</h1>
            <div class="row">
                <div class="col-5">
                    <img src="https://i.pinimg.com/originals/03/e0/22/03e0223f197e133cbcfc72b9b7866b41.png" style="height: 90%;width: 100%;">
                </div>
                <div class="col-1"></div>
                <div class="col-5">
                    <div class="pb-3">Bạn có đam mê nấu ăn và muốn chia sẻ những công thức, mẹo và kinh nghiệm của mình với mọi người? Bạn muốn học hỏi thêm về các món ăn đặc sắc của Việt Nam và thế giới? Bạn muốn tìm kiếm những nguyên liệu, dụng cụ và sản phẩm chất lượng cho bếp nhà bạn? Nếu câu trả lời là có, bạn đã đến đúng nơi!</div>
                    <div class="pb-3">Chào mừng bạn đến với <strong>Let me cook</strong>, nơi bạn có thể tìm thấy tất cả những gì bạn cần để nấu ăn ngon và lành mạnh. Đây là trang web nấu ăn dành cho mọi người, từ người mới bắt đầu đến người có kinh nghiệm, từ người yêu thích ẩm thực Việt Nam đến người muốn khám phá các nền văn hóa ẩm thực khác.</div>
                    <div class="pb-3">Trên trang web này, bạn sẽ được xem hàng loạt công thức nấu ăn đa dạng và phong phú, từ các món ăn truyền thống, đặc sản địa phương đến các món ăn hiện đại, sáng tạo. Bạn cũng có thể tìm kiếm công thức theo nguyên liệu, loại món, thời gian, độ khó, khẩu vị hay chủ đề. Bạn sẽ được hướng dẫn từng bước cách chuẩn bị, chế biến và trình bày các món ăn một cách dễ dàng và chi tiết.</div>
                    <div class="pb-3">Đặc biệt, bạn cũng có thể giao lưu, chia sẻ và học hỏi với các thành viên khác trong cộng đồng nấu ăn của trang web. Bạn có thể gửi những công thức, hình ảnh, video, bình luận, câu hỏi và góp ý của mình. Bạn cũng có thể nhận được những phản hồi, đánh giá, lời khuyên và sự ủng hộ từ các thành viên khác. Bạn cũng có thể kết bạn, tham gia các nhóm, diễn đàn và trò chuyện với những người có cùng sở thích nấu ăn.</div>
                    <div><strong>Let me cook</strong> là nơi lý tưởng để bạn thỏa mãn đam mê nấu ăn và tận hưởng niềm vui ẩm thực. Hãy đăng ký thành viên ngay hôm nay để khám phá và trải nghiệm những điều tuyệt vời mà trang web mang lại cho bạn. Chúng tôi rất mong được đón tiếp và phục vụ bạn!</div>
                </div>
            </div>
        </main>
        <?php require_once __DIR__ . '/../UI/footer.php'; ?>
    </body>
</html>