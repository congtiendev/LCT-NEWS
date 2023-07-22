<?php


function uploadFile($nameFolder, $file)
{
    $fileName = time() . '_' . $file->getClientOriginalName();
    return $file->storeAs($nameFolder, $fileName, 'public');
}

function deleteFile($nameFolder, $fileName)
{
    $filePath = public_path('storage/' . $nameFolder . '/' . $fileName);
    if (file_exists($filePath)) {
        unlink($filePath);
        return true;
    } else {
        return false;
    }
}
