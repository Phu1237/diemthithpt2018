<?php
error_reporting(E_ALL);
// FUNCION
function output($str) {
    echo $str;
    ob_end_flush();
    ob_start();
    ob_flush();
    flush();
}
function curl($sbd) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://diemthi.tuyensinh247.com/tsHighSchool/ajaxDiemthi2018");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "sbd=$sbd");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers = array();
    $headers[] = "Cookie: PHPSESSID=4ci5031pl3hidt3qil43lv3pb5";
    $headers[] = "Origin: https://diemthi.tuyensinh247.com";
    $headers[] = "Accept-Encoding: gzip, deflate, br";
    $headers[] = "Accept-Language: en-US,en;q=0.9";
    $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36 OPR/54.0.2952.51";
    $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
    $headers[] = "Accept: */*";
    $headers[] = "Referer: https://diemthi.tuyensinh247.com/diem-thi-tot-nghiep-thpt/hue-7.html";
    $headers[] = "X-Requested-With: XMLHttpRequest";
    $headers[] = "Connection: keep-alive";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = html_entity_decode(curl_exec($ch));
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close ($ch);
    return $result;
}
// ARRAY & VALUE
$name = array('','Nguyễn Diệu Ngọc Anh', 'Trần Ngọc Anh', 'Đào Nguyên Thiên Ân', 'Nguyễn Ngọc Á Châu', 'Lê Nữ Hạnh Dung','Trương Hoàng Thùy Dung','Phạm Hải Đăng','Nguyễn Hàng Tâm Giao','Hoàng Kim Thanh Hải','Nguyễn Nguyệt Hằng','Nguyễn Phước Quý Hòa','Võ Phi Huy','Nguyễn Văn Minh Khoa','Trần Thị Ngọc Liễu','Trần Đức Vũ Long','Ngô Tuệ Mẫn','Phan Đình Minh','Trần Minh Diệu My','Lương Nhật Nam','Võ Lê Thúy Ngân','Hồ Anh Nguyên','Tôn Nữ Minh Nhi','Võ Thị Hồng Nhung','Bùi Vũ Khánh Như','Võ Quỳnh Như','Phan Minh Phú','Trương Vĩnh Phúc','Nguyễn Hữu Phước','Phan Thị Thanh Phương','Trần Ngọc Quang','Huỳnh Ngọc Như Quỳnh','Nguyễn Phước Vĩnh Thành','Lê Ngọc Minh Thi','Phan Thị Tất Toàn','Lê Bảo Trân','Trương Nguyễn Đăng Trình','Lê Vũ Quốc Tuấn','Phạm Vũ Cát Tường','Trần Nguyễn Phương Uyên','Huyền Tôn Nữ Bảo Vân','Văn Lê Tường Vi','Nguyễn Phan Anh Vũ','Nguyễn Hải Yến');
$sbd = array('',33003837,33003850,33003859,33003878,33003901,33003902,33003923,33003934,33003950,33003962,33003985,33004012,33004036,33004048,33004070,33004088,33004105,33004116,33004118,33004129,33004145,33004194,33004206,33004208,33004217,33004232,33004238,33004243,33004253,33004261,33004277,33004307,33004326,33004371,33004385,33004401,33004409,33004417,33004422,33004425,33004429,33004437,33004457,33004347);
$KHTN = array('','Toán','Ngữ văn','Vật lí','Hoá học','Sinh học','KHTN','Ngoại Ngữ');
$KHXH = array('','Toán','Ngữ văn','Lịch sử','Địa lí','GDCD','KHXH','Ngoại Ngữ');
$toan = 0;
$van = 0;
$ngoaingu = 0;
$vatli = 0;
$hoahoc = 0;
$sinhhoc = 0;
$khtn = 0;
$lichsu = 0;
$diali = 0;
$gdcd = 0;
$khxh = 0;
$ntoan = NULL;
$nvan = 0;
$nngoaingu = NULL;
$nvatli = NULL;
$nhoahoc = NULL;
$nsinhhoc = NULL;
$nkhtn = NULL;
$nlichsu = NULL;
$ndiali = NULL;
$ngdcd = NULL;
$nkhxh = NULL;
