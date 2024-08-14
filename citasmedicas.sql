-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2024 a las 00:44:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `citasmedicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scheduled_date` date NOT NULL,
  `scheduled_time` time NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `specialty_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Reservada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `appointments`
--

INSERT INTO `appointments` (`id`, `scheduled_date`, `scheduled_time`, `type`, `description`, `doctor_id`, `patient_id`, `specialty_id`, `created_at`, `updated_at`, `status`) VALUES
(1, '2024-08-14', '22:30:00', 'Consulta', 'Síntomas de Covicho', 3, 2, 5, '2024-08-14 19:23:02', '2024-08-14 21:21:35', 'Atendida'),
(2, '2024-08-15', '08:00:00', 'Consulta', 'asfdgadgasdg', 3, 16, 5, '2024-08-14 20:31:16', '2024-08-14 21:22:07', 'Cancelada'),
(3, '2024-08-16', '15:30:00', 'Examen', 'asdfasfafa', 3, 16, 5, '2024-08-14 20:31:42', '2024-08-14 21:35:15', 'Cancelada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@admin.com|127.0.0.1', 'i:1;', 1723668143),
('admin@admin.com|127.0.0.1:timer', 'i:1723668143;', 1723668143),
('paciente@mail.com|127.0.0.1', 'i:1;', 1723671266),
('paciente@mail.com|127.0.0.1:timer', 'i:1723671266;', 1723671266);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancelled_appointments`
--

CREATE TABLE `cancelled_appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `justification` varchar(255) DEFAULT NULL,
  `cancelled_by_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cancelled_appointments`
--

INSERT INTO `cancelled_appointments` (`id`, `justification`, `cancelled_by_id`, `appointment_id`, `created_at`, `updated_at`) VALUES
(1, 'porque sí', 3, 2, '2024-08-14 21:22:07', '2024-08-14 21:22:07'),
(2, 'pues me canceló una, yo también!', 16, 3, '2024-08-14 21:35:15', '2024-08-14 21:35:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `cedula` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `pinterest` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `cedula`, `phone`, `address`, `email`, `message`, `facebook`, `youtube`, `twitter`, `github`, `pinterest`, `created_at`, `updated_at`) VALUES
(1, 'Daniela', '000000001', '018001234567', 'Zona Centro', 'admin@gmail.com', 'For your health', 'fb.com/DanielaMallozi', 'youtube.com/DanielaMallozi', 'x.com/DanielaMallozi', 'github.com/DanielaMallozi', 'pinterest.com/DanielaMallozi', '2024-08-13 22:37:07', '2024-08-13 23:16:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` smallint(5) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL,
  `morning_start` time NOT NULL,
  `morning_end` time NOT NULL,
  `afternoon_start` time NOT NULL,
  `afternoon_end` time NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `day`, `active`, `morning_start`, `morning_end`, `afternoon_start`, `afternoon_end`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 0, 1, '08:00:00', '11:30:00', '14:00:00', '23:30:00', 3, '2024-08-14 19:08:56', '2024-08-14 20:27:24'),
