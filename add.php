
 <?php
require 'config.php';
$msg = '';

if (isset($_POST['submit'])) {
    $p_name = mysqli_real_escape_string($conn, $_POST['pName']);
    $p_textname = mysqli_real_escape_string($conn, $_POST['pTextname']);
    $target_dir = "imageproduct/";
    $target_file = $target_dir . basename($_FILES['pImg']['name']);
    $allowed_types = ['imageproduct/', 'imageproduct/', 'imageproduct/'];

    // Faylni yuklashni tekshirish
    if ($_FILES['pImg']['error'] === UPLOAD_ERR_OK && in_array($_FILES['pImg']['type'], $allowed_types)) {
        if (move_uploaded_file($_FILES['pImg']['tmp_name'], $target_file)) {
            $sql = "INSERT INTO product(product_name, product_price, product_img) VALUES('$p_name', '$p_textname', '$target_file')";
            if (mysqli_query($conn, $sql)) {
                $msg = "Product added to the database successfully!";
            } else {
                $msg = "Failed to add Product: " . mysqli_error($conn);
            }
        } else {
            $msg = "Failed to move uploaded file.";
        }
    } else {
        $msg = "Invalid file type or upload error.";
    }
}
echo $msg;
var_dump($msg)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="bg-info">
    <div class="main">
        <form action="">
            <div class="title-form-page">
                <div class="flexs-box">
                    <img src="img/chat-group.png" alt="photo chat group">
                </div>
                <div class="flexs-box">
                    <h4>Add Product</h4>
                </div>
            </div>
            <div class="text-form-page">
                <p>Add a new product to your store.</p>
            </div>
            <div class="form-container">
                <div class="form_pages">
                    <div class="form-info-page">
                        <h4 for="">Name <span>*</span></h4>
                        <input type="text" require name="pName">
                        <p>Give your product a short and clear name</p>
                        <h4>Description</h4>
                        <textarea name="" id="" cols="20" rows="4" require name="pTextname"></textarea>
                        <p>Give your product a short and clear Description</p>
                        <div class="images_content">
                            <div class="content_value">
                                <p>Drop your images here or</p>
                                <button type="button">Click to browse</button>
                                <input require name="pImg" type="file" accept="image/*" class="file-input">
                            </div>
                            <img src="" alt="Uploaded Image">
                        </div>
                        <p>Add to imgto your product.Used torepresent your product during checkout im email social sharing and more.</p>
                    </div>
                </div>
            </div>
            <div class="container_btn">
                <button  class="save_btn"> Save as draft</button>
             
                    <button type="submit" class="next_btn">Next</button>
            </div>
            <h4 style="text-align: center; color:#fff;"><?php echo $msg;?></h4>
        </form>

    </div>

    <script src="js/main.js"></script>
</body>

</html>