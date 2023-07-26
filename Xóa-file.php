<?php

$filePath = 'data.txt';

if (unlink($filePath)) {
    echo "Đã xóa tập tin $filePath thành công.";
} else {
    echo "Không thể xóa tập tin $filePath.";
}