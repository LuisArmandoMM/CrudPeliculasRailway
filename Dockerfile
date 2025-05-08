# Usa una imagen base de PHP con Apache
FROM php:8.2-apache

# Copia los archivos del proyecto al contenedor
COPY . /var/www/html/

# Exponer el puerto 80 para el servidor web
EXPOSE 80

# Habilitar el módulo de reescritura de Apache (si lo necesitas)
RUN a2enmod rewrite

# Comando para iniciar Apache
CMD ["apache2-foreground"]
