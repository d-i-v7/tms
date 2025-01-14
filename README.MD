# Tailor Management System (TMS)

Welcome to the **Tailor Management System (TMS)**! This PHP-based application is designed to streamline and simplify tailor shop operations, including order management, customer tracking, and staff management.

## Features

- **Customer Management**: Add, edit, and track customer details.
- **Order Management**: Manage tailoring orders with details like design preferences, measurements, and deadlines.
- **Staff Management**: Keep track of tailor shop staff and assign tasks.
- **Dashboard**: Get an overview of the shop's performance and pending tasks.
- **Reports**: Generate reports for orders, revenue, and staff productivity.

## Installation

### Prerequisites

1. **Web Server**: Apache or Nginx
2. **PHP**: Version 7.4 or higher
3. **Database**: MySQL or MariaDB
4. **Composer**: For dependency management (optional)

### Steps

1. **Clone the Repository**

   ```bash
   git clone https://github.com/d-i-v7/tms.git
   cd tms
   ```

2. **Set Up the Database**

   - Create a database named `tms`.
   - Import the provided `tms.sql` file into your database.

   ```bash
   mysql -u username -p tms < tms.sql
   ```

3. **Configure Environment**

   - Rename `.env.example` to `.env`.
   - Update database credentials and other configuration details in the `.env` file.

4. **Install Dependencies** (if using Composer)

   ```bash
   composer install
   ```

5. **Start the Server**

   - Using XAMPP or WAMP:
     - Place the project folder in the `htdocs` directory (for XAMPP) or the `www` directory (for WAMP).
     - Start Apache and MySQL from the XAMPP or WAMP control panel.
     - Navigate to the project in your browser (e.g., `http://localhost/tms`).

6. **Access the Application**

   Open your browser and navigate to `http://localhost/tms`.

## Usage

1. **Login**: Use the default admin credentials provided below (change them after the first login).
   - Username: `admin`
   - Password: `password`

2. **Dashboard**: View an overview of ongoing operations.
3. **Manage Orders**: Add new orders, update existing ones, and mark them as complete.
4. **Manage Customers**: Keep a record of customer details and preferences.
5. **Reports**: View and export reports for better insights.

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a new branch for your feature/bug fix.
3. Commit your changes and push to your branch.
4. Submit a pull request for review.

## License

This project is licensed under the [MIT License](LICENSE).

---

## About the Creators

This system was developed by **Tamer Mohamed** with the collaboration of some of his students, including **Abdirahmaan Osmaan**. We are proud to call ourselves **Team Bilisan**, a name that represents our passion and dedication.

---

Thank you for using TMS! If you encounter any issues, feel free to open an issue in the repository or contact us for support.
