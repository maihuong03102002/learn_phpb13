<?php

$filePath = 'data.txt';

if (is_writable($filePath)) {
    echo "Tập tin $filePath có thể ghi chép.";
} else {
    echo "Tập tin $filePath không cho phép ghi chép.";
}