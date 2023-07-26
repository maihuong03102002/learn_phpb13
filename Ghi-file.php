<?php

$filePath = 'data.txt';
$content = "Xin Chào";

$file = fopen($filePath, 'w');

if (fwrite($file, $content) !== false) {
    echo "Đã ghi nội dung \"$content\" vào tập tin $filePath.";
    fclose($file); 
} else {
    echo "Không thể ghi nội dung vào tập tin $filePath.";
    fclose($file); 
}