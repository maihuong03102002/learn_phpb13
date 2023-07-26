<?php

$filePath = 'data.txt';

if (file_exists($filePath)) {
    echo "Tập tin $filePath tồn tại.";
} else {
    echo "Tập tin $filePath không tồn tại.";
}