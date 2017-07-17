<?php
	$conn = mysqli_connect('localhost', 'root', '', 'table_km') or die("Không thể kết nối đến cơ sở dữ liệu, hãy kiểm tra lại đường truyền.");
	mysqli_set_charset($conn, 'utf8');
	if (!empty($_POST['submit'])){
		$error = false;
		if (!empty($_POST['name'])){
			$name = $_POST['name'];
		}
		else {
			$name='';
			$error=true;
		}
		if (!empty($_POST['address'])){
			$address = $_POST['address'];
		}
		else {
			$address='';
			$error=true;
		}
		if (!empty($_POST['phone'])){
			$phone = $_POST['phone'];
		}
		else {
			$phone='';
			$error=true;
		}
		if (!empty($_POST['sex'])){
			$sex = $_POST['sex'];
		}
		else {
			$sex='';
			$error=true;
		}
		if (!empty($_POST['job'])){
			$job = $_POST['job'];
		}
		else {
			$job='';
			$error=true;
		}
		if (!empty($_POST['product'])){
			$product = $_POST['product'];
		}
		else {
			$product='';
			$error=true;
		}
		if (!empty($_POST['predict'])){
			$predict = $_POST['predict'];
		}
		else {
			$predict='';
			$error=true;
		}
		if (!error){
			$sql = "INSERT INTO ql_dkkm(name, address, phone, sex, job, product, predict) VALUES ('$name', '$address', '$phone',  '$sex', '$job', '$product', '$predict')";
			mysqli_query($conn, $sql);
		}
		header('Location: bai_12.php');
		

	}
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tạo form và các điều khiển</title>
	<meta charset="utf-8">
	<style type="text/css">
		#container{
			width: 510px;
			margin: auto;
			padding: 5px 5px 5px 5px;
			box-shadow: 2px 2px 2px 2px #888888;
			color: green;
		}
		#show{
			color: red;
			text-align: center;
			display: none;
		}
		table{
			width: 500px;
			margin: auto;
		}
	</style>
</head>
<body>
	
	<div id="container">
		<h2 style="text-align: center;color: #00cc00;">Phiếu đăng ký chương trình khuyến mãi</h2>
		<form method="POST" onsubmit="confirmsubmit()">
			<table border="1" cellpadding="2" cellspacing="0">
				<tr>
					<td style="width: 40%;">Họ và tên:</td>
					<td>
						<input type="text" id="name" name="name" style="width: 250px;">
					</td>
				</tr>
				<tr>
					<td>Địa chỉ:</td>
					<td>
						<input type="text" id="address" name="address" style="width: 200px;">
					</td>
				</tr>
				<tr>
					<td>Điện thoại:</td>
					<td>
						<input type="text" id="phone" name="phone" style="width: 150px">
					</td>
				</tr>
				<tr>
					<td>
						Giới tính:
					</td>
					<td>
						<input type="radio" name="sex" value="Male">Nam
						<input type="radio" name="sex" value="Female">Nữ
					</td>
				</tr>
				<tr>
					<td>
						Nghề nghiệp:
					</td>
					<td>
						<select name="job" id="job">
							<option>Bác sĩ</option>
							<option>Giáo viên</option>
							<option>Kỹ sư</option>
							<option>Khác</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						Chọn sản phẩm tham gia:
					</td>
					<td>
						<select multiple name="product" id="product">
							<option>Kem đánh răng</option>
							<option>Bột giặt</option>
							<option>Sữa tắm</option>
							<option>Dầu gội đầu</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						Số người dự đoán tham gia:
					</td>
					<td>
						<input type="text" name="predict" id="predict">
					</td>
				</tr>
				<tr style="text-align: center;">
					<td colspan="2">
						<input id = "btn" type="submit" name="submit" value="Đồng ý">	
					</td>
				</tr>
				<script language="javascript">
					var button = document.getElementById("btn");
					button.onclick = function confirmsubmit(){
						var a=confirm("Bạn có thể sẽ không được đảm bảo quyền lợi nếu nhập sai hoặc thiếu thông tin. Bạn có muốn gửi biểu mẫu không? ");
						if (a) alert("Thông tin của bạn đã được ghi lại!");
						return a;
					}
				</script>
			</table>
		</form>
	</div>
</body>
</html>