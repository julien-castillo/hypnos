<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Suite;
use App\Models\SuiteImage;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DataSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $data = include('data.php');

    foreach ($data as $hotel) {
      $file_content = file_get_contents('./public/images/seeds/hotels/' . $hotel['image_path']);

      $filename = $hotel['image_path'];
      $image_path = "coverHotel/{$filename}";

      Storage::disk('public')->put($image_path, $file_content);

      $img = Image::make('storage/app/public/' . $image_path);
      $img->fit(300, 300, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
      });
      $img->save('storage/app/public/' . $image_path);

      $user = User::find($hotel['user_id']);

      $new_hotel = Hotel::create([
        "name" => $hotel['name'],
        "city" => $hotel['city'],
        "address" => $hotel['address'],
        "description" => $hotel['description'],
        "image_path" => $filename,
      ]);
      $new_hotel->user()->associate($user);
      $new_hotel->save();

      // Suites
      foreach ($hotel['suites'] as $suite) {

        $suite = Suite::create([
          "name" => $suite['name'],
          "price" => $suite['price'],
          "description" => $suite['description'],
        ]);

        $suite->hotel()->associate($new_hotel);
        $suite->save();

        $directory = './public/images/seeds/suites';

        if (is_dir($directory)) {
          $images = [];

          foreach (scandir($directory) as $file) {
            if ($file !== '.' && $file !== '..') {
              $images[] = $file;
            }
          }

          $first = TRUE;
          foreach ($images as $filename) {

            if ($first) {
              // cover
              $storage_path = "cover/{$filename}";

              Storage::disk('public')->put($storage_path, file_get_contents($directory.'/'.$filename));

              $img = Image::make('storage/app/public/' . $storage_path);
              $img->fit(150, 150, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
              });
              $img->save('storage/app/public/' . $storage_path);
              $suite->cover = $storage_path;
              $suite->save();

              $first = FALSE;
            }

            $storage_path = "suites/{$suite->id}/{$filename}";

            Storage::disk('public')->put($storage_path, file_get_contents($directory.'/'.$filename));

            $img = Image::make('storage/app/public/' . $storage_path);
            $img->fit(150, 150, function ($constraint) {
              $constraint->aspectRatio();
              $constraint->upsize();
            });
            $img->save('storage/app/public/' . $storage_path);

            $data_suiteimage['storage_path'] = $storage_path;
            $data_suiteimage['suite_id'] = $suite->id;

            SuiteImage::create($data_suiteimage);
          }

        }
      }
    }

  }

}
