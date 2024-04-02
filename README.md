<h1 align="center">Yayasan Mentari Meraki Asa</h1>


## Tutorial cara Menginstall

**Clone Repository**

```bash
https://github.com/lalosianturi21/ymma_magang.git
```

**Download zip**

```bash
extract file zip
```

## Buka di kode editor


## Install composer

```bash
composer install
```

## Copy .Env

```bash
copy .env.example menjadi .env
```

## Buat database di localhost 

```bash
nama database : db_ymma
```

## Setting database di .env

```bash
DB_PORT=3306
DB_DATABASE=db_ymma
DB_USERNAME=root
DB_PASSWORD=
```

## Generate key

```bash
php artisan key:generate
```

## Jalankan migrate dan seeder

```bash
php artisan migrate --seed
```

## Buat storage link

```bash
php artisan storage:link
```

## Jalankan Serve

```bash
php artisan serve
```

