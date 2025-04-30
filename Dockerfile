# Gunakan image dasar PHP dengan Apache
FROM php:8.2-apache

# Aktifkan ekstensi PHP yang dibutuhkan untuk MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Salin semua file dari folder proyek ke folder yang dilayani oleh Apache
COPY . /var/www/html/

# Beri izin agar folder dapat dibaca server
RUN chown -R www-data:www-data /var/www/html

# Buka port 80 (default HTTP)
EXPOSE 80