(2, 1, 1, '08:30:00', '11:30:00', '14:00:00', '23:00:00', 3, '2024-08-14 19:08:56', '2024-08-14 20:27:24'),
(3, 2, 1, '08:00:00', '11:30:00', '14:00:00', '23:00:00', 3, '2024-08-14 19:08:56', '2024-08-14 20:27:24'),
(4, 3, 1, '08:00:00', '11:30:00', '14:30:00', '23:00:00', 3, '2024-08-14 19:08:56', '2024-08-14 20:27:24'),
(5, 4, 1, '08:00:00', '11:30:00', '14:00:00', '23:00:00', 3, '2024-08-14 19:08:56', '2024-08-14 20:27:24'),
(6, 5, 1, '08:00:00', '11:30:00', '14:00:00', '23:30:00', 3, '2024-08-14 19:08:56', '2024-08-14 20:27:24'),
(7, 6, 1, '08:00:00', '11:30:00', '14:00:00', '23:00:00', 3, '2024-08-14 19:08:56', '2024-08-14 20:27:24'),
(8, 0, 1, '08:00:00', '11:30:00', '14:00:00', '23:00:00', 17, '2024-08-14 19:49:44', '2024-08-14 21:54:55'),
(9, 1, 1, '08:00:00', '11:30:00', '14:00:00', '23:00:00', 17, '2024-08-14 19:49:44', '2024-08-14 21:54:55'),
(10, 2, 1, '08:00:00', '11:30:00', '14:00:00', '23:00:00', 17, '2024-08-14 19:49:44', '2024-08-14 21:54:55'),
(11, 3, 1, '08:00:00', '11:30:00', '14:00:00', '14:00:00', 17, '2024-08-14 19:49:44', '2024-08-14 21:54:55'),
(12, 4, 1, '08:00:00', '11:30:00', '14:00:00', '23:30:00', 17, '2024-08-14 19:49:44', '2024-08-14 21:54:55'),
(13, 5, 1, '08:00:00', '11:30:00', '14:00:00', '23:30:00', 17, '2024-08-14 19:49:44', '2024-08-14 21:54:55'),
(14, 6, 1, '08:00:00', '11:30:00', '14:00:00', '23:30:00', 17, '2024-08-14 19:49:44', '2024-08-14 21:54:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2022_03_05_232951_create_specialties_table', 1),
(5, '2022_05_18_041836_create_horarios_table', 1),
(6, '2022_06_13_023339_create_specialty_user_table', 1),
(7, '2022_07_19_180807_create_appointments_table', 1),
(8, '2022_08_13_000357_add_status_to_appointments', 1),
(9, '2022_08_28_201142_create_cancelled_appointments_table', 1),
(10, '2022_08_28_212415_rename_cancelled_by_in_cancelled_appointments_table', 1),
(11, '2024_05_10_102910_create_sliders_table', 1),
(12, '2024_05_13_112005_create_contacts_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('RH@mail.com', '$2y$12$23pZFe8uaPbRg2mZI.FT8.2KVjpBLBiVMOY0iI1jps/9Y36lnxh.a', '2024-08-14 02:06:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('HVu04ZSKGWQhVI9xXzWIW0eXUjX4CitsDw0VBkTq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:129.0) Gecko/20100101 Firefox/129.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTExlaFFHYWt1T1AwNmNHTXlSNmwwR1F0NTdIQ1NLYUZkS05lRDd1YSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9fQ==', 1723673701),
('mm37rFYoVjO3SVV9u6VP7QApIo6uDCU671pEqTWH', 16, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoieUN3OGRSUWxoOHNieVdHbGp5SjFHNWVuN25LMGdLZEtBcXRiN3hMNSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE4OiJmbGFzaGVyOjplbnZlbG9wZXMiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE2O3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTcyMzY2NTE1OTt9fQ==', 1723667643);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `subtitle`, `image`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Sed culpa iste et eos possimus qui.', 'Et ipsum ducimus nisi quisquam. Rem est ea voluptas aut quo.', 'https://via.placeholder.com/1080x500.png/004499?text=est', 'http://prohaska.biz/', '2024-08-13 22:37:06', '2024-08-13 22:37:06'),
(2, 'Qui consectetur velit et eius libero molestiae molestiae.', 'Natus amet quidem animi ea. Aut provident numquam beatae debitis et nesciunt ut esse.', 'https://via.placeholder.com/1080x500.png/00ddcc?text=exercitationem', 'https://www.armstrong.com/magni-ut-cupiditate-qui-ab', '2024-08-13 22:37:06', '2024-08-13 22:37:06'),
(3, 'Recusandae quo et excepturi placeat ipsa voluptas quia.', 'Et quia est corporis suscipit incidunt. Et quia sed dolor id quod laborum ex.', 'https://via.placeholder.com/1080x500.png/002255?text=similique', 'https://carter.com/non-dolorem-laudantium-illo-eaque.html', '2024-08-13 22:37:06', '2024-08-13 22:37:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specialties`
--

CREATE TABLE `specialties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `specialties`
--

INSERT INTO `specialties` (`id`, `name`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Ginecología', 'ginecologia', NULL, 'sliders/cdjD2SMwl6JVmT6PVn28hSmRGCzhZNquIQWFAiM6.jpg', '2024-08-13 22:37:06', '2024-08-14 04:09:27'),
(3, 'Pediatría', 'pediatria', NULL, 'sliders/EFN85X1QqTDspAXXHIEOg4ErLygoYKMMlhpEhQx3.jpg', '2024-08-13 22:37:06', '2024-08-14 04:09:18'),
(4, 'Nutriología', 'nutriologia', '<p>Come sano<br></p>', 'sliders/QjCpqmgNHMbZMu13gnrUpgJIBETOyiBao8sGDNiF.jpg', '2024-08-13 22:37:07', '2024-08-14 03:58:02'),
(5, 'Médico General', 'medico-general', NULL, 'sliders/Uuxy3bB1vbUMTpJf57eF8K6O2H6YlZZIKA1rqoii.jpg', '2024-08-13 22:37:07', '2024-08-14 04:14:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specialty_user`
--

CREATE TABLE `specialty_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `specialty_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `specialty_user`
--

INSERT INTO `specialty_user` (`id`, `user_id`, `specialty_id`, `created_at`, `updated_at`) VALUES
(3, 6, 2, '2024-08-13 22:37:06', '2024-08-13 22:37:06'),
(4, 7, 2, '2024-08-13 22:37:06', '2024-08-13 22:37:06'),
(11, 3, 5, '2024-08-13 22:37:07', '2024-08-13 22:37:07'),
(12, 17, 2, '2024-08-14 19:48:33', '2024-08-14 19:48:33'),
(13, 17, 3, '2024-08-14 19:48:33', '2024-08-14 19:48:33'),
(14, 17, 4, '2024-08-14 19:48:33', '2024-08-14 19:48:33'),
(15, 17, 5, '2024-08-14 19:48:33', '2024-08-14 19:48:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `cedula` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `cedula`, `address`, `phone`, `picture`, `slug`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Daniela', 'admin@gmail.com', '2024-08-13 22:37:05', '$2y$12$x38QC4WvU3C9Y3C0FI9ju.4adkB6uzrwna5fCpDxGzWgOEnKNX2le', '018001234567', 'Zona centro', '8341234567', 'users/ZxNbUXJp7B1aqcd98ZRYr0B7yy2aYNEsETCEOgv6.jpg', 'Administrador', 'admin', NULL, '2024-08-13 22:37:05', '2024-08-13 23:00:47'),
(2, 'Paciente', 'paciente@gmail.com', '2024-08-13 22:37:05', '$2y$12$powWh9V.3LRKSYOQPnHj/uXklQrOQQt5tvP7FoX503Mi7xUY1MSTe', '01020347589', 'La misma', '8341234567', NULL, 'paciente', 'paciente', NULL, '2024-08-13 22:37:05', '2024-08-14 18:56:03'),
(3, 'Yo soy el Doctor', 'doctor@gmail.com', '2024-08-13 22:37:05', '$2y$12$Nx/Q.OOnMf4pD8vbfwsfXuWbOoxROTgabk1sjb22anzfCCFod4qha', '0180012345', 'Zona Centro', '8341234567', NULL, 'doctor', 'doctor', NULL, '2024-08-13 22:37:06', '2024-08-14 20:45:46'),
(4, 'Ms. Rosetta Grant II', 'nrussel@example.com', '2024-08-13 22:37:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '83497641', '985 Dennis Cliff\nSouth Johnathan, MO 09232-5043', '1-888-819-1767', NULL, 'ms-rosetta-grant-ii', 'doctor', 'LXhhmEALWz', '2024-08-13 22:37:06', '2024-08-13 22:37:06'),
(5, 'Conner Schiller', 'yblick@example.net', '2024-08-13 22:37:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '13507653', '469 King Viaduct\nNew Cara, IN 36706', '888.976.6681', NULL, 'conner-schiller', 'doctor', 'EbvSSQFEu1', '2024-08-13 22:37:06', '2024-08-13 22:37:06'),
(6, 'Mrs. Elisha Hane', 'marcelle.jones@example.com', '2024-08-13 22:37:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '15555346', '1272 Treutel Club\nNew Orlandohaven, TN 93364-1472', '800-740-9323', NULL, 'mrs-elisha-hane', 'doctor', 'SmhdEdg8Da', '2024-08-13 22:37:06', '2024-08-13 22:37:06'),
(7, 'Michelle Ryan DDS', 'conn.aglae@example.org', '2024-08-13 22:37:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '88264788', '2391 Miller Summit Suite 064\nNorth Clark, SC 86194-2396', '(866) 918-1976', NULL, 'michelle-ryan-dds', 'doctor', 'CmB6bNSuYf', '2024-08-13 22:37:06', '2024-08-13 22:37:06'),
(14, 'Refugio Hernández', 'RH@mail.com', NULL, '$2y$12$xpms2T1WfTxfjaRAERhkEewoh9JoOGkELIHUbDU5DGo2hVR1/DLXS', '0123456789', NULL, '8341234567', NULL, NULL, 'paciente', NULL, '2024-08-13 22:41:49', '2024-08-13 22:41:49'),
(15, 'Colaborador AM', 'colab@AM.com', NULL, '$2y$12$FgTehilR9DHx1fAvdu1zN.fmbnb0qpz8kvdUj/jv/w/J90WO3EGza', '012345', 'Zona Centro', '8341234567', NULL, NULL, 'admin', NULL, '2024-08-14 19:31:51', '2024-08-14 19:40:53'),
(16, 'Paciente2', 'Paciente2@mail.com', NULL, '$2y$12$kuaoWmiIMN6YlOMt6IstXOE25igSqrNQIyisS4kh8tYF04RB/1yM2', '0123456789', 'Zona Centro', '8341234567', NULL, NULL, 'paciente', NULL, '2024-08-14 19:44:18', '2024-08-14 19:44:18'),
(17, 'Yo soy Médico Alex', 'alejandro@mail.com', NULL, '$2y$12$/hpg3zKkprPrJ4pvfTwwvuuNwywmWc.VhNIVeLjFJLbrlrnJiSHTu', '0123456789', 'Zona Centro', '8341234567', NULL, 'alejandro', 'doctor', NULL, '2024-08-14 19:48:33', '2024-08-14 21:56:42'),
(18, 'admin2', 'admin2@mail.com', NULL, '$2y$12$6Ut7wpX55D0DWaTFzjZIiu.AcGXwAbCdkU66xci.pS6sYEt3YJHbe', '0123456789', 'Zona Centro', '8341234567', NULL, NULL, 'admin', NULL, '2024-08-14 20:13:27', '2024-08-14 20:13:27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_doctor_id_foreign` (`doctor_id`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`),
  ADD KEY `appointments_specialty_id_foreign` (`specialty_id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cancelled_appointments`
--
ALTER TABLE `cancelled_appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cancelled_appointments_cancelled_by_foreign` (`cancelled_by_id`),
  ADD KEY `cancelled_appointments_appointment_id_foreign` (`appointment_id`);

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `horarios_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `specialties_slug_unique` (`slug`);

--
-- Indices de la tabla `specialty_user`
--
ALTER TABLE `specialty_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialty_user_user_id_foreign` (`user_id`),
  ADD KEY `specialty_user_specialty_id_foreign` (`specialty_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cancelled_appointments`
--
ALTER TABLE `cancelled_appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `specialty_user`
--
ALTER TABLE `specialty_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_specialty_id_foreign` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cancelled_appointments`
--
ALTER TABLE `cancelled_appointments`
  ADD CONSTRAINT `cancelled_appointments_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cancelled_appointments_cancelled_by_foreign` FOREIGN KEY (`cancelled_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `specialty_user`
--
ALTER TABLE `specialty_user`
  ADD CONSTRAINT `specialty_user_specialty_id_foreign` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `specialty_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
