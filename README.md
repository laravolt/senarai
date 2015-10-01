# senarai

Tambah item ke dalam daftar

## Install

Via Composer

``` bash
$ composer require laravolt/senarai
```

Tambahkan ServiceProvider ke dalam array providers di dalam file config/app.php

``` php
Laravolt\Senarai\ServiceProvider::class
```

Kamu dapat menggunakan facade untuk mempersingkat penulisan. Tambahkan ke array aliases di dalam file config/app.php

``` php
'Senarai' => Laravolt\Senarai\Facade::class
```

## Konfigurasi

``` bash
php artisan vendor:publish
```

Tambahkan trait `SenaraiTrait` di Model

``` php
use Laravolt\Senarai\SenaraiTrait;

class User extends Model
{
    use SenaraiTrait;

    ...
}
```

atau

``` php
use Laravolt\Senarai\SenaraiTrait;

class Product extends Model
{
    use SenaraiTrait;

    ...
}
```

## Penggunaan

``` php
Senarai::add($obj, 'write-your-list');
Senarai::remove($obj, 'write-your-list');
Senarai::lists('write-your-list');
```

#### Menambah item ke dalam daftar

``` php
// following
$user = User::find(1);
Senarai::add($user, 'follow');

// tambahkan produk ke wishlist
$product = Product::find(1);
Senarai::add($product, 'wishlist');
```

#### Menghapus item didalam daftar

``` php
// hapus following
$user = User::find(1);
Senarai::remove($user, 'follow');

// hapus produk dari wishlist
$product = Product::find(1);
Senarai::remove($product, 'wishlist');
```

#### Mendapatkan daftar item didalam list

``` php
$following = Senarai::lists(User::find(1), 'follow');

$wishlist = Senarai::lists(auth()->user(), 'wishlist');
```

#### Mendapatkan daftar yang menambahkan item

``` php
$user = User::find($request->input('id'));
foreach($user->containers as $item){
    echo $item->user_id;
}
```
