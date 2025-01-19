- PHP >= 8.1
- Composer
- DB name: backend-test

## Langkah-Langkah Instalasi

1. **Clone repositori**:
   ```bash
   git clone https://github.com/ardirannu/repository-name.git
   
2. **Composer Install**:
   ```bash
   composer install

3. **Set db name on env, migrate & db:seed**

2. **API Docs**:
   ```bash
   GET http://127.0.0.1:8000/api/employee
   GET http://127.0.0.1:8000/api/employee/store
   POST http://127.0.0.1:8000/api/employee/update/{employee_id}
   DELETE http://127.0.0.1:8000/api/employee/{employee_id}
