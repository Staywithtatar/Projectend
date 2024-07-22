<?php
include 'includes/dbconect.php';
$email = $_SESSION['email'];
// Check if user already exists
$sql = "SELECT * FROM user WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $fullname = $row['fullname'];
    $address = $row['address'];
    $phone = $row['phone'];
    $password = $row['password'];
} else {
    echo "User not found";
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรแกรมคาดการณ์สินเชื่อ</title>
    <link rel="website icon" type="png" href="img/logo.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="style/style.css">
</head>
<style>
    .slide {
  display: none;
  max-width: 100%;
}

.slide.active {
  display: block;
}

.slide-control {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background-color: #ccc;
  transition: background-color 0.3s ease;
}

.slide-control.active {
  background-color: #ff5722;
}
</style>
<body class="bg-gradient-to-r from-orange-100 to-orange-300 min-h-screen flex flex-col">
    <?php include 'includes/navbar.php';?>
    <section class="bg-gradient-to-r from-orange-100 to-orange-300 py-20">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row items-center">
    <div class="lg:w-1/2 text-center lg:text-left mb-8 lg:mb-0">
      <h1 class="text-4xl lg:text-5xl font-bold text-orange-700 mb-4 writing-animation">อันแน่!</h1>
      <p class="text-lg lg:text-xl text-orange-800 mb-6">ยังลังเลกับการตัดสินใจคุณอยู่ใช่มั้ยหล่ะ</p>
      <p class="text-lg text-orange-700 mb-8">เราสามารถช่วยคุณได้ ถ้าคุณพร้อมก็</p>
      <button class="bg-orange-600 hover:bg-orange-700 text-white py-3 px-6 rounded-lg transition-colors duration-300 font-semibold">เริ่มได้เลย!</button>
    </div>
    <div class="lg:w-1/2 mb-8 lg:mb-0 relative">
    <div class="slide-container mx-auto rounded-lg shadow-lg">
  <img src="img/sec1.png" alt="Slide 1" class="slide w-960 h-640 active rounded-lg shadow-lg">
  <img src="img/sec7.png" alt="Slide 2" class="slide w-960 h-640 rounded-lg shadow-lg">
  <img src="img/sec8.png" alt="Slide 3" class="slide w-960 h-640 rounded-lg shadow-lg">
</div>
<div class="slide-controls absolute inset-x-0 bottom-4 flex justify-center space-x-2">
    <button class="slide-control active" data-slide="0"></button>
    <button class="slide-control" data-slide="1"></button>
    <button class="slide-control" data-slide="2"></button>
  </div>
</div>
  </div>
</section>
    
    <div class="user-popup fixed inset-0 bg-black bg-opacity-50 z-20 flex items-center justify-center" id="userPopup" style="display: none;">
        <div class="bg-white rounded-lg p-6 max-w-md shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">ข้อมูลผู้ใช้</h2>
                <span class="text-gray-500 hover:text-gray-700 cursor-pointer" id="closeBtn">&times;</span>
            </div>
            <form action="#" method="post">
                <input type="text" name="fullname" placeholder="ชื่อเต็ม" value="<?php echo $fullname; ?>" required class="w-full border-gray-300 rounded-md mb-2 p-2">
                <input type="text" name="address" placeholder="ที่อยู่" value="<?php echo $address; ?>" required class="w-full border-gray-300 rounded-md mb-2 p-2">
                <input type="tel" name="phone" placeholder="หมายเลขโทรศัพท์" value="<?php echo $phone; ?>" required class="w-full border-gray-300 rounded-md mb-2 p-2">
                <input type="email" name="email" placeholder="อีเมล" value="<?php echo $email; ?>" required class="w-full border-gray-300 rounded-md mb-2 p -2">
                <input type="password" name="password" placeholder="รหัสผ่าน" value="<?php echo $password; ?>" required class="w-full border-gray-300 rounded-md mb-4 p-2">
                <button type="submit" class="bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-md px-4 py-2 hover:from-red-500 hover:to-orange-500 transition-colors">อัปเดต</button>
            </form>
        </div>
    </div>
<div class="container mx-auto px-4 py-8 flex-grow">
<?php
$sql = "SELECT * FROM loan WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    echo "<div class='flex flex-col md:flex-row pt-24'>";
    echo "<div class='mb-8 md:mr-8'>";
    echo "<h2 class='text-2xl font-bold text-orange-500 mb-4 writing-animation'>ข้อมูลสินเชื่อของผู้ใช้</h2>";
    echo "<div class='bg-white rounded-lg p-4 border border-orange-500'>";
        echo "<p class='text-gray-700 mb-2'><strong>อีเมล:</strong> " . $row['email'] . "</p>";
        echo "<p class='text-gray-700 mb-2'><strong>เพศ:</strong> " . $row['Gender'] . "</p>";
        echo "<p class='text-gray-700 mb-2'><strong>สถานะการสมรส:</strong> " . $row['Married'] . "</p>";
        echo "<p class='text-gray-700 mb-2'><strong>จำนวนสมากชิกในครอบครัวที่ต้องดูแล:</strong> " . $row['Dependents'] . "</p>";
        echo "<p class='text-gray-700 mb-2'><strong>พนักงานอิสระ:</strong> " . $row['Self_Employed'] . "</p>";
        echo "<p class='text-gray-700 mb-2'><strong>รายได้ของผู้สมัคร:</strong> " . $row['ApplicantIncome'] . "</p>";
        echo "<p class='text-gray-700 mb-2'><strong>รายได้ของผู้ร่วมสมัคร:</strong> " . $row['CoapplicantIncome'] . "</p>";
        echo "<p class='text-gray-700 mb-2'><strong>จำนวนเงินกู้:</strong> " . $row['LoanAmount'] . "</p>";
        echo "<p class='text-gray-700 mb-2'><strong>ระยะเวลาการกู้เงิน:</strong> " . $row['Loan_Amount_Term'] . "</p>";
        echo "<p class='text-gray-700 mb-2'><strong>ประวัติเครดิต:</strong> " . $row['Credit_History'] . "</p>";
        echo "<p class='text-gray-700 mb-2'><strong>พื้นที่ที่เลือก:</strong> " . $row['Property_Area'] . "</p>";
        echo "<p class='text-gray-700 mb-2'><strong>สถานะการกู้เงิน:</strong> " . $row['Loan_Status'] . "</p>";
        echo "</div>";
        echo "</div>";
    echo "<div class='md:ml-8'>";
    echo "<div class='grid grid-cols-2 gap-4'>";
        echo "<img src='img/sld5.jpg' alt='Slide 1' class='w-full h-auto rounded-lg max-w-xs slide-animation'>";
        echo "<img src='img/sld6.jpg' alt='Slide 2' class='w-full h-auto rounded-lg max-w-xs slide-animation'>";
        echo "<img src='img/sld5.jpg' alt='Slide 3' class='w-full h-auto rounded-lg max-w-xs slide-animation'>";
        echo "<img src='img/sld6.jpg' alt='Slide 4' class='w-full h-auto rounded-lg max-w-xs slide-animation'>";
        echo "</div>";
    echo "</div>";
    echo "<div class='md:ml-8'>";
    echo "<h3 class='text-xl font-bold text-orange-500 mb-4 writing-animation'>แบบแผนจำลองการกู้</h3>";
    echo "<div class='bg-white rounded-lg p-4 border border-orange-500'>";
    echo "<form>";
    echo "<div class='mb-4'>";
        echo "<label class='block text-gray-700 font-bold mb-2' for='model'>เลือกแบบแผนจำลอง</label>";
        echo "<input class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' id='model' type='text' placeholder='แบบแผนจำลอง'>";
    echo "</div>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
} else {
    echo "<div class='max-w-md mx-auto'>";
            echo "<h2 class='text-2xl font-bold text-orange-500 mb-4'>เพิ่มข้อมูลสินเชื่อ</h2>";
            echo "<form action='add_data.php' method='post' class='bg-white rounded-lg p-6 shadow-md'>";
            echo "<div class='flex space-x-4 mb-4'>";
            echo "<input type='text' name='gender' placeholder='เพศ' required class='flex-1 border-gray-300 rounded-md p-2'>";
            echo "<input type='text' name='married' placeholder='สมรส' required class='flex-1 border-gray-300 rounded-md p-2'>";
            echo "</div>";
            echo "<div class='flex space-x-4 mb-4'>";
            echo "<input type='text' name='dependents' placeholder='ผู้อยู่ในอุปการะ' required class='flex-1 border-gray-300 rounded-md p-2'>";
            echo "<input type='text' name='education' placeholder='การศึกษา' required class='flex-1 border-gray-300 rounded-md p-2'>";
            echo "</div>";
            echo "<div class='flex space-x-4 mb-4'>";
            echo "<input type='text' name='self_employed' placeholder='พนักงานอิสระ' required class='flex-1 border-gray-300 rounded-md p-2'>";
            echo "<input type='text' name='applicant_income' placeholder='รายได้ของผู้สมัคร' required class='flex-1 border-gray-300 rounded-md p-2'>";
            echo "</div>";
            echo "<div class='flex space-x-4 mb-4'>";
            echo "<input type='text' name='coapplicant_income' placeholder='รายได้ของผู้ร่วมสมัคร' required class='flex-1 border-gray-300 rounded-md p-2'>";
            echo "<input type='text' name='loan_amount' placeholder='จำนวนเงินกู้' required class='flex-1 border-gray-300 rounded-md p-2'>";
            echo "</div>";
            echo "<div class='flex space-x-4 mb-4'>";
            echo "<input type='text' name='loan_amount_term' placeholder='ระยะเวลาการกู้เงิน' required class='flex-1 border-gray-300 rounded-md p-2'>";
            echo "<input type='text' name='credit_history' placeholder='ประวัติเครดิต' required class='flex-1 border-gray-300 rounded-md p-2'>";
            echo "</div>";
            echo "<div class='mb-4'>";
            echo "<input type='text' name='property_area' placeholder='พื้นที่ทรัพย์สิน' required class='w-full border-gray-300 rounded-md p-2'>";
            echo "</div>";
            echo "<button type='submit' class='bg-orange-500 text-white rounded-md px-4 py-2 hover:bg-orange-600 transition-colors'>เพิ่มข้อมูล</button>";
            echo "</form>";
            echo "</div>";
}
$conn->close();
  ?>
</div>
<?php include 'includes/footer.php';?>
<script src="่js/script.js"></script>
<script>
    const slides = document.querySelectorAll('.slide');
const controls = document.querySelectorAll('.slide-control');

let currentSlide = 0;

function showSlide(n) {
  slides[currentSlide].classList.remove('active');
  controls[currentSlide].classList.remove('active');
  currentSlide = (n + slides.length) % slides.length;
  slides[currentSlide].classList.add('active');
  controls[currentSlide].classList.add('active');
}

controls.forEach((control, i) => {
  control.addEventListener('click', () => showSlide(i));
});
</script>
</body>
</html>