# School Management System Docker

Sistem manajemen sekolah berbasis PHP dengan MySQL yang dapat dijalankan menggunakan Docker.

## Prerequisites

- Docker Desktop
- Docker Compose

## Cara Menjalankan

1. **Clone atau download project ini**

2. **Buka terminal/command prompt di direktori project**

3. **Jalankan dengan Docker Compose:**

   ```bash
   docker-compose up -d
   ```

4. **Akses aplikasi:**
   - **Website Utama:** http://localhost:8080
   - **phpMyAdmin:** http://localhost:8081

## Informasi Login

### Database (phpMyAdmin)

- **Server:** localhost:3306
- **Username:** root
- **Password:** rootpassword

### Aplikasi Admin

- **Username:** Developer
- **Password:** developer321

## Services yang Tersedia

### Web Server

- **Port:** 8080
- **Container:** school_web
- **Stack:** Apache + PHP 8.1

### Database

- **Port:** 3306
- **Container:** school_db
- **Database:** MySQL 8.0
- **Database Name:** laravel_myschools

### phpMyAdmin

- **Port:** 8081
- **Container:** school_phpmyadmin
- **GUI untuk manajemen database**

## Struktur Project

```
school/
├── docker-compose.yml    # Konfigurasi Docker Compose
├── Dockerfile           # Image definition untuk web server
├── laravel_myschools.sql # Database dump (auto-import)
├── index.php            # Entry point aplikasi
├── helper/              # Helper files
│   ├── auth.php
│   └── connection.php   # Database connection (Docker ready)
├── src/                 # Source code
│   ├── Admin/           # Admin panel
│   └── LandingPage/     # Public pages
└── assets/              # Static assets
```

## Perintah Docker Useful

### Menjalankan services

```bash
docker-compose up -d
```

### Melihat logs

```bash
docker-compose logs -f web
```

### Menghentikan services

```bash
docker-compose down
```

### Rebuild containers

```bash
docker-compose up --build -d
```

### Export database

```bash
docker exec school_db mysqldump -u root -prootpassword laravel_myschools > backup.sql
```

### Import database (jika diperlukan)

```bash
docker exec -i school_db mysql -u root -prootpassword laravel_myschools < laravel_myschools.sql
```

## Troubleshooting

### Database connection error

- Pastikan container `school_db` sudah running
- Check logs: `docker-compose logs db`

### Permission issues

- Jalankan: `docker-compose down && docker-compose up --build -d`

### Port sudah digunakan

- Ubah port di `docker-compose.yml` jika ada konflik

## Development

Untuk development, file-file di direktori project akan otomatis ter-sync dengan container melalui volume mounting. Perubahan akan langsung terlihat tanpa perlu rebuild container.

## Database Backup

Database akan otomatis di-import dari file `laravel_myschools.sql` saat pertama kali container dibuat. Data akan tersimpan di Docker volume `mysql_data`.
