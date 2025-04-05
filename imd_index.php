<?php
  // index.php – одностраничный сайт в стиле Marvel с видимым фоном (bg.jpg)
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Профессиональный веб-дизайнер в стиле Marvel</title>
  <style>
    /* Общий сброс и базовая настройка */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    html {
      scroll-behavior: smooth;
    }
    /* Фоновое изображение без оверлея, чтобы оно было полностью видно. 
       Фон фиксирован, а контент скроллится поверх него. */
    body {
      font-family: 'Helvetica', sans-serif;
      background: url('bg.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #333;
      line-height: 1.6;
    }

    /* Шапка */
    header {
      background: #1b263b;
      padding: 15px 30px;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
      box-shadow: 0 2px 5px rgba(0,0,0,0.3);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .header-left {
      display: flex;
      align-items: center;
    }
    .header-left img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #fff;
      margin-right: 15px;
    }
    .header-left h1 {
      font-size: 1.8rem;
      color: #fff;
    }
    nav {
      display: flex;
      align-items: center;
    }
    nav ul {
      list-style: none;
      display: flex;
      flex-wrap: wrap;
    }
    nav ul li {
      margin-left: 20px;
    }
    nav ul li a {
      text-decoration: none;
      color: #fff;
      font-weight: bold;
      font-size: 1rem;
      transition: color 0.3s;
    }
    nav ul li a:hover {
      color: #da291c;
    }
    /* Кнопка "Связаться" в шапке */
    #callbackBtn {
      background-color: #da291c;
      color: #fff;
      border: none;
      padding: 10px 15px;
      border-radius: 4px;
      cursor: pointer;
      transition: background 0.3s;
      margin-left: 20px;
      font-size: 1rem;
    }
    #callbackBtn:hover {
      background-color: #a71d18;
    }
    
    /* Секции */
    section {
      padding: 100px 20px 60px; /* отступ сверху из-за фиксированного header */
      min-height: 100vh;
    }
    section:nth-of-type(odd) {
      background-color: rgba(247, 247, 247, 0.9);
    }
    section:nth-of-type(even) {
      background-color: rgba(255, 255, 255, 0.9);
    }
    section h2 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 2rem;
      color: #1b263b;
      text-transform: uppercase;
    }
    section p {
      max-width: 800px;
      margin: 0 auto 20px;
      text-align: center;
      font-size: 1.1rem;
      color: #555;
    }
    
    /* Секция "Обо мне" – двухколоночная вёрстка */
    .about-container {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      gap: 20px;
      padding: 20px;
    }
    .about-left, .about-right {
      flex: 1 1 300px;
    }
    .about-left img {
      width: 100%;
      max-width: 300px;
      height: 300px;
      object-fit: cover;
      border: 5px solid #1b263b;
    }
    .about-right {
      font-size: 1rem;
      color: #555;
      text-align: left;
    }
    
    /* Секция "Опыт" – таблица с навыками */
    .skills-table {
      width: 100%;
      max-width: 800px;
      margin: 0 auto;
      border-collapse: collapse;
    }
    .skills-table td, .skills-table th {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: center;
      font-size: 0.95rem;
      color: #333;
    }
    
    /* Секция "Портфолио" – 3 колонки */
    .portfolio-container {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
    }
    .portfolio-item {
      width: 30%;
      margin-bottom: 30px;
      text-align: center;
    }
    .portfolio-item img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      border: 3px solid #1b263b;
      object-fit: cover;
      margin-bottom: 10px;
    }
    .portfolio-item .divider {
      font-size: 1.5rem;
      color: #da291c;
      margin-bottom: 10px;
    }
    .portfolio-item .description {
      font-size: 1rem;
      color: #333;
    }
    
    /* Секция "Отзывы" – 5 колонок */
    .testimonials-container {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
    }
    .testimonial-item {
      width: 18%;
      text-align: center;
      margin-bottom: 30px;
    }
    .testimonial-item img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      border: 2px solid #1b263b;
      object-fit: cover;
      margin-bottom: 10px;
    }
    .testimonial-item .feedback {
      font-size: 0.9rem;
      color: #333;
    }
    
    /* Кнопка "Наверх" – фиксированный размер 50x50 пикселей */
    #scrollTop {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #da291c;
      color: #fff;
      border: none;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      font-size: 1.5rem;
      cursor: pointer;
      display: none;
      box-shadow: 0 2px 4px rgba(0,0,0,0.3);
      transition: background-color 0.3s;
    }
    #scrollTop:hover {
      background-color: #a71d18;
    }
    
    /* Модальное окно для обратной связи */
    .modal {
      display: none; 
      position: fixed; 
      z-index: 2000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.5);
    }
    .modal-content {
      background-color: #fff;
      margin: 10% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 90%;
      max-width: 500px;
      border-radius: 8px;
      text-align: center;
      position: relative;
    }
    .modal-content h3 {
      margin-bottom: 1rem;
      color: #1b263b;
    }
    .modal-content input,
    .modal-content textarea {
      width: 90%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .modal-content button {
      background-color: #da291c;
      color: #fff;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 10px;
      transition: background-color 0.3s;
    }
    .modal-content button:hover {
      background-color: #a71d18;
    }
    .close-modal {
      color: #aaa;
      position: absolute;
      right: 10px;
      top: 10px;
      font-size: 24px;
      font-weight: bold;
      cursor: pointer;
      transition: color 0.3s;
    }
    .close-modal:hover {
      color: #000;
    }
    
    /* Адаптивность для меню */
    @media (max-width: 768px) {
      .portfolio-item, .testimonial-item {
        width: 45%;
      }
      nav ul li {
        margin-left: 10px;
        font-size: 0.9rem;
      }
      .about-container {
        flex-direction: column;
      }
    }
    /* Дополнительный медиазапрос для очень узких экранов */
    @media (max-width: 480px) {
      nav ul {
        flex-direction: column;
        align-items: center;
      }
      nav ul li {
        margin: 5px 0;
      }
      .portfolio-item, .testimonial-item {
        width: 100%;
      }
      .header-left h1 {
        font-size: 1.4rem;
      }
    }
  </style>
</head>
<body>
  <!-- Шапка -->
  <header>
    <div class="header-left">
      <img src="https://upload.wikimedia.org/wikipedia/en/e/ed/Iron_Man_bleeding_edge.jpg" alt="Iron Man">
      <h1>Marvel Designer</h1>
    </div>
    <nav>
      <ul>
        <li><a href="#about">Обо мне</a></li>
        <li><a href="#experience">Опыт</a></li>
        <li><a href="#services">Услуги</a></li>
        <li><a href="#portfolio">Портфолио</a></li>
        <li><a href="#testimonials">Отзывы</a></li>
      </ul>
      <button id="callbackBtn">Связаться</button>
    </nav>
  </header>
  
  <!-- Секция "Обо мне" -->
  <section id="about">
    <h2>Обо мне</h2>
    <div class="about-container">
      <div class="about-left">
        <img src="https://via.placeholder.com/300x300?text=Портрет" alt="Портрет автора">
      </div>
      <div class="about-right">
        <p>Привет! Я – опытный веб-дизайнер, специализирующийся на креативных решениях в стиле Marvel. Создавая уникальные концепции, я помогаю брендам выделяться и завоевывать сердца аудитории с помощью смелых, динамичных и стильных проектов.</p>
      </div>
    </div>
  </section>
  
  <!-- Секция "Опыт" -->
  <section id="experience">
    <h2>Опыт</h2>
    <table class="skills-table">
      <tr>
        <td>Photoshop ★★★★★</td>
        <td>Web Design ★★★★★</td>
        <td>HTML ★★★★★</td>
      </tr>
      <tr>
        <td>PHP ★★★★★</td>
        <td>Illustrator ★★★★★</td>
        <td>Sketch ★★★★★</td>
      </tr>
      <tr>
        <td>CSS ★★★★★</td>
        <td>JavaScript ★★★★★</td>
        <td>UX/UI ★★★★★</td>
      </tr>
      <tr>
        <td>WordPress ★★★★★</td>
        <td>SEO ★★★★★</td>
        <td>Bootstrap ★★★★★</td>
      </tr>
      <tr>
        <td>After Effects ★★★★★</td>
        <td>Figma ★★★★★</td>
        <td>CorelDRAW ★★★★★</td>
      </tr>
    </table>
  </section>
  
  <!-- Секция "Услуги" -->
  <section id="services">
    <h2>Услуги</h2>
    <p>Я предлагаю разработку уникальных дизайн-концепций, создание адаптивных сайтов и редизайн существующих проектов. Каждый проект – это результат тщательного творческого подхода и глубокого понимания потребностей клиентов.</p>
  </section>
  
  <!-- Секция "Портфолио" -->
  <section id="portfolio">
    <h2>Портфолио</h2>
    <div class="portfolio-container">
      <div class="portfolio-item">
        <img src="https://via.placeholder.com/120?text=Проект+1" alt="Проект 1">
        <div class="divider">&#8226; &#8226; &#8226;</div>
        <div class="description">Проект 1 – Креативное решение</div>
      </div>
      <div class="portfolio-item">
        <img src="https://via.placeholder.com/120?text=Проект+2" alt="Проект 2">
        <div class="divider">&#8226; &#8226; &#8226;</div>
        <div class="description">Проект 2 – Инновационный подход</div>
      </div>
      <div class="portfolio-item">
        <img src="https://via.placeholder.com/120?text=Проект+3" alt="Проект 3">
        <div class="divider">&#8226; &#8226; &#8226;</div>
        <div class="description">Проект 3 – Эффектный дизайн</div>
      </div>
    </div>
  </section>
  
  <!-- Секция "Отзывы" -->
  <section id="testimonials">
    <h2>Отзывы</h2>
    <div class="testimonials-container">
      <div class="testimonial-item">
        <img src="https://via.placeholder.com/80?text=Кл1" alt="Клиент 1">
        <div class="feedback">"Отличная работа! Рекомендую."</div>
      </div>
      <div class="testimonial-item">
        <img src="https://via.placeholder.com/80?text=Кл2" alt="Клиент 2">
        <div class="feedback">"Креатив и профессионализм."</div>
      </div>
      <div class="testimonial-item">
        <img src="https://via.placeholder.com/80?text=Кл3" alt="Клиент 3">
        <div class="feedback">"Воплотил наши идеи в жизнь."</div>
      </div>
      <div class="testimonial-item">
        <img src="https://via.placeholder.com/80?text=Кл4" alt="Клиент 4">
        <div class="feedback">"Невероятное внимание к деталям."</div>
      </div>
      <div class="testimonial-item">
        <img src="https://via.placeholder.com/80?text=Кл5" alt="Клиент 5">
        <div class="feedback">"Профессиональный подход от начала до конца."</div>
      </div>
    </div>
  </section>
  
  <!-- Кнопка "Наверх" -->
  <button id="scrollTop">&#8679;</button>
  
  <!-- Модальное окно для обратной связи -->
  <div id="callbackModal" class="modal">
    <div class="modal-content">
      <span class="close-modal" id="closeModal">&times;</span>
      <h3>Обратная связь</h3>
      <form id="callbackForm" method="post" action="callback.php">
        <input type="text" name="name" placeholder="Ваше имя" required>
        <input type="email" name="email" placeholder="Ваш Email" required>
        <textarea name="message" placeholder="Ваше сообщение" rows="4" required></textarea>
        <button type="submit">Отправить</button>
      </form>
    </div>
  </div>
  
  <script>
    // Плавное отображение кнопки "Наверх"
    const scrollTopBtn = document.getElementById('scrollTop');
    window.addEventListener('scroll', () => {
      scrollTopBtn.style.display = window.pageYOffset > 300 ? 'block' : 'none';
    });
    scrollTopBtn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
    
    // Функциональность модального окна для обратной связи
    const callbackBtn = document.getElementById('callbackBtn');
    const callbackModal = document.getElementById('callbackModal');
    const closeModal = document.getElementById('closeModal');
    
    callbackBtn.addEventListener('click', () => {
      callbackModal.style.display = 'block';
    });
    closeModal.addEventListener('click', () => {
      callbackModal.style.display = 'none';
    });
    window.addEventListener('click', (event) => {
      if (event.target == callbackModal) {
        callbackModal.style.display = 'none';
      }
    });
  </script>
</body>
</html>
