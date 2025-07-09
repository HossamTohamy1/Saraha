<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('StoreImage')) {
    function StoreImage($Image, $Path, $OldImage = null)
    {
        if ($OldImage != null) {
            Storage::disk('public')->delete($OldImage);
        }
        $path = Storage::disk('public')->put($Path, $Image);
        return $path;
    }
}
