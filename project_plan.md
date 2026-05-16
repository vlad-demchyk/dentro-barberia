# План розробки сайту барбершопу

**Дата:** 13 травня 2026  
**Статус:** Planning  
**Оновлено:** Перехід на Laravel + PostgreSQL, Vue з оптимізованою архітектурою

## Роздуми про план

Оригінальний план був амбітним і технічно грамотним, з вибором Modular Monolith як золотої середини між простотою та масштабованістю. Після аналізу ми вирішили перейти на Laravel замість чистого PHP для прискорення розробки (готові інструменти для API, auth, міграцій) та PostgreSQL замість MySQL для кращої роботи з JSON, складними запитами та надійності. Це дозволить уникнути технічного боргу та зосередитися на бізнес-логіці.

Для frontend Vue 3 залишиться, але з акцентом на перевикористання компонентів (Composition API, Pinia для state), швидкі бібліотеки (Vite, Tailwind, Headless UI) та ефективні API (Axios з interceptors, Vue Query для кешування).

Переваги нових технологій:

- **Laravel**: Швидка розробка, безпека з коробки, Eloquent ORM, Artisan команди.
- **PostgreSQL**: Краща продуктивність для складних запитів, підтримка JSONB, геоданих (якщо потрібно).
- **Vue**: Реактивність, TypeScript підтримка, екосистема бібліотек для швидкості.

## Статус проекту (13 травня 2026)

### ✅ Що готово

**Frontend (базова структура):**

- ✅ Основні файли (`main.ts`, `App.vue`, `index.html`, `vite.config.js`)
- ✅ Package.json з залежностями
- ✅ Axios конфіг з interceptors
- ✅ Mock дані (JSON) для тестування
- ✅ Vite розроблювальний сервер (port 5173)

**Backend (заготовка):**

- ✅ Базові PHP файли (`app.php`, `routes_api.php`, `config.php`)
- ✅ `.gitignore` налаштований

**Database:**

- ✅ 8+ Seeders з реальними тестовими даними для всіх таблиць
- ✅ Mock JSON файли для всіх сутностей

### ❌ Чого критично не вистачає для початку розробки

**Frontend (CRITICAL):**

- ❌ Vue Router (`router/index.ts`)
- ❌ Pinia Store (`stores/` папка з stores)
- ❌ Composables для API (`composables/useBarbers.ts`, тощо)
- ❌ UI компоненти (`components/ui/Button.vue`, `Modal.vue`, тощо)
- ❌ Сторінки (`pages/` folder)
- ❌ Tailwind CSS конфіг
- ❌ PostCSS конфіг
- ❌ TypeScript конфіг (`tsconfig.json`)

**Backend (IMPORTANT):**

- ❌ `composer.json` — PHP залежності не налаштовані
- ❌ Laravel структура (`app/Models/`, `app/Http/Controllers/`)
- ❌ Eloquent моделі (Barber, Service, Appointment, тощо)
- ❌ API контролери
- ❌ Міграції БД (`.php` файли)
- ❌ Routes API правильно налаштовані

**Config & Docs:**

- ❌ `README.md` з інструкціями по запуску
- ❌ `.env.example`
- ❌ Docker файли (опціонально на цьому етапі)

## Архітектура проекту

**Modular Monolith** з чітким розділенням на модулі (Barbers, Appointments, Admin). Все на одному сервері (Nginx), але готове до мікросервісів.

- **Backend:** Laravel API (RESTful + GraphQL опціонально)
- **Frontend:** Vue 3 SPA з SSR (Nuxt.js для SEO)
- **Database:** PostgreSQL з міграціями
- **Deployment:** Docker + Kubernetes для масштабу

## Стек технологій

| Компонент                | Технологія                            | Чому?                                                          |
| ------------------------ | ------------------------------------- | -------------------------------------------------------------- |
| **Backend**              | Laravel 11                            | Швидка розробка, Eloquent, Sanctum для auth, Tinker для тестів |
| **Database**             | PostgreSQL 15                         | JSONB для settings, складні запити, надійність                 |
| **Frontend**             | Vue 3 + Nuxt 3                        | SSR для SEO, Composition API, швидкий рендеринг                |
| **State Management**     | Pinia                                 | Легкий, TypeScript-friendly, заміна Vuex                       |
| **Styling**              | Tailwind CSS + Headless UI            | Швидка верстка, доступність, перевикористання                  |
| **Build Tool**           | Vite                                  | Швидка збірка, HMR                                             |
| **API Client**           | Axios + Vue Query                     | Кешування, retry, interceptors                                 |
| **Testing**              | PHPUnit (Backend) + Vitest (Frontend) | Автоматизація, надійність                                      |
| **Auth**                 | Laravel Sanctum                       | SPA-friendly, токени                                           |
| **File Storage**         | Laravel Storage (S3)                  | Хмара для фото                                                 |
| **Calendar Integration** | Google Calendar API + Webhooks        | Real-time sync                                                 |
| **Search**               | Laravel Scout + Meilisearch           | Швидкий пошук клієнтів/послуг                                  |
| **Notifications**        | Laravel Notifications                 | SMS/Email для бронювань                                        |

