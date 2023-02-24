### Installation

1. Open in cmd or terminal app and navigate to this folder
2. Run following commands

```bash
composer install
```

```bash
cd engine
```

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

```bash
setup database in .env file
```

```bash
php artisan jwt:secret
```

```bash
php artisan migrate
```

```bash
php artisan db:seed
```

3. for access api kendaraan

```bash
{host}/api/kendaraan
```

4. for access api penjualan

```bash
{host}/api/penjualan
```

5. for test

```bash
composer test
```

6. for dokumentasi api

```bash
in file Inosoft.postman_collection.json
```