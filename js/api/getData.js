// Всі посилання до API
import api from "./urls.js";

// Функція для отримання данних з API
export default function getData(url) {
    return fetch(url).then(data => data.json());
}

// Повертаємо також посилання до API
export { api };
