# 🎬 Simple Cinema Ticket Booking System

A lightweight web-based movie ticket booking form built using **HTML5** tables and designed to process reservation data via **PHP** (`tiket.php`).

## 🚀 Features

*   **Customer Information:** Text input field to capture the buyer's full name (`Nama_Pemesan`) with required validation.
*   **Movie Selection:** Drop-down (`<select>`) menu featuring current movie lineups:
    *   *Dune Part Three*
    *   *Avengers Doomsday*
    *   *The Odyssey*
    *   *Spiderman Brand New Day*
*   **Ticket Quantity:** Numeric input with a minimum limit (`min="1"`) to ensure valid ticket amounts.
*   **Schedule & Time:** Integrated HTML5 date picker (`date`) and time selector (`time`) for screening sessions.
*   **Form Controls:** Dedicated buttons to submit data (`Beli`) or clear the form (`Cancel`).

## 📁 Project Structure

```text
├── index.html       # The main movie booking form interface
└── tiket.php        # Backend processor handling form data via POST method
