<?php
class ImageUpload {
    private $fileInfo;

    public function __construct($fileInfo) {
        $this->fileInfo = $fileInfo;
    }

    public function getFileName() {
        return $this->fileInfo['name'];
    }

    public function moveFile($targetDirectory) {
        $targetPath = $targetDirectory . '/' . $this->getFileName();
        return move_uploaded_file($this->fileInfo['tmp_name'], $targetPath);
    }

    public function isImage() {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        return in_array($this->fileInfo['type'], $allowedTypes);
    }
}

// Nếu người dùng gửi POST form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra xem đã gửi tệp hay chưa
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        // Lấy thông tin của tệp tải lên
        $fileInfo = $_FILES['file'];

        // Tạo đối tượng ImageUpload
        $imageUpload = new ImageUpload($fileInfo);

        // Kiểm tra xem tệp có phải là hình ảnh hay không
        if ($imageUpload->isImage()) {
            // Đường dẫn thư mục đích để di chuyển tệp
            $targetDirectory = 'uploads';

            // Di chuyển tệp vào thư mục đích
            if ($imageUpload->moveFile($targetDirectory)) {
                echo "Tải tệp lên thành công.";
            } else {
                echo "Không thể di chuyển tệp.";
            }
        } else {
            echo "Tệp không phải là hình ảnh.";
        }
    } else {
        echo "Vui lòng chọn một tệp để tải lên.";
    }
}
?>

<!-- FORM HTML để tải lên tệp -->
<!DOCTYPE html>
<html>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
  Chọn tệp để tải lên:
  <input type="file" name="file" id="file">
  <input type="submit" value="Tải lên" name="submit">
</form>

</body>
</html>




