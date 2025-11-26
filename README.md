# 📘 Exam Timetable Extraction System — Laravel

A Laravel-based intelligent system that allows students to upload an exam timetable (Excel/PDF) and automatically extract their personalized exam schedule.

The system eliminates the need to manually scan through hundreds of timetable rows by intelligently matching course/unit codes and returning the correct **Date**, **Time**, **Room**, and **Campus**.

---

# 🚀 Features

### ✅ Student-Facing Features
- Upload exam timetable (.xlsx, .xls, .pdf)
- Enter multiple unit codes at once
- Automatic extraction of:
  - Exam Date
  - Exam Time
  - Exam Room
  - Campus / Block
- Multi-sheet timetable support
- Clean results table
- Export to PDF (optional)
- Export to Excel (optional)

### 🧠 Backend Features
- Intelligent cell scanning (via Laravel Excel)
- Fuzzy and strict matching for unit codes
- Date/time/room extraction from header+row mapping
- Sheet-based campus detection
- Service class architecture (clean, maintainable)
- Easily extendable for AI/OCR

---

# 🛠️ Tech Stack

| Layer      | Technology |
|------------|------------|
| Backend    | Laravel 10+ |
| Spreadsheet Processing | Laravel Excel (Maatwebsite) |
| PDF Export | DOMPDF (optional) |
| Frontend   | Blade (or Vue/React optional) |
| Storage    | Local filesystem (S3 optional) |
| Language   | PHP 8+ |

---


# 🧠 How the Extraction Algorithm Works

### 1️⃣ User uploads timetable  
Handled by `UploadController`.  
File is stored under `/storage/app/timetables`.

### 2️⃣ User enters units  
Example:
```

ACS 413 A
PHY 217 A
ENG 098A

````

### 3️⃣ The Timetable Parser executes
`TimetableParser.php`:

- Loads Excel into a matrix.
- Cleans text:
  - Removes spaces  
  - Converts to uppercase  
- Searches for unit codes inside each cell.
- Upon match:
  - Extracts **Room** from first column of the row.
  - Extracts **Date** from header row (row 0 or 1).
  - Extracts **Time** from time row (row 2).
  - Extracts **Campus** from sheet name.

### 4️⃣ Returns structured result

```json
[
  {
    "unit": "ENG 112A",
    "date": "09/12/2025",
    "time": "3:00 PM – 5:00 PM",
    "room": "LR12",
    "campus": "ATHIRIVER"
  }
]
````

---

# 📥 Installation Guide

## 1. Clone the project

```bash
git clone https://github.com/Ela-El-maker/timetable.git
cd exam-timetable-extractor
```

## 2. Install PHP dependencies

```bash
composer install
```

## 3. Install JS dependencies (optional)

```bash
npm install
npm run dev
```

## 4. Configure `.env`

```env
APP_NAME="Timetable System"
APP_ENV=local
APP_KEY=
APP_DEBUG=true

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=timetable
DB_USERNAME=root
DB_PASSWORD=
```

Then generate the app key:

```bash
php artisan key:generate
```

## 5. Run migrations (optional)

```bash
php artisan migrate
```

## 6. Start the server

```bash
php artisan serve
```

Visit:

```
http://127.0.0.1:8000
```

---

# 🗂️ Routes Overview

| Method | Route             | Description                       |
| ------ | ----------------- | --------------------------------- |
| GET    | /                 | Upload form                       |
| POST   | /upload-timetable | Upload timetable file             |
| GET    | /enter-units      | Units input form                  |
| POST   | /extract          | Extract schedule and show results |

---

# 📊 Example Output Table

| Unit      | Date        | Time           | Room   | Campus    |
| --------- | ----------- | -------------- | ------ | --------- |
| ENG 098A  | 09 Dec 2025 | 3:00–5:00 PM   | LR12   | ATHIRIVER |
| ACS 413 A | 11 Dec 2025 | 3:00–5:00 PM   | BCC3   | ATHIRIVER |
| MAT 322A  | 09 Dec 2025 | 10:00–12:00 PM | ICT115 | ATHIRIVER |

---

# 🎯 Roadmap / Future Enhancements

### 🔥 Phase 2 Features

* PDF text + table extraction
* AI OCR for scanned timetables
* Student login + dashboard
* Google Calendar export
* Upload past timetables
* Conflict detection (2 exams same time)
* API version (for mobile app)

### 📱 Phase 3 (Optional)

* Flutter mobile app
* Push notifications
* Group scheduling (friends/classmates)

---

# 🤝 Contributing

Pull requests are welcome!
To contribute:

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Open a pull request

---

# 📄 License

This project is open-sourced under the **MIT License**.

---

# 🙌 Author

Built by **Felo Ela**
A software solution designed to help students access exam details faster, easier, and smarter.