## Структура проекту

```
barbershop/
├── app/                          # Laravel app
│   ├── Http/Controllers/Api/     # API контролери
│   ├── Models/                   # Eloquent моделі
│   ├── Services/                 # Бізнес-логіка
│   └── Policies/                 # Авторизація
├── database/
│   ├── migrations/               # Міграції БД
│   └── seeders/                  # Тестові дані
├── resources/
│   └── js/                       # Vue frontend
│       ├── components/           # Перевикористовувані компоненти
│       │   ├── ui/               # Базові (Button, Modal)
│       │   ├── BarberProfile.vue # Профіль барбера
│       │   └── AdminCalendar.vue # Календар адміна
│       ├── pages/                # Nuxt сторінки
│       ├── stores/               # Pinia stores
│       └── composables/          # Vue composables
├── routes/
│   └── api.php                   # API роути
├── public/                       # Публічні файли
├── storage/                      # Завантаження фото
├── docker/                       # Docker файли
└── tests/                        # Тести
```

## База даних (PostgreSQL)

### Основні таблиці

```sql
-- Барбари
CREATE TABLE barbers (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    short_bio TEXT,
    avatar_url VARCHAR(255),
    template_id INT DEFAULT 0,
    is_working BOOLEAN DEFAULT TRUE,
    start_date DATE,
    end_date DATE,
    holiday_reason TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Послуги
CREATE TABLE services (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    base_price DECIMAL(10,2),
    category VARCHAR(50),
    duration_min INT
);

-- Зв'язок барбер-послуга
CREATE TABLE barber_services (
    id SERIAL PRIMARY KEY,
    barber_id INT REFERENCES barbers(id),
    service_id INT REFERENCES services(id),
    personal_price DECIMAL(10,2),
    personal_duration INT
);

-- Робочі години
CREATE TABLE working_hours (
    id SERIAL PRIMARY KEY,
    barber_id INT REFERENCES barbers(id),
    day_of_week INT CHECK (day_of_week BETWEEN 0 AND 6),
    start_time TIME,
    end_time TIME,
    break_start TIME,
    break_end TIME
);

-- Записи
CREATE TABLE appointments (
    id SERIAL PRIMARY KEY,
    barber_id INT REFERENCES barbers(id),
    service_id INT REFERENCES services(id),
    start_time TIMESTAMP NOT NULL,
    customer_name VARCHAR(100),
    customer_phone VARCHAR(20),
    customer_note TEXT,
    status ENUM('active', 'confirmed', 'cancelled') DEFAULT 'active',
    gcal_sync_id VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Шаблони стилів
CREATE TABLE templates (
    id SERIAL PRIMARY KEY,
    code_name VARCHAR(50),
    base_css_content TEXT,
    priority_order INT DEFAULT 0
);

-- Налаштування (JSONB)
CREATE TABLE settings (
    id SERIAL PRIMARY KEY,
    key VARCHAR(100) UNIQUE,
    value JSONB
);

-- Клієнти
CREATE TABLE clients (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    email VARCHAR(100),
    notes TEXT,
    total_visits INT DEFAULT 0,
    last_visit DATE,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Продукти
CREATE TABLE products (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2),
    image_url VARCHAR(255),
    category VARCHAR(50),
    stock_quantity INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Новини
CREATE TABLE news (
    id SERIAL PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    content TEXT,
    image_url VARCHAR(255),
    published_at DATE,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Міграції та Seeders

Використовуємо Laravel migrations для створення таблиць. Додамо seeders для тестових даних.

## Backend (Laravel)

### API Endpoints

- `GET /api/barbers` — Список барберів
- `GET /api/barbers/{id}` — Деталі барбера
- `POST /api/barbers/{id}/calendar` — Доступні слоти
- `POST /api/appointments` — Створити запис
- `GET /api/admin/appointments` — Адмін календар
- `POST /api/auth/login` — Авторизація

### Сервіси

- **AppointmentService**: Логіка бронювання, перевірка зайнятості
- **GoogleCalendarService**: Синхронізація з GCal
- **NotificationService**: Відправка повідомлень

### Безпека

- CSRF захист через Sanctum
- Rate limiting для API
- Валідація через Form Requests
- XSS захист через Blade escaping

## Frontend (Vue 3 + Nuxt 3)

### Архітектура компонентів

Використовуємо Composition API для перевикористання:

```javascript
// composables/useAppointment.js
export const useAppointment = () => {
  const { $axios } = useNuxtApp();
  const bookAppointment = async (data) => {
    return await $axios.post("/api/appointments", data);
  };
  return { bookAppointment };
};
```

### Ключові компоненти

- **BaseButton.vue**: Перевикористовуваний кнопка з варіантами
- **CalendarGrid.vue**: Сітка календаря з drag-n-drop (vue-draggable)
- **BarberCard.vue**: Карточка барбера з lazy loading
- **AdminDashboard.vue**: Панель з фільтрами та експортом

### Бібліотеки для швидкості

- **VueUse**: Утиліти для реактивності
- **Vue Query**: Кешування API запитів
- **Headless UI**: Доступні компоненти
- **Vue Final Modal**: Модальні вікна
- **Day.js**: Робота з датами
- **Vue I18n**: Локалізація

### State Management (Pinia)

```javascript
// stores/appointment.js
export const useAppointmentStore = defineStore("appointment", () => {
  const appointments = ref([]);
  const fetchAppointments = async () => {
    appointments.value = await $fetch("/api/appointments");
  };
  return { appointments, fetchAppointments };
});
```

## Конкретні кроки для початку розробки

### **ПРІОРИТЕТ 1 — Frontend (CRITICAL)**

Потрібно створити цю структуру в `resources/js/`:

```
router/
├── index.ts ← Vue Router setup
├── routes.ts ← Маршрути додатку

