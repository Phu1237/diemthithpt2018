<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="sticky-footer.css" rel="stylesheet">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <title>Kiểm tra điểm thi THPT</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">WebSite</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">KHTN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="khxh.php">KHXH <span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>
    <main role="main" class="container">

    <table class="table table-bordered" align="center">
  <thead>
    <tr>
      <th scope="col" width="8">#</th>
      <th scope="col">Họ và tên</th>
      <th scope="col">Toán</th>
      <th scope="col">Văn</th>
      <th scope="col">Vật lí</th>
      <th scope="col">Hoá học</th>
      <th scope="col">Sinh học</th>
      <th scope="col">KHTN</th>
      <th scope="col">Ngoại ngữ</th>
    </tr>
  </thead>
  <tbody>
<?php
require('function.php');

for ($i = 1;$i < 44; $i++) {
    $content = (array) json_decode(curl($sbd[$i]),true); // xác định địa chỉ cần thực thi
    $ketqua = $content['data']['mark_info'];
    // Kiểm tra khối thi
    $khoi = preg_replace('/[\s:]+/mu', ' ',$ketqua);
    $khoi = explode(' ', $khoi);
    if ($khoi[13] == 'KHXH') continue; else $mon = $KHTN;
    echo '<tr>
      <th scope="row">'.$sbd[$i].'</th><td>'.$name[$i].'</td>';
    // Lấy điểm thi từng môn
    $diem = preg_replace("/[^0-9\. ]/", '',$ketqua);
    $diem = preg_replace('/[\s]+/mu', ' ',$diem);
    $diem = explode(' ', $diem);
    // Thông tin in thêm
    if ($diem[1] > $toan) {$toan = $diem[1];$ntoan = $name[$i];}
    if ($diem[2] > $van) {$van = $diem[2];$nvan = $name[$i];}
    if ($diem[7] > $ngoaingu) {$ngoaingu = $diem[7];$nngoaingu = $name[$i];}
	  if ($diem[3] > $vatli) {$vatli = $diem[3];$nvatli = $name[$i];}
	  if ($diem[4] > $hoahoc) {$hoahoc = $diem[4];$nhoahoc = $name[$i];}
	  if ($diem[5] > $sinhhoc) {$sinhhoc = $diem[5];$nsinhhoc = $name[$i];}
	  if ($diem[6] > $khtn) {$khtn = $diem[6];$nkhtn = $name[$i];}
    // Xử lí kết quả in ra
    $output = array();
    for ($i1 = 1;$i1 <= 7;$i1++) {
        $output[$i][] = '<td>'.$diem[$i1].'</td>';
    }
    $output = implode("\n", $output[$i]);
    $output = $output."</tr>";
    echo output($output);
}
?>
  </tbody>
</table>

	</main>
    <footer class="footer bg-dark">
      <div class="container">
        <span class="text-muted">Powered by Phu1237</span>
      </div>
    </footer>

  </body>
</html>