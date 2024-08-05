<?php

// namespace App\Http\Helpers\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

// class PostHelpers
// {

    function getPostData($nameForm, $data)
    {
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ($_POST as $key => $value) {
                $data[$key] = $value;
            }
        }

        return $nameForm::create($data);
    }


    function getPostDataImage($request, $isMethod, $nameForm, $nameImage, $path, $id = null)
    {
        if (strtolower($request->isMethod($isMethod)) == $request->isMethod('post')) {
            $data = [];

            $random_number = uniqid();
            foreach ($request->all() as $key => $value) {
                $data[$key] = $value;
            }
            if ($request->hasFile($nameImage)) {
                $file = $request->file($nameImage);
                $fileName = $file->getClientOriginalName();
                $fileImageRamdom =  $random_number . "-" . $fileName;
                $file->move(public_path($path), $fileImageRamdom);
                $data[$nameImage] = $fileImageRamdom;
            }
            return $nameForm::create($data);
        } elseif (strtolower($request->isMethod($isMethod)) ==  $request->isMethod('put')) {
            $data = [];

            $existingImage = $nameForm::where('id', $id)->first();

            foreach ($request->all() as $key => $value) {
                $data[$key] = $value;
            }
            if ($request->hasFile($nameImage)) {
                $fileImageRamdom = $existingImage[$nameImage] ?? '';
                if ($fileImageRamdom != '') {
                    if (File::exists(public_path($path . $fileImageRamdom))) {
                        File::delete(public_path($path . $fileImageRamdom));
                    }
                }
                $file = $request->file($nameImage);
                $fileName = $file->getClientOriginalName();
                $file->move(public_path($path), $fileName);
            } else {
                $fileImageRamdom = $existingImage[$nameImage] ?? '';
            }
            $data[$nameImage] = $fileImageRamdom;
            $data = $request->except(['_token', '_method']);
            return $nameForm::where('id', $id)->update($data);
        } elseif (strtolower($request->isMethod($isMethod)) ==  $request->isMethod('delete')) {
            $deleteName = $nameForm::find($id);
            if ($deleteName) {
                $deleteImage = public_path($path . '/' . $deleteName[$nameImage]);
                $checkDeleteImage = $deleteName->delete();
                if ($checkDeleteImage) {
                    if (file_exists($deleteImage)) {
                        unlink($deleteImage);
                    }
                }
            }
        }
    }


    function getPostDataImageAndSubImage($request, $isMethod, $nameForm, $nameImage, $nameSubImage, $path, $id = null)
    {
        if (strtolower($request->isMethod($isMethod)) == $request->isMethod('post')) {
            
            $data = [];
      

            foreach ($request->all() as $key => $value) {
                $data[$key] = $value;
            }
            if ($request->hasFile($nameImage)) {
                $random_number = uniqid();
                $file = $request->file($nameImage);
                $fileName = $file->getClientOriginalName();
                $fileImageRamdom =  $random_number . "-" . $fileName;
                $file->move(public_path($path), $fileImageRamdom);
                $data[$nameImage] = $fileImageRamdom;
            }

            // Xử lý ảnh phụ
            if ($request->hasFile($nameSubImage)) {
                $random_number_image = uniqid();
                $dataImage = [];
                $fileSubImages = $request->file($nameSubImage);
                foreach ($fileSubImages as $item_sub_image) {
                    $fileNameSubImage = $item_sub_image->getClientOriginalName();
                    $fileSubImageRandom = $random_number_image . "-" . $fileNameSubImage;
                    $item_sub_image->move(public_path($path), $fileSubImageRandom);
                    $dataImage[] = $fileSubImageRandom;
                }
                $data[$nameSubImage] = implode(',', $dataImage);
                // dd($data[$nameSubImage]); // Debugging statement to check the processed data
            }
         
            return $nameForm::create($data);
        } elseif (strtolower($request->isMethod($isMethod)) ==  $request->isMethod('put')) {
            $data = [];
            $existingImage = $nameForm::where('id', $id)->first();

            foreach ($request->all() as $key => $value) {
                $data[$key] = $value;
            }
            if ($request->hasFile($nameImage)) {
                $fileImageRamdom = $existingImage[$nameImage] ?? '';
                if ($fileImageRamdom != '') {
                    if (File::exists(public_path($path . $fileImageRamdom))) {
                        File::delete(public_path($path . $fileImageRamdom));
                    }
                }
                $file = $request->file($nameImage);
                $fileName = $file->getClientOriginalName();
                $file->move(public_path($path), $fileName);
            } else {
                $fileImageRamdom = $existingImage[$nameImage] ?? '';
            }
            $data[$nameImage] = $fileImageRamdom;

            if ($request->hasFile($nameSubImage)) {
                $dataImage = [];
                $fileSubImage = $request->file($nameSubImage);
                foreach ($fileSubImage as $item_sub_image) {
                    $sub_fileImageRamdom = $existingImage[$nameSubImage] ?? '';

                    if ($sub_fileImageRamdom !== '') {
                        if (File::exists(public_path($path . $sub_fileImageRamdom))) {
                            File::delete(public_path($path . $sub_fileImageRamdom));
                        }
                    }
                    $fileNameSubIgame = $item_sub_image->getClientOriginalName();
                    $item_sub_image->move(public_path($path), $fileNameSubIgame);
                    $dataImage[] = $fileNameSubIgame;
                }
                $data[$nameSubImage] = implode(',', $dataImage);
            } else {
                $sub_fileImageRamdom = explode(',', $existingImage[$nameSubImage] ?? '');
                $data[$nameSubImage] = implode(',', $sub_fileImageRamdom);
            }
            $data = $request->except(['_token', '_method']);

            return $nameForm::where('id', $id)->update($data);
        } elseif (strtolower($request->isMethod($isMethod)) == $request->isMethod('delete')) {
            $deleteName = $nameForm::find($id);
            if ($deleteName) {
                $deleteImage = public_path($path . '/' . $deleteName[$nameImage]);
                $checkDeleteImage = $deleteName->delete();
                if ($checkDeleteImage) {
                    if (file_exists($deleteImage)) {
                        unlink($deleteImage);
                    }
                    if ($nameSubImage && $deleteName[$nameSubImage]) {
                        $subImages = explode(',', $deleteName[$nameSubImage]);
                        foreach ($subImages as $subImage) {
                            $deleteSubImagePath = public_path($path . '/' . $subImage);
                            if (file_exists($deleteSubImagePath)) {
                                unlink($deleteSubImagePath);
                            }
                        }
                    }
                }
            }
        }
    }
    // function getPostDataImageAndSubImage(Request $request = null, $isMethod = null, $nameForm = null, $nameImage = null, $nameSubImage = null, $path = null, $id = null)
    // {
    //     $random_number = uniqid();

    //     if (strtolower($request->isMethod($isMethod)) == strtolower('post')) {
    //         $data = $request->except(['_token', '_method']);

    //         // Xử lý ảnh chính
    //         if ($request->hasFile($nameImage)) {
    //             $file = $request->file($nameImage);
    //             $fileName = $file->getClientOriginalName();
    //             $fileImageRandom = $random_number . "-" . $fileName;
    //             $file->move(public_path($path), $fileImageRandom);
    //             $data[$nameImage] = $fileImageRandom;
    //         }

    //         // Xử lý ảnh phụ
    //         if ($request->hasFile($nameSubImage)) {
    //             $dataImage = [];
    //             $fileSubImage = $request->file($nameSubImage);
    //             foreach ($fileSubImage as $item_sub_image) {
    //                 $fileNameSubImage = $item_sub_image->getClientOriginalName();
    //                 $fileSubImageRandom = $random_number . "-" . $fileNameSubImage;
    //                 $item_sub_image->move(public_path($path), $fileSubImageRandom);
    //                 $dataImage[] = $fileSubImageRandom;
    //             }
    //             $data[$nameSubImage] = implode(',', $dataImage);
    //         }
    //         return $nameForm::create($data);
    //     } elseif (strtolower($request->isMethod($isMethod)) == strtolower('put')) {
    //         $data = $request->except(['_token', '_method']);
    //         $existingImage = $nameForm::where('id', $id)->first();

    //         // Xử lý ảnh chính
    //         if ($request->hasFile($nameImage)) {
    //             $fileImageRandom = $existingImage[$nameImage] ?? '';
    //             if ($fileImageRandom != '') {
    //                 if (File::exists(public_path($path . '/' . $fileImageRandom))) {
    //                     File::delete(public_path($path . '/' . $fileImageRandom));
    //                 }
    //             }
    //             $file = $request->file($nameImage);
    //             $fileName = $file->getClientOriginalName();
    //             $fileImageRandom = $random_number . "-" . $fileName;
    //             $file->move(public_path($path), $fileImageRandom);
    //             $data[$nameImage] = $fileImageRandom;
    //         } else {
    //             $data[$nameImage] = $existingImage[$nameImage] ?? '';
    //         }

    //         // Xử lý ảnh phụ
    //         if ($request->hasFile($nameSubImage)) {
    //             $dataImage = [];
    //             $fileSubImage = $request->file($nameSubImage);
    //             foreach ($fileSubImage as $item_sub_image) {
    //                 $subFileImageRandom = $existingImage[$nameSubImage] ?? '';
    //                 if ($subFileImageRandom !== '') {
    //                     if (File::exists(public_path($path . '/' . $subFileImageRandom))) {
    //                         File::delete(public_path($path . '/' . $subFileImageRandom));
    //                     }
    //                 }
    //                 $fileNameSubImage = $item_sub_image->getClientOriginalName();
    //                 $fileSubImageRandom = $random_number . "-" . $fileNameSubImage;
    //                 $item_sub_image->move(public_path($path), $fileSubImageRandom);
    //                 $dataImage[] = $fileSubImageRandom;
    //             }
    //             $data[$nameSubImage] = implode(',', $dataImage);
    //         } else {
    //             $data[$nameSubImage] = $existingImage[$nameSubImage] ?? '';
    //         }
    //         return $nameForm::where('id', $id)->update($data);
    //     } elseif (strtolower($request->isMethod($isMethod)) == strtolower('delete')) {
    //         $deleteName = $nameForm::find($id);
    //         if ($deleteName) {
    //             $deleteImage = public_path($path . '/' . $deleteName[$nameImage]);
    //             $checkDeleteImage = $deleteName->delete();
    //             if ($checkDeleteImage) {
    //                 if (file_exists($deleteImage)) {
    //                     unlink($deleteImage);
    //                 }
    //                 if ($nameSubImage && $deleteName[$nameSubImage]) {
    //                     $subImages = explode(',', $deleteName[$nameSubImage]);
    //                     foreach ($subImages as $subImage) {
    //                         $deleteSubImagePath = public_path($path . '/' . $subImage);
    //                         if (file_exists($deleteSubImagePath)) {
    //                             unlink($deleteSubImagePath);
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }
    // }
// }