stores/
├── index.ts ← Pinia setup
├── barber.ts ← Barber store
├── appointment.ts ← Appointment store
├── client.ts ← Client store

composables/
├── useBarbers.ts ← Запити для барберів
├── useAppointments.ts ← Запити для записів
├── useClients.ts ← Запити для клієнтів
└── useAuth.ts ← Авторизація

components/
├── ui/
│ ├── BaseButton.vue
│ ├── BaseModal.vue
│ ├── BaseInput.vue
│ └── BaseCard.vue
├── BarberCard.vue
├── CalendarGrid.vue
├── AppointmentForm.vue
└── Navigation.vue

pages/
├── index.vue ← Головна
├── barbers.vue ← Список барберів
├── barber-[id].vue ← Профіль барбера
├── appointments.vue ← Запис
├── admin.vue ← Адмін-панель
└── login.vue ← Логін

types/
└── index.ts ← TypeScript інтерфейси

api/
├── axios.ts ← axios інстанс
└── index.ts ← API функції

tailwind.config.js ← Tailwind конфіг
postcss.config.js ← PostCSS конфіг
tsconfig.json ← TypeScript конфіг
```

### **ПРІОРИТЕТ 2 — Backend (IMPORTANT)**

Потрібно в `public_html/` або корені:

```
app/
├── Models/
│ ├── Barber.php
│ ├── Service.php
│ ├── Appointment.php
│ └── Client.php

├── Http/Controllers/Api/
│ ├── BarberController.php
│ ├── AppointmentController.php
│ └── ServiceController.php

└── Services/
├── AppointmentService.php
└── GoogleCalendarService.php

database/
├── migrations/
│ ├── create_barbers_table.php
│ ├── create_services_table.php
│ ├── create_appointments_table.php
│ └── ...
└── seeders/
└── DatabaseSeeder.php

routes/
└── api.php ← API маршрути

composer.json ← Laravel залежності
.env.example ← Приклад конфігу
```

### **ПРІОРИТЕТ 3 — Конфіг & Документація**

- `README.md` з інструкціями
- `.env.example` для змінних
- `docker-compose.yml` (за бажанням)

## Обновлений план розробки

**Фаза 1 — Foundation (1-2 дні):**

1. Встановити Laravel (якщо ще не встановлено)
2. Налаштувати composer.json
3. Створити базові моделі та контролери
4. Встановити migrations

**Фаза 2 — Frontend Components (2-3 дні):**

1. Налаштувати Vue Router з маршрутами
2. Налаштувати Pinia store
3. Створити базові UI компоненти (Button, Modal, Input)
4. Встановити Tailwind CSS

**Фаза 3 — API Integration (2-3 дні):**

1. Створити composables для API запитів
2. Підключити axios до store
3. Тестувати mock дані
4. Налаштувати інтерцептори

**Фаза 4 — Сторінки (3-4 дні):**

1. Сторінка барберів з картками
2. Сторінка профілю барбера
3. Форма запису
4. Адмін-панель (базова)

**Фаза 5 — Тестування & Оптимізація (2-3 дні):**

1. Unit тести для composables
2. Integration тести для API
3. Оптимізація performance
4. Деплой

## Рекомендації

- **Швидкість розробки:** Використовуйте готові компоненти з Headless UI чи shadcn
- **API First:** Спочатку розробляйте API, потім фронтенд
- **Тестування:** Напишіть тести для críttical paths
- **Документація:** Оновлюйте README при кожному мажорному кроці
- **Git commits:** Робіть часті commits з descriptive messages

Цей план готовий до активної розробки. Початок рекомендується з Фази 1!
