# Sistema de Gestión de CV Profesional

![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.1-777BB4?style=flat-square&logo=php)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-7952B3?style=flat-square&logo=bootstrap)

## 🎯 Propósito

Este sistema está diseñado para simplificar la creación de currículums vitae profesionales, permitiendo a los usuarios crear, personalizar y gestionar sus CVs de manera eficiente y efectiva. El sistema está optimizado para maximizar las oportunidades de empleo de los usuarios a través de plantillas profesionales y un proceso de creación simplificado.

## ✨ Características Principales

- **Creación Rápida**: Crea tu CV profesional en solo 3 pasos simples
- **Diseño Profesional**: Plantillas modernas y atractivas optimizadas para ATS
- **Personalización Total**: Adapta tu CV a cada oferta de trabajo
- **Multilingüe**: Soporte completo en español e inglés
- **Interfaz Intuitiva**: Diseño responsive y fácil de usar
- **Descarga Instantánea**: Obtén tu CV en PDF en segundos

## 🚀 Tecnologías Utilizadas

- Laravel 10.x
- PHP 8.1
- Bootstrap 5
- Blade Templates
- MySQL/PostgreSQL

## 📋 Requisitos Previos

- PHP >= 8.1
- Composer
- Node.js & NPM
- Base de datos MySQL o PostgreSQL
- Servidor web (Apache/Nginx)

## 🛠️ Instalación

1. Clona el repositorio:
```bash
git clone https://github.com/tu-usuario/gestion-RRHH.git
cd gestion-RRHH
```

2. Instala las dependencias de PHP:
```bash
composer install
```

3. Instala las dependencias de Node.js:
```bash
npm install
```

4. Copia el archivo de entorno:
```bash
cp .env.example .env
```

5. Genera la clave de aplicación:
```bash
php artisan key:generate
```

6. Configura la base de datos en el archivo `.env`

7. Ejecuta las migraciones:
```bash
php artisan migrate
```

8. Compila los assets:
```bash
npm run dev
```

9. Inicia el servidor de desarrollo:
```bash
php artisan serve
```

## 🌐 Características del Sistema

### Proceso de Creación de CV
1. **Información Personal**: Completa tus datos básicos y experiencia
2. **Personalización**: Elige y adapta una plantilla profesional
3. **Descarga**: Obtén tu CV en PDF listo para compartir

### Optimización para ATS
- Plantillas diseñadas para pasar los sistemas de seguimiento de candidatos
- Formato optimizado para la lectura por IA
- Estructura clara y profesional

### Soporte Multilingüe
- Interfaz completa en español e inglés
- Traducciones dinámicas para todos los elementos
- Soporte para múltiples formatos de fecha y números

## 🤝 Contribución

Las contribuciones son bienvenidas. Por favor, lee el archivo [CONTRIBUTING.md](CONTRIBUTING.md) para detalles sobre nuestro código de conducta y el proceso para enviarnos pull requests.

## 📄 Licencia

Este proyecto está licenciado bajo la Licencia MIT - ver el archivo [LICENSE.md](LICENSE.md) para más detalles.

## 📞 Soporte

Para soporte, por favor contacta a:
- Email: contacto@postulate.com
- Teléfono: (555) 123-4567

## 🙏 Agradecimientos

- Laravel Framework
- Bootstrap Team
- Todos los contribuidores del proyecto
